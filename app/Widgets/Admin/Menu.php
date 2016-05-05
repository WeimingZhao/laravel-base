<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/20
 * Time: 21:28
 */

namespace App\Widgets\Admin;


use App\Services\Foundation\Auth\Acl;
use Illuminate\Support\Facades\Route;

/**
 * Class Menu
 * @package App\Widgets\Admin
 *
 * 页面功能菜单,根据权限生成菜单列表,最多支持三级菜单
 */
class Menu
{
    /**
     * 菜单显示标志
     */
    const DISPLAY_NODE = 1;

    /**
     * 一级菜单标志
     */
    const FIRST_LEVEL = 0;

    /**
     * 二级菜单标志
     */
    const SECOND_LEVEL = 1;

    /**
     * 三级菜单标志
     */
    const THIRD_LEVEL = 2;

    /**
     * @var
     */
    private $first_node;

    /**
     * @var
     */
    private $second_node;


    /**
     * @var
     */
    private $current_node;

    /**
     * 当前路由名称
     * @var
     */
    private $currentRouteName;

    /**
     * 一维树形列表
     * @var
     */
    private $list;

    public function __construct()
    {
        $this->list = Acl::simpleAcl();
        $this->currentRouteName = Route::currentRouteName();
        $this->setNode();
    }

    /**
     * 侧面导航菜单,支持两级
     *
     * @return $this
     */
    public function sideMenu()
    {
        $list = Acl::multiAcl();
        return view('widget.admin.menu.sidemenu')
            ->with('list', $list)
            ->with('first_node', $this->first_node)
            ->with('second_node', $this->second_node);
    }

    public function topMenu()
    {
        return view('widget.admin.menu.topmenu')
            ->with('first_node', $this->first_node)
            ->with('second_node', $this->second_node)
            ->with('current_node', $this->current_node);
    }

    /**
     * 设置一二级节点和当前节点
     * @return bool
     */
    private function setNode()
    {
        //获取当前节点
        foreach ($this->list as $item) {
            if ($item['name'] == $this->currentRouteName) {
                $this->current_node = $item;
            }
        }
        //第一级节点不作为实际功能节点,仅作为列表显示
        //当前节点为第二级节点
        if ($this->current_node['level'] == self::SECOND_LEVEL) {
            $this->second_node = $this->current_node;
            foreach ($this->list as $item) {
                if ($item['id'] == $this->current_node['pid']) {
                    $this->first_node = $item;
                }
            }
        }
        //当前节点>=三级节点,使用递归方式获取第1,2级
        if ($this->current_node['level'] >= self::THIRD_LEVEL) {
            $this->recursionNode($this->current_node['pid']);
        }
        return true;
    }

    /**
     * 使用递归方式设置一级,二级节点
     *
     * @param $pid
     * @return bool
     */
    private function recursionNode($pid)
    {
        foreach ($this->list as $item) {
            if ($item['id'] == $pid) {
                $node = $item;
            }
        }

        if ($node['level'] == self::SECOND_LEVEL) {
            $this->second_node = $node;
        } else if ($node['level'] == self::FIRST_LEVEL) {
            $this->first_node = $node;
            return true;
        }
        $this->recursionNode($node['pid']);
    }
}