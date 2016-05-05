<section class="content-header">
    <h1>
        {{$current_node['title']}}
        <small>{{$current_node['mark']}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{$first_node['title']}}</a></li>
        @if($second_node!=$current_node)
            <li><a href="#">{{$second_node['title']}}</a></li>
        @endif
        <li class="active">{{$current_node['title']}}</li>
    </ol>
</section>