@extends('layout')

@section('content')

<style>
* {
  text-align: center;
}

/* Container for skill bars */
.container {
  margin-left:30px;
  width:80%; /* Full width */
  background-color: #ddd; /* Grey background */
}

.skills {
  padding-top: 10px; /* Add top padding */
  padding-bottom: 10px; /* Add bottom padding */
  color: white; /* White text color */
}
@php
$total_count = sizeof($data);
$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
@endphp
@for($i=0;$i<$total_count;$i++)
.<?php echo $data[$i]['company_name']; ?> {width: <?php echo $data[$i]['company_count']; ?>%; background-color: <?php echo '#'. $rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)]?>;} 
@endfor
</style>
@for($i=0;$i<$total_count;$i++)
<div class="container">
  <div class="skills <?php echo $data[$i]['company_name']; ?>"> 
  <?php echo  $data[$i]['company_name']."    ".$data[$i]['company_count']; ?>
  %</div>
</div>
<br>
@endfor
//This is a change.
@stop
