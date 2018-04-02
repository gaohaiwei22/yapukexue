@extends('admin.base')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <button class="btn btn-primary" onclick="window.location='{{URL('admin/role/create')}}'">发布信息</button>
                        <div class="box-tools">
                            <form action="{{url('admin/role')}}" method="get">
                                <div class="input-group" style="width: 150px;">
                                    <input type="text" name="name" class="form-control input-sm pull-right" placeholder="角色名称"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" style="text-align:center">
                            <style>
                                .table tr th,td{
                                    text-align:center;
                                }
                            </style>
                            <tr>
                                <th style="width:60px">id号</th>
                                <th>角色名称</th>
                                <th>添加时间</th>
                                <th>状态</th>
                                <th style="width: 170px">操作</th>
                            </tr>
                            @foreach($roles as $vo)
                                <tr>
                                    <td>{{ $vo->id }}</td>
                                    <td>{{ $vo->name }}</td>
                                    <td>{{ $vo->create_at}}
                                    <td>@if($vo->state==0)启用@elseif($vo->state==1)禁用@endif</td>
                                    <td><button class="btn btn-xs btn-danger" onclick="doDel({{ $vo->id }})">删除</button>
                                        <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('/admin/role')}}/{{ $vo->id }}/edit'">编辑</button>
                                        <button class="btn btn-xs btn-success" onclick="loadNode({{ $vo->id }},'{{ $vo->name}}')">分配节点</button></td>
                                </tr>
                            @endforeach

                        </table>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {!! $roles->appends($params)->render() !!}
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document" style="width:1000px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                </div>
                <div class="modal-body">
                    <!-- 此处填充 -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" onclick="saveNode()" class="btn btn-primary">保存</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
            if(confirm('确定要删除吗？')){
                $("#mydeleteform").attr("action","{{url('admin/role')}}/"+id).submit();
            }
        }

        function loadNode(rid,name){
            $("#exampleModalLabel").html(name+"的操作节点管理");
            $("#exampleModal").modal("show");
            $.ajax({
                url:"{{URL('admin/role/loadNode')}}/"+rid,
                type:"get",
                dataType:"html",
                async:true,
                success:function(data){
                    $("#exampleModal .modal-body").html(data);
                },
            });
        }

        //保存节点信息
        function saveNode(){
            $.ajax({
                url:"{{URL('admin/role/saveNode')}}",
                type:"post",
                dataType:"html",
                data:$("#nodelistform").serialize() ,
                async:true,
                success:function(data){
                    $('#exampleModal').modal('hide');
                    Modal.alert({msg:data,title: ' 信息提示',btnok: '确定',btncl:'取消'});
                },
            });

        }

    </script>
@endsection