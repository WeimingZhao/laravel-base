@extends('pc/layout')


@section('content')
 @include('asset.ueditor')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="box-title">发布新闻</div>
    </div>
    <table class="table table-responsive table-striped">
    <form action="/news/test" method="post">
        <tr>
            <td class="col-sm-2">标题：</td>
            <td class="col-sm-10"><input type="text" name="title" class="col-sm-3"></td>
        </tr>
        <tr>
            <td class="col-sm-2">类型：</td>
            <td class="col-sm-10">                    
                    <select name="type" class="col-sm-2">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat" selected="selected">校园动态</option>
                    <option value="audi">Audi</option>
            </td>
        </tr>
        <tr>
            <td class="col-sm-2">消息对象：</td>
            <td class="col-sm-10">
                <span><input type="checkbox" name="Bike"><label>16级1班</label></span><span><input type="checkbox" name="Bike1"><label>16级1班</label></span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-2">消息内容:</td>
            <td class="col-sm-10">           
                        <div class="box box-primary">
                        <div class="box-body">
                       
                            <!-- 加载编辑器的容器 -->
                            <textarea id="content" name="content" style="width: 900px; height: 300px;"></textarea>
                            <script id="content" name="content" type="text/plain"></script>
                            
                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor('content');
                            </script>
                            
                        </div>
                    </div>
            </td>
        </tr>
        <tr>
            <td class="col-sm-2">提交:</td>
            <td class="col-sm-10"><button type="submit" class="btn btn-primary btn-block btn-flat">发布</button></td>
        </tr>
    </form>
    </table>
</div>

@endsection