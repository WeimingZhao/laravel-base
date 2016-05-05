@extends('admin.layout')
@section('content')
    @include('admin.asset.ztree')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="box-title">[{{$role->title}}]的权限列表</div>
        </div>
        <div class="box-body">
            <script type="text/javascript">
                var setting = {
                    check: {
                        enable: true,
                        chkboxType: {"Y": "ps", "N": "s"}
                    },
                    data: {
                        simpleData: {
                            enable: true
                        }
                    }
                };
                var ztree_Nodes = <?php echo $json; ?>;

                $(document).ready(function () {
                    $.fn.zTree.init($("#tree-container"), setting, ztree_Nodes);
                    //获取所有选中的节点
                    function getAllchecked() {
                        var treeObj = $.fn.zTree.getZTreeObj('tree-container');
                        var nodes = treeObj.getCheckedNodes(true);
                        var checkedNodes = new Array();
                        for (var i = 0; i < nodes.length; i++) {
                            checkedNodes.push(nodes[i].id);
                        }
                        return checkedNodes;
                    }

                    $('#ajaxSend').click(function () {
                        var ids = getAllchecked();
                        console.log(ids);
                        var options = {
                            url: "admin/foundation/role/access?id=<?php echo $role->id; ?>",
                            type: 'post',
                            postParam: {ids: ids},
                            callback: function (data) {
                                if (data.state == 'SUCCESS') {
                                    layer.msg(data.msg, {icon: 1});
                                    setTimeout("appUtils.reloadPage()", 1500);
                                } else {
                                    layer.msg(data.msg, {icon: 2});
                                }
                            }
                        };
                        appUtils.doAjax(options);
                    });
                });
            </script>
            <ul id="tree-container" class="ztree"></ul>
            <div class="box-footer">
                <button type="button" id="ajaxSend" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> 保存
                </button>
            </div>
        </div>
    </div>
@endsection