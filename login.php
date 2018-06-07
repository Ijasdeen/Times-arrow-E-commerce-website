<?php require_once('connection.php')?>
<?php require_once('Includes/header.php')?>
<main class="d-md-block d-sm-block d-xs-block d-lg-none">
    <div class="container mainloginArea">
        <br><br>
         <h3 class="login-header">LOGIN</h3>
             <div class="login-wrapper text-center">
              <form method="POST" id="loginForm">
                <div class="form-group"><input type="email" name="userEmail" id="userEmail" class="userEmail form-control" placeholder="Email" required></div>
                <div class="form-group"><input type="password" name="userPassword" id="userPassword" class="form-control" placeholder="password" required></div>
                <div class="form-group"><span class="text text-danger loginMessage"></span>
                    <div><a href="javascript:void(0);" class="btn btn-link" id="createanAccount">Create new account</a></div><input type="submit" value="SIGN IN" class="form-control btn btn-outline-primary" id="signIn"></div>
            </form>
        </div>
    </div>
       
        <div class="container mainsignupArea">
        <br><br>
         <h3 class="signup-header">SIGN-UP</h3>
             <div class="login-wrapper text-center">
             <form method="POST" id="SignUpForm"><div class="form-group"><input type="text" id="signUpFirstName" class="form-control" placeholder="First Name" required/></div><div class="form-group"><input type="text" class="form-control" id="signUpLastName" placeholder="Last name" required/></div><div class="form-group"><input type="email" name="signUpEmail" id="signUpEmail" class="signUpEmail form-control" placeholder="Email" required></div><div class="form-group"><input type="password" name="signupPassword" id="signupPassword" class="form-control" placeholder="password" required></div><div class="form-group"><span class="text text-danger signupMessage"></span><div><a href="javascript:void(0);" class="btn btn-link callLoginArea">Login</a></div><input type="submit" value="SIGN UP" class="form-control btn btn-outline-info" id="signIn"></div></form>
             <span class="final-result text text-success"></span>
        </div>
    </div>
</main>
<?php require_once('Includes/footer.php')?>