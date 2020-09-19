@extends('master')
@section('content')
<form method="post" action="{{url('getData')}}">
    {{csrf_field()}}
    <div class="form-group"> <!-- Full Name -->
      <label for="number_id" class="control-label">Add number</label>
      <input type="number" required class="form-control" id="full_name_id" name="number" placeholder="number field">
    </div>

    <div class="form-group"> <!-- Submit Button -->
      <button type="submit" class="btn btn-primary">Get Facts</button>
    </div>
</form>
@if (Session::has('message'))
   <div class="alert alert-danger">{{ Session::get('message') }}</div>
@endif
<h3 class="text-center text-info py-3">List data</h3>
<a class="btn btn-success" href="{{action('UserDetailController@exportPDFAll')}}">Get All</a>
<table class="table table-striped">
  <thead>
    <th>Index</th>
    <th>Title</th>
    <th>Action</th>
  </thead>
  <tbody>
    @foreach($users['data'] as $key => $user)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$user['fact']}}</td>
        <td><a href="{{action('UserDetailController@exportPDF', $key)}}">Get file</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection