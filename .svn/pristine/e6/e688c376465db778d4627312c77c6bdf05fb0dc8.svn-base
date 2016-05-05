<?php

namespace App\Http\Controllers\File;

use App\Services\File\Upload\UMEditor\UploadImage;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UMeditorController extends Controller
{
    /**
     * 处理图片上传
     */
    public function server(Request $request)
    {
        $config = config('file.umeditor');
        $result = with(new UploadImage($request, $config))->upload();
        return json_encode($result);
        //前端无法处理这种json,会报错
//        return response()->json($result, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
