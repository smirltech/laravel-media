<?php

namespace SmirlTech\LaravelMedia\Traits;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use SmirlTech\LaravelMedia\Models\Media;

trait HasCoverImage
{
    use HasMedia;

    /**
     * Set the primary media for the model.
     * @return mixed
     */
    public function setCoverImage(Media $media): mixed
    {
        return $this->media_id = $media->id;
    }

    /**
     * Clear the primary media for the model.
     * @return mixed
     */
    public function clearCoverImage(): mixed
    {
        return $this->media_id = null;
    }

    public function getCoverImageAttribute(): Collection|Model|MorphMany|array|null
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
