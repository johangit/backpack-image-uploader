<?php

namespace JohanCode\BackpackImageUploader\Models\Observers;

use JohanCode\BackpackImageUploader\Models\TempImage;

class TempImageObserver
{
    public function saving(TempImage $image)
    {
        $image->identify = md5(uniqid());
    }

    public function saved(TempImage $image)
    {
        $date = new \Carbon\Carbon('10 day ago');

        TempImage::where("created_at", "<", $date->toDateString())
            ->take(100)
            ->delete();
    }

    public function deleting(TempImage $image)
    {
        $image->removeImages("file");
    }
}