@foreach ($Data as $datas)
<div class="col">
    <div class="card hover-img-scale-up hover-reveal">
            <img class="card-img sh-50 scale" 
            src="{{$datas->thumbnail_path}}"
            alt="card image" />
            <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                <div class="row g-0">
                </div>
                <div class="row g-0">
                    <div class="col pe-2">
                        {{-- <a href="/Dashboard/DetailGambar/{{$datas->id}}" class="stretched-link"> --}}
                        <a href="{{route('dashboard.detailgambar', ['gambar_id' => $datas->id])}}" class="stretched-link">
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
    </div>
</div>
<!-- src="{{$datas->thumbnail_path}}"  -->
 @endforeach 