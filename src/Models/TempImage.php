<?php

namespace JohanCode\BackpackImageUploader\Models;

use JohanCode\ImageThumbs\ImageThumbsTrait;
use Illuminate\Database\Eloquent\Model;

class TempImage extends Model
{
    use ImageThumbsTrait;

    protected $guarded = ['id'];
    protected $casts = [
        'file' => 'array',
    ];


    public function setFileAttribute($value)
    {
        $fileValue = $this->saveImageThumbsField('file', $value);
        $this->attributes['file'] = json_encode($fileValue);
    }

    public function getFileAttribute()
    {
        return $this->getImageValue('file');
    }
}
