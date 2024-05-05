<div style="width: 80%; margin: auto;">
        <canvas id="radarChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('radarChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: @json($dataradar['labels']),
                datasets: [{
                    label: 'Data',
                    data: @json($dataradar['data']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    r: {
                        suggestedMin: 0,
                        suggestedMax: 50
                    }
                },
                responsive: true,
                maintainAspectRatio: false, 
            }
        });
    </script>