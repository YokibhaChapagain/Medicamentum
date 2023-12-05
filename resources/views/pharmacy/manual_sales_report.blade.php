@include('pharmacy.menubar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="bg-gray-100">

<div class="mx-4 mb-4 mt-28 md:ml-64">
    <canvas id="manualMedicineChart" width="60" height="20"></canvas>

    <div class="container p-2 mx-auto">
        <h1 class="mb-4 text-2xl font-semibold text-teal-700">Manual Sales Report</h1>
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b border-gray-200">Date</th>
                        <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b border-gray-200">User</th>
                        <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b border-gray-200">Medicine</th>

                        <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b border-gray-200">Quantity</th>
                        <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b border-gray-200">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($manualSalesReport as $sales)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $sales->created_date }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $sales->user_name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $sales->medicine_name }}</td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $sales->quantity }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Rs {{ $sales->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('manualMedicineChart').getContext('2d');

        // Sample data (replace this with your actual data)
        var data = {
            labels: [@foreach ($manualSalesReport as $sales) "{{ $sales->medicine_name }}", @endforeach],
            datasets: [{
                label: 'Quantity',
                data: [@foreach ($manualSalesReport as $sales) {{ $sales->quantity }}, @endforeach],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += context.parsed.y;
                            var user = @json($manualSalesReport->pluck('user_name'));
                            label += ' (' + user[context.dataIndex] + ')';
                            return label;
                        }
                    }
                }
            }
        };

        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    });
</script>


</body>
</html>
