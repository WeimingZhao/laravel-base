<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/19
 * Time: 00:53
 */

namespace App\Services;

/**
 * Class Tree
 * @package App\Services
 */
class Tree
{
    /**
     * 子级字段
     *
     * @var string
     */
    static private $son = 'son';

    /**
     * 格式化数据源,得到符合树形结构算法的数组
     *
     * @param array $items
     * @return array
     */
    static private function prepareData(array $items)
    {
        $data = array();
        foreach ($items as $value) {
            $id = $value['id'];
            $data[$id] = $value;
        }
        return $data;
    }

    /**
     * 生成多维树形结构
     *
     * @param array $items
     * @return array
     */
    static public function multiTree(array $items)
    {
        $items = self::prepareData($items);
        foreach ($items as $item) {
            $items[$item['pid']][self::$son][$item['id']] = &$items[$item['id']];
        }
        return isset($items[0][self::$son]) ? $items[0][self::$son] : array();
    }

    /**
     * 生成一维树形结构
     *
     * @param array $items
     * @param int $pid
     * @return array
     */
    static public function simpleTree(array $items, $pid = 0)
    {
        $arr = array();
        foreach ($items as $item) {
            if ($item['pid'] == $pid) {
                $arr[] = $item;
                $arr = array_merge($arr, self::simpleTree($items, $item['id']));
            }
        }
        return $arr;
    }

    /**
     * 生成去除自己以及子集的一维树形结构
     *
     * @param array $items
     * @param $self_id
     * @return array
     */
    static public function simpleTreeExceptSelf(array $items, $self_id)
    {
        $childsId = self::getChildsId($items, $self_id);
        array_push($childsId, $self_id);
        $items = self::exceptChilds($items, $childsId);
        return self::simpleTree($items);
    }

    /**
     * 传递一个父级分类id,返回所有子分类
     *
     * @param $items
     * @param $pid
     * @return array
     */
    static private function getChilds($items, $pid)
    {
        $arr = array();
        foreach ($items as $k => $v) {
            if ($v['pid'] == $pid) {
                $arr[] = $v;
                $arr = array_merge($arr, self::getChilds($items, $v['id']));
            }
        }
        return $arr;
    }

    /**
     * 传递一个父级分类id,返回所有子分类id
     *
     * @param $items
     * @param $pid
     * @return array
     */
    static private function getChildsId($items, $pid)
    {
        $arr = array();
        foreach ($items as $v) {
            if ($v['pid'] == $pid) {
                $arr[] = $v['id'];
                $arr = array_merge($arr, self::getChildsId($items, $v['id']));
            }
        }
        return $arr;
    }

    /**
     * 从二维数组中去除含有指定ids的数组
     *
     * @param $arr2d
     * @param $ids
     * @return array
     */
    static private function exceptChilds($arr2d, $ids)
    {
        $arr = array();
        foreach ($arr2d as $a2) {
            if (!in_array($a2['id'], $ids)) {
                $arr[] = $a2;
            }
        }
        return $arr;
    }
}