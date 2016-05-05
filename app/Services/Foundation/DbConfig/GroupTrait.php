<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/24
 * Time: 04:23
 */

namespace App\Services\Foundation\DbConfig;


use App\Models\DbConfig;
use App\Repositories\Foundation\ConfigRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

trait GroupTrait
{
    //必须定义array ids
    //    private $group_ids = [];
    //必须定义,当前路由名称
//    private $route_name='';

    public function group(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->except('upfile');
            return with(new ConfigRepository())->updateGroupValue($data);
        }
        $route_name = $this->route_name;
        $group_ids = $this->group_ids;
        $group_id = $request->has('group') ? $request->get('group') : $group_ids[0];//默认分组
        if (!in_array($group_id, $group_ids)) {
            return abort(404);
        }

        $configs = Config::get('foundation.db_config.groups');
        $groups = [];

        foreach ($configs as $item) {
            if (in_array($item['id'], $group_ids)) {
                $groups[] = $item;
            }
        }
        $list = DbConfig::where('group', $group_id)->orderBy('sort', 'DESC')->get()->toArray();
        return view('admin.foundation.config.grouptrait')->with(compact('group_id', 'list', 'groups', 'route_name'));
    }
}