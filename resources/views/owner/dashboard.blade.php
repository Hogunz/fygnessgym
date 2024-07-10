<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 pt-20">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black-5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold">{{ $pendingUsersCount }}</div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Pending Members</div>
                </div>
            </div>

            <a href="{{ route('customers.index') }}"
                class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
        </div>

        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black-5">
            <div class="flex justify-between mb-4">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold">{{ $subscribedUsersCount }}</div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Subscribed Users</div>
                </div>
            </div>
            <a href="{{ route('customers.index') }}"
                class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
        </div>

        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black-5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="text-2xl font-semibold mb-1">{{ $announcementCount }}</div>
                    <div class="text-sm font-medium text-gray-400">Number of Announcements Created</div>
                </div>
            </div>
            <a href="{{ route('announcements.index') }}"
                class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
        </div>
    </div>

    <div class="flex mb-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black-5">
            <label for="chartType">Select Chart Type:</label>
            <select id="chartType" class="ml-2 px-3 py-1 border rounded-md">
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
                <option value="daily">Daily</option>
            </select>
        </div>
    </div>

    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black-5">
        <canvas id="myChart" style="background-color: white;"></canvas>
    </div>

</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myChart').getContext('2d');

        // Example initial data for the chart (replace with actual fetched data)
        const initialLabels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        const initialData = [{{ $subscribedUsersCount }}]; // Ensure this matches your expected data structure

        // Create the initial chart
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: initialLabels,
                datasets: [{
                    label: 'Subscribed Users',
                    data: initialData,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Function to update chart based on selected option
        document.getElementById('chartType').addEventListener('change', function() {
            const selectedType = this.value;

            // Example logic to update chart based on selected option
            switch (selectedType) {
                case 'monthly':
                    fetchMonthlyData().then(data => {
                        myChart.data.labels = data.labels;
                        myChart.data.datasets[0].data = data.values;
                        myChart.update();
                    });
                    break;
                case 'yearly':
                    fetchYearlyData().then(data => {
                        myChart.data.labels = data.labels;
                        myChart.data.datasets[0].data = data.values;
                        myChart.update();
                    });
                    break;
                case 'daily':
                    fetchDailyData().then(data => {
                        myChart.data.labels = data.labels;
                        myChart.data.datasets[0].data = data.values;
                        myChart.update();
                    });
                    break;
                default:
                    break;
            }
        });

        // Functions to fetch actual data
        function fetchMonthlyData() {
            return fetch('{{ route('chart.monthly') }}')
                .then(response => response.json())
                .then(data => {
                    return {
                        labels: data.labels,
                        values: data.values
                    };
                });
        }

        function fetchYearlyData() {
            return fetch('{{ route('chart.yearly') }}')
                .then(response => response.json())
                .then(data => {
                    return {
                        labels: data.labels,
                        values: data.values
                    };
                });
        }

        function fetchDailyData() {
            return fetch('{{ route('chart.daily') }}')
                .then(response => response.json())
                .then(data => {
                    return {
                        labels: data.labels,
                        values: data.values
                    };
                });
        }
    });
</script>
