<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class InvoiceController extends Controller
{

    public function index()
    {
        // $invoices = Invoice::with('products')->get();
        $invoices = Invoice::get();
        // dd($invoices);

        return view('invoices', compact('invoices'));
    }

    // public function store(Request $request)
    // {

    //     // Get the uploaded image
    //     $image = $request->file('image');

    //     // Get the last invoice number from the database
    //     $last_invoice_number = Invoice::orderBy('id', 'desc')->pluck('invoice_number')->first();

    //     // Generate the next invoice number
    //     $current_year = date('Y');
    //     $next_invoice_number = str_pad(intval(substr($last_invoice_number, -4)) + 1, 4, '0', STR_PAD_LEFT);
    //     $invoice_number = "Invoice - {$current_year}-{$next_invoice_number}";

    //     // Create a new invoice
    //     $invoice = new Invoice;
    //     $invoice->invoice_number = $invoice_number;
    //     $invoice->billing_address = json_encode($request->input('billing_address'));
    //     $invoice->shipping_Address = json_encode($request->input('shipping_address'));
    //     $invoice->total_Amount = $request->input('total_amount');
    //     $invoice->save();

    //     // Save the products and their images
    //     foreach ($request->input('product') as $productId => $data) {
    //         $product = new Product;
    //         $product->invoice_id = $invoice->id;
    //         $product->product_name = $data['product_name'];
    //         $product->quantity = $data['quantity'];
    //         $product->rate = $data['rate'];
    //         $product->amount = $data['amount'];

    //         // Upload the product image
    //         $image = $request->file('product.' . $productId . '.image');
    //         if (isset($image)) {
    //             // Get the original name for the image
    //             $originalName = $image->getClientOriginalName();

    //             // Create the 'images' directory if it doesn't exist
    //             if (!is_dir(public_path('/images'))) {
    //                 mkdir(public_path('/images'), 0777);
    //             }

    //             // Append the current date and time to the image name to make it unique
    //             $timeStamp = date('YmdHis');
    //             $imageName = $timeStamp . '_' . $originalName;

    //             // Save the image in the 'images' directory
    //             $image->move(public_path('/images/'), $imageName);
    //         } else {
    //             $imageName = "default.png";
    //         }

    //         $product->image = $imageName;

    //         $product->save();
    //     }

    //     // Redirect to the previous page
    //     return redirect()->back();
    // }
    public function store(Request $request)
{
    // return $request;
    // Get the uploaded image
    $image = $request->file('image');

    // Check if we need to create a new invoice or update an existing one
    $invoice = null;
    $invoice_number = $request->input('invoice_number');
    if ($invoice_number) {
        $invoice = Invoice::where('invoice_number', $invoice_number)->first();
    }

    // If no invoice was found, create a new one
    if (!$invoice) {
        // Get the last invoice number from the database
        $last_invoice_number = Invoice::orderBy('id', 'desc')->pluck('invoice_number')->first();

        // Generate the next invoice number
        $current_year = date('Y');
        $next_invoice_number = str_pad(intval(substr($last_invoice_number, -4)) + 1, 4, '0', STR_PAD_LEFT);
        $invoice_number = "Invoice - {$current_year}-{$next_invoice_number}";

        // Create a new invoice
        $invoice = new Invoice;
        $invoice->invoice_number = $invoice_number;
    }

    // Update the invoice details
    $invoice->billing_address = json_encode($request->input('billing_address'));
    $invoice->shipping_Address = json_encode($request->input('shipping_address'));
    $invoice->total_Amount = $request->input('total_amount');
    $invoice->save();

    // Save the products and their images
    foreach ($request->input('product') as $productId => $data) {
        $product_id = $data['product_id'];
        $product = null;

        if ($product_id) {
            $product = Product::find($product_id);
        }
        // dd($product);

        if (!$product) {
            $product = new Product;
            $product->invoice_id = $invoice->id;
        }

        $product->product_name = $data['product_name'];
        $product->quantity = $data['quantity'];
        $product->rate = $data['rate'];
        $product->amount = $data['amount'];

        // Upload the product image
        $image = $request->file('product.' . $productId . '.image');
        if (isset($image)) {
            // Get the original name for the image
            $originalName = $image->getClientOriginalName();

            // Create the 'images' directory if it doesn't exist
            if (!is_dir(public_path('/images'))) {
                mkdir(public_path('/images'), 0777);
            }

            // Append the current date and time to the image name to make it unique
            $timeStamp = date('YmdHis');
            $imageName = $timeStamp . '_' . $originalName;

            // Save the image in the 'images' directory
            $image->move(public_path('/images/'), $imageName);

            $product->image = $imageName;
        }

        $product->save();
    }

    // Redirect to the previous page
    return redirect()->back();
}




    // public function edit($id)
    // {
    //     $invoice = Invoice::find($id);
    //     if (!$invoice) {
    //         abort(404);
    //     }

    //     return view('edit', [
    //         'invoice' => $invoice
    //     ]);
    // }

    public function edit($id)
    {
        // Retrieve the invoice data for the specified ID
        $invoice = Invoice::findOrFail($id);

        // Decode the billing and shipping addresses from JSON strings to PHP objects
        $billingAddress = json_decode($invoice->billing_address);
        $shippingAddress = json_decode($invoice->shipping_address);

        // Return the invoice data as a JSON response with the decoded address objects
        return response()->json([
            'invoice_number' => $invoice->invoice_number,
            'billing_address' => [
                'address' => $billingAddress->address,
                'city' => $billingAddress->city,
                'state' => $billingAddress->state,
                'phone_number' => $billingAddress->phone_number,
            ],
            'shipping_address' => [
                'address' => $shippingAddress->address,
                'city' => $shippingAddress->city,
                'state' => $shippingAddress->state,
                'phone_number' => $shippingAddress->phone_number,
            ],
            'products' => $invoice->products,
            'total_amount' => $invoice->total_amount,
        ]);
    }



    public function delete($id)
    {
        dd('hi');
        $invoice = Invoice::find($id);
        if (!$invoice) {
            abort(404);
        }

        $invoice->delete();

        return redirect()->route('/')
            ->with('success', 'Invoice deleted successfully');
    }

    public function destroy_product($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function update(Request $request, $id)
{
    $image = $request->file('image');
    $invoice = Invoice::find($id);
    if (!$invoice) {
        abort(404);
    }

    $invoice->invoice_number = $request->input('invoice_number');
    $invoice->billing_address = $request->input('billing_address');
    $invoice->shipping_address = $request->input('shipping_address');
    $invoice->total_amount = $request->input('total_amount');

    foreach ($invoice->products as $index => $product) {

        $product->product_name = $request->input("product.$index.product_name");
        $product->quantity = $request->input("product.$index.quantity");
        $product->rate = $request->input("product.$index.rate");
        $product->amount = $request->input("product.$index.amount");

        // handle product image
        $productImage = $request->file("product.$index.image");
        if (isset($productImage)) {
            // make unique name for image
            $originalName = $productImage->getClientOriginalName();
            $timeStamp = date('YmdHis');
            $imageName = $timeStamp . '_' . $originalName;

            if (!file_exists(public_path('/images/'))) {
                mkdir(public_path('images/'), 0777, true);
            }

            // delete old product image
            if (file_exists(public_path('/images/' . $product->image))) {
                unlink(public_path('/images/' . $product->image));
            }

            $productImage = Image::make($productImage);
            $productImage->save(public_path('images/' . $imageName));

            $product->image = $imageName;
        } else {
            // if no new image uploaded, keep the existing one
            $product->image = $request->input("product.$index.previous_image");
        }

        $product->save();
    }

    $invoice->save();

    return redirect()->back()
        ->with('success', 'Invoice updated successfully');
}
}
