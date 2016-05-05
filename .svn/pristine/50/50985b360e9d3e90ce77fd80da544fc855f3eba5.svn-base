@extends('admin.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-title">系统用户管理</div>
            <?php echo widget('Admin.Button')->create('foundation.user.create', '添加用户'); ?>
        </div>
        <table class="table table-responsive table-striped">
            <tr class="text-center">
                <td width="60">#</td>
                <td>用户名</td>
                <td>真实姓名</td>
                <td>角色</td>
                <td width="100">操作</td>
            </tr>
            @foreach($list as $item)
                <tr class="text-center">
                    <td>{{$item->id}}</td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->realname}}</td>
                    <td>
                        @foreach($roles as $role)
                            @if($role['id']==$item->role_id)
                                {{$role['title']}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @if(can_user($item['id']))
                            <?php echo widget('Admin.Button')->other('foundation.user.password', $item['id'], '', 'key'); ?>
                            <?php echo widget('Admin.Button')->update('foundation.user.update', $item['id'], ''); ?>
                            <?php echo widget('Admin.Button')->delete('foundation.user.delete', $item['id'], ''); ?>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <?php echo widget('Admin.JS')->ajaxDelete(route('foundation.user.delete'));?>
@endsection