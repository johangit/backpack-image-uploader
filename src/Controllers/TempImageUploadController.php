<?php

namespace JohanCode\BackpackImageUploader\Controllers;

use JohanCode\BackpackImageUploader\Requests\TempImageUploadRequest;
use JohanCode\BackpackImageUploader\Models\TempImage;
use Illuminate\Routing\Controller as BaseController;
use Auth;

class TempImageUploadController extends BaseController
{
    public function store(TempImageUploadRequest $request)
    {
        $result = [
            'success' => false,
            'src' => null
        ];


        if ($request->hasFile('uploadfile')) {
            $newTempImage = TempImage::create([
                'user_id' => Auth::id(),
                'file' => $request->file('uploadfile'),
            ]);

            $result['success'] = true;
            $result['src'] = $newTempImage->file->original;
        }


        return response()->json($result);
    }
}
