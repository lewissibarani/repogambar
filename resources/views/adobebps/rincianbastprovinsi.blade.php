<div  style="margin: auto; position: relative; height: 50vh; " >
            <canvas id="rincianbastprovinsi"></canvas>
 </div>

 <script>
                    var ctx = document.getElementById('rincianbastprovinsi').getContext('2d');
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
                                    ticks: {
                                        font: {
                                            size: 9,
                                        }
                                    },
                                    grid: {
                                    display: false
                                    }
                                },
                                y: { 
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
                    });
                </script>