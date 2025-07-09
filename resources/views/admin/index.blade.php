<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_green.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CR - Ticketing Home </title>
</head>
<body>

    @include('partials.sidebar')

    <div class="p-4 sm:ml-64">
    <div class="py-5 flex items-center space-x-8 px-16 mx-auto justify-between">
            
            
        <div class="max-w-md w-full bg-white border border-gray-300 rounded-xl shadow-xl pt-20 mt-20  p-6 md:p-6">
        
            <div class="flex justify-between mb-3">
                <div class="flex justify-center items-center">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">User Information</h5>
                    
                </div>

            </div>
        
            <!-- Donut Chart -->
            <div class="py-6" id="donut-chart"></div>
        
        </div>

            
        <div class="max-w-md w-full bg-white border border-gray-300 rounded-xl shadow-xl pt-20 mt-20  p-6 md:p-6">
                <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                <dl>
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Registered</dt>
                    <dd class="leading-none text-3xl font-bold text-gray-900 dark:text-white">KES {{$totalAmount}}</dd>
                </dl>
                <div>
                    <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                    </svg>
                    Profit rate 23.5%
                    </span>
                </div>
                </div>
            
                <div class="grid grid-cols-2 py-3">
                <dl>
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Paid</dt>
                    <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400">KES {{$paidAmount}}</dd>
                </dl>
                <dl>
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Pending</dt>
                    <dd class="leading-none text-xl font-bold text-red-600 dark:text-red-500">-KES {{$pendingAmount}}</dd>
                </dl>
                </div>
                <div class="grid grid-cols-2 py-3">
                <dl>
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Sponsoring</dt>
                    <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400">KES {{$sponsoringAmount}}</dd>
                </dl>
                </div>
                <div class="grid grid-cols-2 py-3">
                <dl>
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Total</dt>
                    <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400">KES {{$totalAmount}}</dd>
                </dl>
                </div>
            
        </div>

  
    </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const chartData = {
    series: [{{ $totalUsers }}, {{ $paidTickets }}, {{ $sponsors }}, {{ $pendingTickets }}],
    labels: ["Total Users", "Paid Tickets", "Sponsors", "Pending Payments"]
};

// Chart configuration
function getChartOptions() {
    return {
        series: chartData.series,
        colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
        chart: {
            height: 320,
            width: "100%",
            type: "donut",
        },
        stroke: {
            colors: ["transparent"],
            lineCap: "",
        },
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: true,
                        name: {
                            show: true,
                            fontFamily: "Inter, sans-serif",
                            offsetY: 20,
                        },
                        total: {
                            showAlways: true,
                            show: true,
                            label: "Total Registrations",
                            fontFamily: "Inter, sans-serif",
                            formatter: function (w) {
                                const sum = w.globals.seriesTotals.reduce((a, b) => {
                                    return a + b
                                }, 0);
                                return sum;
                            },
                        },
                        value: {
                            show: true,
                            fontFamily: "Inter, sans-serif",
                            offsetY: -20,
                            formatter: function (value) {
                                return value;
                            },
                        },
                    },
                    size: "80%",
                },
            },
        },
        grid: {
            padding: {
                top: -2,
            },
        },
        labels: chartData.labels,
        dataLabels: {
            enabled: false,
        },
        legend: {
            position: "bottom",
            fontFamily: "Inter, sans-serif",
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return value;
                },
            },
        },
        xaxis: {
            labels: {
                formatter: function (value) {
                    return value;
                },
            },
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
        },
    };
}

// Initialize the chart when the page loads
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
        chart.render();
        
        // Get all the checkboxes by their class name
        const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');

        // Function to handle the checkbox change event
        function handleCheckboxChange(event, chart) {
            const checkbox = event.target;
            if (checkbox.checked) {
                // These are example values - replace with your actual filtered data logic
                switch(checkbox.value) {
                    case 'today':
                        chart.updateSeries([
                            {{ $totalUsers/4 }}, 
                            {{ $paidTickets/4 }}, 
                            {{ $sponsors/4 }}, 
                            {{ $pendingTickets/4 }}
                        ]);
                        break;
                    case 'yesterday':
                        chart.updateSeries([
                            {{ $totalUsers/2 }}, 
                            {{ $paidTickets/2 }}, 
                            {{ $sponsors/2 }}, 
                            {{ $pendingTickets/2 }}
                        ]);
                        break;
                    case 'month':
                        chart.updateSeries(chartData.series); // Show full data
                        break;
                }
            } else {
                chart.updateSeries(chartData.series); // Reset to original data
            }
        }

        // Attach the event listener to each checkbox
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
        });
    }
});
</script>
{{-- <script src="{{asset('/js/index.js')}}"></script> --}}
</body>
</html>