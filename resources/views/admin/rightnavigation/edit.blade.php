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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 编辑导航信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{URL('admin/rightnavigation/update')}}/{{ $rightnavigation->id }}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="put">
                  <div class="box-body">
                    <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">导航名称</label>
                          <div class="col-sm-4">
                              <input type="text" name="name" class="form-control" value="{{ $rightnavigation->name }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">导航英文名称</label>
                          <div class="col-sm-4">
                              <input type="text" name="names" class="form-control" value="{{ $rightnavigation->names }}">
                          </div>
                      </div>
                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">导航地址</label>
                      <div class="col-sm-4">
                        <input type="text" name="url" class="form-control" value="{{ $rightnavigation->url }}">
                      </div>
                    </div>
                      <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">当前状态</label>
                          <div class="col-sm-4">
                              <label class="radio-inline">
                                  <input type="radio" name="status" id="inlineRadio1" {{ ($rightnavigation->status == 0)?"checked":"" }} value="0"> 启用
                              </label>
                              <label class="radio-inline">
                                  <input type="radio" name="status" id="inlineRadio2" {{ ($rightnavigation->status == 1)?"checked":"" }} value="1"> 禁用
                              </label>
                          </div>
                      </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<button type="submit" class="btn btn-primary">保存</button>
                    </div>
					<div class="col-sm-1">
						<button type="submit" class="btn btn-primary">重置</button>
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
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
  