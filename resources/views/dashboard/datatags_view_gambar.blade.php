<?php $counter=0;?>
@foreach($Tags as $tag)

    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="{{route('result_pencarian' , ['katakunci'=>$tag[$counter],
                                                                                                                  'tipeaset'=>'null',
                                                                                                                  'tipehasil'=>'null'
        ])}}"> 
        <span>{{$tag[$counter]}}</span>
    </a>
    <?php $counter++;?>
@endforeach