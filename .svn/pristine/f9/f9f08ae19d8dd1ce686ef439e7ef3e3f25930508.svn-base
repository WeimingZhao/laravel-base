@extends('admin.layout')

@section('content')
    @include('asset.fileupload')
    <div class="row">
        <div class="col-sm-6">
            <?php echo widget('Admin.Home')->server(); ?>
        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">菜单列表</div>
                    <a href="" class="btn btn-primary btn-xs pull-right">新建菜单</a>
                </div>
                <div class="box-body">
                    <form method="post" action="{{route('file.upload.uploader')}}?action=image"
                          enctype="multipart/form-data">
                        <input type="file" name="upfile">
                        <input type="submit" name="submit" value="submit">
                    </form>
                </div>
                <div class="box-body">
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <!-- The file input field used as target for the file upload widget -->
                    <input class="fileupload" type="file" name="upfile" multiple>
                    <input class="imageupload" type="file" name="upfile" multiple>
                    <br>
                    <input type="text" name="filevalue" class="fileValue" id="imageValue">
                    <!-- The global progress bar -->
                    <!-- The container for the uploaded files -->
                    <div id="files" class="files"></div>
                </div>
                <script>
                    $(function () {
                        $('.imageupload').fileuploadApp({
                            'type': 'image',
                            'val': '#imageValue',
                            'view': '#files'
                        });
                        $('.fileupload').fileuploadApp({
                            'val': '#imageValue',
                            'view': '#files'
                        });
                    });
                </script>
            </div>
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

        <div class="col-sm-12">
            @include('asset.umeditor')

            <script type="text/plain" id="myEditor" style="width:100%; height:300px;"></script>
            <script type="text/javascript">
                var um = UM.getEditor('myEditor');
            </script>
        </div>
    </div>
@endsection