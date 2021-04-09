<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
        
<form class="p-3 mb-2 bg-light text-dark" action="{{ route('user.update', $login->id) }}" method="POST">
@csrf
<!--<div class="results">
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
</div>-->
<h1>EDIT USER</h1>
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
    <label for="exampleInputPassword1">Role</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ADM for admin USR for user" name="role" value= "{{old ('role') }}">
    <small class="text-danger">@error('role'){{ $message }} @enderror</small>

  </div>
  <button type="submit" class="btn btn-primary">UPDATE</button>
  <a href="/profile" class="btn btn-primary">Back</a>
  <br>
 
</form>
</div>
    </div>
</div