@extends('layouts.admin')
@section('content')
<div class="container" style="width: 400px">
	<form action="{{route('admin.categories.update',$getData->id)}}" method="POST">
		{{csrf_field('')}}
		<legend>THÊM DANH MỤC</legend>

		<div class="form-group">
			<label for="">Tên Danh Mục</label>
			<input type="text" class="form-control" name="namecate" value="{{$getData->name}}">
		</div>

		<div class="form-group">
			<label for="input">Danh Mục Cha</label>
			<!-- <div class="col-sm-12"> -->
				<select name="parent" id="input" class="form-control" style="width: 150px">
					<option value="{{$getData->getCategory()->id}}">{{$getData->getCategory()->name}}</option>
					@foreach($catnotsubcate as $catnotsubcate1)
					<option value="{{$catnotsubcate1->id}}">{{$catnotsubcate1->name}}</option>
					@endforeach
				</select>
				<!-- </div> -->
			</div>

			<button type="submit" class="btn btn-primary">Update</button>
		</form>

		<br>
			@if(Session::has('msg'))
			<p><strong>Error!</strong> {{ Session::get('msg') }}.</p>
			@endif
	</div>



	@endsection