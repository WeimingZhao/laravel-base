<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    @foreach($list as $item)
        @if($item['display']==1)
            <li class="treeview @if($first_node['name']==$item['name']) active @endif">
                <a href="#">
                    <i class="fa fa-{{$item['image']}}"></i> <span>{{$item['title']}}</span> <i
                            class="fa fa-angle-left pull-right"></i>
                </a>
                @if(!empty($item['son']))
                    <ul class="treeview-menu">
                        @foreach($item['son'] as $second)
                            @if($second['display']==1)
                                <li @if($second_node['name'] == $second['name']) class="active" @endif>
                                    <a href="{{route($second['name'])}}"><i
                                                class="fa <?php echo 'fa-' . $second['image'];?>"></i>{{$second['title']}}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </li>
        @endif
    @endforeach
</ul>