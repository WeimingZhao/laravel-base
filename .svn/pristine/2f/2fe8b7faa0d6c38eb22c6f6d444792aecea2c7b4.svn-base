@extends('admin.layout')
@section('content')
    @include('admin.asset.ztree')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="box-title">我的功能地图</div>
        </div>
        <div class="box-body">
            <script type="text/javascript">
                var bk_action_map_ztree_setting = {
                    data: {
                        simpleData: {
                            enable: true
                        }
                    }
                };
                var bk_action_map_ztree_nodes = <?php echo $json; ?>;
                $(document).ready(function () {
                    $.fn.zTree.init($("#bk-action-map-ztree-container"), bk_action_map_ztree_setting, bk_action_map_ztree_nodes);
                });
            </script>
            <div id="bk-action-map-ztree-container" class="ztree"></div>
        </div>
    </div>

@endsection