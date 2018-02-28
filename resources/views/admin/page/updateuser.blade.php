@extends('layouts.admin')
@section('content')
<div class="container" style="width: 600px">
	<form class="form-horizontal" action="{{route('admin.users.update',$getData->id)}}" method="POST" enctype="multipart/form-data">
		{{csrf_field('')}}
		<h3 class="text-info">UPDATE USERS</h3><br> 

		<div class="form-group">
			<label class="control-label col-sm-2" for="name">Status</label>
			<div class="col-sm-3">
				<select name="status" id="inputStatus" class="form-control">
					@if($getData->status==1)
					<option value="1">active</option>
					<option value="0">block</option>
					@else
					<option value="0">block</option>
					<option value="1">active</option>
					@endif
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-2" for="name">Username</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" name="name" value="{{$getData->name}}"> 
			</div>
			@if(count($errors) > 0)
			<small style="color: red">{{$errors->first('name')}}</small><br>
			@endif
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="email">Email</label>
			<div class="col-sm-6">
				<input type="email" class="form-control" name="email" value="{{$getData->email}}">
				@if(count($errors) > 0)
				<small style="color: red">{{$errors->first('email')}}</small><br>
				@endif
				@if(Session::has('email'))
				<small style="color: red">{{Session('email')}}</small><br>
				@endif
			</div>
		</div>


		<div class="form-group">

			<label class="control-label col-sm-2" for="avatar"></label>
			<div class="col-sm-6">
				<img src="/images/{{$getData->avatar}}" width="100px" class="img-responsive" alt="Image">
			</div>
		</div>
		<div class="form-group">

			<label class="control-label col-sm-2" for="avatar">Avatar</label>
			<div class="col-sm-6">
				<input type="file" class="form-control" name="avatar" value="{{$getData->avatar}}">
				@if(count($errors) > 0)
				<small style="color: red">{{$errors->first('avatar')}}</small><br>
				@endif
			</div>
		</div>


		<div class="form-group"> 
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success">Cập Nhật</button>
			</div>
		</div>
	</form>
</div>
@endsection

