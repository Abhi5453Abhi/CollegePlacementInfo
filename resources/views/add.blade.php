@extends('layout')

@section('content')

<h1>Add A New Company</h1>
<div class="col-sm-6">
   <form method="POST" action="add">
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
         <label>Company Name</label>
         <select name="company_name" id="company_name">
            <option value="zomato">Zomato</option>
            <option value="Apple">Apple</option>
            <option value="Alyve">Alyve</option>
            <option value="Other">Other</option>
         </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
   </form>
</div>
@stop