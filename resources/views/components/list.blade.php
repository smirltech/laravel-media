@props(['media', 'delete' => false])

{{-- Safe check for null, empty array, or empty collection --}}
@if(blank($media))
    <div class="alert alert-info">
        Aucun document disponible
    </div>
@else
    <ol class="list-group mt-3">
        {{-- Check if it is a Collection or an Array --}}
        @if(is_iterable($media))
            @foreach($media as $m)
                <li class="list-group-item">
                    <i class="fa fa-{{ $m->icon ?? 'file' }}"></i>
                    <a class="" title="Voir"
                       href="{{ route('media.show', $m) }}"
                       target="_blank">{{ $m->filename ?? null }}</a>
                    @if($delete)
                        |
                        <button type="button" class="btn btn-sm btn-outline-danger">
                            <i wire:click="deleteMedia('{{ $m->id }}')"
                               class="fa fa-trash-alt"></i>
                        </button>
                    @endif
                </li>
            @endforeach
        @else
            {{-- It's a single item object --}}
            <li class="list-group-item">
                <i class="fa fa-{{ $media->icon ?? 'file' }}"></i>
                <a class="" title="Voir"
                   href="{{ route('media.show', $media) }}"
                   target="_blank">{{ $media->filename }}</a>
                @if($delete)
                    |
                    <button type="button" class="btn btn-sm btn-outline-danger">
                        <i wire:click="deleteMedia('{{ $media->id }}')"
                           class="fa fa-trash-alt"></i>
                    </button>
                @endif
            </li>
        @endif
    </ol>
@endif
