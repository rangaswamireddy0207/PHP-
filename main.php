<?php session_start();  ?>
<?php include('db_connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_SESSION['username']; ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

	<?php

	if(isset($_POST['send_message'])){
		$sender   = mysqli_real_escape_string($conn,$_SESSION['username']);
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$message  = mysqli_real_escape_string($conn,$_POST['message']);

		$sql4     = "insert into messages(username,message,sender) values('{$username}','{$message}','{$sender}')";

		$res4     = mysqli_query($conn,$sql4);

	}

	?>


	<script type="text/javascript">

			setInterval(function(){$("#demo").load('messages.php')},1000);

	</script>
	<div id="demo"></div>
	<form action="main.php" method="post">
		<input type="text" name="username" required placeholder="receiver name:"></br>
		<textarea name="message" placeholder="type here:"></textarea></br>
		<input type="submit" name="send_message" value="send_message">
	</form>
	<ul>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</body>
</html>