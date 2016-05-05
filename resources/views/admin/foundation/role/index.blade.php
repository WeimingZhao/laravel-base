@extends('admin.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-title">角色列表</div>
            <?php echo widget('Admin.Button')->create('foundation.role.create', '添加角色'); ?>
        </div>
        <form method="post" class="ajaxForm" action="{{route('foundation.role.sort')}}">
            <table class="table table-responsive table-striped">
                <tr class="text-center">
                    <td width="75">排序</td>
                    <td>角色名称</td>
                    <td>备注说明</td>
                    <td width="190">操作</td>
                </tr>
                @foreach($list as $item)
                    <tr>
                        <td>
                            <input type="number" name="{{$item['id']}}" value="{{$item['sort']}}" class="text-center"
                                   style="width:60px;">
                        </td>
                        <td>{{$item['title']}}</td>
                        <td>{{$item['mark']}}</td>
                        <td>
                            <?php echo widget('Admin.Button')->other('foundation.role.access', $item['id'], '功能'); ?>
                            <?php echo widget('Admin.Button')->update('foundation.role.update', $item['id']); ?>
                            <?php echo widget('Admin.Button')->delete('foundation.role.delete', $item['id']); ?>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="box-footer">
                <?php echo widget('Admin.Button')->sort('foundation.role.sort'); ?>
            </div>
        </form>
    </div>
    <?php echo widget('Admin.JS')->ajaxDelete(route('foundation.role.delete')); ?>
    <?php echo widget('Admin.JS')->ajaxForm(); ?>
@endsection