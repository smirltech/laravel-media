<?php

namespace SmirlTech\LaravelMedia\Controllers;


use Illuminate\Support\Facades\Response;
use SmirlTech\LaravelMedia\Models\Media;

class MediaController extends Controller
{
    public function show(string $media)
    {
        $media = Media::findOrFail($media);
        return Response::make(file_get_contents($media->path), 200, [
            'Content-Type' => $media->mime_type,
            'Content-Disposition' => 'inline; filename="' . $media->filename . '"',
        ]);
    }
}
