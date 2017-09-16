<?php

namespace JohanCode\BackpackImageUploader\Models\Observers;

use JohanCode\BackpackImageUploader\Models\TempImage;

class TempImageObserver
{
    public function saving(TempImage $image)
    {
        $image->identify = md5(uniqid());
        $image->user_id = auth()->check() ? auth()->getUser()->id : null;
    }

    public function saved(TempImage $image)
    {
    }

    public function deleting(TempImage $image)
    {
        $image->removeImages("file");
    }
}