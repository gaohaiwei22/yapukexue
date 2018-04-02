@extends('admin.base')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><button class="btn btn-primary" onclick="window.location='{{URL('admin/node/create')}}'">添加节点</button></h3>
                    <div class="box-tools">
                        <form action="{{url('admin/node')}}" method="get">
                            <div class="input-group" style="width: 150px;">
                                <input type="text" name="name" class="form-control input-sm pull-right" placeholder="节点名称"/>
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
                      <th style="width:60px">id号</th>
                      <th>节点名称</th>
                      <th>请求方式</th>
                      <th>请求地址</th>
                      <th>状态</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    @foreach($nodes as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->method }}</td>
                            <td>{{ $v->url }}</td>
                            <td>@if($v->state==0)启用@elseif($v->state==1)禁用@endif</td>
                            <td><button class="btn btn-xs btn-danger" onclick="doDel({{ $v->id }})">删除</button>
                                <a href="{{URL('admin/node')}}/{{$v->id}}/edit" class="btn btn-xs btn-danger">编辑</a></td>
                        </tr>
                    @endforeach
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  {!! $nodes->appends($params)->render() !!}
                </div>
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection

    @section('myscript')
    <form action="" style="display:none;" id="mydeleteform" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="_method" value="DELETE">
    </form>
    <script type="text/javascript">
        function doDel(id){
            if(confirm('确定要删除吗？')){
                $("#mydeleteform").attr("action","{{url('admin/node')}}/"+id).submit();
            }
        }
    </script>
    @endsection