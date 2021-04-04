@extends('layout')

@section('content')


<!-- <h4><?php echo "Your fuzzy score is ".$data;   ?></h4> -->
<style>
*{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}
@media only screen and (max-width: 600px) {
    .form-box {
      width : 400px;
      height: 70vh;
    }
  }
.form-box
{
    width:415px;
    height: 600px;
    position: relative; 
    margin: 3% auto;
    background: rgba(0,0,0,0.7);
    padding: 5px;   
    overflow: hidden;
    border-radius: 30px;
    color: white;
}
option{
   color: black;
   background-color: white;
}
.button-box{
    width: 220px;
    margin:35px auto;
    position:relative;
    box-shadow: 0 0 40px 40px #ff61241f;
    border-radius: 30px;
    color: white;
}
.icon{
    
    margin:35px auto;
    position:relative;
    color: white;
    font-size:20px;
    width:100px;
    top:-50px;
}
.toggle-btn
{
    padding: 10px 22px;
    cursor:pointer;
    background: transparent;
    border:0;
    outline: none;
    text-decoration-color: aliceblue;
    position:relative;
    color: white;
}
#btn{
    top:0;
    left: 0;
    position: absolute;
    width: 110px;
    height: 100%; 
    background: linear-gradient(to right,#ff105f,#ffad06);
    border-radius: 30px;
    transition: .5s;
}
.input-group{
     transition: .5s;
     position:relative;
     display:inline-block;

}
/* .input-field{
    width: 300px;
    padding: 10px 0;
    margin: 10px 0;
    border-left: 0;
    border-top: 0;
    border-right:0;
    border-bottom: 1px solid #999 ;
    outline: none;
    background: transparent;
    border-radius:30px;
    
    
} */
.input-name
{
   float: left;
    margin-right: -2%;
    margin-left: 8%;
    display: inline-block;
    width:34%;
    
}
.form-control
{
   width: 51%;
   height:1%;
}
.submit-btn{
    width: 20%;
    padding: 10px 50px;
    cursor: pointer;
    margin:8% 15%;
    margin-top: 20px;
    background: linear-gradient(to right,#ff105f,#ffad06);
    border:0;
    position: relative;
    outline:none;
    border-radius:30px;
    display: flex;
    left:85px;
    justify-content: center;
    color:white;
    
}
input {
  display:inline;
  border-radius:30px;
  overflow:visible;
}

#login{
    left: 5px;

}
#register{
    left: 400px;

}
.input-group{
     
     position: absolute;
     transition: .1s;

}
h1{
    text-align:centre;
    font-weight:strong;
    display:block;
    margin:auto;
    margin-bottom:20px;
    font-family: sans-serif;    
    margin-left: 16%;

}


</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
   <div class="form-box">
      


   <form method="POST" action="/edit" form id="login" class="input-group">
      @csrf
      <div class="form-group">
      <input type="hidden" name="email" value="{{$data->email}}">
      <h1> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Your Details: </h1>

      <label class="input-name" > 
 Company Name: </label>
         <!-- <label>Company Name</label> -->
         <input type="none" value="{{$data->company_name}}" readonly   name="company_name" id="company_name" class="form-control">
    
         <br>
         <label class="input-name">Joining Month: </label>
         <input type="none" value="{{$data->joining_month}}" readonly  class="form-control"name="joining_month" id="joining_month">
            
         <br>
         <label class="input-name">Your Profile: </label>
         <input type="none" value="{{$data->profile}}" readonly name="profile" id="profile" class="form-control">
            
         </br>
         <label class="input-name">Your Package: </label>
         <input type="none" name="package" id="package" class="form-control" value="{{$data->package}}" readonly><br>
         
      
      <label class="input-name"> Enter CGPA </label>
         <input type="text" name="cgpa" class="form-control" value="{{$data->cgpa}}" readonly ><br>
        
         <label class="input-name"> AMCAT Aptitude </label>
         <input type="text" name="amcat_aptitude" class="form-control"  value="{{$data->amcat_aptitude}}"readonly><br>
        
         <label class="input-name"> AMCAT English </label>
         <input type="text" name="amcat_english" class="form-control" value="{{$data->amcat_english}}" readonly><br>
        
         <label class="input-name"> AMCAT Coding Score </label>
         <input type="text" name="amcat_coding_score" class="form-control" value="{{$data->amcat_coding_score}}" readonly ><br>
         
         <button type="submit" class="submit-btn" > Edit </button>  
    
       
      </form>
      </div>
      
      
   
   


@stop