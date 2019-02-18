<?php include('db_connection.php'); ?>
<?php

$password_error = "";
$signup_error	= "";

if(isset($_POST['signup'])){

	$password	=	$_POST['password'];
	$repassword	=	$_POST['repassword'];

	if($password == $repassword){
		
		$username	=	mysqli_real_escape_string($conn,$_POST['username']);
		$fullname	=	mysqli_real_escape_string($conn,$_POST['fullname']);
		$email		=	mysqli_real_escape_string($conn,$_POST['email']);
		$password	=	mysqli_real_escape_string($conn,$_POST['password']);
		
		$password 	= password_hash($password,PASSWORD_DEFAULT);

		$sql1		=	"insert into users(username,fullname,email,password) values('{$username}','{$fullname}','{$email}','{$password}')";

		$res 		=	mysqli_query($conn,$sql1);

		if($res){
			$signup_error = "Account created succcessfully.";
		}else{
			$signup_error = "Something Went wrong Please try again!";
		}

	}else{
		$password_error = "Passwords are not the same!";
	}


	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>
	<ul style="list-style-type: none;">
		<li><a href="index.php">Home</a></li>
		<li><a href="login.php">Login</a></li>
		<li><a href="signup.php">Signup</a></li>
	</ul>
	<form action="signup.php" method="post">
		<input type="text" name="username" placeholder="username" required></br>
		<input type="text" name="fullname" placeholder="full name" required></br>
		<input type="email" name="email" placeholder="email" required></br>
		<input type="password" name="password" placeholder="password" required></br>
		<input type="text" name="repassword" placeholder="reenter password" required></br>
		<input type="submit" name="signup" value="Signup">
	</form>
	<p><?php echo $password_error; ?></p>
	<p><?php echo $signup_error; ?></p>
</body>
</html>