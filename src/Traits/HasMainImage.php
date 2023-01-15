<?php

namespace SmirlTech\LaravelMedia\Traits;


use Exception;
use Illuminate\Support\Facades\Schema;
use SmirlTech\LaravelMedia\Models\Media;

trait HasMainImage
{
    use HasMedia;


    /**
     * Set the primary media for the model.
     * @return mixed
     * @throws Exception
     */
    public function setMainImage(Media $media): mixed
    {
        $this->checkColumn();
        return $this->media_id = $media->id;
    }

    /**
     * @return void
     * @throws Exception
     */
    private function checkColumn(): void
    {
        if (!Schema::hasColumn($this->getTable(), 'media_id')) {
            throw new Exception('The table ' . $this->getTable() . ' does not have a media_id column');
        }
    }

    /**
     * Clear the primary media for the model.
     * @return mixed
     * @throws Exception
     */
    public function clearMainImage(): mixed
    {
        $this->checkColumn();
        return $this->media_id = null;
    }

    /**
     * @throws Exception
     */
    public function getMainImageAttribute(): ?Media
    {
        $this->checkColumn();
        return $this->media()->find($this->media_id);
    }

    /**
     * Get the primary media url for the model.
     * @return mixed
     */
    public function getMainImageUrl(): mixed
    {
        return $this->getMainImage()->getUrl();
    }


}
