@extends('admin.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            {{--<form method="get" class="form-inline">
                <div class="form-group">
                    <label for="exampleInputName2">操作名称</label>
                    <input type="text" class="form-control" name="action">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">操作者</label>
                    <input type="email" class="form-control" name="user">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">操作时间</label>
                    <input type="email" class="form-control" name="t_from"> 至
                    <input type="email" class="form-control" name="t_to">
                </div>
                <input type="submit" name="submit" class="btn btn-sm btn-primary" value="查询">
                <input type="reset" name="reset" class="btn btn-sm btn-danger" value="重置">
            </form>--}}
        </div>
        <table class="table table-responsive table-striped">
            <tr>
                <td>#</td>
                <td>操作名称</td>
                <td>操作人</td>
                <td>ip地址</td>
                <td>操作时间</td>
                <td>路由名称</td>
                <td>请求方式</td>
                <td>操作</td>
            </tr>
            @foreach($logs as $log)
                <tr>
                    <td>{{$log->id}}</td>
                    <td>{{$log->action_title}}</td>
                    <td>{{$log->username}}</td>
                    <td>{{$log->ip}}</td>
                    <td>{{$log->created_at}}</td>
                    <td>{{$log->route_name}}</td>
                    <td>{{$log->method}}</td>
                    <td>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="box-footer">
            <?php echo $logs->render();?>
        </div>
    </div>
@endsection