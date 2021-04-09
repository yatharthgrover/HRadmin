<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <h1>WELCOME USER</h1>
<div class="text-right">
        <a class="btn btn-default-btn-xs btn-success" href="/add"><i class="glyphicon glyphicon-plus"></i> ADD WORK </A>
</div><br>
<table class="table table-bordered table-condensed table-hover" >
  <thead>
    <tr>
      <th scope="col">EMAIL</th>
      <th scope="col">WORK TYPE</th>
      <th scope="col">DESCRIPTION</th>


    </tr>
  </thead>
  <tbody>
  @foreach($works as $item)
    <tr>
      <td>{{ $item->email}}</td>
      <td>{{ $item->work_type}}</td>
      <td>{{ $item->description}}</td> 
      @endforeach
    </tr>
    </tbody>
    </table>
<div class="text-center">
    <a href= "/logout" title="delete this user" class="btn btn-default-btn-lg btn-danger">LOGOUT</a>
</div>
    </div></div></div>