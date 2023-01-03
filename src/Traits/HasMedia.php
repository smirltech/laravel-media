<?php

namespace SmirlTech\LaravelMedia\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use SmirlTech\LaravelMedia\Models\Media;

trait HasMedia
{

    public function AddMedia(UploadedFile $file, string $collection_name): Media
    {
        return $this->upload(file: $file, entity: $this, collection_name: $collection_name);
    }

    public function upload(UploadedFile $file, Model $entity, string $collection_name, string $custom_properties = null): Media
    {
        return $entity->media()->create([
            'mime_type' => $file->getMimeType(),
            'filename' => $file->getClientOriginalName(),
            'location' => $file->store("{$entity->getTable()}/{$entity->id}/{$collection_name}", 'public'),
            'custom_properties' => $custom_properties,
            'size' => $file->getSize(),
        ]);
    }

    // set image attribute

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function getImageUrlAttribute(): string
    {
        return $this->getFirstMediaUrl();
    }

    public function getFirstMediaUrl(): string
    {
        $media = $this->getFirstMedia();

        return $media ? $media->getUrl() : '';
    }

    // get first media url

    public function getFirstMedia(): null|Media|MorphMany
    {
        return $this->media()->first();
    }

    // get first media

    public function getImageAttribute(): array
    {

        $image = $this->getFirstMedia();

        if ($image) {
            return [
                'name' => $image->filename,
                'url' => $image->url,
                'size' => $image->size,
            ];
        }
        return [];

    }

    public function delete(): bool
    {
        // prepare directory
        $directory = $this->getFirstMedia()?->getDirectory();
        // delete files
        foreach ($this->media as $media) {
            $media->delete();
        }
        // remove folder and delete model
        if ($directory) {
            if (Storage::disk('public')->deleteDirectory($directory)) {
                return parent::delete();
            }
        } else {
            return parent::delete();
        }
    }


}
