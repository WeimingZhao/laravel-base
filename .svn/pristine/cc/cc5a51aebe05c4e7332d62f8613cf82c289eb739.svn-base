<?php

namespace App\Http\Controllers\File;

use App\Services\File\Image\FetchImage;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function server($name, $size = null)
    {
        return with(new FetchImage($name, $size))->fetch();
    }
}
