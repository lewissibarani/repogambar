@foreach($DataAlbum as $datas)
        <div class="col"> 
            <div class="sh-35 mb-4">
                <div class="row g-1 h-100 gallery"> 
                    @if(isset($datas['gambar']))
                        @include ('album._thumbnail', ['gambar' => $datas['gambar']])
                    @endif 
                </div>
            </div>
            <a href="{{route('album.show',['album' => $datas->id])}}">
            <div class=" ">
                <h5 class="heading mb-0 d-flex"> 
                    <p class="font-weight-bold">{{$datas->judulalbum}}</p>
                </h5>
            </div> 
            </a>
            <div class="pb-3"> 
                    <span class="text-muted">{{$datas['gambar']->count()}} Aset | Dibuat oleh: </span> <a href="{{route('kontributor.profil',['user_id'=> $datas->user->id])}}">{{$datas->user->name}}</a>  
            </div>
        </div>
@endforeach