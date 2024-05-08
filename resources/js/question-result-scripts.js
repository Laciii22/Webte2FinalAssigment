document.addEventListener('DOMContentLoaded', function () {
    // Select all canvas elements with an id that includes 'pie-chart'
    const canvases = document.querySelectorAll('canvas[id^="pie-chart"]');

    canvases.forEach(function(canvas) {
        const labels = JSON.parse(canvas.getAttribute('data-labels'));
        const data = JSON.parse(canvas.getAttribute('data-data'));

        // Create a pie chart for each canvas
        const ctx = canvas.getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: '# of Votes',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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
                        text: 'Pie Chart of Responses for Version ' + canvas.getAttribute('data-version')
                    }
                }
            }
        });
    });
});
