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
                  <h3 class="box-title"><i class="fa fa-plus"></i>无限分类管理	</h3>
                </div><!-- /.box-header -->
				 <form class="form-horizontal" action="{{URL('admin/type/store')}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{   csrf_token() }}">
                     <div class="box-body">
                   <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">父类别</label>
                      <div class="col-sm-4" >
                      <select name="pid" >
                                <option  value="0">根类别</option>
                          @foreach($list as $v)
                              <option value="{{ $v->id }}">{{ $v->name }}</option>
                          @endforeach
                      </select>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">类别名称</label>
                      <div class="col-sm-4">
                        <input type="text" name="name" class="form-control">
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
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
  