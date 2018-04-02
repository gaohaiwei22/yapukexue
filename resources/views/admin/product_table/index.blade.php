@extends('admin.base')
    @section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><button class="btn btn-sm btn-primary" onclick="window.location='{{URL('admin/product_table/create')}}'">发布信息</button></h3>
                  <div class="box-tools">
                    <form action="{{url('admin/product_table')}}" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="product_name" class="form-control input-sm pull-right" placeholder="查找"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">ID</th>  
                      <th>产品名称</th>
                      <th>产品别名</th>
                      <th>产品适用年龄</th>
                      <th>产品图片</th>
                      <th>产品价格</th>
                      <th>添加时间</th>
                      <th>修改时间</th>
                      <th>状态</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    @foreach($product_table as $v)
                    <tr>
                      <td>{{$v->id}}</td>
                      <td>{{$v->product_name}}</td>
                      <td>{{$v->alias}}</td>
                      <td>{{$v->age}}岁</td>
                        <td><img src="{{ env('QINIU_DOMAIN')}}/{{$v->product_picture}}" height="50"/></td>
                      {{--<!--   <td><img src="{{asset('uploads/images')}}/{{$v->picture}}" height="50"/> -->--}}
                        <td>{{$v->Price}}元</td>
                        <td>{{$v->create}}</td>
                        <td>{{$v->product_edit}}</td>
                      <td>@if($v->status==0)通过@elseif($v->status==1)未通过@endif</td>
                      <td><button onclick="doDel({{$v->id}})" class="btn btn-xs btn-danger">删除</button>
						<a href="{{URL('admin/product_table')}}/{{$v->id}}/edit" class="btn btn-xs btn-danger">编辑</a>
						</td>
                    </tr>
                  @endforeach
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
				  {!! $product_table->appends($params)->render() !!}
                </div>
              </div><!-- /.box -->
          
            </div><!-- /.col -->
          </div><!-- /.row -->
         
        </section><!-- /.content -->
        <form action="" style="display:none;" id="mydeleteform" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    @endsection
        
    @section("myscript")
      <script type="text/javascript">
            function doDel(id){
                if(confirm('确定要删除吗？')){
                    $("#mydeleteform").attr("action","{{url('admin/product_table')}}/"+id).submit();
                }
            }
      </script>
    @endsection
  