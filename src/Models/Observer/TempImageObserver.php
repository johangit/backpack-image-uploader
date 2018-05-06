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
        $date = new \Carbon\Carbon('1 day ago');

        $images = TempImage::where("created_at", "<", $date)
            ->take(100)
            ->get();

        foreach ($images as $image) {
            $image->delete();
        }
    }

    public function deleting(TempImage $image)
    {
        $image->removeImages("file");
    }
}