<div class="btn-group btn-group-xs pull-right">
    @if(can('foundation.i.index'))
        <a href="{{route('foundation.i.index')}}" class="btn btn-default">个人资料</a>
    @endif
    @if(can('foundation.i.password'))
        <a href="{{route('foundation.i.password')}}" class="btn btn-default">修改密码</a>
    @endif
    @if(can('foundation.i.map'))
        <a href="{{route('foundation.i.map')}}" class="btn btn-default">功能地图</a>
    @endif
</div>