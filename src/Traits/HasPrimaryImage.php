<?php

namespace SmirlTech\LaravelMedia\Traits;


use SmirlTech\LaravelMedia\Models\Media;

trait HasPrimaryImage
{

    /**
     * Set the primary media for the model.
     * @return mixed
     */
    public function setPrimaryImage(Media $media): mixed
    {
        return $this->media_id = $media->id;
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
    public function getPrimaryImage(): mixed
    {
        return Media::find($this->media_id);
    }

    /**
     * Clear the primary media for the model.
     * @return mixed
     */
    public function clearPrimaryImage(): mixed
    {
        return $this->media_id = null;
    }

}
