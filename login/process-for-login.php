<?php
require 'config.php';
session_start();

	$sql = "SELECT id, Name ,PASS, Email status FROM admin WHERE Email = '".$_POST['your_email']."'";
	$result = $pdo->query($sql);
	$row=$result->fetch(PDO::FETCH_ASSOC);
	if($row['PASS'] == ""){
	    ?>
	    <script>alert("We can't find your Account, Please create a Account");window.location = "SignUp.html";</script>
	    <?php
	    
	}
		if($row['status'] == 0){
	    ?>
	    <script>alert("Please verify your Account");window.location = "LogIn.html";</script>
	    <?php
	}
	$pass = md5($row['PASS']);
	$hash = md5($_POST['password']);
	if ($pass == $hash) {
	    
	    $_SESSION['client'] = $row['Email'];
		    $_SESSION['admin-id'] = $row['id'];
		    $_SESSION['nm']=$row['Name'];
		    header("location: http://saacjgec.com/Blog/My-Blog");
	}
	else{
	    ?>
	    <script>alert("Incorrect email id or password.");window.location = "LogIn.html";</script>
	    <?php
	}
?>
