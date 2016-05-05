<?php

namespace App\Http\Controllers\Admin\Foundation;

use App\Models\DbConfig;
use App\Repositories\Foundation\ConfigRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
     * @var ConfigRepository
     */
    private $repository;

    /**
     * @var
     */
    private $groups;

    /**
     * @var
     */
    private $types;

    public function __construct(ConfigRepository $repository)
    {
        $this->repository = $repository;
        $db_config = config('foundation.db_config');
        $this->groups = $db_config['groups'];
        $this->types = $db_config['types'];
        view()->share('groups', $this->groups);
        view()->share('types', $this->types);
    }

    public function index(Request $request)
    {
        $group_id = !empty($request->get('group')) ? $request->get('group') : 1;//默认group 1
        $list = DbConfig::where('group', $group_id)->orderBy('sort', 'DESC')->get();
        return view('admin.foundation.config.index')->with(compact('group_id', 'list'));
    }

    public function create(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->only(['group', 'title', 'name', 'type', 'value', 'mark']);
            return $this->repository->create($data);
        }
        return view('admin.foundation.config.create');
    }

    public function update(Request $request)
    {
        $id = intval($request->get('id'));
        if ($request->method() == 'POST') {
            $data = $request->only(['group', 'title', 'name', 'type', 'value', 'mark']);
            return $this->repository->update($id, $data);
        }
        $json = DbConfig::findOrFail($id)->toJson();
        return view('admin.foundation.config.update')->with(compact('json'));
    }

    public function delete(Request $request)
    {
        $id = intval($request->get('id'));
        return $this->repository->delete($id);
    }

    public function sort(Request $request)
    {
        $data = $request->all();
        return $this->repository->sort($data);
    }

    public function group(Request $request)
    {
        $group_id = !empty($request->get('group')) ? $request->get('group') : 1;//默认group 1
        if ($request->method() == 'POST') {
            $data = $request->except('upfile');
            return $this->repository->updateGroupValue($data);
        }
        $list = DbConfig::where('group', $group_id)->orderBy('sort', 'DESC')->get()->toArray();
        return view('admin.foundation.config.group')->with(compact('group_id', 'list'));
    }

}
