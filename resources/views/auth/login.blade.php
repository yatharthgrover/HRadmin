<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
  <link rel="stylesheet" href="{{ URL::asset('css/datepicker3.css') }}" />

<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />

<link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" />


	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" action="{{ route('auth.check') }}" method="POST">
          @csrf
<div class="results">
@if(Session::get('fail'))
<div class="alert alert-danger">
{{ Session::get('fail') }}
</div>
@endif
</div>

						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" value="{{ old('email') }}">
                <small class="text-danger">@error('email'){{ $message }} @enderror</small>

							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
                <small class="text-danger">@error('password'){{ $message }} @enderror</small>
							</div>
							
							<button type="submit" class="btn btn-primary">LOGIN</button></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>
</html>









