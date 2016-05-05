@extends('admin.layout')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">用户登录日志</div>
    <table class="table table-responsive table-striped">
        <tr>
            <td>#</td>
            <td>用户名</td>
            <td>登录时间</td>
            <td>登录IP</td>
        </tr>
        @foreach($logs as $log)
            <tr>
                <td>{{$log->id}}</td>
                <td>{{$log->username}}</td>
                <td>{{$log->created_at}}</td>
                <td>{{$log->ip}}</td>
            </tr>
            @endforeach
    </table>
    <div class="box-footer">
        <?php echo $logs->render();?>
    </div>
</div>
@endsection