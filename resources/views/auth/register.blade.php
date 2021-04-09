<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/datepicker3.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" />
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
    <li class="active"><a href="/profile"><em class="fa fa-dashboard">&nbsp;</em> DASHBOARD</a></li>
			<li><a href="/status"><em class="fa fa-calendar">&nbsp;</em> EMPLOYEES STATUS</a></li>

			<li><a href="/register"><em class="fa fa-bar-chart">&nbsp;</em>ADD USERS </a></li>
			<li><a href="/assignwork"><em class="fa fa-toggle-off">&nbsp;</em> ASSIGN WORK</a></li>
			
			<li><a href="/logout"><em class="fa fa-power-off">&nbsp;</em> LOGOUT</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						ADD USERS<br><br>


            <form class="p-3 mb-2 bg-light text-dark" action="{{ route('auth.create') }}" method="POST">
@csrf
<div class="results">
@if(Session::get('success'))
<div class="alert alert-success">
{{ Session::get('success') }}
</div>
@endif

@if(Session::get('fail'))
<div class="alert alert-danger">
{{ Session::get('fail') }}
</div>
@endif
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name" value= "{{old ('name') }}">
    <small class="text-danger">@error('name'){{ $message }} @enderror</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value= "{{old ('email') }}">
    <small class="text-danger">@error('email'){{ $message }} @enderror</small>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    <small class="text-danger">@error('password'){{ $message }} @enderror</small>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Role</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ADM for admin USR for user" name="role" value= "{{old ('role') }}">
    <small class="text-danger">@error('role'){{ $message }} @enderror</small>

  </div>
  <div class="form-group">
  <label for="img">Select image:</label>
    <input class="form-control" type="file" id="img" name="img" accept="image/*">

    <small class="text-danger">@error('img'){{ $message }} @enderror</small>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">DATE OF JOINING</label>
    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Enter Date" name="doj" value= "{{old ('date') }}">
    <small class="text-danger">@error('date'){{ $message }} @enderror</small>

  </div>
  <div class="text-center">

  <button type="submit" class="btn btn-primary btn-lg">ADD USER</button>
<br><br></div>
 
</form>



