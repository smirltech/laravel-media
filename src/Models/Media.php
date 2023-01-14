<?php

namespace SmirlTech\LaravelMedia\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Json;
use Nette\Utils\JsonException;
use SmirlTech\LaravelMedia\Traits\HasResizeImage;


/**
 * @property string $location
 * @property array $custom_properties
 * @property string $filename
 * @property string $mime_type
 */
class Media extends Model
{
    use HasUlids, HasResizeImage;

    protected $guarded = [];

    protected $hidden = ['model_type', 'model_id'];

    protected $casts = [
        'custom_properties' => 'array',
    ];

    public function mediable(): MorphTo
    {
        return $this->model();
    }


    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    /** get media where mime type is image */
    public function scopeImages($query)
    {
        return $query->where('mime_type', 'like', 'image/%');
    }

    /**
     * Set custom_property attribute for backward compatibility
     * @param $value
     * @return void
     * @throws JsonException
     */
    public function setCustomPropertyAttribute($value): void
    {
        $this->attributes['custom_properties'] = Json::encode($value);
    }


    public function getPathAttribute(): string
    {
        return Storage::disk('public')->path($this->location);
    }

    public function delete(): ?bool
    {
        $bool = Storage::disk('public')->delete($this->location);

        if ($bool) {
            return parent::delete();
        }

    }

    public function getUrl(): string
    {
        return Storage::disk('public')->url($this->location);
    }

    public function getUrlAttribute(): string
    {
        return $this->getMediaUrl();
    }

    public function getMediaUrl(): string
    {
        return route('media.show', $this->id);
    }

    // get directory

    public function getDirectory(): string
    {
        // extract the file location from the media location
        $location = $this->location;
        $parts = explode('/', $location);

        // build string and ignore last part
        $directory = '';
        foreach ($parts as $key => $part) {
            $directory .= $part;
            if ($key === count($parts) - 2) {
                break;
            } else {
                $directory .= '/';
            }
        }

        return $directory;
    }

}
