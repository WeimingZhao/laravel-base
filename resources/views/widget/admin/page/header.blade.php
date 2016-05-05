<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{--<img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">--}}
                <span class="hidden-xs">{{$user['username']}}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- Menu Body -->
                <li class="user-body">
                    @if(can('foundation.i.index'))
                        <div class="col-xs-4 text-center">
                            <a href="{{route('foundation.i.index')}}" class="btn btn-default btn-sm btn-flat">个人资料</a>
                        </div>
                    @endif
                    @if(can('foundation.i.password'))
                        <div class="col-xs-4 text-center">
                            <a href="{{route('foundation.i.password')}}"
                               class="btn btn-default btn-sm btn-flat">修改密码</a>
                        </div>
                    @endif
                    @if(can('foundation.i.map'))
                        <div class="col-xs-4 text-center">
                            <a href="{{route('foundation.i.map')}}" class="btn btn-default btn-sm btn-flat">功能地图</a>
                        </div>
                    @endif
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-right">
                        <a href="{{route('foundation.auth.logout')}}" class="btn btn-default btn-flat">退出</a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>
