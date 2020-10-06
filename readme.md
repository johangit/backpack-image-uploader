**This package is not maintained now**

# Laravel Backpack image uploader widget

Images uploader with preview for backpack crud.


## Install on Laravel 5.5

0) Require **[image-thumbs](https://github.com/johangit/image-thumbs)** 

1) Install using composer (run in your terminal):

```bash
composer require johan-code/backpack-image-uploader
```

2) Publish (run in your terminal):

```bash
php artisan vendor:publish --provider="JohanCode\BackpackImageUploader\ServiceProvider"
```

3) Create table for temp images (run in your terminal):
 ```bash
 php artisan migrate
 ```
 
4) Make sure the folder for uploading exist



## Install on Laravel 5.4

Add service provider in `config/app.php`:

```php
'providers' => [
    ...
    JohanCode\BackpackImageUploader\ServiceProvider::class,
    ...
]
```

... and follow main instruction.
