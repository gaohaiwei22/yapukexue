@extends('admin.base')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border" style="text-align:center">
                  <h3 class="box-title" ><a href="{{URL('admin/type/create')}}" class="btn btn-xs btn-danger">添加类别</a></i> 无限分类管理</h3>
                  <div class="box-tools">
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr> 
                      <th>分类Id号</th>
                      <th>分类名称</th>
                      <th>父类Id号</th>    
                      <th>分类路径</th>  
                      <th style="width: 170px;text-align:center">操作</th>
                    </tr>
                    @foreach($list as $v)
                    <tr>
                      <td>{{$v->id}}</td>
                      <td>{{$v->name}}</td>
                      <td>{{$v->pid}}</td>
                      <td>{{$v->path}}</td>                
                      <td><button onclick="doDel({{$v->id}})" class="btn btn-xs btn-danger">删除</button>
                      <a href="{{URL('admin/type/create')}}/{{$v->id}}" class="btn btn-xs btn-danger">添加子类别</a>
					  <a href="{{URL('admin/type')}}/{{$v->id}}/edit" class="btn btn-xs btn-danger">编辑</a>
					  </td>
                    </tr>
                  @endforeach
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
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
                    $("#mydeleteform").attr("action","{{url('admin/type')}}/"+id).submit(); 
                }
            }
      </script>
    @endsection
  