@extends('layout')

@section('content')
@if(Session::has('user'))
<style>

/* .container {
	max-width: 100%;
	margin-right:auto;
	margin-left:auto;
	display:flex;
	justify-content:center;
	align-items:center;
  
} */
.background{
    height: 100%;
    width:100%;
    background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.8)),url(https://chandigarhupdates.com/wp-content/uploads/2019/12/Chandigarh-University.jpg);
     background-position:center;
     background-size:cover;
     position:absolute;

}
.table-bordered {
  border: none;
}

td {
  text-align: center;
}
table
{
  margin-top:3%;
  border-radius:10px;
  font-size: 100%;
  background-color:rgba(0, 0, 0, 0);
  
}
thead{
  background-color:#99bbff;
  border: none;
  text-align: center;
}
h1{
  display: inline;
  position:relative;
  background:white;
  color:black;
  text-align: center;
  margin: 10px 2px;
  margin-top:2%;
  text-decoration:underline;

}
tr
{
  background-color:rgba(0, 0, 0, 0)
}
table, tbody, tr, th, td{
    background-color: rgba(0, 0, 0, 0.3) !important;
    color:white;
}
#table-scroll {
  height:550px;
  overflow:auto;  
  
}



</style>

@if(Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{Session::get('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="background">
<!-- <div>
   <h1>
      Students Record
   </h1>
</div> -->
<div class="container table table-striped table table-bordered  table table-hover table-responsive " style="overflow-x:auto" id="table-scroll">
<table class="table">
<thead> <th scope="col" colspan="8">Students Record </th></thead>
  <thead>
    <tr>
      <th scope="col">S.no.</th>
      <th scope="col">Student Name</th>
      <th scope="col">Email</th>
      <th scope="col">Company Name</th>
      <th scope="col">Joining Month</th>
      <th scope="col">Profile</th>
      <th scope="col">Fuzzy Score</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
  </div>

@foreach($data as $item)
    <tr>
      <td scope="row">{{$item->id}}</td>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->company_name}}</td>
      <td>{{$item->joining_month}}</td>
      <td>{{$item->profile}}</td>
      <td>{{$item->score}}</td>
@if($item->email == $email[0])
      <td><a href="delete/{{$item->email}}"><i class="fa fa-trash"></i></a>
      &emsp;&emsp;&emsp;
      <a href="edit/{{$item->email}}"><i class="fa fa-edit"></i></a></td>
@else
<td></td>
@endif
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<p></p>
@else
<form action="/login" method="get">
    <input type="submit" value="Go to my link location" 
         name="Submit" id="frm1_submit" />
</form>
@endif
@stop
