@extends('layouts/layout')


@section('content')
<?php  


foreach ($detail as $key => $value) {
	# code...


 ?>
 <div class = "title" style="text-align:center;font-size:1.5em;font-weight:bold;">{{$value['title']}}</div>
 <div class = "date" style="text-align:center;font-size:1.5em;font-weight:bold;">{{$value['created_at']}}</div>
 <div class = "context"><?php echo $value['content']; ?></div>
<?php

}

?>
@endsection