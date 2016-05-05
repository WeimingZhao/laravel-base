@extends('admin.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="box-title">请填写配置信息</div>
        </div>
        <div class="box-body">
            <form class="form-horizontal ajaxForm" method="post" action="{{route('foundation.config.update')}}">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label class="col-sm-2 control-label">配置组</label>
                    <div class="col-sm-10">
                        @foreach($groups as $group)
                            <label class="radio-inline">
                                <input type="radio" name="group" value="{{$group['id']}}"
                                       @if($group['id']==1) checked @endif> {{$group['title']}}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">配置名称</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <input type="text" class="form-control" name="title" placeholder="配置名称" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">调用关键字</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <input type="text" class="form-control" name="name" placeholder="大小写字母,数字,下划线" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">配置类型</label>
                    <div class="col-sm-10">
                        @foreach($types as $type)
                            <label class="radio-inline">
                                <input type="radio" name="type" value="{{$type['name']}}"
                                       @if($type['id']==1) checked @endif> {{$type['title']}}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">配置值</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <input type="text" class="form-control" name="value" placeholder="图片配置类型在配置组页面赋值">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">配置说明</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <textarea name="mark" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-sm btn-primary">确定修改</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var json = <?php echo $json; ?>;
        appUtils.setFormVal('.ajaxForm', json);
    </script>
    <?php echo widget('Admin.JS')->ajaxForm();?>
@endsection