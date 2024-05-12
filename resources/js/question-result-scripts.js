/* GRAPHS ITS NOT THERE ANYMORE */
document.addEventListener('DOMContentLoaded', function () {
    // Select all canvas elements with an id that includes 'pie-chart'
    const canvases = document.querySelectorAll('canvas[id^="pie-chart"]');

    canvases.forEach(function (canvas) {
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



    /* WORD CLOUD */

    var wordCloudElements = document.querySelectorAll('[id^=word-cloud]');

    wordCloudElements.forEach(function (wordCloudElement) {
        var responses = JSON.parse(wordCloudElement.dataset.wordCloud);
        var canvas = document.createElement('canvas');
        canvas.width = wordCloudElement.offsetWidth;
        canvas.height = wordCloudElement.offsetHeight; // Opraveno z parentHeight
        console.log(canvas.height);

        canvas.style.borderRadius = '10px'; // zaoblení rohů na 10px

        canvas.style.border = '1px solid rgb(75,85,99)';


        wordCloudElement.appendChild(canvas);

        var ctx = canvas.getContext('2d');
        ctx.fillStyle = 'rgb(55,65,81)'; // Například tmavě šedá barva
        // Vykreslení plněný obdélníku s touto barvou
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        var maxFontSize = 50;
        var minFontSize = 8;
        var textMargin = 5;
        var maxCount = Math.max.apply(Math, responses.map(function (response) { return response.count; }));

        function checkCollision(rect, rectangles) {
            for (var i = 0; i < rectangles.length; i++) {
                if (rect !== rectangles[i] &&
                    rect.x < rectangles[i].x + rectangles[i].width &&
                    rect.x + rect.width > rectangles[i].x &&
                    rect.y < rectangles[i].y + rectangles[i].height &&
                    rect.y + rect.height > rectangles[i].y) {
                    return true;
                }
            }
            return false;
        }

        var placedRectangles = [];

        responses.forEach(function (response) {
            var fontSize = Math.max((response.count / maxCount) * maxFontSize, minFontSize);
            ctx.font = fontSize + 'px Arial';
            //console.log(fontSize);

            // Generovanie náhodnej farby textu vo formáte hexadecimálneho kódu
            var randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
            ctx.fillStyle = randomColor; // Nastaviť farbu textu na náhodnú farbu

            var textWidth = ctx.measureText(response.value).width;
            var x, y;
            var collisionDetected = true;
            while (collisionDetected) {
                x = Math.random() * (canvas.width - textWidth);
                y = Math.random() * (canvas.height - fontSize - textMargin) + fontSize;
                var rect = { x: x, y: y - fontSize, width: textWidth, height: fontSize };
                collisionDetected = checkCollision(rect, placedRectangles);
            }

            ctx.fillText(response.value, x, y);
            placedRectangles.push({ x: x, y: y - fontSize, width: textWidth, height: fontSize });
        });
    });


    var toggleButtons = document.querySelectorAll('[id^=toggleButton-]');

    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var version = button.id.split('-')[1];
            var wordCloud = document.getElementById('word-cloud-' + version);
            var responseList = document.getElementById('response-list-' + version);
    
            if (!wordCloud.classList.contains('hidden')) {
                wordCloud.classList.add('hidden');
                responseList.classList.remove('hidden');
            } else {
                wordCloud.classList.remove('hidden');
                responseList.classList.add('hidden');
            }
        });
    });
    





    /*     PREKRYVAJU SA ALE NEPADAJU  */

    /*  document.addEventListener('DOMContentLoaded', function() {
            var wordCloudElements = document.querySelectorAll('[id^=word-cloud]');
    
            wordCloudElements.forEach(function(wordCloudElement) {
                var responses = JSON.parse(wordCloudElement.dataset.wordCloud);
                var canvas = document.createElement('canvas');
                canvas.width = wordCloudElement.offsetWidth; // Nastaviť šírku plátna na šírku nadradeného prvku
                canvas.height = 200;
                wordCloudElement.appendChild(canvas);
    
                var ctx = canvas.getContext('2d');
                var maxFontSize = 70;
                var minFontSize = 10;
                var textMargin = 5; // Miera okolo textu na zabránenie prekrytia
                var maxCount = Math.max.apply(Math, responses.map(function(response) { return response.count; }));
    
                responses.forEach(function(response) {
                    var fontSize = Math.max((response.count / maxCount) * maxFontSize, minFontSize);
                    ctx.font = fontSize + 'px Arial';
    
                    var randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
                    ctx.fillStyle = randomColor; // Nastaviť farbu textu na náhodnú farbu
    
                    var x = Math.random() * (canvas.width - ctx.measureText(response.value).width);
                    var y = Math.random() * (canvas.height - fontSize - textMargin) + fontSize;
    
                    ctx.fillText(response.value, x, y);
                });
            });
    
        }); */


});
