    @php
    $thumb=array(); 
    @endphp

    @if($gambar->count()==null||$gambar->count()==0)
        @foreach($gambar->take(1) as $gambars)
            @php
                $thumb[]=$gambars->thumbnail_path;
            @endphp 
        @endforeach
        <div class="col h-100"> 
            <div class="w-100 h-100 rounded bg-cover-center d-block" style="
                        width: 100%;
                        padding: 0;
                        background-color: #e3e9ed;
                        height: 100%;"
            >    
            </div>
        </div>
    @endif
    
    @if($gambar->count()==1)
        @foreach($gambar->take(1) as $gambars)
            @php
                $thumb[]=$gambars->thumbnail_path;
            @endphp 
        @endforeach
        <div class="col h-100">
            <a
                    href="{{route('album.show',['album'=>$datas->id])}}"
                    class="w-100 h-100 rounded bg-cover-center d-block"
                    style="background-image: url('{{$thumb[0]}}')"
            >
        </a>
        </div>
    @endif

    @if($gambar->count()==2)
        @foreach($gambar->take(2) as $gambars)
            @php
                $thumb[]=$gambars->thumbnail_path;
            @endphp 
        @endforeach
        <div class="col h-100">
            <a
                    href="{{route('album.show',['album'=>$datas->id])}}"
                    class="w-100 h-100 rounded-md-start bg-cover-center d-block"
                    style="background-image: url('{{Storage::temporaryUrl($thumb[0],now()->addMinutes(30))}}')"
            >
            </a>
        </div>
        <div class="col d-flex flex-column justify-content-stretch h-100"> 
                <a
                        href="{{route('album.show',['album'=>$datas->id])}}"
                        class="w-100 h-100 rounded-md-end bg-cover-center d-block"
                        style="background-image: url('{{Storage::temporaryUrl($thumb[1],now()->addMinutes(30))}}')"
                >
            </a> 
        </div> 
    @endif
    @if($gambar->count()>=3)
        @foreach($gambar->take(3) as $gambars)
            @php
            $thumb[]=$gambars->thumbnail_path;
            @endphp
        @endforeach
        <div class="col h-100">
            <a
                    href="{{route('album.show',['album'=>$datas->id])}}"
                    class="w-100 h-100 rounded-md-start bg-cover-center d-block" 
                    style="background-image: url('{{$thumb[0]}}')"
            >
          </a>
        </div>
        <div class="col d-flex flex-column justify-content-stretch h-100">
            <div class="d-flex mb-1 flex-grow-1">
                <a
                        href="{{route('album.show',['album'=>$datas->id])}}"
                        class="w-100 h-100 rounded-md-top-end bg-cover-center d-block"
                        style="background-image: url('{{$thumb[1]}}')"
                ></a>
            </div>
            <div class="d-flex flex-grow-1">
                <a
                        href="{{route('album.show',['album'=>$datas->id])}}"
                        class="w-100 h-100 rounded-md-bottom-end bg-cover-center d-block"
                        style="background-image: url('{{$thumb[2]}}')"
                ></a>
            </div>
        </div> 
    @endif 