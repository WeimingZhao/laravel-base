@extends('admin.layout')
@section('content')
    @include('asset.fileupload')
    <style>
        .imageView {
            height: 100px;
        }
    </style>
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="btn-group btn-group-xs">
                @foreach($groups as $group)
                    @if($group['display']==1)
                        <a href="{{route('foundation.config.group')}}?group={{$group['id']}}" class="btn btn-default btn-sm
                    @if($group_id==$group['id']) active @endif">{{$group['title']}}</a>
                    @endif
                @endforeach
            </div>
        </div>
        <form method="post" class="ajaxForm" action="{{route('foundation.config.group')}}">
            <table class="table table-responsive table-striped">
                <tr>
                    <td>名称</td>
                    <td>调用名</td>
                    <td>配置值</td>
                    <td></td>
                </tr>
                @foreach($list as $item)
                    <tr class="text-left">
                        <td>{{$item['title']}}</td>
                        <td>{{$item['name']}}</td>
                        <td class="text-left" id="view_{{$item['id']}}">
                            @if($item['type']=='text')
                                <input type="text" name="{{$item['id']}}" class="form-control" value="{{$item['value']}}">
                            @elseif($item['type']=='textarea')
                                <textarea name="{{$item['id']}}" class="form-control">{{$item['value']}}</textarea>
                            @elseif($item['type']=='integer')
                                <input type="number" name="{{$item['id']}}" class="form-control" value="{{$item['value']}}">
                            @elseif($item['type']=='boolean')
                                <label class="radio-inline">
                                    <input type="radio" name="{{$item['id']}}" @if($item['value']==1) checked @endif> 是
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="{{$item['id']}}" @if($item['value']==0) checked @endif> 是
                                </label>
                            @elseif($item['type']=='image' && !empty($item['value']))
                                <img src="{{route_image($item['value'],200)}}" class="imageView">
                            @endif
                        </td>
                        <td>
                            @if($item['type']=='image')
                                <input type="hidden" name="{{$item['id']}}" value="{{$item['value']}}"
                                       id="image_{{$item['id']}}">
                                <input type="file" name="upfile" id="upfile_{{$item['id']}}">
                                <script type="text/javascript">
                                    $(function () {
                                        $('#upfile_{{$item['id']}}').fileuploadApp({
                                            'type': 'image',
                                            'val': '#image_{{$item['id']}}',
                                            'view': '#view_{{$item['id']}}',
                                        });
                                    })
                                </script>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="box-footer">
                <button type="submit" class="btn btn-sm btn-primary">保存配置值</button>
            </div>
        </form>
        <?php echo widget('Admin.JS')->ajaxForm();?>
    </div>
@endsection