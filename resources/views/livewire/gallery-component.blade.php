<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="row">
            @foreach($images as $image)
                @if(!$image->hasFile())
                    @php
                        $image->delete();
                    @endphp
                @endif

                <div class="col-md-3">
                    <div class="card">
                        <img src="{{$image->url}}" class="card-img-top" alt="image">
                        @if(!$image->isMainImage())
                            <div class="card-img-overlay d-flex justify-content-between align-items-end">
                                <div>
                                    <button wire:click="setMain('{{$image->id}}')"
                                            class="btn btn-primary btn-sm main-btn">
                                        <i class="fa fa-star"></i>
                                    </button>
                                </div>
                                <div>
                                    <button wire:click="delete('{{$image->id}}')"
                                            class=" btn btn-danger btn-sm delete-btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @else
                            <div style="visibility: visible"
                                 class="card-img-overlay d-flex justify-content-start align-items-baseline">
                              <span class="badge badge-primary p-1">
                                   <i class="fa fa-star"></i>
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
