<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/28
 * Time: 23:05
 */

namespace App\Services\File\Image;

use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;

class FetchImage
{
    private $name;//获取到的图片名称
    private $size = '';//图片规格
    private $width = 0;//图片宽
    private $height = 0;//图片高度
    private $img_path = 'uploads/img';//访问文件存储路径
    private $image_path = 'uploads/image';//原始文件存储路径
    private $img;//访问的文件
    private $image;//原始文件
    private $origin = 'origin';//原始大小的文件在访问文件夹中的目录
    private $default = 'default.jpg';//默认图片名称

    /**
     * 允许生成的图片规格
     * 主要针对头像一类
     * @var array
     */
    private $allow_size = ['40x40', '60x60', '80x80', '100x100', '160x160', '200x200'];

    /**
     * 允许生成的图片宽度
     * 等比压缩方式
     * @var array
     */
    private $allow_width = ['100', '160', '200', '300', '400', '500', '600', '700', '800', '900', '980', '1000', '1200',
        '1600'];

    public function __construct($name, $size = null)
    {
        $this->name = $name;
        $this->size = strtolower($size);
        $config = config('file.image');
//        $this->image_path = $config['image_path'];
//        $this->img_path = $config['img_path'];
        $this->setImg();
    }

    public function fetch()
    {
        //如果文件已经存在,则直接返回文件
        if (file_exists($this->img)) {
            return Image::make($this->img)->response();
        }

        $this->setImage();
        //原始图片不存在,返回默认图片
        if (!file_exists($this->image)) {
            return Image::make($this->defaultImage())->response();
        }

        $this->setSize();//处理尺寸
        $this->setImg();//根据尺寸重新设置路径

        $this->mkdirs();//创建文件夹

        $img = Image::make($this->image);

        if ($this->width > 0 && $this->height > 0) {//指定宽高
            $img->resize($this->width, $this->height);
        } elseif ($this->width > 0 && $this->height == 0) {//指定宽度,等比缩放
            $img->resize($this->width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        $img->save($this->img);
        return $img->response();
    }

    /**
     * 设置访问的文件路径
     */
    private function setImg()
    {
        //原规格大小
        if ($this->size == '') {
            $folder = $this->origin;
        } else {//指定规格
            $folder = $this->size;
        }
        $this->img = public_path() . DIRECTORY_SEPARATOR . $this->img_path . DIRECTORY_SEPARATOR
            . $folder . DIRECTORY_SEPARATOR . substr($this->name, 0, 2)
            . DIRECTORY_SEPARATOR . $this->name;
    }

    /**
     * 设置原始文件的路径
     */
    private function setImage()
    {
        $this->image = public_path() . DIRECTORY_SEPARATOR . $this->image_path . DIRECTORY_SEPARATOR
            . substr($this->name, 0, 2) . DIRECTORY_SEPARATOR . $this->name;
    }

    /**
     * 处理图片的规格
     * 图片规格只能为空,只有宽度,包含长宽三种形式
     * $size = '100'
     * $size = '100x50'
     *
     * @return bool
     */
    private function setSize()
    {
        //原始尺寸
        if ($this->size == '') {
            return false;
        }
        //指定规格
        if (in_array($this->size, $this->allow_size)) {
            $size = explode('x', $this->size);//array
            $this->width = intval($size[0]);
            $this->height = intval($size[1]);
//            $this->width = (isset($size[0]) & is_integer($size[0]) & $size[0] > 0) ? $size[0] : 0;
//            $this->height = (isset($size[1]) & is_integer($size[1]) & $size[1] > 0) ? $size[1] : 0;
            return true;
        }

        //指定宽度
        if (in_array($this->size, $this->allow_width)) {
            $this->width = intval($this->size);
            return true;
        }
        $this->size = '';
    }

    /**
     * 默认图片
     *
     * @return string
     */
    private function defaultImage()
    {
        return public_path() . DIRECTORY_SEPARATOR . $this->img_path . DIRECTORY_SEPARATOR . $this->default;
    }

    /**
     * 创建文件夹
     *
     * @return bool
     */
    private function mkdirs()
    {
        $dir = dirname($this->img);
        if (!is_dir($dir)) {
            mkdir($dir, 0700, true);
        }
        return true;
    }

}