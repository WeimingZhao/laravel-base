
    <table>
        <form action="{{route('foundation.auth.login')}}" method="post">
            <tr>
                 <div class="col-sm-1">
                        <div style="float:right;">标题：</div>
                </div>   
                <div class="col-sm-11">
                    <div class="form-group"><input type="text" name="title" style="width:40%;"></input></div>
                </div>               
            </tr>
            <tr>
                 <div class="col-sm-1">
                        <div style="float:right;">类型：</div>
                </div>   
                <div class="col-sm-11">
                    <select name="类型" class="col-sm-1">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat" selected="selected">校园动态</option>
                    <option value="audi">Audi</option>
                    </select>                    
                </div>               
            </tr>
             <tr>
                 <div class="col-sm-1">
                    <h1></h1>
                </div>   
                <div class="col-sm-11">
                    <h1></h1>
                </div>               
            </tr> 
            <tr>
                 <div class="col-sm-1">
                        <div style="float:right;">消息对象：</div>
                </div>   
                <div class="col-sm-11">
                    <span style="margin-right:20px;"><input type="checkbox" name="Bike"><label>16级1班</label></span> <span style="margin-right:20px;"><input type="checkbox" name="Bike"><label>16级2班</label></span> <span style="margin-right:20px;"><input type="checkbox" name="Bike"><label>16级3班</label></span>               
                </div>               
            </tr>            
             <tr>
                 <div class="col-sm-1">
                    <h1></h1>
                </div>   
                <div class="col-sm-11">
                    <h1></h1>
                </div>               
            </tr>           
            
            @include('asset.ueditor')
            <tr>
                <div class="col-sm-1">
                        <div style="float:right;">消息内容：</div>
                </div>   
                <div class="col-sm-11">

                    <div class="box box-primary">
                        <div class="box-body">
                            <!-- 加载编辑器的容器 -->
                            <script id="container" name="content" type="text/plain"></script>
                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor('container');
                            </script>
                        </div>
                    </div>
                </div>
            </tr>
            <tr>
                 <div class="col-sm-1">
                        <div style="float:right;"></div>
                </div>   
                <div class="col-sm-11">
                    <div class="form-group"><button type="submit" class="btn btn-primary btn-block btn-flat">发布</button></div>
                </div>               
            </tr>


            
        </from>
    </table>












                        <div class="box box-primary">
                        <div class="box-body">
                        @include('asset.ueditor')
                            <!-- 加载编辑器的容器 -->
                            <script id="container" name="content" type="text/plain"></script>
                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor('container');
                            </script>
                       
                        </div>
                    </div>