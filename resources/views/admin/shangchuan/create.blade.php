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
                  <h3 class="box-title"><i class="fa fa-plus"></i>上传管理</h3>
                </div><!-- /.box-header -->
				 <form class="form-horizontal" action="{{URL('admin/shangchuan/store')}}" method="post" id="myform" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{  csrf_token() }}">
				  <input id="getimage" type="hidden" name="file">
				  <input id="getimage" type="hidden" name="name">
				  <input id="getimage" type="hidden" name="type">
				  <input id="getimage" type="hidden" name="size">
                  <div class="box-body">
                      <div class="form-group">
                        <label for="inputEmail3"   class="col-sm-2 control-label">文件</label>
                          <div class="col-sm-4">
                                 <div id="fileuploader">文件上传</div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">名称:</label>
                      <div class="col-sm-4">
                        <input type="text" id="mc" name="name" class="form-control" value=""  style="width:100px; border:none;background:lightgray">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">类型:</label>
                      <div class="col-sm-4">
                        <input type="text" id="lx" name="type" class="form-control" value=""  style="width:100px;border:none;background:lightgray">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">大小:</label>
                      <div class="col-sm-4">
                        <input type="text"id="dx" name="size" class="form-control" value=""  style="width:100px; border:none;background:lightgray">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">状态</label>
                      <div class="col-sm-4">
                        <input type="radio" name="status"  value="0"/>通过
                        <input type="radio" name="status"  value="1"/>未通过
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
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:"{{url('/admin/upload')}}",
                        type:"post",
                        fileName:"picname",
                        abortStr:"取消",
                        dragDropStr: "<span><b>附件拖放于此</b></span>",
                        uploadStr:"<span style='color:red'>上传文件</span>",
                        formData: {"_token":"{{   csrf_token() }}"},
                        returnType:"json",
                        onSuccess: function (files,data,xhr,pd) {
                            console.log(data);
                            var myform = $("#myform");
                           // $("#preimages").attr("src", "{{ env('APP_URL')}}/uploads/images/" + data.filename);
                            $("#getimage").attr("value", data.filename);
                            var newnode = '<input type="hidden" id="'+data.filename+'" name="file" value="'+data.filename+'" >';
                            myform.append(newnode);
                            $("#mc").val(files);
                            $("#lx").val(data.fname.mimeType);
                            $("#dx").val(data.fname.fsize);

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

