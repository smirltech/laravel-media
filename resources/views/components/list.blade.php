@props(['media','delete' => false])
<ol class="list-group mt-3">
    @if(is_array($media))
        @foreach($media as $m)
            <li class="list-group-item">
                <i class="fa fa-{{$m->icon}}"></i>
                <a class="" title="Voir"
                   href="{{route('media.show', $m)}}"
                   target="_blank">{{$m->filename}}</a>
                @if($delete)
                    |
                    <button type="button" class="btn btn-sm btn-outline-danger">
                        <i wire:click="deleteMedia('{{$m->id}}')"
                           class="fa fa-minus"></i>
                    </button>
                @endif

            </li>
        @endforeach
    @else
        <li class="list-group-item">
            <i class="fa fa-{{$media->icon}}"></i>
            <a class="" title="Voir"
               href="{{route('media.show', $media)}}"
               target="_blank">{{$media->filename}}</a>
            @if($delete)
                |
                <button type="button" class="btn btn-sm btn-outline-danger">
                    <i wire:click="deleteMedia('{{$media->id}}')"
                       class="fa fa-minus"></i>
                </button>
            @endif
        </li>
    @endif
</ol>


