<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台系统登录</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('style/admin/css/AdminLTE.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
@if(session('msg'))
    <script type="text/javascript">
        alert("{{session('msg')}}");
    </script>
@endif


<div class="login-box">
    <div class="login-logo">
        <a href="{{route('foundation.auth.login')}}">后台管理系统</a>
    </div>
    <!-- /.login-logo -->
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
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 2.1.4 -->
<script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>

</body>
</html>
