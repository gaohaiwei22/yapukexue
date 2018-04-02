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
				 <form class="form-horizontal" action="{{URL('admin/course/store')}}" method="post" id="myform" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{  csrf_token() }}">
				  <input id="getimage" type="hidden" name="picture">
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
                      <label for="inputEmail3"   class="col-sm-2 control-label">图片</label>
                      <div class="col-sm-4">
                        <div id="fileuploader">图片上传</div>
                        <div><img style="display:none" id="preimages"   alt="图片" height="50"/></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"   class="col-sm-2 control-label">图片名称</label>
                      <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"   class="col-sm-2 control-label">数字</label>
                      <div class="col-sm-4">
                        <input type="text" name="number" class="form-control" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"   class="col-sm-2 control-label">课程名称</label>
                      <div class="col-sm-4">
                        <input type="text" name="Course" class="form-control" value="">
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3"  class="col-sm-2 control-label">课程概括</label>
                      <div class="col-sm-4">
                        <textarea cols="23" rows="5" type="text" name="Generalization" ></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"   class="col-sm-2 control-label">建议标题</label>
                      <div class="col-sm-4">
                        <input type="text" name="title" class="form-control" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3"  class="col-sm-2 control-label">建议简介</label>
                      <div class="col-sm-4">
                        <textarea cols="23" rows="5" type="text" name="introduction" ></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"   class="col-sm-2 control-label">下载</label>
                      <div class="col-sm-4">
                        <input type="text" name="Practical" class="form-control" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"   class="col-sm-2 control-label">购买</label>
                      <div class="col-sm-4">
                        <input type="text" name="link" class="form-control" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"   class="col-sm-2 control-label">备课</label>
                      <div class="col-sm-4">
                        <input type="text" name="download" class="form-control" value="">
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
                           {{--// $("#preimages").attr("src", "{{ env('APP_URL')}}/uploads/images/" + data.filename);--}}
                            $("#getimag").attr("value", data.filename);

                            var newnode = '<input type="hidden" id="'+data.filename+'" name="picture" value="'+data.filename+'" >';
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

