<style>
*{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    color: white;

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
    width:380px;
    height: 450px;
    position: relative; 
    margin: 10% auto;
    background: rgba(0,0,0,0.7);
    padding: 5px;   
    overflow: hidden;
    border-radius: 30px;
}
.button-box{
    width: 220px;
    margin:35px auto;
    position:relative;
    box-shadow: 0 0 40px 40px #ff61241f;
    border-radius: 30px;
}
.toggle-btn
{
    padding: 10px 30px;
    cursor:pointer;
    background: transparent;
    border:0;
    outline: none;
    text-decoration-color: aliceblue;
    position:relative;
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
     top:150px;
     position: absolute;
     width: 15px;
     transition: .5s;

}
.input-field{
    width: 300px;
    padding: 10px 0;
    margin: 10px 0;
    border-left: 0;
    border-top: 0;
    border-right:0;
    border-bottom: 1px solid #999 ;
    outline: none;
    background: transparent;
}
.submit-btn{
    width: 99%;
    padding: 10px 50px;
    cursor: pointer;
    margin:8% auto;
    margin-top: 30px;
    background: linear-gradient(to right,#ff105f,#ffad06);
    border:0;
    position: relative;
    outline:none;
    border-radius:30px;
    display: flex;
    left:85px;
    justify-content: center;
    
}

#login{
    left: 50px;

}
#register{
    left: 450px;

}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="background">
   <div class="form-box">
      <div class="button-box">
                    <div id="btn"> </div>
                    <button type="button" class="toggle-btn" onclick="login()"> Login </button>
                    <button type="button" class="toggle-btn" onclick="register()"> Register </button>
      </div>
      <form method="POST" action="login" form id="login" class="input-group">
      @csrf
         <input type="text" name="email" placeholder="Enter email" class="input-field" required>
         <input type="password" name="password" placeholder="Enter password" class="input-field" required>
          <button type="submit" class="submit-btn" > Login </button> 
    </form>

      <form method="POST" action="register" form id="register" class="input-group">
      @csrf
         <input type="text" name="name"  class="input-field" placeholder="Enter name" required> 
         <input type="text" name="email" class="input-field" placeholder="Enter email" required>
         <input type="password" name="password" class="input-field" placeholder="Enter password" required>
         <input type="text" name="user_type" class="input-field" placeholder="Enter 1 if you are placed else enter 0" required>
         <button type="submit" class="submit-btn"> Register  </button>
   </form>
   
</div>
</div>
<script>
            var x=document.getElementById("login");
            var y=document.getElementById("register");
            var z=document.getElementById("btn");
            function register(){
                x.style.left="-400px";
                y.style.left="50px";
                z.style.left="110px";
            }
            function login(){
                x.style.left="50px";
                y.style.left="450px";
                z.style.left="0px";
            }
</script>