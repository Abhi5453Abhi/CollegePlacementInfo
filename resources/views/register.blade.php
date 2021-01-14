@extends('layout')

@section('content')

<h1>Add A New Company</h1>
<div class="col-sm-6">
   <form method="POST" action="register">
      @csrf
      <div class="form-group">
         <label>Name</label>
         <input type="text" name="name" placeholder="Enter name">
      </div>
      <div class="form-group">
         <label>Email</label>
         <input type="text" name="email" placeholder="Enter email">
      </div>
      <div class="form-group">
         <label>Password</label>
         <input type="text" name="password" placeholder="Enter password">
      </div>
      <div class="form-group">
         <label>Contact</label>
         <input type="text" name="contact" placeholder="Enter contact">
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
   </form>
</div>

@stop