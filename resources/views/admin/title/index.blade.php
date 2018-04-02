@extends('admin.base')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        &nbsp; <button class="btn btn-sm btn-primary" onclick="window.location='{{URL('admin/title/create')}}'">发布信息</button>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width:60px">id号</th>
                                <th>产品标题名称</th>
                                <th>产品子标题名称</th>
                                <th>产品小子标题名称</th>
                                <th>产品标题状态</th>
                                <th style="width: 170px">操作</th>
                            </tr>
                            @foreach($data as $vo)
                                <tr>
                                    <td>{{ $vo->id }}</td>
                                    <td>{{ $vo->title }}</td>
                                    <td>{{ $vo->name }}</td>
                                    <td>{{ $vo->names }}</td>
                                    <td>@if($vo->status==0)启用@elseif($vo->status==1)禁用@endif</td>
                                    <td><button class="btn btn-xs btn-danger" onclick="doDel({{ $vo->id }})">删除</button>
                                        <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('admin/title')}}/{{ $vo->id }}/edit'">编辑</button>
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
                $("#mydeleteform").attr("action","{{url('admin/title')}}/"+id).submit();
            }
        }
    </script>
@endsection