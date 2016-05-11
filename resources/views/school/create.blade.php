@extends('pc/layout')


@section('content')

<div class="row">
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

</div>

@endsection