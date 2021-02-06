<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 
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