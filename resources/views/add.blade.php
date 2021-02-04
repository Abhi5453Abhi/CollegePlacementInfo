@extends('layout')

@section('content')

<h1>Add A New Company</h1>
<div class="col-sm-6">
   <form method="POST" action="add">
      @csrf
      <div class="form-group">
         <label>Company Name</label>
         <select size="4" name="company_name" id="company_name">
            <option value="zomato">Zomato</option>
            <option value="Apple">Apple</option>
            <option value="Alyve">Alyve</option>
            <option value="Fam">Fam</option>
            <option value="Shopee">Shopee</option>
            <option value="Nutanix">Nutanix</option>
            <option value="Sharechat">Sharechat</option>
            <option value="Other">Other</option>
         </select>
      </div>
      <div class="form-group">
         <label>When did you get place?</label>
         <select class="joining_month" size="5" style="width:100px;" name="joining_month" id="joining_month">
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
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
   </form>
</div>
@stop