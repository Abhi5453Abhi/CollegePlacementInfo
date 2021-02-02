@extends('layout')

@section('content')

<h1>Add A New Company</h1>
<div class="col-sm-6">
   <form method="POST" action="register">
      @csrf
      <div class="form-group">
         <label>Name</label>
         <input type="text" name="name" placeholder="Enter name"> <br>
         <span style="color: red">@error('name'){{$message}}@enderror</span>
      </div>
      <div class="form-group">
         <label>Email</label>
         <input type="text" name="email" placeholder="Enter email"><br>
         <span style="color: red">@error('email'){{$message}}@enderror</span>
      </div>
      <div class="form-group">
         <label>Password</label>
         <input type="text" name="password" placeholder="Enter password"><br>
         <span style="color: red">@error('password'){{$message}}@enderror</span>
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
   </form>
</div>

@stop