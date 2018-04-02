@extends('admin.base')
@section('content')
@include('vendor.ueditor.assets')
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

				 <form class="form-horizontal" action="{{URL('admin/product_table/update')}}/{{ $product_table->id }}" method="post" enctype="multipart/form-data" >
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="put">
				  <input id="getimage" type="hidden" name="product_picture" value="{{ $product_table->product_picture }}">
                  <div class="box-body">
                      <div class="form-group">
                          <label for="inputEmail3"   class="col-sm-2 control-label">产品别名</label>
                          <div class="col-sm-4">
                              <input type="text" name="product_name" class="form-control" value="{{ $product_table->product_name }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputEmail3"   class="col-sm-2 control-label">产品别名</label>
                          <div class="col-sm-4">
                              <input type="text" name="alias" class="form-control" value="{{ $product_table->alias }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputEmail3"   class="col-sm-2 control-label">适用年龄</label>
                          <div class="col-sm-4">
                              <input type="text" name="age" class="form-control" value="{{ $product_table->age }}"style="float: left; width: 50px;"><span  style="float: left;margin: 7px ">岁</span>
                          </div>
                      </div>
					<div class="form-group">
                      <label for="inputEmail3"   class="col-sm-2 control-label">轮播图片</label>
                      <div class="col-sm-4">
					  {{--<!-- <img id="getimg" src="{{asset('uploads/images')}}/{{$carousel->picture}}" height="50"/> -->--}}
					<img id="getimg" src="{{ env('QINIU_DOMAIN')}}/{{ $product_table->product_picture }}" height="50"/>
					<div id="fileuploader">图片上传</div>
					<div><img style="display:none" id="preimages"  alt="图片" height="50"></div>
                      </div>
                    </div>
                      <div class="form-group">
                          <label for="inputEmail3"   class="col-sm-2 control-label">产品价格</label>
                          <div class="col-sm-4">
                              <input type="text" name="Price" class="form-control" value="{{ $product_table->Price }}"style="float: left; width: 60px;"><span  style="float: left;margin: 7px ">元</span>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputEmail3"   class="col-sm-2 control-label">编辑时间</label>
                          <div class="col-sm-4">
                              <input id="meeting" type="date" name="product_edit" value="{{$product_table->product_edit}}" style="height:27px;"/>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputEmail3"   class="col-sm-2 control-label">产品描述</label>
                          <div class="col-sm-4">
                              <textarea cols="23" rows="2" type="text" name="describe" ><?php echo $product_table['describe'];?></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputPassword3"  class="col-sm-2 control-label">产品简介</label>
                          <div class="col-sm-4">
                              <textarea cols="23" rows="5" type="text" name="product_details" ><?php echo $product_table['product_details'];?></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <!-- 实例化编辑器 -->
                          <script type="text/javascript">
                              var ue = UE.getEditor('container');
                              ue.ready(function() {
                                  ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                              });
                          </script>

                          <!-- 编辑器容器 -->
                          <script id="container" name="product_video" type="text/plain"><?php echo $product_table['product_video'];?></script>
                      </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">状态</label>
                      <div class="col-sm-4">
                        <input type="radio" name="status"  value="0"<?php echo $product_table['status']=="0"?"checked":"";?>/>通过
                        <input type="radio" name="status"  value="1"<?php echo $product_table['status']=="1"?"checked":"";?>/>未通过
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
					var newnode = '<input type="hidden" id="'+data.filename+'" name="picture" value="'+data.filename+'" >';
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
  