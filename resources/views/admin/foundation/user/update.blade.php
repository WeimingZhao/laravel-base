@extends('admin.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="box-title"> 请填写用户信息</div>
        </div>
        <div class="box-body">
            <form class="form-horizontal ajaxForm" method="post" action="{{route('foundation.user.update')}}">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">用户角色</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <select class="form-control" name="role_id">
                            @foreach($roles as $role)
                                <option value="{{$role['id']}}">{{$role['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <input type="text" class="form-control" name="username" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">真实姓名</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <input type="text" class="form-control" name="realname" placeholder="必须输入,2-16个中英文字符" required>
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
    <?php echo widget('Admin.JS')->ajaxForm(); ?>
@endsection