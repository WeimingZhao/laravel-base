@extends('pc/layout')


@section('content')
    <div class="login-box-body">
        <p class="login-box-msg">欢迎登录后台管理系统</p>

        <form action="{{route('foundation.auth.login')}}" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="username" @if(session('username')) value="{{session('username')}}"
                       @endif class="form-control"
                       placeholder="登录名" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="密码" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <input type="text" name="captcha" class="form-control" placeholder="验证码" required>
                </div>
                <div class="col-xs-4">
                    <img src="{{captcha_src('flat')}}" height="34" id="flat"
                         onclick="this.src='{{captcha_src('flat')}}'+Math.random()">
                </div>
                <div class="col-xs-4">
                    <a href="javascript:void(0)"
                       onclick="document.getElementById('flat').src='{{captcha_src()}}'+Math.random()">点击更换验证码</a>
                </div>
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
            </div>
        </form>
    </div>


        <div class="col-sm-12">
            @include('asset.ueditor')
            <div class="box box-primary">
                <div class="box-header">ueditor</div>
                <div class="box-body">
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="content" type="text/plain"></script>
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                        var ue = UE.getEditor('container');
                    </script>
                </div>
            </div>
        </div>

@endsection