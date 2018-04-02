@extends('admin.base')


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">

                        &nbsp; <button class="btn btn-sm btn-primary" onclick="window.location='{{URL('admin/users/create')}}'">发布信息</button>
                        <div class="box-tools">
                            <form action="{{url('admin/users')}}" method="get">
                                <div class="input-group" style="width: 150px;">
                                    <input type="text" name="name" class="form-control input-sm pull-right" placeholder="管理员姓名"/>
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
                                <th>管理员姓名</th>
                                <th>邮箱账号</th>
                                <th>添加时间</th>
                                <th style="width: 170px">操作</th>
                            </tr>
                            @foreach($user as $vo)
                                <tr>
                                    <td>{{ $vo->id }}</td>
                                    <td>{{ $vo->name }}</td>
                                    <td>{{ $vo->email }}</td>
                                    <td>{{ $vo->create_at }}</td>
                                    <td><button class="btn btn-xs btn-danger" onclick="doDel({{ $vo->id }})">删除</button>
                                        <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('admin/users')}}/{{ $vo->id }}/edit'">编辑</button>
                                        <button class="btn btn-xs btn-success" onclick="loadRole({{ $vo->id}},'{{ $vo->name}}')">分配角色</button></td>
                                </tr>
                            @endforeach

                        </table>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {!! $user->appends($params)->render() !!}
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
        <div class="modal-dialog" role="document">
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
                    <button type="button" onclick="saveRole()" class="btn btn-primary">保存</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
            if(confirm('确定要删除吗？')){
                $("#mydeleteform").attr("action","{{url('admin/users')}}/"+id).submit();
            }
        }

        //加载角色信息
        function loadRole(uid,name){
            $("#exampleModalLabel").html(name+"的角色分配");
            $("#exampleModal").modal("show");
            $.ajax({
                url:"{{URL('admin/users/loadRole')}}/"+uid,
                type:"get",
                dataType:"html",
                async:true,
                success:function(data){
                    $("#exampleModal .modal-body").html(data);
                },

            });

        }

        //保存角色信息
        function saveRole(){
            $.ajax({
                url:"{{URL('admin/users/saveRole')}}",
                type:"post",
                dataType:"html",
                data:$("#rolelistform").serialize() ,
                async:true,
                success:function(data){
                    $('#exampleModal').modal('hide');
                    Modal.alert({msg:data,title: ' 信息提示',btnok: '确定',btncl:'取消'});
                },
            });

        }
    </script>
@endsection