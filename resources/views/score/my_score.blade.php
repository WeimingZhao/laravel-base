@extends('layouts/layout')


@section('content')
<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<table class="table table-striped table-condensed table-bordered">
  <caption>学生成绩单</caption>
  <thead>
     <tr>
          <td >姓名</td>
          <td class="doc-info">科目</td>
          <td class="doc-info">分数</td>
          <td class="doc-info">时间</td>
          <td class="doc-info">类型</td>
           
      </tr>
  </thead>
<?php for ($i = 0; $i < 11; $i++) {
	# code...
 ?>
    <tbody>
      <tr>
          <td >赵伟名</td>
          <td class="doc-info">数学</td>
          <td class="doc-info">97</td>
          <td class="doc-info">2016/08/11</td>
          <td class="doc-info">单元测验</td>           
      </tr>
      <tr>
          <td >赵伟名</td>
          <td class="doc-info">数学</td>
          <td class="doc-info">97</td>
          <td class="doc-info">2016/08/11</td>
          <td class="doc-info">单元测验</td>
           
      </tr>
    </tbody>

 <?php } ?>          
</table>
                <div class="pagination">
                            <a href="javascript:void(0);" class="prev disabled">上一页</a>
                                        <a href="javascript:void(0);" class="next disabled">下一页</a>
                    </div>
                    <div id="mcover" onclick="document.getElementById('mcover').style.display='';" style="display:none;">
    <img src="/images/guide.png"/>
</div>

@endsection