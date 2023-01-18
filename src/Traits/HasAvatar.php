<?php

namespace SmirlTech\LaravelMedia\Traits;

use Exception;
use Illuminate\Http\UploadedFile;

trait HasAvatar
{
    use HasMainImage;

    /**
     * @throws Exception
     */
    public function setAvatarAttribute(UploadedFile $file): void
    {
        $this->setMainImage($this->addMedia(file: $file, collection_name: 'avatars'));
    }

    /**
     * @throws Exception
     */
    public function getAvatarAttribute(): ?string
    {
        return $this->getMainImageUrl();
    }


}
