<?php session_start();  ?>
<?php include('db_connection.php') ?>

<?php

	$username = $_SESSION['username'];

	$sql3 = "select * from messages where username='{$username}' order by ttime desc";

	$res3 = mysqli_query($conn,$sql3);
		
	if(mysqli_num_rows($res3) > 0){
		while($row = mysqli_fetch_assoc($res3)){
			
			echo "Message:   ".$row['message']."    From:   ".$row['sender']."   at:  ".$row['ttime'] ."</br>";
			
		}
	}
		

	?>