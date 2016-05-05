<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/3/2
 * Time: 15:46
 */

namespace App\Services\File\Upload;

use Illuminate\Http\Request;


abstract class Upload
{
    protected $request;
    protected $fileField;//文件域名
    protected $file;//文件上传对象
    protected $base64;//文件上传对象
    protected $config;//配置信息
    protected $oriName;//原始文件名
    protected $fileName;//新文件名
    protected $fullName;//完整文件名
    protected $filePath;
    protected $fileSize;//文件大小
    protected $fileType;//文件类型
    protected $allowFiles;//允许上传的文件类型
    protected $stateInfo;//上传状态信息
    protected $stateMap;//状态图

    public function __construct(Request $request, array $config)
    {
        $this->request = $request;
        $this->config = $config;
        if (isset($config['allowFiles'])) {
            $this->allowFiles = $config['allowFiles'];
        } else {
            $this->allowFiles = [];
        }
        $this->fileField = $config['fieldName'];

        $stateMap = [
            "SUCCESS", //上传成功标记，在UEditor中内不可改变，否则flash判断会出错
            trans("file.upload_max_filesize"),
            trans("file.upload_error"),
            trans("file.no_file_uploaded"),
            trans("file.upload_file_empty"),
            "ERROR_TMP_FILE" => trans("file.ERROR_TMP_FILE"),
            "ERROR_TMP_FILE_NOT_FOUND" => trans("file.ERROR_TMP_FILE_NOT_FOUND"),
            "ERROR_SIZE_EXCEED" => trans("file.ERROR_SIZE_EXCEED"),
            "ERROR_TYPE_NOT_ALLOWED" => trans("file.ERROR_TYPE_NOT_ALLOWED"),
            "ERROR_CREATE_DIR" => trans("file.ERROR_CREATE_DIR"),
            "ERROR_DIR_NOT_WRITEABLE" => trans("file.ERROR_DIR_NOT_WRITEABL"),
            "ERROR_FILE_MOVE" => trans("file.ERROR_FILE_MOVE"),
            "ERROR_FILE_NOT_FOUND" => trans("file.ERROR_FILE_NOT_FOUND"),
            "ERROR_WRITE_CONTENT" => trans("file.ERROR_WRITE_CONTENT"),
            "ERROR_UNKNOWN" => trans("file.ERROR_UNKNOWN"),
            "ERROR_DEAD_LINK" => trans("file.ERROR_DEAD_LINK"),
            "ERROR_HTTP_LINK" => trans("file.ERROR_HTTP_LINK"),
            "ERROR_HTTP_CONTENTTYPE" => trans("file.ERROR_HTTP_CONTENTTYPE"),
            "ERROR_UNKNOWN_MODE" => trans("file.ERROR_UNKNOWN_MODE"),
        ];
        $this->stateMap = $stateMap;
    }

    /**
     * @return mixed
     */
    abstract protected function doUpload();

    public function upload()
    {
        $this->doUpload();
        return $this->getFileInfo();
    }

    protected function getStateInfo($errCode)
    {
        return !$this->stateMap[$errCode] ? $this->stateMap["ERROR_UNKNOWN"] : $this->stateMap[$errCode];
    }

    /**
     * 文件大小检测
     *
     * @return bool
     */
    protected function checkSize()
    {
        return $this->fileSize <= ($this->config['maxSize']);
    }

    /**
     * 文件类型检测
     *
     * @return bool
     */
    protected function checkType()
    {
        return in_array($this->getFileExt(), $this->config['allowFiles']);
    }

    /**
     * 获取文件扩展名
     *
     * @return string
     */
    protected function getFileExt()
    {
        return '.' . $this->file->guessExtension();
    }

    /**
     * 设置完整的命名
     *
     * @return string
     */
    protected function getFullName()
    {
        //替换日期格式
        $t = time();
        $d = explode('-', date('Y-y-m-d-H-i-s'));
        $format = $this->config['pathFormat'];
        $format = str_replace('{yyyy}', $d[0], $format);
        $format = str_replace("{yy}", $d[1], $format);
        $format = str_replace("{mm}", $d[2], $format);
        $format = str_replace("{dd}", $d[3], $format);
        $format = str_replace("{hh}", $d[4], $format);
        $format = str_replace("{ii}", $d[5], $format);
        $format = str_replace("{ss}", $d[6], $format);
        $format = str_replace("{time}", $t, $format);

        //替换随机字符串
        $randNum = rand(1, 10000000000) . rand(1, 10000000000);
        if (preg_match("/\{rand\:([\d]*)\}/i", $format, $matches)) {
            $format = preg_replace("/\{rand\:[\d]*\}/i", substr($randNum, 0, $matches[1]), $format);
        }

        //处理md5,图片服务器
        $md5 = md5($t . $randNum . $this->oriName);
        $md5 = substr($md5, 0, 2) . DIRECTORY_SEPARATOR . substr($md5, 0, 20);//截取长度为20字符的md5名称
        $format = str_replace('{md5}', $md5, $format);
        $ext = $this->getFileExt();
        return $format . $ext;
    }

    /**
     * 获取文件完整路径
     *
     * @return string
     */
    protected function getFilePath()
    {
        $fullName = $this->fullName;
        $rootPath = public_path();
        $fullName = ltrim($fullName, '/');
        return $rootPath . '/' . $fullName;
    }

    protected function getFileInfo()
    {
        return [
            'state' => $this->stateInfo,
            'url' => $this->fullName,
            'title' => $this->fileName,
            'original' => $this->oriName,
            'type' => $this->fileType,
            'size' => $this->fileSize
        ];
    }
}