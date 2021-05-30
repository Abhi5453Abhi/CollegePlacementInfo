<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>CollegePlacement</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

   <style>
   .navbar 
   {
    background: rgba(0,0,0,0.7);
    font-size:20px;
    padding:10px;
   }
  .navbar a:hover { 
color: black;
background-color: gray;
border-radius:10px;
}
   .navbar-brand,.nav-link,.nav-item  {
    padding:0px;
    margin-right: 2rem;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: 20px;
    padding:10px;
   }
   .navbar-brand{
     margin-right:3rem;

   }
.footer {
  position:fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  color: black;
  text-align: center;
  padding-left:2em;
  margin-top:200px;
  
}
.social-media{
  font-size:48px;
}
.background{
    height: 100%;
    width:100%;
    background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.8)),url(https://chandigarhupdates.com/wp-content/uploads/2019/12/Chandigarh-University.jpg);
     background-position:center;
     position:absolute;
     background-size: cover;
}
.fa fa-user
{
  color:black;
}
</style>
</head>


<body>
<div class="background">
<nav class="navbar navbar-expand-sm navbar-light bg-light bg">
  <a class="navbar-brand " href="/list_graph"> <i class="fa fa-pie-chart" aria-hidden="true">
Placement Stats </i> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    @if(Session::get('user'))
      <li class="nav-item">
        <a class="nav-link" href="/list"><i class="fa fa-database" aria-hidden="true">
Students-Record </i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/add"><i class="fa fa-plus-circle" aria-hidden="true">
Add</i></a>
      </li>
      <li class="nav-item">
      
        <a class="nav-link" href="/analysis"> <i class="fa fa-bar-chart" aria-hidden="true">
Placement Analysis</i> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about"> <i class="fa fa-user" aria-hidden="true" style='font-size:20px'> Profile </i>

</a>
      </li>
      @else
      <script>window.location = "/login";</script>
      @endif
    </ul>
  </div>
</nav>
<div>
   @yield('content')
</div>
<div class="footer fixed-bottom">
    <p style="color:white">Made by Abhishek Arora and Jasveen Kaur</p>
    <table class="table">
  <thead>
    <tr>
    <a href="https://www.linkedin.com/in/abhishekarora5453/" class="social-media fa fa-linkedin-square"></a>
    &emsp;&emsp;&emsp;
    <a href="https://github.com/Abhi5453Abhi" class="social-media fa fa-github"></a>
    </tr>
  </thead>
</div>
</div>
</body>
</html>