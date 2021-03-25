@extends('layout')

@section('content')
   
<h2>Please add your Company details: </h2>
  <div class="col-sm-6">
   <form method="POST" action="add">
      @csrf
      <div class="form-group">
         <label>Company Name</label>
         <select size="1" name="company_name" id="company_name" style="width:200px;" class="form-control">
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
         <select size="1" style="width:200px;" name="joining_month" id="joining_month"class="form-control">
            <option value="January">January</option>
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
         <select size="1" style="width:200px;" name="profile" id="profile" class="form-control">
            <option value="Backend Developer">Backend Developer</option>
            <option value="Frontend Developer">Frontend Developer</option>
            <option value="Full Stack">Full Stack</option>
            <option value="Technical Support">Technical Support</option>
            <option value="Sales">Sales</option>
         </select>
         </br>
         <h2>Please add your Academic details: </h2>
  <div class="col-sm-6">
   <form method="POST" action="add">
      @csrf
      <div class="form-group">
         <input type="text" name="cgpa" placeholder="Cgpa"><br>
         <br>
         <input type="text" name="amcat_aptitude" placeholder="AMCAT Aptitude"><br>
         <br>
         <input type="text" name="amcat_english" placeholder="AMCAT English"><br>
         <br>
         <input type="text" name="amcat_coding_score" placeholder="AMCAT Coding Score"><br>
         </br>
      <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   </form>
   

@stop