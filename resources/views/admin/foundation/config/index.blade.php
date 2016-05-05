@extends('admin.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="btn-group btn-group-xs">
                @foreach($groups as $group)
                    <a href="{{route('foundation.config.index')}}?group={{$group['id']}}" class="btn btn-default btn-sm
                    @if($group_id==$group['id']) active @endif">{{$group['title']}}</a>
                @endforeach
            </div>
            <?php echo widget('Admin.Button')->create('foundation.config.create', '添加配置');?>
        </div>
        <form method="post" class="ajaxForm" action="{{route('foundation.config.sort')}}">
            <table class="table table-responsive table-striped">
                <tr class="text-center">
                    <td width="70">排序</td>
                    <td>名称</td>
                    <td>调用名</td>
                    <td>配置值</td>
                    <td width="130">操作</td>
                </tr>
                @foreach($list as $item)
                    <tr class="text-center">
                        <td>
                            <input type="number" class="text-center" name="{{$item['id']}}" value="{{$item['sort']}}"
                                   style="width: 60px;">
                        </td>
                        <td>{{$item['title']}}</td>
                        <td>{{$item['name']}}</td>
                        <td class="text-left">
                            @if($item['type']=='image')
                                @if(!empty($item['value']))
                                    <img src="{{route_image($item['value'],'200')}}" height="100">
                                @endif
                            @else
                                {{$item['value']}}
                            @endif
                        </td>
                        <td>
                            <?php echo widget('Admin.Button')->update('foundation.config.update', $item['id']);?>
                            <?php echo widget('Admin.Button')->delete('foundation.config.delete', $item['id']);?>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="box-footer">
                <?php echo widget('Admin.Button')->sort('foundation.config.sort');?>
            </div>
        </form>
    </div>
    <?php echo widget('Admin.JS')->ajaxDelete(route('foundation.config.delete'));?>
    <?php echo widget('Admin.JS')->ajaxForm();?>
@endsection