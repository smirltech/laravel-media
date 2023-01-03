<?php

namespace SmirlTech\LaravelMedia\Models;

use App\Traits\ImageResizer;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;


/**
 * @property mixed $location
 * @property array $custom_properties
 */
class Media extends Model
{
    use HasUlids, ImageResizer;

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

    /**
     * Set custom_property attribute for backward compatibility
     * @return string
     */
    public function setCustomPropertyAttribute($value): string
    {
        $this->custom_properties[] = $value;
        $this->save();

    }


    public function getPathAttribute(): string
    {
        return $this->getUrlAttribute();
    }

    public function getUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->location);

    }

    public function delete(): ?bool
    {
        $bool = Storage::disk('public')->delete($this->location);

        if ($bool) {
            return parent::delete();
        }

    }

    // get Url

    public function getUrl(): string
    {
        return $this->getUrlAttribute();
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
