@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">我的资料</div>
                </div>
                <div class="box-body">
                    <p>用户名: <b>{{$user['username']}}</b></p>
                    <p>真实姓名: <b>{{$user['realname']}}</b></p>
                    <p>上次登录时间: <b>{{$user['last_login']}}</b></p>
                    <p>上次登录IP:<b>{{$user['last_login_ip']}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">登录日志</div>
                </div>
                <table class="table table-responsive table-striped">
                    <tr>
                        <td>#</td>
                        <td>登录时间</td>
                        <td>登录ip</td>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($list as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->ip}}</td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </table>
                <div class="box-footer">
                    <?php echo $list->render(); ?>
                </div>
            </div>
        </div>
    </div>

@endsection