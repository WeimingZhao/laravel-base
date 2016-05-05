<?php

namespace App\Http\Controllers\File;

use App\Services\File\Upload\UploadFile;
use App\Services\File\Upload\UploadImage;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function server(Request $request)
    {
        $config = config('file.uploader');
        $action = $request->get('action');
        switch ($action) {
            case 'image':
                $upConfig = array(
                    'pathFormat' => $config['imagePathFormat'],
                    "maxSize" => $config['imageMaxSize'],
                    "allowFiles" => $config['imageAllowFiles'],
                    'fieldName' => $config['imageFieldName'],
                );
                $result = with(new UploadImage($request, $upConfig))->upload();
                break;
            case 'file':
            default:
                $upConfig = array(
                    "pathFormat" => $config['filePathFormat'],
                    "maxSize" => $config['fileMaxSize'],
                    "allowFiles" => $config['fileAllowFiles'],
                    'fieldName' => $config['fileFieldName'],
                );
                $result = with(new UploadFile($request, $upConfig))->upload();
                break;
        }
        return response()->json($result, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
