@extends('admin.layout')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">请填写功能信息</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form method="post" class="ajaxForm form-horizontal" action="{{route('foundation.access.update')}}">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="parent-level" class="control-label col-sm-2">上级菜单</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <select class="form-control" name="pid">
                            <option value="0">==作为一级菜单==</option>
                            @foreach($list as $item)
                                <option value="{{$item['id']}}">
                                    <?php echo str_repeat('|--', $item['level']); ?>
                                    {{$item['title']}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-2">路由名称</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <input type="text" class="form-control" name="name" placeholder="路由名称:foundation.access.create"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-2">功能名称</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <input type="text" class="form-control" name="title" placeholder="功能名称" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">备注说明</label>
                    <div class="col-sm-10 col-md-8 col-lg-4">
                        <textarea class="form-control" name="mark"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-2">访问授权</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="acl" value="1" checked> 需要授权
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="acl" value="0"> 不需授权
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-2">菜单显示</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="display" value="1" checked> 显示
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="display" value="0"> 不显示
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-2">菜单图标</label>
                    <div class="col-sm-10">
                        <?php $i = 0; ?>
                        @foreach($fontawesome as $item)
                            <label class="radio-inline col-lg-1 col-sm-2 col-xs-3">
                                <input type="radio" name="image" value="{{$item}}" @if($i==0) checked @endif> <i
                                        class="fa fa-{{$item}}"></i>
                            </label>
                            <?php $i++; ?>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2">
                        <button type="submit" class="btn btn-primary btn-sm">修改功能</button>
                    </div>
                </div>
            </form>

        </div>
    </div><!-- /.box -->
    <script>
        var json = <?php echo $json; ?>;
        appUtils.setFormVal('.ajaxForm', json);
    </script>
    <?php echo widget('Admin.JS')->ajaxForm(); ?>

@endsection