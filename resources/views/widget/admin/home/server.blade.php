<div class="box box-primary">
    <div class="box-header with-border">
        <div class="box-title">服务器信息</div>
    </div>
    <table class="table table-responsive table-striped">
        <tr>
            <td>操作系统:</td>
            <td>{{$s['os']}}</td>
        </tr>
        <tr>
            <td>Web服务器:</td>
            <td>{{$s['software']}}</td>
        </tr>
        <tr>
            <td>PHP版本:</td>
            <td>{{$s['php_version']}}</td>
        </tr>
        <tr>
            <td>MYSQL版本:</td>
            <td>{{$s['mysql_version']}}</td>
        </tr>
        <tr>
            <td>Zend版本</td>
            <td>{{$s['zend_version']}}</td>
        </tr>
        <tr>
            <td>域名:</td>
            <td>{{$s['host']}}</td>
        </tr>
        <tr>
            <td>IP:</td>
            <td>{{$s['ip']}}</td>
        </tr>
        <tr>
            <td>端口</td>
            <td>{{$s['port']}}</td>
        </tr>
        <tr>
            <td>文件上传限制:</td>
            <td>{{$s['upload_max_filesize']}}</td>
        </tr>
        <tr>
            <td>GD版本:</td>
            <td>{{$s['gd_version']}}</td>
        </tr>

    </table>
</div>