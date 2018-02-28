	@extends('layouts.admin')
	@section('content')
	<div class="container" style="width: 400px">
		<form action="{{route('admin.modules.store')}}" method="POST">
			{{csrf_field('')}}
			<legend>THÊM DANH MỤC</legend>
			<div class="form-group">
				<label for="">Tên Danh Mục</label>
				<input type="text" class="form-control" name="namecate">
				@if(count($errors) > 0)
				<small style="color: red">{{$errors->first('namecate')}}</small>
				@endif
			</div>

			<div class="form-group">
				<label for="input">Danh Mục Cha</label>
				<!-- <div class="col-sm-12"> -->
					<select name="parent" id="input" class="form-control" style="width: 150px">
						@foreach($showallcate as $showallcate1)
						<option value="{{$showallcate1->id}}">{{$showallcate1->name}}</option>
						@endforeach
					</select>
					<!-- </div> -->
				</div>

				<button type="submit" class="btn btn-primary">Thêm</button>
			</form>
			<br>
			@if(Session::has('msg'))
			<p><strong>Error!</strong> {{ Session::get('msg') }}.</p>
			@endif
		</div>



		@endsection