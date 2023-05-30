<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  <meta name="viewport" content="width=device-width, initial-scale=1.0">  --}}
    <title>View Invoice</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<body>
    <div class="container-md">
        <div class="card  mt-4 mb-4">
            <div class="card-header text-center">
                <h3>Advance Invoice Crud Task</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Add Invoice</h5>
                <div id="myForm">
                    <form action="{{ url('invoices_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="invoice_number" class="form-label">Invoice Number:</label>
                                    <input type="text" name="invoice_number" id="invoice_number" value="0"
                                        class="form-control" readonly>
                                </div>
                            </div>
                            <h4>Billing Address</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="billing_address[address]" class="form-label">Address:</label>
                                    <input type="text" name="billing_address[address]" id="billing_address_address"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="billing_address[city]" class="form-label">City:</label>
                                    <input type="text" name="billing_address[city]" id="billing_address_city"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="billing_address[state]" class="form-label">State:</label>
                                    <input type="text" name="billing_address[state]" id="billing_address_state"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="billing_address[phone_number]" class="form-label">Phone Number:</label>
                                <input type="tel" name="billing_address[phone_number]"
                                    id="billing_address_phone_number" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h4>Shipping Address</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="shipping_address[address]" class="form-label">Address:</label>
                                    <input type="text" name="shipping_address[address]" id="shipping_address_address"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="shipping_address[city]" class="form-label">City:</label>
                                    <input type="text" name="shipping_address[city]" id="shipping_address_city"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="shipping_address[state]" class="form-label">State:</label>
                                    <input type="text" name="shipping_address[state]" id="shipping_address_state"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="shipping_address[phone_number]" class="form-label">Phone Number:</label>
                                <input type="tel" name="shipping_address[phone_number]"
                                    id="shipping_address_phone_number" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h4>Product Info</h4>

                            <table id="product-table" class="table table-bordered product-table">
                                <thead>
                                  <tr id="product-table3" class="product-table3">
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                    <th>Rate</th>
                                    <th>Amount</th>
                                    <th>New Image</th>
                                    <th>Action</th> <!-- Add new column for actions -->
                                  </tr>
                                </thead>

                                <tbody>
                                  <tr id="product-table2" class="product-table2">
                                    <td><input type="text" name="product[${productCount}][product_id]" id="product_${productCount}_product_id" class="form-control" required></td>
                                    <td><input type="text" name="product[${productCount}][product_name]" id="product_${productCount}_product_name" class="form-control" required></td>
                                    <td><input type="number" name="product[${productCount}][quantity]" id="product_${productCount}_quantity" min="1" value="1" class="form-control quantity" required></td>
                                    <td><input type="number" name="product[${productCount}][rate]" id="product_${productCount}_rate" min="0" step="0.01" class="form-control rate" required></td>
                                    <td><input type="number" name="product[${productCount}][amount]" id="product_${productCount}_amount" min="0" step="0.01" readonly class="form-control"></td>
                                    <td><input type="file" name="product[${productCount}][image]" id="product_${productCount}_image" class="form-control"></td>
                                    <td><button type="button" class="btn btn-danger btn-remove-product">Remove</button></td>
                                    <!-- Add remove button -->
                                  </tr>
                                </tbody>
                              </table>

                            <button type="button" id="add-product1" class="btn btn-primary add-product">Add Product</button>
                        </div>

                        <div class="mb-3">
                            <label for="total_amount" class="form-label">Total Amount:</label>
                            <input type="number" name="total_amount" id="total_amount" min="0"
                                step="0.01" readonly class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>



    </div>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="bg-dark text-light">Invoice Number</th>
                        <th class="bg-dark text-light">Billing Address</th>
                        <th class="bg-dark text-light">Shipping Address</th>
                        <th class="bg-dark text-light">Total Amount</th>
                        <th class="bg-dark text-light">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->billing_address }}</td>
                            <td>{{ $invoice->shipping_address }}</td>
                            <td>{{ $invoice->total_amount }}</td>
                            <td>
                                <a href="#" id="edit-{{ $invoice->id }}" class="btn btn-primary edit">Edit</a>
                                {{--  <a href="{{ route('invoice.edit', ['id' => $invoice->id]) }}"
                                    class="btn btn-primary btn-sm">Edit</a>  --}}
                                <form id="delete-form" action="{{ route('invoice.delete', ['id' => $invoice->id]) }}"
                                    method="POST" style="display: inline-block;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    {{--  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this invoice?')">Delete</button>
                                            --}}
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirmDelete()">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <script>
        $(document).ready(function() {
            let productCount = 0;

             // Calculate the amount for the first product
            calculateAmount($('input[name="product[1][quantity]"]'), $('input[name="product[1][rate]"]'), $('input[name="product[1][amount]"]'));

           // Add event listeners to all the quantity and rate input fields
            $('input[name^="product["][name$="[quantity]"], input[name^="product["][name$="[rate]"]').each(function() {
                $(this).on('input', function() {
                const $row = $(this).closest('tr');
                const $qty = $row.find('input[name$="[quantity]"]');
                const $rate = $row.find('input[name$="[rate]"]');
                const $amount = $row.find('input[name$="[amount]"]');

                calculateAmount($qty, $rate, $amount);
                calculateTotalAmount();
                });
            });

            // Add event listener for remove button
            $('.product-table').on('click', '.btn-remove-product', function() {
                $(this).closest('tr').remove();
                var id = $(this).closest('tr').find('[name$="[product_id]"]').val();


                if (id != null) {
                    if (confirm("Are you sure you want to remove")) {
                        $.ajax({
                            url: '/products/' + id,
                            type: 'DELETE',
                            success: function(response) {
                                if (response.success) {
                                    console.log('Product deleted successfully');
                                } else {
                                    console.log('Product not found or failed to delete');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                    calculateTotalAmount(); // Recalculate total amount after removing a product
                } else {
                    calculateTotalAmount();
                }
            });

            // Add event listener for add product button outside of $(document).ready()
        $('#add-product1').click(function() {
            productCount++;

            const newRow = `
            <tr>
                <td><input type="text" name="product[${productCount}][product_id]" id="product_${productCount}_product_id" class="form-control" required></td>
                <td><input type="text" name="product[${productCount}][product_name]" id="product_${productCount}_product_name" class="form-control" required></td>
                <td><input type="number" name="product[${productCount}][quantity]" id="product_${productCount}_quantity" min="1" value="1" class="form-control quantity" required></td>
                <td><input type="number" name="product[${productCount}][rate]" id="product_${productCount}_rate" min="0" step="0.01" class="form-control rate" required></td>
                <td><input type="number" name="product[${productCount}][amount]" id="product_${productCount}_amount" min="0" step="0.01" readonly class="form-control amount"></td>
                <td><input type="file" name="product[${productCount}][image]" id="product_${productCount}_image" class="form-control"></td>
                <td><button type="button" class="btn btn-danger btn-remove-product">Remove</button></td> <!-- Add remove button -->
            </tr>
            `;

            $('#product-table ').append(newRow);

            // Add event listeners to the new quantity and rate input fields
            const $newQty = $(`input[name="product[${productCount}][quantity]"]`);
            const $newRate = $(`input[name="product[${productCount}][rate]"]`);
            const $newAmount = $(`input[name="product[${productCount}][amount]"]`);

            $newQty.add($newRate).on('input', function() {
            calculateAmount($newQty, $newRate, $newAmount);
            calculateTotalAmount();
            });

            attachRemoveProductListeners(); // Re-attach 'Remove' button event listener to all rows
        });

            // Helper function to calculate the amount for a product row
        function calculateAmount($qtyInput, $rateInput, $amountInput) {
            const qty = parseInt($qtyInput.val());
            const rate = parseFloat($rateInput.val());

            if (isNaN(qty) || isNaN(rate)) {
            $amountInput.val('');
            } else {
            const amount = qty * rate;
            $amountInput.val(amount.toFixed(2));
            }
        }

           // Helper function to calculate the total amount for all the products
        function calculateTotalAmount() {
            let totalAmount = 0;

            $('input[name^="product["][name$="[amount]"]').each(function() {
            const amount = parseFloat($(this).val());
            if (!isNaN(amount)) {
                totalAmount += amount;
            }
            });

            $('input[name="total_amount"]').val(totalAmount.toFixed(2));
        }

         // Helper function to attach 'Remove' button event listener to all rows
        function attachRemoveProductListeners() {
            $('.btn-remove-product').off('click'); // Remove any existing event listeners to prevent duplicate calls
            $('.btn-remove-product').on('click', function() {
            $(this).closest('tr').remove();
            calculateTotalAmount(); // Recalculate total amount after removing a product
        });
        }

        // Attach 'Remove' button event listener to all existing rows on page load
        attachRemoveProductListeners();
        });

            //Edit using Ajax function
            let submitBtn = document.getElementById('submitBtn2');



            // method 3
            $('.edit').click(function() {
                var invoiceId = $(this).attr('id').split('-')[1];
                var productCount = 0; // Define the product count variable

                // Set the CSRF token in the AJAX request headers
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

               // $("#myForm").load(location.href + " #myForm>*", "");
                $.ajax({
                    url: '{{ url('/invoices') }}/' + invoiceId + '/edit',
                    type: 'GET',
                    success: function(response) {

                        $('#invoice_number').val(response.invoice_number);
                        $('#billing_address_address').val(response.billing_address.address);
                        $('#billing_address_city').val(response.billing_address.city);
                        $('#billing_address_state').val(response.billing_address.state);
                        $('#billing_address_phone_number').val(response.billing_address
                            .phone_number);
                        $('#shipping_address_address').val(response.shipping_address.address);
                        $('#shipping_address_city').val(response.shipping_address.city);
                        $('#shipping_address_state').val(response.shipping_address.state);
                        $('#shipping_address_phone_number').val(response.shipping_address
                            .phone_number);

                        // Loop through each product and set their values
                        $.each(response.products, function(index, product) {
                            if (product.product_id !== null && product.product_name !==
                                null && product.quantity !== null && product.rate !==
                                null && product.amount !== null) {

                                productCount++; // Increment the product count

                                const newRow = `
                                <tr>
                                    <td><input type="text" name="product[${productCount}][product_id]" id="product_${productCount}_product_id" class="form-control" value="${product.id}" required></td>
                                    <td><input type="text" name="product[${productCount}][product_name]" id="product_${productCount}_product_name" class="form-control" value="${product.product_name}" required></td>
                                    <td><input type="number" name="product[${productCount}][quantity]" id="product_${productCount}_quantity" min="1" value="${product.quantity}" class="form-control quantity" required></td>
                                    <td><input type="number" name="product[${productCount}][rate]" id="product_${productCount}_rate" min="0" step="0.01" value="${product.rate}" class="form-control rate" required></td>
                                    <td><input type="number" name="product[${productCount}][amount]" id="product_${productCount}_amount" min="0" step="0.01" readonly class="form-control amount" value="${product.amount}"></td>
                                    <td><input type="file" name="product[${productCount}][image]" id="product_${productCount}_image" class="form-control"><img src="/images/${product.image}" alt="Product Image" width="50" height="60"/></td>
                                    <td><button type="button" class="btn btn-danger btn-remove-product">Remove</button></td>
                                </tr>
                            `;

                                $('#product-table2').closest('tr')
                            .remove(); // Remove the existing row before appending the new one
                                $('#product-table').append(
                                newRow); // Append the new row to the table

                                if (index === 0) { // For the first product, set the values of existing input fields
                                    $('#product_1_product_id').val(product.id);
                                    $('#product_1_product_name').val(product
                                        .product_name);
                                    $('#product_1_quantity').val(product.quantity);
                                    $('#product_1_rate').val(product.rate);
                                    $('#product_1_amount').val(product.amount);

                                    const imageHtml =
                                        `<img src="/images/${product.image}" alt="Product Image" width="50" height="60">`;

                                    {{--  $('#product-table3 th:last-of-type').prev().after(
                                        `<th>Previous Image</th>`);
                                    $('#product-table2 td:last-of-type').prev().after(
                                        `<td>${imageHtml}</td>`); --}}
                                }
                            }
                        });

                        // Set the total amount
                        $('#total_amount').val(response.total_amount);
                    }

                });
            });


        function confirmDelete() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // The user clicked the "Yes, delete it!" button
                    document.getElementById('delete-form').submit();
                }
            });

            // Return false to prevent the form from submitting
            return false;
        }
    </script>


</html>
