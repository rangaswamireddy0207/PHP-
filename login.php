
<?php session_start();  ?>
<?php include('db_connection.php');  ?>
<?php

$login_error = "";
$user_error   = "";

if(isset($_POST['login'])){

	$username	=	mysqli_real_escape_string($conn,$_POST['username']);
	$password	=	mysqli_real_escape_string($conn,$_POST['password']);
	

	$sql2		=  "select * from users where username='{$username}'";

	$res 		=	mysqli_query($conn,$sql2);


	if($res){

			if(mysqli_num_rows($res) == 1){
		while($row = mysqli_fetch_assoc($res)){
			$user_password = $row['password'];
			
			if(password_verify($password,$user_password)){
				//$login_error = "Account suceessfully logedin!";
				$_SESSION['username'] = $row['username'];
				header("Location: main.php");
			}else{
				$login_error = "please chec password!";
			}

		}
	}else{
		$user_error = "User does not exist plesea signup!";
	}

	}else{
		$user_error = "user does not exit please signup";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<ul style="list-style-type: none;">
		<li><a href="index.php">Home</a></li>
		<li><a href="login.php">Login</a></li>
		<li><a href="signup.php">Signup</a></li>
	</ul>
	<form  action="login.php" method="post">
		<input type="text" name="username" required placeholder="username"></br>
		<input type="password" name="password" required placeholder="password"></br>
		<input type="submit" name="login" value="Login">
	</form>
	<p><?php  echo $login_error; ?></p>
	<p><?php  echo $user_error; ?></p>
</body>
</html>