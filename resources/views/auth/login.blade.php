@extends('layouts.auth')

@section('content')


<div class="login-box">
  <div class="login-logo">
    <a href="{{route('login')}}"><b>Admin</b>LTE</a>
</div>
<!-- /.login-logo -->
<div class="login-box-body">
    <p class="login-box-msg">đăng nhập để tiếp tục sử dụng</p>

    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
           @if ($errors->has('email'))
           <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
        <input id="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">

        @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif

        <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
             <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ 
         </label>
     </div>
 </div>
 <!-- /.col -->
 <div class="col-xs-4">
  <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng Nhập</button>
</div>
<!-- /.col -->
</div>
</form>

<div class="social-auth-links text-center">
  <p>- OR -</p>
  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Đăng nhập bằng
  Facebook</a>
  <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng nhập bằng
  Google+</a>
</div>
<!-- /.social-auth-links -->

<a href="{{ route('password.request') }}">Quyên mật khẩu</a><br>
<a href="{{ route('register') }}" class="text-center">Đăng kí</a>

</div>
<!-- /.login-box-body -->
</div>


@endsection
