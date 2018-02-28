@extends('layouts.admin')
@section('content')

<section class="content box">    
  <h2>DANH MỤC</h2>
  

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
            <form action="{{route('admin.categories')}}" method="get">
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
          <th>Tên Danh mục</th>
          <th>Dạnh Mục Cha </th>
          <th>Số Bài Viết</th>
          <th>Ngày Tạo</th>
          <th><a href="{{route('admin.categories.create')}}">Thêm Danh Mục</a></th>

        </tr>
      </thead>
      <tbody>
       {{-- @foreach($getCate as $getCate1) --}}
       @foreach($getsubCate as $getSubCate1)
       <tr>
        <td></td>
        <td>{{$getSubCate1->id}}</td> 
        <td>{{$getSubCate1->name}}</td>
        <td>{{$getSubCate1->getCategory()->name}}</td>
        <td>{{count($getSubCate1->post)}}</td>
        <td>{{$getSubCate1->created_at}}</td>

        <td><a class="btn btn-danger btn-flat btn-sm"  href="{{route('admin.categories.delete',$getSubCate1->id)}}">xóa</a> <a class="btn btn-info btn-flat margin btn-sm" href="{{route('admin.categories.edit',$getSubCate1->id)}}">cập nhật</a></i></td>

      </tr>
      @endforeach
      {{-- @endforeach --}}
    </tbody>

  </table>
</div>
{{ $getsubCate->links() }}
</section>
 
@endsection