@extends('layouts/layout')


@section('content')
<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<?php for($i=1;$i <21;$i++){ ?>

            <a href="#">
                <table class="doc-box">
                    <tr>
                        <td ><img src="/uploads/image/QR Code.jpg"></td>
                        <td class="doc-info">
                            <div class="doc-title">论自学的重要性{{$i}}</div>
                            <div class="doc-description">样式测试for论自学的重要性{{$i}}</div>
                        </td>
                    </tr>
                </table>
            </a>
 <?php }?>          
                <div class="pagination">
                            <a href="javascript:void(0);" class="prev disabled">上一页</a>
                                        <a href="javascript:void(0);" class="next disabled">下一页</a>
                    </div>
                    <div id="mcover" onclick="document.getElementById('mcover').style.display='';" style="display:none;">
    <img src="/images/guide.png"/>
</div>

@endsection