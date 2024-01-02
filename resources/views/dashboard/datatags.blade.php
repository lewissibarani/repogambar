@foreach($Tags as $tag)
    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="{{route('result_pencarian' , ['katakunci'=>$tag->name,
                                                                                                                  'tipeaset'=>'null',
                                                                                                                  'tipehasil'=>'null'
        ])}}">
        <span>{{$tag->name}} ({{$tag->count}})</span>
    </a>
@endforeach