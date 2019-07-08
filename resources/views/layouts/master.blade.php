
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>HRMIS - Công ty TNHH Thịnh Phong</title>

	<link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
@php
	$user_current = App\User::with('roles')->findOrFail(auth()->user()->id);
@endphp
	@if($user_current->status == 'active')
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
		<ul class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
			</li>
		</ul>

		<ul class="navbar-nav ml-auto">
			<!-- Profile Dropdown Menu -->
			<li class="nav-item dropdown user-menu">
				<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
					<img src="images/profile/{{ $user_current->photo }}" class="img-circle elevation-2" alt="User Image">
					<span class="d-none d-sm-inline blue">{{ $user_current->name }}</span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<router-link to="/profile" class="dropdown-item blue">
					<i class="fas fa-user mr-2"></i> Trang cá nhân
					</router-link>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item dropdown-footer blue" href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					<i class="mr-2 nav-icon fa fa-power-off"></i> Thoát
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</li>
		</ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
		<a href="void:javascript(0)" class="brand-link">
			<img src="./images/logo_khong_chu.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
				style="opacity: .8">
			<span class="brand-text font-weight-light">HRMIS</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar Menu -->
			<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Bảng điền khiển -->
				<li class="nav-item">
				<router-link to="/dashboard" class="nav-link">
					<i class="nav-icon fas fa-tachometer-alt"></i>
					<p>
					Bảng điều khiển
					</p>
				</router-link>
				</li>
				<!-- Quản trị nhân sự -->
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-box"></i>
						<p>
						Quản trị nhân sự
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Nhân sự công ty</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Thống kê nhân sự</p>
							</a>
						</li>
					</ul>
				</li>
				<!-- Người dùng & Quyền -->
				@role('superadmin')
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-users-cog"></i>
						<p>
						Người dùng & Quyền
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					
					<ul class="nav nav-treeview">
						@role('superadmin')
						<li class="nav-item">
							<router-link to="/user" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Quản lý người dùng</p>
							</router-link>
						</li>
						@endrole

						@role('superadmin')
						<li class="nav-item">
							<router-link to="/role" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Nhóm quyền sử dụng</p>
							</router-link>
						</li>
						@endrole
					</ul>
				</li>
				@endrole
				<!-- Cài đặt cơ bản -->
				@if($user_current->can('manage-company|manage-media'))
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-sliders-h"></i>
						<p>
						Chức năng cơ bản
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						@permission('manage-media')
						<li class="nav-item">
							<router-link to="/mediafile" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Quản lý tập tin</p>
							</router-link>
						</li>
						@endpermission
						@permission('manage-company')
						<li class="nav-item">
							<router-link to="/company" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Thông tin công ty</p>
							</router-link>
						</li>
						@endpermission
					</ul>
				</li>
				@endif

				@if($user_current->can('manage-developer|manage-logs'))
				<!-- Cài đặt nâng cao -->
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-cogs"></i>
						<p>
						Cài đặt nâng cao
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						@permission('manage-developer')
						<li class="nav-item">
							<router-link to="/developer" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Lập trình truy cập</p>
							</router-link>
						</li>
						@endpermission
						@permission('manage-logs')
						<li class="nav-item">
							<router-link to="/logviewer" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Nhật ký hệ thống</p>
							</router-link>
						</li>
						@endpermission
					</ul>
				</li>
				@endif
			</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <router-view></router-view>
    <!-- /.content-wrapper -->

    <vue-progress-bar></vue-progress-bar>

    <!-- Main Footer -->
    <footer class="main-footer">
		<!-- To the right -->
		<div class="float-right d-none d-sm-inline">
			Hệ thống thông tin quản lý nguồn nhân lực (bản thử nghiệm).
		</div>
		<!-- Default to the left -->
		&copy; 2019 Bản quyền thuộc <strong>Công ty TNHH Thịnh Phong</strong>.
    </footer>
	@else
	<h1 class="blue">Tài khoản chưa được kích hoạt. Vui lòng liên hệ quản trị viên!</h1>
	@endif
</div>
<!-- ./wrapper -->

@auth
<script>
	window.user = @json($user_current)
</script>
@endauth

<script src="/js/app.js"></script>
</body>
</html>
