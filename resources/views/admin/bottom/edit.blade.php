@extends('admin.base')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- right column -->

            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus"></i>产品管理	</h3>
                    </div><!-- /.box-header -->

                    <form class="form-horizontal" action="{{URL('admin/bottom/update')}}/{{ $bottom->id }}" method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="put">
                        <input id="getimage" type="hidden" name="image" value="{{ $bottom->image }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3"   class="col-sm-2 control-label">电话</label>
                                <div class="col-sm-4">
                                    <input type="text" name="phone" class="form-control" value="{{ $bottom->phone }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3"   class="col-sm-2 control-label">中文地址</label>
                                <div class="col-sm-4">
                                    <input type="text" name="address" class="form-control" value="{{ $bottom->address }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3"   class="col-sm-2 control-label">英文地址</label>
                                <div class="col-sm-4">
                                    <input type="text" name="englishaddress" class="form-control" value="{{ $bottom->englishaddress }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3"   class="col-sm-2 control-label">版本</label>
                                <div class="col-sm-4">
                                    <input type="text" name="edition" class="form-control" value="{{ $bottom->edition }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3"   class="col-sm-2 control-label">轮播图片</label>
                                <div class="col-sm-4">
                                    {{--<!-- <img id="getimg" src="{{asset('uploads/images')}}/{{$carousel->picture}}" height="50"/> -->--}}
                                    <img id="getimg" src="{{ env('QINIU_DOMAIN')}}/{{ $bottom->image }}" height="50"/>
                                    <div id="fileuploader">图片上传</div>
                                    <div><img style="display:none" id="preimages"  alt="图片" height="50"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3"   class="col-sm-2 control-label">修改时间</label>
                                <div class="col-sm-4">
                                    <input id="meeting" type="date" name="update_at" style="height:27px;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">状态</label>
                                <div class="col-sm-4">
                                    <input type="radio" name="status"  value="0"<?php echo $bottom['status']=="0"?"checked":"";?>/>通过
                                    <input type="radio" name="status"  value="1"<?php echo $bottom['status']=="1"?"checked":"";?>/>禁用
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-sm-offset-2 col-sm-1">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </div><!-- /.box-footer -->
                    </form>
                    <div class="row"><div class="col-sm-12">&nbsp;</div></div>
                    <div class="row"><div class="col-sm-12">
                            <br/>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div></div>
                </div><!-- /.box -->

            </div><!--/.col (right) -->
            <script>
                $(document).ready(function()
                {

                    $("#fileuploader").uploadFile({
                        url:"/admin/uploads",
                        fileName:"picname",
                        abortStr:"取消",
                        dragDropStr: "<span><b>附件拖放于此</b></span>",
                        uploadStr:"<span style='color:red'>上传图片</span>",
                        formData: {"_token":"{{   csrf_token() }}"},
                        returnType:"json",
                        onSuccess: function (files,data,xhr,pd) {

                            var myform = $("#myform");
                            $("#preimages").show();

                            $("#preimages").attr("src", "{{ env('QINIU_DOMAIN')}}/" + data.filename);
                            //$("#preimages").attr("src", "{{ env('APP_URL')}}/uploads/images/" + data.filename);
                            $("#getimage").attr("value", data.filename);
                            $("#getimg").remove();
                            myform.append(newnode);
                            var newnode = '<input type="hidden" id="'+data.filename+'" name="image" value="'+data.filename+'" >';
                        },
                        onError: function () {
                            alert('请求失败！');
                        }
                    });
                });
            </script>
        </div>   <!-- /.row -->
    </section><!-- /.content -->

@endsection
  