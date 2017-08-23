$(function () {
    $(".js-images-with-preview").each(function () {

        var $widget = $(this),
            isMultiple = $widget.attr("multiple") ? true : false,
            $template = $widget.find(".js-images-with-preview__image-template"),
            $input = $widget.find("textarea");


        var appendImage = function (src) {
            var $item = $template.clone();

            if (!isMultiple) {
                $widget
                    .find(".js-images-with-preview__image")
                    .remove();
            }

            $item
                .removeClass("js-images-with-preview__image-template")
                .addClass("js-images-with-preview__image")
                .attr("src", src)
                .css({
                    backgroundImage: "url(" + src + ")",
                    display: "inline-block"
                });

            $widget.find(".js-images-with-preview__images").append($item);

            $item
                .find(".js-images-with-preview__image-remove")
                .on("click", function (e) {
                    e.preventDefault();

                    $(this).parent(".js-images-with-preview__image").remove();
                    generateInputValue();
                })
        };

        var generateInputValue = function () {
            var newValue = [];

            $widget
                .find(".js-images-with-preview__image")
                .each(function () {
                    newValue.push($(this).attr("src"));
                });

            $input.val(JSON.stringify(newValue));
        };

        var uploadUrl = "/" + window.location.pathname.split("/")[1] + "/api/temp-image/create",
            uploader = new ss.SimpleUpload({
                customHeaders: {'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')},
                button: $widget.find(".js-images-with-preview__add-new"),
                url: uploadUrl,
                multipleSelect: isMultiple,
                multiple: true,
                responseType: "json",
                name: 'uploadfile',
                allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
                onSubmit: function (filename, extension) {
                    // preloader show
                },
                onComplete: function (filename, response) {
                    // preloader hide
                    if (response.success) {
                        appendImage(response.src);
                        generateInputValue();
                    }
                }
            });

        $widget
            .find(".js-images-with-preview__remove-all")
            .on("click", function (e) {
                e.preventDefault();
                
                $widget.find(".js-images-with-preview__image").remove();
                generateInputValue();
            });


        // init widget
        if ($input.val()) {
            var items = JSON.parse($input.val());

            items.forEach(function (src) {
                appendImage(src);
            });
        }
    });

});