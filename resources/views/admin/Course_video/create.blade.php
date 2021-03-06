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
                  <h3 class="box-title"><i class="fa fa-plus"></i>学习课程管理</h3>
                </div><!-- /.box-header -->
				 <form class="form-horizontal" action="{{URL('admin/Course_video/store')}}" method="post" id="myform" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{  csrf_token() }}">
				  <input id="yapu" type="hidden" name="video">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputPassword3"  class="col-sm-2 control-label">两表课程</label>
                      <div class="col-sm-4">
                        <select name="type_id" style="width:200px;height:30px;font-size:15px">
                          @foreach($learning as $v)
                            <option value="{{$v->id}}">{{$v->type_name->product_name}}|==|{{$v->curriculum}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"   class="col-sm-2 control-label">视频作者</label>
                      <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"   class="col-sm-2 control-label">视频</label>
                      <div class="col-sm-4">
                        <div id="y">视频上传</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3"  class="col-sm-2 control-label">视频简介</label>
                      <div class="col-sm-4">
                        <textarea cols="23" rows="5" type="text" name="introduce" ></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"   class="col-sm-2 control-label">添加时间</label>
                      <div class="col-sm-4">
                        <input id="meeting" type="date" name="create_at" style="height:27px;"/>
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

                    $("#y").uploadFile({
                        url:"/admin/uploads",
                        fileName:"picname",
                        abortStr:"取消",
                        dragDropStr: "<span><b>附件拖放于此</b></span>",
                        uploadStr:"<span style='color:red'>上传视频</span>",
                        formData: {"_token":"{{   csrf_token() }}"},
                        returnType:"json",
                        onSuccess: function (files,data,xhr,pd) {

                            var myform = $("#myform");
                          {{--// $("#preimages").attr("src", "{{ env('APP_URL')}}/uploads/images/" + data.filename);--}}
                          $("#yapu").attr("value", data.filename);

                            var newnode = '<input type="hidden" id="'+data.filenamimagee+'" name="video" value="'+data.filename+'" >';
                            myform.append(newnode);

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

