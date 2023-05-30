<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Invoice</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<!-- Adding custom CSS -->
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<body>
    <div class="container-md">


        {{--  <form action="{{ route('invoice.update', ['id' => $invoice->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}  --}}
        <form action="{{ route('invoice.update', $invoice->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card  mt-4 mb-4">
                <div class="card-header">
                    <h3>Edit Invoice</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Edit the following Products Data</h5>
                    <div class="form-group mb-4">
                        <label for="invoice_number" class="form-label">Invoice Number:</label>
                        <input type="text" name="invoice_number" id="invoice_number"
                            value="{{ $invoice->invoice_number }}" class="form-control" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="billing_address" class="form-label">Billing Address:</label>
                        <textarea name="billing_address" id="billing_address" class="form-control" rows="3" required>{{ $invoice->billing_address }}</textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label for="shipping_address" class="form-label">Shipping Address:</label>
                        <textarea name="shipping_address" id="shipping_address" class="form-control" rows="3" required>{{ $invoice->shipping_address }}</textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label for="total_amount" class="form-label">Total Amount:</label>
                        <input type="text" name="total_amount" id="total_amount" value="{{ $invoice->total_amount }}"
                            class="form-control" required>
                    </div>
                    <br>
                </div>
                </div>
                <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="product-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Rate</th>
                                <th>Amount</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice->products as $index => $product)
                                <tr>
                                    <td><input type="text" name="product[{{ $index }}][product_id]"
                                            value="{{ $product->id }}" required readonly></td>
                                    <td><input type="text" name="product[{{ $index }}][product_name]"
                                            value="{{ $product->product_name }}" required></td>
                                    <td><input type="number" name="product[{{ $index }}][quantity]"
                                            min="1" value="{{ $product->quantity }}" required></td>
                                    <td><input type="number" name="product[{{ $index }}][rate]" min="0"
                                            step="0.01" value="{{ $product->rate }}" required></td>
                                    <td><input type="number" name="product[{{ $index }}][amount]"
                                            min="0" step="0.01" value="{{ $product->amount }}" readonly></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('images/' . $product->image) }}?{{ time() }}"
                                                alt="{{ $product->product_name }} Image" width="20" height="20">
                                            <input type="text" value="{{ $product->image }}"
                                                name="product[{{ $index }}][previous_image]">
                                            <input type="file" name="product[{{ $index }}][image]">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <button type="submit" class="btn btn-primary m-t-15 waves-effect mt-3 mb-3">SUBMIT</button>
        </form>
    </div>
</body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            // Calculate product amount and update total amount
            $('table#product-table').on('change', 'input', function() {
                var parentRow = $(this).closest('tr');
                var quantity = parseInt(parentRow.find('input[name$="[quantity]"]').val());
                var rate = parseFloat(parentRow.find('input[name$="[rate]"]').val());
                var amount = quantity * rate;
                parentRow.find('input[name$="[amount]"]').val(amount.toFixed(2));
                var totalAmount = 0;
                $('input[name^="product"][name$="[amount]"]').each(function() {
                    totalAmount += parseFloat($(this).val());
                });
                $('input[name="total_amount"]').val(totalAmount.toFixed(2));
            });
        });
    </script>

</html>
