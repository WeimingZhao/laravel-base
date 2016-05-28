@extends('pc/layout')
@include('asset.ueditor')

@section('content')
 
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="box-title">发布新闻</div>
    </div>

    <form action="/news/create" method="post">
    <table class="table table-responsive table-striped">        
        <tr>
            <td class="col-sm-2">标题：</td>
            <td class="col-sm-10"><input type="text" name="title" class="col-sm-3"></td>
        </tr>
        <tr>
            <td class="col-sm-2">类型：</td>
            <td class="col-sm-10">                    
                    <select name="type" class="col-sm-2">
                    <option value="3">班级动态</option>
                    <option value="2">日常通知</option>
                    <option value="1" selected="selected">校园动态</option>
                    <option value="0">通报警告</option>
            </td>
        </tr>
        <tr>
            <td class="col-sm-2">消息对象：</td>
            <td class="col-sm-10">
                <span><input type="checkbox" name="target_id" value = "1011801001"><label>16级1班</label></span><span><input type="checkbox" name="target_id" value = "1011801001"><label>16级1班</label></span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-2">消息内容:</td>
            <td class="col-sm-10">           
                        <div class="box box-primary">
                        <div class="box-body">
                       
                            <!-- 加载编辑器的容器 -->
                            <textarea id="content" name="content" style="width: 900px; height: 300px;">123123123213</textarea>                                      

                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor("content");
                            </script>
                            
                        </div>
                    </div>
            </td>
        </tr>
        <tr>
            <td class="col-sm-2">提交:</td>
            <td class="col-sm-10"><button type="submit" class="btn btn-primary btn-block btn-flat">发布</button></td>
        </tr>

    </table>
        </form>
</div>

@endsection