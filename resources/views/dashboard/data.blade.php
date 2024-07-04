<!-- @if(App::environment() == 'production') 
@php
$ENDPOINT = "https://webapps.bps.go.id/pikart/Dashboard";  
@endphp

@endif  -->
@foreach ($Data as $datas) 
<div class="col"> 
    <div class="card hover-img-scale-up hover-reveal">
            @if ($datas->kategori_file==6)
            <div class="card-img sh-50 scale">
                <div class="" style="position: absolute; left: 10px; top: 10px; z-index: 100;">
                    <span class="badge bg-primary fw-bold">VIDEO</span>
                </div>

                <div class="col" style="position: absolute; left: 30px; bottom: 30px; z-index: 99;">
                    <a href="{{route('dashboard.detailvideo',['video_id'=>$datas->id])}}" class="stretched-link">
                        <h5 class="heading text-white mb-1">{{$datas->judul}}</h5>
                    </a>
                    <div class="d-inline-block">
                        <div class="text-uppercase"><span class='badge rounded-pill bg-light'>{{$datas->tipe_gambar}}</span></div>
                    </div>
                    @php
                    if($datas->file_id!==null)
                        {
                        @endphp
                        <div class="d-inline-block">
                            <div class="text-uppercase"><span class='badge rounded-pill bg-light'>ZIP</span></div>
                        </div>
                        @php
                            $file = "zip";
                        }
                    @endphp
                    <div class="d-inline-block">
                        <div class="text-uppercase"><span class='badge rounded-pill bg-light'>{{$datas->source->sumber_gambar}}</span></div>
                    </div>
                    
                </div>

                <video style="  position: relative; left: 50%;  transform: translateX(-50%);" 
                id="container-preview-video-before-upload" 
                onmouseover="this.play()" onmouseout="this.pause();this.currentTime=0;" 
                muted>
                    <source src="{{$datas->path}}" id="preview-video-before-upload" type="video/{{$datas->tipe_gambar}}"></source >
                </video>
            </div>
            
               
            @else
            <img class="card-img sh-50 scale"  
                src="{{$datas->thumbnail_path}}" 
                alt="card image" />
                <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                    <div class="row g-0">
                    </div>
                    <div class="row g-0">
                        <div class="col pe-2">
                            <a href="{{route('dashboard.detailgambar',['gambar_id'=>$datas->id])}}" class="stretched-link">
                                <h5 class="heading text-white mb-1">{{$datas->judul}}</h5>
                            </a>
                            <div class="d-inline-block">
                                <div class="text-uppercase"><span class='badge rounded-pill bg-light'>{{$datas->tipe_gambar}}</span></div>
                            </div>
                            @php
                            if($datas->file_id!==null)
                                {
                                @endphp
                                <div class="d-inline-block">
                                    <div class="text-uppercase"><span class='badge rounded-pill bg-light'>ZIP</span></div>
                                </div>
                                @php
                                    $file = "zip";
                                }
                            @endphp
                            <div class="d-inline-block">
                                <div class="text-uppercase"><span class='badge rounded-pill bg-light'>{{$datas->source->sumber_gambar}}</span></div>
                            </div>
                            
                        </div>
                    </div>
                </div> 
            
            @endif
            
    </div>
</div>  
 @endforeach 
 
      