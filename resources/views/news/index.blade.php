@extends('layouts/layout')


@section('content')
<!-- Stack the columns on mobile by making one full-width and the other half-width -->

<?php foreach ($list as $key => $value) {
	# code...
 ?>

            <a href="/news/detail?id={{$value['id']}}">
                <table class="doc-box">
                    <tr>
                        <td ><img src="/uploads/image/QR Code.jpg"></td>
                        <td class="doc-info">
                            <div class="doc-title">{{$value['title']}}</div>
                            <div class="doc-description">{{$value['title']}}</div>
                        </td>
                    </tr>
                </table>
            </a>
 <?php } ?>          
                <div class="pagination">
                            <a href="javascript:void(0);" class="prev disabled">上一页</a>
                                        <a href="javascript:void(0);" class="next disabled">下一页</a>
                    </div>
                    <div id="mcover" onclick="document.getElementById('mcover').style.display='';" style="display:none;">
    <img src="/images/guide.png"/>
</div>

@endsection