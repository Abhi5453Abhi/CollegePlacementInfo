@extends('layout')

@section('content')

<div>
   <h1>
      Companies Data
   </h1>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Company Name</th>
      <th scope="col">Stduent's Count</th>
    </tr>
  </thead>
  <tbody>

@foreach($data as $item)
    <tr>
    <th scope="row">@php
        echo $item['company_id']
      @endphp</th>
      <th scope="row">@php
        echo $item['company_name']
      @endphp</th>
      <th scope="row">@php
        echo $item['company_count']
      @endphp</th>
    </tr>
    @endforeach
  </tbody>
</table>
<p></p>
@stop
