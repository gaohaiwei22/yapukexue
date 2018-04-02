@extends('admin.base')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        &nbsp; <button class="btn btn-sm btn-primary" onclick="window.location='{{URL('admin/introduction/create')}}'">发布信息</button>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width:60px">id号</th>
                                <th>学习名称</th>
                                <th>学习地址</th>
                                <th style="width: 170px">操作</th>
                            </tr>
                            @foreach($introduction as $vo)
                                <tr>
                                    <td>{{ $vo->id }}</td>
                                    <td>{{ $vo->summary }}</td>
                                    <td>{{ $vo->address }}</td>
                                    <td><button class="btn btn-xs btn-danger" onclick="doDel({{ $vo->id }})">删除</button>
                                        <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('admin/introduction')}}/{{ $vo->id }}/edit'">编辑</button>
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

@endsection
<form action="" style="display:none;" id="mydeleteform" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="_method" value="DELETE">
</form>


@section("myscript")
    <script type="text/javascript">
        function doDel(id){
            if(confirm('确定要删除吗？')){
                $("#mydeleteform").attr("action","{{url('admin/introduction')}}/"+id).submit();
            }
        }
    </script>
@endsection