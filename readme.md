# Laravel Backpack image uploader widget

Images uploader with preview for backpack crud.


## Install on Laravel 5.4

0) Require **[image-thumbs](https://github.com/johangit/image-thumbs)** 

1) Install using composer (run in your terminal):

```bash
composer require johan-code/backpack-image-uploader
```

2) Add service provider in `config/app.php`:

```php
'providers' => [
    ...
    JohanCode\BackpackImageUploader\ServiceProvider::class,
    ...
]
```

3) Publish (run in your terminal):

```bash
php artisan vendor:publish --provider="JohanCode\BackpackImageUploader\ServiceProvider"
```

4) Create table for temp images (run in your terminal):
 ```bash
 php artisan migrate
 ```
 
5) Make sure the folder for uploading exist