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
        return view('media::livewire.gallery-component');
    }

    public function delete($id)
    {
        $image = Media::find($id);
        $image->delete();
    }

    public function mount(string $model_type, int $model_id)
    {
        $model = $model_type::find($model_id);
        $this->images = $model->media()->images()->get();
    }

    public function setMain($id)
    {
        $image = Media::find($id);
        $image->makeMainImage();
    }
}
