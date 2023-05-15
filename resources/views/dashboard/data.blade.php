@foreach ($Data as $datas)
                                <div class="col">
                                    <div class="card hover-img-scale-up hover-reveal">
                                            <img class="card-img scale" 
                                            style="min-height:200px;"
                                            src="{{$datas->thumbnail_path}}"
                                            alt="card image" />
                                            <div class="card-img-overlay justify-content-between reveal-content">  
                                                        <div style="
                                                            position: absolute;
                                                            bottom: 30px;
                                                            width: 100%;">
                                                            <a href="Dashboard/DetailGambar/{{$datas->id}}" class="stretched-link">
                                                                <h5 class="heading text-white mb-1">{{$datas->judul}}</h5>
                                                            </a>
                                                            <div class=" ">
                                                                <div class="text-uppercase"><span class='badge rounded-pill bg-light'>{{$datas->tipe_gambar}}</span></div>
                                                            </div>
                                                            @php
                                                            if($datas->file_id!==null)
                                                                {
                                                                @endphp
                                                                <div class=" ">
                                                                    <div class="text-uppercase"><span class='badge rounded-pill bg-light'>ZIP</span></div>
                                                                </div>
                                                                @php
                                                                    $file = "zip";
                                                                }
                                                            @endphp
                                                            <div class=" ">
                                                                <div class="text-uppercase"><span class='badge rounded-pill bg-light'>{{$datas->source->sumber_gambar}}</span></div>
                                                            </div>
                                                            
                                                        </div> 
                                            </div>
                                    </div>
                                </div>
                                
                            @endforeach 
                            <div class="mt-5">{{ $Data->links()}}</div> 