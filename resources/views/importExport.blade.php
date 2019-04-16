<!DOCTYPE html>
<html>
<head>
    <title>Laravel File Upload</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">

	@if(Session::get('message'))

	<p class="alert alert-success">{{ Session::get('message')}}</p>
	@endif
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel File Import & Export
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
            </form>
        </div>
    </div>
    <table class="table table-hover table-dark table-bordered">
  <thead style="text-align: center;">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Create Date</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody style="text-align: center;">
  	@foreach($all_user as $key => $user)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{date('d-m-Y', strtotime($user->created_at))}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td style="width: 22%">
      	<a href="" class="btn btn-outline-success btn-xs">Edit</a>
      	<a href="" class="btn btn-outline-primary btn-xs">View</a>
      	<a href="" class="btn btn-outline-danger btn-xs">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
   
</body>
</html>