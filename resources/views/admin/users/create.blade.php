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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加管理员</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{URL('admin/users/store')}}" method="post" name="myform" onsubmit="return doSubmit()";>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <meta name="csrf-token" content="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">管理员姓名</label>
                      <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" onblur="checkAccount()" placeholder="名称">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">邮箱账号</label>
                      <div class="col-sm-4">
                        <input type="text" name="email" class="form-control" onblur="checkemail()" placeholder="邮箱">
                      </div>
                    </div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">密码</label>
					<div class="col-sm-4">
						<input class="form-control" placeholder="至少8位，必须包含字母、数字、特殊字符" type="password" id="Password" name="password" onblur="checkPassword()">    
					</div>
				</div>
				<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">确认密码</label>
					<div class="col-sm-4">
						<input class="form-control" placeholder="请输入确认密码" type="password"  name="password2" onblur="checkPassword2()">
					</div>
				</div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<button type="submit" class="btn btn-primary">添加</button>
                    </div>
					<div class="col-sm-1">
						<button type="reset" class="btn btn-primary">重置</button>
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
    <script>
    function doSubmit(){
        return checkAccount() && checkemail() &&  checkPassword() && checkPassword2();
    }
    //判断用户名是否合法
    function checkAccount(){
        //获取用户输入的信息
        var name = document.myform.name.value;
        $("input[name='name']").nextAll("span").remove();

        //执行ajax判断
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            url:"{{url('admin/users/store')}}",
            type:"post",
            data:"name="+name,
            datatype:"json",
            success:function(data){
                if(data.error_code==1){
                    $("<span style='color:red;'>您输入的用户名"+name+"已存在</span>").insertAfter("input[name='name']");
                    document.myform.name.value = "";
                    return false;
                }
                if(data==2){
                    $("<span style='color:red;'>用户名不可用</span>").insertAfter("input[name='name']");
                    return false;
                }else{
                    $("<span style='color:green;'>用户名可用</span>").insertAfter("input[name='name']");
                }
            }
        });
        return true;
    }
	//判断邮箱是否合法
    function checkemail(){
        //获取邮箱输入的信息
        var email = document.myform.email.value;
        $("input[name='email']").nextAll("span").remove();
        //判断邮箱是否合法
        if(email.match(/^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/)==null){
            $("<span style='color:red;'>邮箱不合法请重新输入</span>").insertAfter("input[name='email']");

        }
        //执行ajax判断
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            url:"{{url('admin/users/store')}}",
            type:"post",
            data:'email='+email,
            datatype:'json',
            success:function(data){
                if(data.error_code==1){
                    $("<span style='color:red;'>您输入的邮箱"+email+"已存在</span>").insertAfter("input[name='email']");
                    document.myform.email.value = "";
                    return false;
                }
                if(data==2){
                    $("<span style='color:red;'>邮箱不可用</span>").insertAfter("input[name='email']");
                    return false;
                }else{
                    $("<span style='color:green;'>邮箱可用</span>").insertAfter("input[name='email']");
                }
            }
        });
        return true;
    }
	 //密码验证
    function checkPassword(){
        //获取用户的输入密码
        var password = document.myform.password.value;
        $("input[name='password']").nextAll('span').remove();
        if(password==""){
            $("<span style='color:red'>密码不能为空</span>").insertAfter("input[name='password']");
            return false
        }
        if(password.match(/^[A-Za-z0-9_]{6,20}$/)==null){
            $("<span style='color:red'>密码不合法请重新输入</span>").insertAfter("input[name='password']");
            return false;
        }else{
            $("<span style='color:green'>可用</span>").insertAfter("input[name='password']");
        }

        return true;
    }
    //确认密码验证
    function checkPassword2()
    {
        //获取确认密码
        var password2 = document.myform.password2.value;
        var password = document.myform.password.value;
        $("input[name='password2']").nextAll("span").remove();
        if(password2.length == 0){
            $("<span style='color:red'>密码不能为空</span>").insertAfter("input[name='password2']");
            return false
        }
        if(password2 != password){
            $("<span style='color:red'>两次密码不一致请重新输入</span>").insertAfter("input[name='password2']");
            document.myform.password2.value ="";
            return false;
        }else{
            $("<span style='color:green'>密码一致</span>").insertAfter("input[name='password2']");
            return true;
        }

        return true;
    }
	</script>  
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection