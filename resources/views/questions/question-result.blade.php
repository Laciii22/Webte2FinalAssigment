@vite(['resources/css/app.css', 'resources/js/app.js'])

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="min-h-screen bg-gradient-to-br from-teal-100 to-teal-300">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col md:flex-row gap-4 text-center">
            <div class="pt-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg md:w-1/2">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold">Code: {{ $question->code }}</h2>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Title: {{ $question->title }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Body: {{ $question->body }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Active: {{ $question->active }}
                </div>
            </div>

            @if($question->category != 'text')
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg md:w-1/2">
                <div class="p-6 text-white flex justify-center">
                    <canvas id="pie-chart" style="max-width: 300px; max-height: 300px;" data-labels="{!! htmlspecialchars(json_encode($responses->pluck('selected_value')), ENT_QUOTES, 'UTF-8') !!}" data-data="{!! htmlspecialchars(json_encode($responses->pluck('count')), ENT_QUOTES, 'UTF-8') !!}">
                    </canvas>
                </div>
            </div>
            @else
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg md:w-1/2">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold">Responses:</h2>
                    @foreach($responses as $response)
                    <div>{{ $response->selected_value }}</div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


<script>
    // Retrieve data from canvas attributes
    const canvas = document.getElementById('pie-chart');
    const labels = JSON.parse(canvas.getAttribute('data-labels'));
    const data = JSON.parse(canvas.getAttribute('data-data'));

    // Draw pie chart
    const ctx = canvas.getContext('2d');
    const pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: '# of Votes',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(255, 99, 132, 0.9)',
                    'rgba(54, 162, 235, 0.9)',
                    'rgba(255, 206, 86, 0.9)',
                    'rgba(75, 192, 192, 0.9)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Pie Chart of Responses'
                }
            }
        }
    });
</script>