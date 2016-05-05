@extends('admin.layout')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-title">功能列表</div>
            <?php echo widget('Admin.Button')->create('foundation.access.create', '添加功能'); ?>
        </div>
        <form method="post" class="ajaxForm" action="{{route('foundation.access.sort')}}">
            <table class="table table-responsive table-striped">
                <tr class="text-center">
                    <td width="75">排序</td>
                    <td>功能名称</td>
                    <td width="130">操作</td>
                </tr>
                @foreach($list as $item)
                    <tr>
                        <td><input type="number" name="{{$item['id']}}" value="{{$item['sort']}}" class="text-center"
                                   style="width:60px;">
                        </td>
                        <td><?php echo str_repeat('┆┄', $item['level']); ?>
                            {{$item['title']}}</td>
                        <td>
                            <?php echo widget('Admin.Button')->update('foundation.access.update', $item['id']); ?>
                            <?php echo widget('Admin.Button')->delete('foundation.access.delete', $item['id']); ?>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="box-footer">
                <?php echo widget('Admin.Button')->sort('foundation.access.sort'); ?>
            </div>
        </form>
    </div>
    <?php echo widget('Admin.JS')->ajaxDelete(route('foundation.access.delete')); ?>
    <?php echo widget('Admin.JS')->ajaxForm(); ?>
@endsection