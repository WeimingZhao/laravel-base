@extends('admin.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="box-title"> 请填写新密码</div>
        </div>
        <div class="box-body">
            <form class="form-horizontal ajaxForm" method="post" action="{{route('foundation.user.password')}}">
                <input type="hidden" name="id" value="{{$id}}">
                <div class="form-group">
                    <label class="col-sm-2 control-label">新密码</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <input type="password" class="form-control" name="password" placeholder="6-25位密码" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">确定密码</label>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="与密码输入一致"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-sm btn-primary">确定修改密码</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php echo widget('Admin.JS')->ajaxForm(); ?>
@endsection