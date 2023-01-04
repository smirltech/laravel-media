<?php

namespace SmirlTech\LaravelMedia\Traits;


use SmirlTech\LaravelMedia\Models\Media;

trait HasPrimaryImage
{
    use HasMedia;

    /**
     * Set the primary media for the model.
     * @return mixed
     */
    public function setPrimaryImage(Media $media): mixed
    {
        return $this->media_id = $media->id;
    }

    /**
     * Clear the primary media for the model.
     * @return mixed
     */
    public function clearPrimaryImage(): mixed
    {
        return $this->media_id = null;
    }

    public function getCoverAttribute(): ?Media
    {
        if ($this->media_id) {
            return $this->media()->findOrFail($this->media_id);
        } else {
            return $this->getFirstMedia();
        }
    }

    /**
     * Get the primary media url for the model.
     * @return mixed
     */
    public function getPrimaryImageUrl(): mixed
    {
        return $this->getPrimaryImage()->getUrl();
    }

    /**
     * Get the primary media for the model.
     * @return mixed
     */
    public function getPrimaryImage(): null|Media
    {
        return $this->media()->find($this->media_id);
    }

}
