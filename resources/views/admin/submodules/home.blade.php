@extends('layouts.admin')
@section('content')

<section class="content box">    
  <h2>MODULES</h2>
  
  <tr>
    <td>
      <div class="box-header">  
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown">sorting by default  
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="#">sorting by default</a></li>
              <li><a href="#">sorting by views</a></li>
              <li><a href="#">sorting by id</a></li>
              <li><a href="#">sorting by a-z</a></li>
              <li><a href="#">sorting by z-a</a></li>
            </ul>
          </div>

          <div class="box-tools">
            <form action="{{route('admin.modules')}}" method="get">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" name="search" placeholder="Search name" value="{{$search}}">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </td>
  </tr>
  <div class="table-responsive">   
    <table class="table">
      <thead>
        <tr>
          <th></th>
          <th>#</th>
          <th>Tên Module</th>
          <th>Route Modules </th>
          <th>icon</th>
          <th>Module con</th>
          <th>Ngày Tạo</th>
          <th><a href="{{route('admin.modules.create')}}">Thêm Module</a></th>

        </tr>
      </thead>
      <tbody>
       {{-- @foreach($getCate as $getCate1) --}}
       @foreach($modules as $getmodules)
       <tr>
        <td></td>
        <td>{{$getmodules->id}}</td> 
        <td>{{$getmodules->name}}</td>
        <td>{{$getmodules->route}}</td>
        <td>{{$getmodules->icon}}</td>
        <td>
        	@foreach($getmodules->sub_modules as $submodules)
		  <li>{{$submodules->name}}</li>
        	@endforeach
        </td>
        <td>{{$getmodules->created_at}}</td>

        <td><a class="btn btn-danger btn-flat btn-sm"  href="{{route('admin.modules.delete',$getmodules->id)}}">xóa</a> <a class="btn btn-info btn-flat margin btn-sm" href="{{route('admin.modules.edit',$getmodules->id)}}">cập nhật</a></i></td>

      </tr>
      @endforeach
      {{-- @endforeach --}}
    </tbody>

  </table>
</div>
{{ $modules->links() }}
</section>
 
@endsection