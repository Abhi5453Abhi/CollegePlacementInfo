@extends('layout')

@section('content')

<div>
   <h1>
      Students Record
   </h1>
</div>
@if(Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{Session::get('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Name</th>
      <th scope="col">Email</th>
      <th scope="col">Company Name</th>
      <th scope="col">Joining Month</th>
      <th scope="col">Profile</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>

@foreach($data as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->company_name}}</td>
      <td>{{$item->joining_month}}</td>
      <td>{{$item->profile}}</td>
      <td><a href="delete/{{$item->email}}"><i class="fa fa-trash"></i></a></td>
      <td><a href="edit/{{$item->email}}"><i class="fa fa-edit"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<p></p>
@stop
