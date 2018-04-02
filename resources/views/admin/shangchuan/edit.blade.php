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
                  <h3 class="box-title"><i class="fa fa-plus"></i>上传编辑</h3>
                </div><!-- /.box-header -->
				
				 <form class="form-horizontal" action="{{URL('admin/shangchuan/update')}}/{{ $Resources->id }}" method="post" enctype="multipart/form-data" >
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="put">
				  <input id="getimage" type="hidden" name="name" value="{{ $Resources->name }}">
				  <input id="getimage" type="hidden" name="file" value="{{ $Resources->file }}">
				  <input id="getimage" type="hidden" name="type" value="{{ $Resources->type }}">
				  <input id="getimage" type="hidden" name="size" value="{{ $Resources->size }}">
                  <div class="box-body">
					<div class="form-group">
                      <label for="inputEmail3"   class="col-sm-2 control-label">文件</label>
                      <div class="col-sm-4">
					  {{--<!-- <img id="getimg" src="{{asset('uploads/images')}}/{{$carousel->picture}}" height="50"/> -->--}}
					<div id="fileuploader">文件上传</div>
                      </div>
                    </div>
                      <div class="form-group">
                          <label for="inputEmail3"   class="col-sm-2 control-label">名称</label>
                          <div class="col-sm-4">
                              <input type="text" name="name" id="mc" class="form-control" value="{{ $Resources->name }}" style="width:100px;border:none;background:lightgray">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputEmail3"   class="col-sm-2 control-label">类型</label>
                          <div class="col-sm-4">
                              <input type="text" name="type" id="lx" class="form-control" value="{{ $Resources->type }}" style="width:100px;border:none;background:lightgray">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputEmail3"   class="col-sm-2 control-label">大小</label>
                          <div class="col-sm-4">
                              <input type="text" name="size" id="dx" class="form-control" value="{{ $Resources->size }}" style="width:90px;border:none;background:lightgray">
                          </div>
                      </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">状态</label>
                      <div class="col-sm-4">
                        <input type="radio" name="status"  value="0"<?php echo $Resources['status']=="0"?"checked":"";?>/>通过
                        <input type="radio" name="status"  value="1"<?php echo $Resources['status']=="1"?"checked":"";?>/>禁用
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
                              //console.log(files);
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
  