
<div class="container my-5 w-50">
    <h1 class="text-center my-3">login to admin dashboard</h1>

    <?php 


    if(isset($_SESSION['errors']) && !empty($_SESSION['errors'])){
        $message = '';
        if(in_array('unauthenticated_user', $_SESSION['errors'])){
            $message = "Incorret Username or Password";
        }
        echo "<div class='alert alert-danger' role='alert'>
                $message
            </div>";
			
    } ?>
     <head>
  <link rel="stylesheet" href="./resources/css/style.css">
</head>
<form method="POST" action="/login">
<form>
<div class="login-wrap"> 
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		 <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label> 
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Email</label>
					<input id="user" type="email" class="input" name="email">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="password" class="input" data-type="password">
				</div>
				<div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me" checked />
                    <label class="form-check-label" for="remember_me"> Remember me </label>
                </div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
			
				
		
	</div>
</div>


</form>

