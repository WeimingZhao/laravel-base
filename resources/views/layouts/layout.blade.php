<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link  rel="stylesheet" href="{{asset('style/home/css/wechat.css')}}">
    <link  rel="stylesheet" href="{{asset('style/home/css/list.css')}}" >
    <!-- edit for wechat -->
    <script src="http://121.40.100.77:8090/js/jquery.min.js"></script>
    <script src="http://121.40.100.77:8090/js/jquery.imgautosize.js"></script>
</head>
<body>
<!-- Site wrapper -->
   @include('layouts.header') 
<div class="container">



            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class = "content-padding-delete"></div>

                <!-- Main content -->
        <section>
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin.footer')

            <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
</div>
<!-- ./wrapper -->
<div class="bottom-bar" id="bottom-bar">

    <a href="http://120.26.241.29/"><i class="fa fa-bank"></i>

        <p>我的学校</p></a>
    <a href="http://120.26.241.29/"><i class="fa fa-users"></i>

        <p>我的班级</p></a>
    <a href="http://120.26.241.29/"><i class="fa fa-male"></i>

        <p>个人中心</p></a>        
    <a href="javascript:void(0);" id="top"><i class="fa fa-chevron-circle-up"></i>

        <p>回到顶部</p></a>
    <a href="javascript:location.reload();">
        <i class="fa fa-refresh"></i>

        <p>刷新</p>
    </a>
</div>
<script>
    $('#top').click(function () {
        $('html,body').animate({scrollTop: '0px'}, 1000);
        return false;
    });
    $('#bottom-search').click(function(){
        if($(this).attr('flag')=='show'){
            $('#msearch').css('display','block');
            $('#msearch input').focus();
            $(this).attr('flag','hidden');
        }else{
            $('#msearch').css('display','none');
            $(this).attr('flag','show');
        }
    });
</script>
</body>
</html>


