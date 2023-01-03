<?php

namespace SmirlTech\LaravelMedia\Traits;


use SmirlTech\LaravelMedia\Models\Media;

trait HasPrimaryMedia
{

    /**
     * Set the primary media for the model.
     * @return mixed
     */
    public function setPrimaryMedia(Media $media): mixed
    {
        return $this->media_id = $media->id;
    }

    /**
     * Get the primary media url for the model.
     * @return mixed
     */
    public function getPrimaryMediaUrl(): mixed
    {
        return $this->getPrimaryMedia()->getUrl();
    }

    /**
     * Get the primary media for the model.
     * @return mixed
     */
    public function getPrimaryMedia(): mixed
    {
        return Media::find($this->media_id);
    }

    /**
     * Clear the primary media for the model.
     * @return mixed
     */
    public function clearPrimaryMedia(): mixed
    {
        return $this->media_id = null;
    }

}
