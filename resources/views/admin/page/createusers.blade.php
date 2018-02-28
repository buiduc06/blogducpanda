@extends('layouts.admin')
@section('content')
<div class="container" style="width: 600px">
	<form class="form-horizontal" action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field('')}}
		<h3 class="text-info">THÊM USERS</h3><br> 
		<div class="form-group">
			<label class="control-label col-sm-2" for="name">Username</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" name="name" value="{{ old('name','') }}"  placeholder="Enter name"> 
			</div>
			@if(count($errors) > 0)
			<small style="color: red">{{$errors->first('name')}}</small><br>
			@endif
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="email">Email</label>
			<div class="col-sm-6">
				<input type="email" class="form-control" name="email" value="{{old('email','')}}">
				@if(count($errors) > 0)
			<small style="color: red">{{$errors->first('email')}}</small><br>
			@endif
			@if(Session::has('email'))
<small style="color: red">{{Session('email')}}</small><br>
			@endif
			</div>
		</div>


		<div class="form-group">
			<label class="control-label col-sm-2" for="password">Password</label>
			<div class="col-sm-6">
				<input type="password" class="form-control" name="password"  placeholder="Enter password" required>
				@if(count($errors) > 0)
			<small style="color: red">{{$errors->first('password')}}</small><br>
			@endif
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-2" for="avatar">Avatar</label>
			<div class="col-sm-6">
				<input type="file" class="form-control" name="avatar" value="{{ old('avatar','') }}">
				@if(count($errors) > 0)
			<small style="color: red">{{$errors->first('avatar')}}</small><br>
			@endif
			</div>
		</div>
 

		<div class="form-group"> 
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading...">Thêm Tài Khoản</button>
			</div>
		</div>
	</form>
</div>
@endsection


