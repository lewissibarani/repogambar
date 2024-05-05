<div class="row " style="padding-top:20px;">  
    <div class="col-12 col-sm-6 col-lg-6 card-body" style="padding-bottom:0px;">
        <h2 class="small-title">Kuesioner</h2>
    </div>
    <div class="col-12 col-sm-6 col-lg-6 card-body" style="padding-bottom:0px;">
        <h2 class="small-title">BAST</h2>
    </div>
</div>

<div class="row ">    
    <div class="col-12 col-sm-6 col-lg-6 card-body">  
        <div class="row">
            <div class="h-100 row g-0 card-body align-items-center" style="padding:10px;">   
                <div  style="" >
                    <canvas id="piechart1"></canvas>
                </div> 
                <script>
                    var ctx = document.getElementById('piechart1').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: @json($piechart2['labels']),
                            datasets: [{
                                data: @json($piechart2['data']),
                                backgroundColor: [
                                    "#1ddba9","#4a3dff",
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                ],
                                borderWidth: 0,
                                cutout: '70%',
                            }],
                        }, 
                        options: {
                            plugins: {
                                legend: {
                                display: false
                                }
                            }
                        }
                    })
                </script> 
            </div>  
        </div>
        <div class="row">
            <div class="">
                Sudah Isi: 
            </div>
            <div class="">
                Belum Isi:  
            </div> 
        </div> 
    </div>
    
    <div class="col-12 col-sm-6 col-lg-6">  
        <div class="row">
            <div class="h-100 row g-0 card-body align-items-center" style="padding:10px;">   
                <div  style=" " >
                    <canvas id="piechart2"></canvas>
                </div>

                <script>
                    var ctx = document.getElementById('piechart2').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: @json($piechart2['labels']),
                            datasets: [{
                                data: @json($piechart2['data']),
                                backgroundColor: [
                                    "#1ddba9","#4a3dff",
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                ],
                                borderWidth: 0,
                                cutout: '70%',
                            }],
                        }, 
                        options: {
                            plugins: {
                                legend: {
                                display: false
                                }
                            }
                        }
                    })
                </script>
            
            </div>  
        </div>
        <div class="row">
            <div class="">
                Sudah Kirim: 
            </div> 
            <div class="">
                Belum Kirim: 
            </div> 
        </div> 
    </div>   
</div> 