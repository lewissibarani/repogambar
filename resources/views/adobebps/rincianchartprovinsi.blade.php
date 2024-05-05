<div  style="margin: auto; position: relative; height: 50vh; "> 
            <canvas id="barChartProvinsi"></canvas>
 </div>

<script>
    var ctx = document.getElementById('barChartProvinsi').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($dataprovinsi['labels']),
            datasets: [{
                label: '',
                data: @json($dataprovinsi['data']), 
                backgroundColor: @json($data['backgroundColor']) , 
                borderWidth: 0
            }]
        },
        options: { 
            plugins:{
                legend:{
                    display: false
                }
            },
            scales: {
                x: {
                    grid: {
                    display: false
                    },
                    ticks: {
                        font: {
                            size: 9,
                        }
                    },
                },
                y: {
                    ticks: {
                        font: {
                            size: 9,
                        }
                    },
                    grid: {
                    display: false
                    }
                }, 
            },  
            elements: {
                bar: {
                    borderWidth: 2,
                }
            },
            responsive: true,
            maintainAspectRatio: false, 
        },
    })
</script>