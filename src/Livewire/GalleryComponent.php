<?php

namespace SmirlTech\LaravelMedia\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use SmirlTech\LaravelMedia\Models\Media;

class GalleryComponent extends Component
{

    public $images;

    public function render(): Factory|View|Application
    {
        return view('media::gallery-component');
    }

    public function delete($id)
    {
        $image = Media::find($id);
        $image->delete();
    }

    public function mount(string $model_type, string $model_id)
    {

        if ($model_id && $model_type) {
            $this->images = Media::images()->where('model_id', $model_id)
                ->where('model_type', $model_type->class())
                ->get();
        } else {
            $this->images = Media::images()->get();
        }
    }

    public function setMain($id)
    {
        $image = Media::find($id);
        $image->makeMainImage();
    }
}
