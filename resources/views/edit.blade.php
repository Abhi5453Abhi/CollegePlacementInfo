@extends('layout')

@section('content')

<h1>edit your details here</h1>
<div class="col-sm-6">
   <form method="post" action="/edit">
      @csrf
        <div class="form-group">
        <input type="hidden" name="email" value="{{$data->email}}">
         <label>Edit your company: </label>
         <select size="1" style="width:200px;" name="company_name" value="{{$data->company_name}}" id="company_name" class="form-control">
            <option value="zomato">Zomato</option>
            <option value="Apple">Apple</option>
            <option value="Alyve">Alyve</option>
            <option value="Fam">Fam</option>
            <option value="Shopee">Shopee</option>
            <option value="Nutanix">Nutanix</option>
            <option value="Sharechat">Sharechat</option>
            <option value="Other">Other</option>
         </select>
         <br>
         <label>When did you get place?</label>
         <select size="1" style="width:200px;" value="{{$data->joining_month}}" name="joining_month" id="joining_month" class="form-control">
            <option value="Januray">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
         </select>
         <br>
         <label>Your Profile</label>
         <select size="1" style="width:200px;" value="{{$data->profile}}" name="profile" id="profile" class="form-control">
            <option value="Backend Developer">Backend Developer</option>
            <option value="Frontend Developer">Frontend Developer</option>
            <option value="Full Stack">Full Stack</option>
            <option value="Technical Support">Technical Support</option>
            <option value="Sales">Sales</option>
         </select>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
   </form>
</div>
@stop