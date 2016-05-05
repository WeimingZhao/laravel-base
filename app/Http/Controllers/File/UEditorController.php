<?php

namespace App\Http\Controllers\File;

use App\Services\File\Upload\UEditor\Lists;
use App\Services\File\Upload\UploadFile;
use App\Services\File\Upload\UEditor\UploadScrawl;
use App\Services\File\Upload\UploadImage;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UEditorController extends Controller
{

    public function server(Request $request)
    {
        $config = config('file.ueditor');
        $action = $request->get('action');

        switch ($action) {
            case 'config':
                $result = $config;
                break;
            case 'uploadimage':
                $upConfig = array(
                    "pathFormat" => $config['imagePathFormat'],
                    "maxSize" => $config['imageMaxSize'],
                    "allowFiles" => $config['imageAllowFiles'],
                    'fieldName' => $config['imageFieldName'],
                );
                $result = with(new UploadImage($request, $upConfig))->upload();
                break;
            case 'uploadscrawl':
                $upConfig = array(
                    "pathFormat" => $config['scrawlPathFormat'],
                    "maxSize" => $config['scrawlMaxSize'],
                    "allowFiles" => $config['scrawlAllowFiles'],
                    "oriName" => "scrawl.png",
                    'fieldName' => $config['scrawlFieldName'],
                );
                $result = with(new UploadScrawl($request, $upConfig))->upload();
                break;
            case 'uploadvideo':
                $upConfig = array(
                    "pathFormat" => $config['videoPathFormat'],
                    "maxSize" => $config['videoMaxSize'],
                    "allowFiles" => $config['videoAllowFiles'],
                    'fieldName' => $config['videoFieldName'],
                );
                $result = with(new UploadFile($request, $upConfig))->upload();
                break;
            case 'uploadfile':
            default:
                $upConfig = array(
                    "pathFormat" => $config['filePathFormat'],
                    "maxSize" => $config['fileMaxSize'],
                    "allowFiles" => $config['fileAllowFiles'],
                    'fieldName' => $config['fileFieldName'],
                );
                $result = with(new UploadFile($request, $upConfig))->upload();
                break;
            case 'listimage':
                $result = with(new Lists($config['imageManagerAllowFiles'],
                    $config['imageManagerListSize'],
                    $config['imageManagerListPath'],
                    $request))->getList();
                break;

            case 'listfile':
                $result = with(new Lists(
                    $config['fileManagerAllowFiles'],
                    $config['fileManagerListSize'],
                    $config['fileManagerListPath'],
                    $request))->getList();
                break;

            case 'catchimage':
                $upConfig = array(
                    "pathFormat" => $config['catcherPathFormat'],
                    "maxSize" => $config['catcherMaxSize'],
                    "allowFiles" => $config['catcherAllowFiles'],
                    "oriName" => "remote.png",
                    'fieldName' => $config['catcherFieldName'],
                );

                $sources = \Input::get($upConfig['fieldName']);
                $list = [];
                foreach ($sources as $imgUrl) {
                    $upConfig['imgUrl'] = $imgUrl;
                    $info = with(new UploadCatch($upConfig, $request))->upload();

                    array_push($list, array(
                        "state" => $info["state"],
                        "url" => $info["url"],
                        "size" => $info["size"],
                        "title" => htmlspecialchars($info["title"]),
                        "original" => htmlspecialchars($info["original"]),
                        "source" => htmlspecialchars($imgUrl)
                    ));
                }
                $result = [
                    'state' => count($list) ? 'SUCCESS' : 'ERROR',
                    'list' => $list
                ];
                break;
        }
        return response()->json($result, 200, [], JSON_UNESCAPED_UNICODE);

    }

}
