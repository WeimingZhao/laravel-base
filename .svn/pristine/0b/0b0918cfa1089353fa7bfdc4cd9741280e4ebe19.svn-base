<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/3/2
 * Time: 15:53
 */

namespace App\Services\File\Upload\UMeditor;


use App\Services\File\Upload\Upload;

class UploadImage extends Upload
{

    /**
     * @return mixed
     */
    protected function doUpload()
    {
        $file = $this->request->file($this->fileField);
        if (empty($file)) {
            $this->stateInfo = $this->getStateInfo('ERROR_FILE_NOT_FOUND');
            return false;
        }
        if (!$file->isValid()) {
            $this->stateInfo = $this->getStateInfo($file->getError());
            return false;
        }

        $this->file = $file;
        $this->oriName = $this->file->getClientOriginalName();
        $this->fileSize = $this->file->getSize();
        $this->fileType = $this->getFileExt();
        $this->fullName = $this->getFullName();
        $this->filePath = $this->getFilePath();
        $this->fileName = basename($this->filePath);

        //检查文件大小是否超出限制
        if (!$this->checkSize()) {
            $this->stateInfo = $this->getStateInfo("ERROR_SIZE_EXCEED");
            return false;
        }
        //检查是否不允许的文件格式
        if (!$this->checkType()) {
            $this->stateInfo = $this->getStateInfo("ERROR_TYPE_NOT_ALLOWED");
            return false;
        }

        try {
            $this->file->move(dirname($this->filePath), $this->fileName);
            $this->stateInfo = $this->stateMap[0];
        } catch (FileException $exception) {
            $this->stateInfo = $this->getStateInfo("ERROR_WRITE_CONTENT");
            return false;
        }

        return true;
    }

    /**
     * 获取当前上传成功文件的各项信息
     * @return array
     */
    public function getFileInfo()
    {
        return array(
            "originalName" => $this->oriName,
            "name" => $this->fileName,
            "url" => route_image($this->fileName),
            "size" => $this->fileSize,
            "type" => $this->fileType,
            "state" => $this->stateInfo
        );
    }
}