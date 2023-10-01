@include('pharmacy.menubar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="mx-4 mb-4 mt-28 md:ml-64">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-6 py-4 border-b">
                <span class="text-xl font-bold">Uploaded Prescriptions</span>
                <a href="{{ url('pharmacy/prescription-list') }}" class="float-right px-4 py-1 text-white bg-blue-500 rounded hover:bg-blue-600">Back</a>
            </div>

            <div class="px-6 py-4">
                <div class="flex flex-col md:flex-row">
                    <div class="p-4 border md:mr-4">
                        <table class="mx-auto">
                            <tr>
                                <td colspan="5" class="text-center">
                                    <a href="{{ asset($user_drugs->image1) }}" target="_blank">
                                        <img src="{{ asset($user_drugs->image1) }}" alt="" width="250" height="250" class="border rounded">
                                    </a>
                                </td>
                            </tr>
                            @if ($user_drugs->image2 || $user_drugs->image3)
                            <tr>
                                <td class="py-4">
                                    @if ($user_drugs->image2)
                                    <a href="{{ asset($user_drugs->image2) }}" target="_blank">
                                        <img src="{{ asset($user_drugs->image2) }}" alt="" width="120" height="110" class="border rounded">
                                    </a>
                                    @endif
                                </td>
                                <td class="py-4">
                                    @if ($user_drugs->image3)
                                    <a href="{{ asset($user_drugs->image3) }}" target="_blank">
                                        <img src="{{ asset($user_drugs->image3) }}" alt="" width="120" height="110" class="border rounded">
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </table>
                    </div>

                    <div class="md:w-3/4">
                        <table class="w-full border border-collapse border-gray-300 table-auto">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2">Drugs</th>
                                    <th class="px-4 py-2">Description</th>
                                    <th class="px-4 py-2">Quantity</th>
                                    <th class="px-4 py-2">Amount</th>
                                </tr>
                            </thead>
                            <tbody id="quotationTableBody">
                                <!-- Data will be dynamically added here using JavaScript -->
                            </tbody>
                        </table>

                        <div class="mt-6 text-right">
                            <strong>Total Amount:</strong> <span id="totalAmount">0.00</span>
                        </div>

                        <form action="{{ url('pharmacy/quotation-add') }}" method="POST" id="quotationForm">
                            @csrf
                            <div class="flex flex-col mt-12 md:flex-row">
                                <div class="mr-6 md:w-1/3">
                                    <label for="drug_name" class="font-bold text-green-800">Drug</label>
                                    <div class="relative">
                                        <select class="mt-2 form-control drug_name @error('drug_name') is-invalid @enderror rounded-full border border-gray-300 py-2 pl-4 pr-10 block w-full appearance-none leading-5 focus:outline-none focus:ring focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="drug_name">
                                            <option value="" selected disabled>- Select Drugs Name -</option>
                                            @foreach ($drug as $row)
                                            <option value="{{ $row->id }}" price="{{ $row->price }}" quantity="{{$row->quantity}}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>

                                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8l4 4m0 0l4-4m-4 4V4"></path>
                                            </svg>
                                        </div>
                                        @error('drug_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-sm text-red-500">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mr-4 md:w-1/3">
                                    <label for="quanity" class="font-bold text-green-800 ">Quantity</label>
                                    <input type="number" class=" mt-2 form-control @error('quanity') is-invalid @enderror rounded-full border border-gray-300 py-2 pl-4 pr-10 block w-full appearance-none leading-5 focus:outline-none focus:ring focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" id="quanity" placeholder="Quantity" name="quanity">
                                    @error('quanity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-sm text-red-500">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                                <div class="mt-6 ">
                                    <label for="description" class="font-bold text-green-800 ">Description</label>
                                    <textarea class="block w-full px-4 py-2 mt-2 leading-5 transition duration-150 ease-in-out border border-gray-300 rounded-lg form-control focus:outline-none focus:ring focus:border-blue-300 sm:text-sm sm:leading-5" id="description" name="description" placeholder="Enter Description"></textarea>
                                </div>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-sm text-red-500">{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="mt-4 md:mt-6">
                                    <button id="addButton" class="px-4 py-2 font-bold text-white bg-green-500 rounded-md " type="button">Add</button>
                                    <button class="px-4 py-2 ml-2 font-bold text-white bg-orange-500 rounded-md">Send Quotation</button>
                                </div>
                            </div>

                            <input type="hidden" name="quotations" id="quotationsJson">
                            <input type="hidden" id="drug_name_hidden" name="drug_name" value="">
                            <input type="hidden" name="drug_price" id="drug_price" class="form-control drug_price @error('drug_price') is-invalid @enderror">
                            <input type="hidden" name="amount" id="amount">

                            <input type="number" class="form-control @error('prescription_id') is-invalid @enderror" value="{{ $user_drugs->id }}" name="prescription_id" id="prescription_id" hidden>
                            <input type="number" class="form-control @error('user_id') is-invalid @enderror" value="{{ $user_drugs->user->id }}" name="user_id" id="user_id" hidden>
                            <input type="text" value="1" name="order" hidden>
                            <input type="text" value="{{ $user_drugs->id }}" name="id" hidden>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



        <!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- <script>
    $(document).ready(function () {

        var drugPrice = 0; // Initialize drugPrice here

        $(document).on('change', '.drug_name', function () {
            var get_id = $(this).val();
            drugPrice = parseFloat($(this).find(':selected').attr('price')); // Assign the value to drugPrice
            $('#drug_price').val(drugPrice);

            availableQUantity = parseFloat($(this).find(':selected').attr('quantity'));
            console.log(drugPrice);

            if (!isNaN(drugPrice)) {
                $('#price').text(drugPrice.toFixed(2)); // Display the drug price
            } else {
                $('#price').text('0.00'); // Set a default value if price is NaN
            }
        });

        // Function to add a new row to the table
        function addTableRow() {

            var drugName = $('.drug_name option:selected').text();
            var quantity = $('#quanity').val();
            var description = $('#description').val()
            // console.log("new quantity: " + availableQUantity);

            // Check if quantity is valid
            if (isNaN(quantity) || quantity <= 0 || quantity >= availableQUantity) {
                alert('Please enter a valid quantity.');
                return;
            }

            if (description.trim() === '') {
        alert('Please enter a description.');
        return;
    }
            var totalAmount = (quantity * drugPrice).toFixed(2); // Use drugPrice from the outer scope
            $('#amount').val(totalAmount);
            var newRow = '<tr>' +
                '<td class="px-4 py-2">' + drugName + '</td>' +
                '<td class="px-4 py-2">' + description + '</td>' +
                '<td class="px-4 py-2 text-right">' + quantity + '</td>' +
                '<td class="px-4 py-2 text-right">' + totalAmount + '</td>' +
                '</tr>';

            $('#quotationTableBody').append(newRow);

            // Recalculate and update the total amount
            updateTotalAmount();
        }

        // Add a click event handler for the "Add" button
        $('#addButton').click(function (e) {
            e.preventDefault();
            addTableRow(); // Call the function to add a new row

            ('#quotationForm').submit();
        });

        // Calculate and display the total amount
        function updateTotalAmount() {
            var totalAmount = 0;
            $('#quotationTableBody tr').each(function () {
                var amount = parseFloat($(this).find('td:eq(3)').text());
                if (!isNaN(amount)) {
                    totalAmount += amount;
                }
            });
            $('#totalAmount').text(totalAmount.toFixed(2));
        }

        // Calculate and display the initial total amount when the page loads
        updateTotalAmount();

        // Calculate and display the total amount when the "Calculate Total" button is clicked
        $('#calculateTotalButton').click(function () {
            updateTotalAmount();
        });
    });
</script> --}}

<script>
    $(document).ready(function () {

        var drugPrice = 0; // Initialize drugPrice here
        var quotations = []; // Array to store quotations

        $(document).on('change', '.drug_name', function () {
            var get_id = $(this).val();
            drugPrice = parseFloat($(this).find(':selected').attr('price')); // Assign the value to drugPrice
            $('#drug_price').val(drugPrice);

            availableQUantity = parseFloat($(this).find(':selected').attr('quantity'));

            if (!isNaN(drugPrice)) {
                $('#price').text(drugPrice.toFixed(2)); // Display the drug price
            } else {
                $('#price').text('0.00'); // Set a default value if price is NaN
            }
        });

        // Function to add a new row to the table
        function addTableRow() {
            var drugName = $('.drug_name option:selected').attr('value');
            var quantity = $('#quanity').val();
            var description = $('#description').val();
            var prescription_id = $('#prescription_id').attr('value');
            var user_id = $('#user_id').attr('value');

            // Check if quantity is valid
            if (isNaN(quantity) || quantity <= 0 || quantity > availableQUantity) {
                alert('Please enter a valid quantity.');
                return;
            }

            if (description.trim() === '') {
                alert('Please enter a description.');
                return;
            }

            var totalAmount = (quantity * drugPrice).toFixed(2); // Use drugPrice from the outer scope
            $('#amount').val(totalAmount);
            var newRow = '<tr>' +
                '<td class="px-4 py-2">' + drugName + '</td>' +
                '<td class="px-4 py-2">' + description + '</td>' +
                '<td class="px-4 py-2 text-right">' + quantity + '</td>' +
                '<td class="px-4 py-2 text-right">' + totalAmount + '</td>' +
                // '<td class="px-4 py-2 text-right">' + drugPrice.toFixed(2) + '</td>' + // Display drugPrice here
                '</tr>';

            $('#quotationTableBody').append(newRow);

            // Add the quotation to the array
            var quotation = {
                drugName: drugName,
                description: description,
                quantity: quantity,
                totalAmount: totalAmount,
                drugPrice: drugPrice, // Include drugPrice in the quotation
                order_id: prescription_id,
                user_id: user_id,
            };
            quotations.push(quotation);

            // Recalculate and update the total amount
            updateTotalAmount();
        }

        // Add a click event handler for the "Add" button
        $('#addButton').click(function (e) {
            e.preventDefault();
            addTableRow(); // Call the function to add a new row

            // Clear input fields after adding the quotation
            $('#quanity').val('');
            $('#description').val('');

            // Update the JSON input field with the quotations array
            $('#quotationsJson').val(JSON.stringify(quotations));
        });

        // Calculate and display the total amount
        function updateTotalAmount() {
            var totalAmount = 0;
            $('#quotationTableBody tr').each(function () {
                var amount = parseFloat($(this).find('td:eq(3)').text());
                if (!isNaN(amount)) {
                    totalAmount += amount;
                }
            });
            $('#totalAmount').text(totalAmount.toFixed(2));
        }

        // Calculate and display the initial total amount when the page loads
        updateTotalAmount();

        // Calculate and display the total amount when the "Calculate Total" button is clicked
        $('#calculateTotalButton').click(function () {
            updateTotalAmount();
        });
    });
</script>


