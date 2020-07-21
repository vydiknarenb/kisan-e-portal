<?php
session_start();
include "js/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register | KEP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
    <div class="bg-img" style="background-image: url('./img/bg%20(1).jpg');">
			<div class="overlay"></div>
		</div>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method="post" action="register.php">
					<span class="login100-form-title p-b-33">
						Account Register
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="number" name="aadharno" placeholder="Aadhar number">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email / Phone number">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
                    
                    <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="confirmpassword" placeholder="Confirm Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn" type="submit" name="register_user">
							Register
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Already existing account?
						</span>

						<a href="login.php" class="txt2 hov1">
							Sign in
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	
	<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootsrap/popper.js"></script>
	<script src="js/bootsrap/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
<?php
if (isset($_POST['register_user'])) {
  $aadharno =  $_POST['aadharno'];
  $email =  $_POST['email'];
  $password =  $_POST['password'];
  $confirmpassword =  $_POST['confirmpassword'];
	if ($password != $confirmpassword) {
       echo "<script>alert('Please re-enter the password correctly');location.href='register.php'</script>";
       exit();
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE aadharno='".$aadharno."' OR email='".$email."'";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['aadharno'] === $aadharno || $user['email']=== $email) {
      echo "<script>alert('Account already exists');location.href='register.php'</script>";
      exit();
    }

  }
  if($aadharno !=''||$email !='' || $password !='' || $confirmpassword !=''){
  	$query = "INSERT INTO users (aadharno, email, password,confirmpassword) 
  			  VALUES('$aadharno', '$email', '$password','$confirmpassword')";
  	mysqli_query($con, $query);
  	$_SESSION['email'] = $email;
  	//echo "$aadharno";
  	 echo "<script>alert('Registered Successfully');location.href='login.php'</script>";
  }
}

?>
</body>
</html>