<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/21
 * Time: 03:22
 */

namespace App\Widgets\Admin;


class Button
{
    private $can_create = null;

    private $str_create = null;

    private $can_update = null;

    private $can_delete = null;

    private $can_sort = null;

    private $can_other = null;

    public function create($route_name, $title = '添加')
    {
        if ($this->can_create == null && can($route_name)) {
            $this->can_create = $route_name;
            $this->str_create = '<a href="' . route($route_name) . '" class="btn btn-primary btn-xs pull-right">' . $title . '</a>';
            return $this->str_create;
        } else if ($this->can_create == $route_name) {
            return $this->str_create;
        } elseif (can($route_name)) {
            $this->can_create = $route_name;
            $this->str_create = '<a href="' . route($route_name) . '" class="btn btn-primary btn-xs pull-right">' . $title . '</a>';
        }
        return null;
    }

    public function update($route_name, $id, $title = '编辑')
    {
        $str = ' <a href="' . route($route_name) . '?id=' . $id . '"class="btn btn-default btn-xs"><i class="fa fa-edit"></i> ' . $title . '</a>';
        if ($this->can_update == null && can($route_name)) {
            $this->can_update = $route_name;
            return $str;
        } elseif ($this->can_update == $route_name) {
            return $str;
        } elseif (can($route_name)) {
            $this->can_update = $route_name;
            return $str;
        }
        return null;
    }

    public function delete($route_name, $id, $title = '删除')
    {
        $str = '<a href="javascript:ajaxDelete(' . $id . ')" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> ' . $title . '</a>';
        if ($this->can_delete == null && can($route_name)) {
            $this->can_delete = $route_name;
            return $str;
        } elseif ($this->can_delete == $route_name) {
            return $str;
        } else if (can($route_name)) {
            $this->can_delete = $route_name;
            return $str;
        }
        return null;
    }

    public function sort($route_name, $title = '排序')
    {
        $str = '<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-sort"></i> ' . $title . '</button>';
        if ($this->can_sort == null && can($route_name)) {
            $this->can_sort = $route_name;
            return $str;
        } elseif ($this->can_sort == $route_name) {
            return $str;
        } else if (can($route_name)) {
            $this->can_sort = $route_name;
            return $str;
        }
        return null;
    }

    public function other($route_name, $id, $title, $icon = 'cube', $class = 'btn btn-default btn-xs')
    {
        $str = ' <a href="' . route($route_name) . '?id=' . $id . '"class="' . $class . '"><i class="fa fa-' . $icon . '"></i> ' . $title . '</a>';
        if ($this->can_other == null && can($route_name)) {
            $this->can_other = $route_name;
            return $str;
        } elseif ($this->can_other == $route_name) {
            return $str;
        } elseif (can($route_name)) {
            $this->can_other = $route_name;
            return $str;
        }
        return null;
    }

}