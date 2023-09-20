@foreach($Tags as $tag)
    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="#">
        <span>{{$tag->name}} ({{$tag->count}})</span>
    </a>
@endforeach