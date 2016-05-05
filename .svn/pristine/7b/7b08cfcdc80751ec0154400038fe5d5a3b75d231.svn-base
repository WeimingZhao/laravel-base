<script type="text/javascript">
    function ajaxDelete(id) {
        layer.confirm("确定删除?<br/>警告:删除后数据不可恢复!", {
            btn: ['确定', '取消'],
            icon: 3,
            title: '提示消息'
        }, function () {
            $.post("{{$url}}", {id: id}, function (data) {
                if (data.state == 'SUCCESS') {
                    layer.msg(data.msg, {icon: 1});
                    setTimeout("window.location.reload()", 1500);
                } else {
                    layer.alert(data.msg, {icon: 2});
                }
            }, "json");
        }, function () {
        });
    }
</script>