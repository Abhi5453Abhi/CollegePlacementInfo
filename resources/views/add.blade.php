@extends('layout')

@section('content')
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
.background{
    height: 100%;
    width:100%;
    background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.8)),url(https://chandigarhupdates.com/wp-content/uploads/2019/12/Chandigarh-University.jpg);
     background-position:center;
     background-size:cover;
     position:absolute;

}
.form-box
{
    width:415px;
    height: 450px;
    position: relative; 
    margin: 3% auto;
    background: rgba(0,0,0,0.7);
    padding: 5px;   
    overflow: hidden;
    border-radius: 30px;
    color: white;
    overflow-y: auto;
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
    width: 5%;
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


</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="background">
   <div class="form-box">
      <div class="button-box">
                    <div id="btn"> </div>
                    <button type="button" class="toggle-btn" onclick="login()"> Placed </button>
                    <button type="button" class="toggle-btn" onclick="register()"> Not Placed </button>
      </div>


   <form method="POST" action="add" form id="login" class="input-group">
      @csrf
      <div class="form-group">
      <label class="input-name" > Company Name: </label>
         <!-- <label>Company Name</label> -->
         <select size="1" name="company_name" id="company_name" class="form-control">
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
         <label class="input-name">Joining Month: </label>
         <select size="1" name="joining_month" id="joining_month" class="form-control">
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
         <label class="input-name">Your Profile: </label>
         <select size="1"  name="profile" id="profile" class="form-control">
            <option value="Backend Developer">Backend Developer</option>
            <option value="Frontend Developer">Frontend Developer</option>
            <option value="Full Stack">Full Stack</option>
            <option value="Technical Support">Technical Support</option>
            <option value="Sales">Sales</option>
         </select>
         </br>
         <label class="input-name">Your Package: </label>
         <input type="number" name="package" id="package" class="form-control"><br>
         
      
      <label class="input-name"> Enter CGPA </label>
         <input type="text" name="cgpa" class="form-control"><br>
        
         <label class="input-name"> AMCAT Aptitude </label>
         <input type="text" name="amcat_aptitude" class="form-control" ><br>
        
         <label class="input-name"> AMCAT English </label>
         <input type="text" name="amcat_english" class="form-control"><br>
        
         <label class="input-name"> AMCAT Coding Score </label>
         <input type="text" name="amcat_coding_score" class="form-control"><br>
       
      <button type="submit" class="submit-btn">Submit</button>
      </form>
      </div>
      
      <form method="POST" action="add" form id="register" class="input-group">
      @csrf
      <div class=form-group>
      <label class="input-name"> Enter CGPA </label>
         <input type="text" name="cgpa" class="form-control"><br>
        
         <label class="input-name"> AMCAT Aptitude </label>
         <input type="text" name="amcat_aptitude" class="form-control" ><br>
        
         <label class="input-name"> AMCAT English </label>
         <input type="text" name="amcat_english" class="form-control"><br>
        
         <label class="input-name"> AMCAT Coding Score </label>
         <input type="text" name="amcat_coding_score" class="form-control"><br>
         
         <button type="submit" class="submit-btn"> Submit  </button>  
   </form>
      </div>
      </div>
      </div>
   
   
   <script>
            var x=document.getElementById("login");
            var y=document.getElementById("register");
            var z=document.getElementById("btn");
            function register(){
                x.style.left="-400px";
                y.style.left="5px";
                z.style.left="110px";
            }
            function login(){
                x.style.left="5px";
                y.style.left="400px";
                z.style.left="0px";
            }
</script>
   

@stop