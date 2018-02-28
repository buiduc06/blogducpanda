@extends('layouts.admin')
@section('content')
<section class="content">
  <style type="text/css" media="screen">
  button a{
    color:white;
  }
  button a:hover{
    color: white;
  }
</style>
<div class="col-md-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Thành Viên  </h3>
      <button type="button" class="btn btn-success btn-xs"> <a href="{{route('admin.users.create')}}" title=""> Thêm Tài Khoản Mới</a></button>
      <div class="box-tools">
       <form action="{{route('admin.users')}}" method="get">
        {{-- {{csrf_field()}} --}}
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control pull-right" name="search" placeholder="Search name" value="{{ $search }}">
         
          <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>

        </div>
      </form>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive ">

    <table class="table table-hover">
      <tr>
        <th>#</th>
        <th>Tên Tài Khoản</th>
        <th>avatar</th>
        <th>email</th>
        <th>Trạng Thái</th>
        <th>Ngày Tham Gia</th> 
        <th><a href="{{route('admin.users.create')}}">Thêm Tài Khoản</a></th>

      </tr>
      @if($getUsers!=null)
      @foreach($getUsers as $getUsers1)
      <tr>
       <td>{{$getUsers1->id}}</td>
       <td>{{$getUsers1->name}}</td>
       <td><img src="/images/{{$getUsers1->avatar}}" alt="" width="100px" height="100px"></td>
       <td>{{$getUsers1->email}}</td>
       <td>
        @if($getUsers1->status==1)
        <b style="color:green">active</b>
        @else
        <b style="color:red">block</b>
        @endif
      </td>
      <td>{{$getUsers1->created_at->format('d/m/Y')}}</td>
      <td><button type="button" class="btn btn-danger btn-xs"><a style="color:white" href="{{route('admin.users.delete',$getUsers1->id)}}" title="">Xóa</a></button> <button type="button" class="btn btn-info btn-xs"><a style="color:white" href="{{route('admin.users.edit',$getUsers1->id)}}" title="">Cập Nhật</a></button></td>
    </tr>
    @endforeach
    @else
    </table>
    <h3 class="text-danger text-center">không có kết quả trả về</h3>

    @endif
  </table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>

</section>
@if(isset($msg))
<script>alert("{{$msg}}")</script>

@endif

@endsection