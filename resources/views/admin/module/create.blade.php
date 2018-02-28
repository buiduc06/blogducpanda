	@extends('layouts.admin')
	@section('content')
	<div class="container" style="width: 400px">
		<form action="{{route('admin.modules.store')}}" method="POST">
			{{csrf_field('')}}
			<legend>THÊM MODULES</legend>
			<div class="form-group">
				<label for="">Tên Module</label>
				<input type="text" class="form-control" name="name">
				@if(count($errors) > 0)
				<small style="color: red">{{$errors->first('name')}}</small>
				@endif
			</div>

			<div class="form-group">
				<label for="">Route Module</label>
				<input type="text" class="form-control" name="routemodule">
				@if(count($errors) > 0)
				<small style="color: red">{{$errors->first('routemodule')}}</small>
				@endif
			</div>
			<div class="form-group">
				<label for="">class icon name</label>
				<input type="text" class="form-control" name="icon">
				@if(count($errors) > 0)
				<small style="color: red">{{$errors->first('icon')}}</small>
				@endif
			</div>

			

				<button type="submit" class="btn btn-primary">Thêm</button>
			</form>
			<br>
			@if(Session::has('msg'))
			<p><strong>Error!</strong> {{ Session::get('msg') }}.</p>
			@endif
		</div>



		@endsection