<?php

namespace JohanCode\BackpackImageUploader\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TempImageUploadRequest extends FormRequest
{
    public function authorize()
    {
        return \Auth::check();
    }

    public function rules()
    {
        return [
            // 'name' => 'required|min:5|max:255'
        ];
    }
}
