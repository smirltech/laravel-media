<?php

namespace SmirlTech\LaravelMedia\Controllers;


use Illuminate\Support\Facades\Response;
use SmirlTech\LaravelMedia\Models\Media;

class MediaController extends Controller
{
    public function show(Media $media)
    {
        return Response::make(file_get_contents(storage_path('app/public/' . $media->location)), 200, [
            'Content-Type' => $media->mime_type,
            'Content-Disposition' => 'inline; filename="' . $media->filename . '"',
        ]);
    }
}
