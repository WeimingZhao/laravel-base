@extends('admin.layout')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">请填写角色信息</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <!-- form start -->
            <form method="post" class="ajaxForm form-horizontal" action="{{route('foundation.role.update')}}">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="" class="control-label col-sm-2">角色名称</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <input type="text" class="form-control" name="title" placeholder="角色名称" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">备注说明</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <textarea class="form-control" name="mark"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary btn-sm">确定修改</button>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript">
            var json = <?php echo $json; ?>;
            appUtils.setFormVal('.ajaxForm', json);
        </script>
    </div><!-- /.box -->
    <?php echo widget('Admin.JS')->ajaxForm(); ?>
@endsection