@extends('admin.base')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        &nbsp; <button class="btn btn-sm btn-primary" onclick="window.location='{{URL('admin/bottom/create')}}'">发布信息</button>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width:60px">id号</th>
                                <th>电话</th>
                                <th>中文地址</th>
                                <th>英文地址</th>
                                <th>版本</th>
                                <th>图像</th>
                                <th>状态</th>
                                <th>添加时间</th>
                                <th>修改时间</th>
                                <th style="width: 170px">操作</th>
                            </tr>
                            @foreach($bottom as $vo)
                                <tr>
                                    <td>{{ $vo->id }}</td>
                                    <td>{{ $vo->phone }}</td>
                                    <td>{{ $vo->address }}</td>
                                    <td>{{ $vo->englishaddress }}</td>
                                    <td>{{ $vo->edition }}</td>
                                    <td><img src="{{ env('QINIU_DOMAIN')}}/{{$vo->image}}" height="50"/></td>
                                    <td>@if($vo->status==0)启用@elseif($vo->status==1)禁用@endif</td>
                                    <td>{{$vo->create_at}}</td>
                                    <td>{{$vo->update_at}}</td>
                                    <td><button class="btn btn-xs btn-danger" onclick="doDel({{ $vo->id }})">删除</button>
                                        <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('admin/bottom')}}/{{ $vo->id }}/edit'">编辑</button>
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
                $("#mydeleteform").attr("action","{{url('admin/bottom')}}/"+id).submit();
            }
        }
    </script>
@endsection