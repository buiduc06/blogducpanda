 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/images/{{ Auth::check() ? Auth::user()->avatar : 'default.png'}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::check() ? Auth::user()->name : 'no name'}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        @foreach(Auth::user()->user_roles->roles->role_modules as $roleModules)
        @foreach($roleModules->modules as $module1)
        @if(count($module1->sub_modules)<1)
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{route($module1->route)}}"><i class="{{$module1->icon}}"></i> <span>{{$module1->name}}</span></a></li>

    @else
        <li class="treeview">
          <a href="#">
            <i class="{{$module1->icon}}"></i> <span>{{$module1->name}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @foreach($module1->sub_modules as $submodules)
            <li><a href="{{route($submodules->route)}}"><i class="{{$submodules->icon}}"></i> {{$submodules->name}}</a></li>
            @endforeach
            {{-- <li><a href="{{route('admin.posts')}}"><i class="fa fa-circle-o"></i> Danh Sách Tin Tức</a></li> --}}
          </ul>
        </li>
        @endif
@endforeach
@endforeach
{{-- 

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Danh Mục</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.categories.create')}}"><i class="fa fa-circle-o"></i> Tạo Danh Mục</a></li>
            <li><a href="{{route('admin.categories')}}"><i class="fa fa-circle-o"></i> Danh Sách Danh Mục</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.users.create')}}"><i class="fa fa-circle-o"></i> Thêm Users</a></li>
            <li><a href="{{route('admin.users')}}"><i class="fa fa-circle-o"></i> Danh Sách Users</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Phân Quyền</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Banned/active</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Emails</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> News</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Inbox</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> chỉnh sửa module</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> thống kê chi tiết</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> nâng cao</a></li>
          </ul>
        </li> --}}




      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>