<?php
/*
 *  available values:
 *
 *  1. null
 *  2. json with db data
 *  3. json with old data
 *
 */


$value = [];

if (old($field['name'])) {
    $value = json_decode(old($field['name']));
} else {
    if (isset($field['value'])) {
        // is edit

        if (is_array($field['value'])) {
            // is multiple field
            foreach ($field['value'] as $item) {
                $value[] = $item->original;
            }
        } else {
            // is single field
            $value[] = $field['value']->original;
        }
    } else {
        // is create
    }
}

$value = json_encode($value);
?>


<div @include('crud::inc.field_wrapper_attributes') >
    <div class="js-images-with-preview" @if(isset($field['multiple'])) multiple="yep" @endif>


        <label>{!! $field['label'] !!}</label>

        <textarea
                type="text"
                name="{{ $field['name'] }}"
                style="display: none"
                @include('crud::inc.field_attributes')
        >{{ $value }}</textarea>


        <div class="images-with-preview js-images-with-preview__images">
            <span
                    class="images-with-preview__image js-images-with-preview__image-template"
                    style="display: none"
            >
                <a href="#" class="images-with-preview__image-remove js-images-with-preview__image-remove"
                   title="remove this image">&times;</a>
            </span>
        </div>

        <div class="images-with-preview__controls">
            <button type="button" class="js-images-with-preview__remove-all btn btn-sm btn-default">remove all</button>
            <button type="button" class="js-images-with-preview__add-new btn btn-sm btn-default">add</button>
        </div>


        @if (isset($field['hint']))
            <p class="help-block">{!! $field['hint'] !!}</p>
        @endif


    </div>
</div>


@if ($crud->checkIfFieldIsFirstOfItsType($field, $fields))
    @push('crud_fields_styles')
        <link href="/admin/crud/images_with_preview/widget.css" rel="stylesheet"/>
    @endpush


    @push('crud_fields_scripts')
        <script src="/admin/crud/images_with_preview/widget.js"></script>
        <script src="/admin/crud/images_with_preview/SimpleAjaxUploader.min.js"></script>
    @endpush
@endif