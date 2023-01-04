<?php

namespace SmirlTech\LaravelMedia\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;

class MediaAttachment extends Component
{
    /**
     * @var mixed|string
     */
    private mixed $collection;
    private mixed $model;

    public function render(): Factory|View|Application
    {
        return view('laravel-media::livewire.media-attachment');
    }

    #[NoReturn] public function mount(mixed $model, mixed $collection = 'default')
    {
        $this->model = $model;
        $this->collection = $collection;

        dd($this->model, $this->collection);
    }

}
