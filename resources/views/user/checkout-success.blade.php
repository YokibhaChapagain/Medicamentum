@include('user.menubar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<body>

    <div class="mt-20 mr-4 md:ml-64">
        <div class="flex flex-col items-center mt-32 ml-16">
            <img src="{{ URL('images/payment.png') }}" class="w-40 h-40 mb-4">
            <h2 class="text-2xl font-semibold text-teal-700">Your Order is Confirmed!</h2>
            <p class="mb-8 text-gray-500">Proceed to payment to recieve your order</p>
            <form action="/user/orderpayment" method="POST">
                @csrf
                <button type="submit" class="px-6 py-3 text-white transition duration-300 bg-teal-500 rounded-md hover:bg-teal-600">Payment</button></form>
        </div>
    </div>
</body>
</html>
