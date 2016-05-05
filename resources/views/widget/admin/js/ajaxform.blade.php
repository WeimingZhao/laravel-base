<script type="text/javascript" src="{{asset('plugins/jqueryform/jquery.form.min.js')}}"></script>
<script type="text/javascript">
    function redirect(url) {
        if (url == '') {
            window.location.reload();
        } else if (url == 'BACK') {
            window.history.go(-1);
        } else {
            window.location.href = url;
        }
    }
    ;
    $(document).ready(function () {

        var options = {
            dataType: 'json',
            beforeSubmit: function () {
                layer.load(1);
            },
            success: function (data) {
                layer.closeAll();
                if (data.state == 'SUCCESS') {
                    layer.msg(data.msg, {icon: 1});
                    setTimeout("redirect('" + data.url + "')", 1500);
                } else {
                    layer.alert(data.msg, {icon: 2, title: '操作失败'});
                }
            },
            error: function () {
                layer.closeAll();
                layer.msg('该模块服务异常！', {icon: 5});
            }
        };

        $('{{$obj}}').ajaxForm(options);
    });
</script>