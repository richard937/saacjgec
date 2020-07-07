<?php
include 'config.php';
session_start();
$client = $_GET['client'];
$hash = $_GET['hash'];
$sql = "SELECT id, PASS, Name FROM admin WHERE Email = '".$client."'";
	$result = $pdo->query($sql);
	$row=$result->fetch(PDO::FETCH_ASSOC);
	$pass = md5($row['PASS']);
	$nm = $row['Name'];
	$id = $row['id'];

	if ($pass != $hash) {
		die("unauthorised Varification Link");
	}
	if ($pass == $hash) {
		$sqli = "UPDATE `admin` SET `status`='1' WHERE email ='".$client."'";
				$stmt=$pdo->prepare($sqli);
$stmt->execute();
$_SESSION['client'] = $client;
$_SESSION['nm'] = $nm;
$_SESSION['admin-id']=$id;

		header("location:http://saacjgec.com/Blog/My-Blog");
	}
  ?>