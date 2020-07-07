<?php
require 'config.php';
$sql = "SELECT name,id FROM admin where Email = '".$_POST['your_email']."'";
	$result = $pdo->query($sql);
	$row=$result->fetch(PDO::FETCH_ASSOC);
	if($row['id'] != ""){
	    ?>
	    <script>
	    alert("This Email already Register.");
    window.location ="SignUp.html";
    </script>
	    <?php
	}
	if($row['id'] == ""){
$name=$_POST['first_name']." ".$_POST['last_name'];
$sql1 = "INSERT INTO `admin`(`Name`, `Email`, `PASS`,`DOB` ,`SP` ,`INS` ,`DEPT`, `YOS`, `MOB`, `WHP`, `status`) VALUES ('".$name."','".$_POST['your_email']."','".$_POST['password']."','".$_POST['dob']."','".$_POST['sp']."','".$_POST['ins']."','".$_POST['dept']."','".$_POST['yos']."','".$_POST['mob']."','".$_POST['whp']."',0)";
		$stmt=$pdo->prepare($sql1);
$stmt->execute();

$client = ($_POST['your_email']);
$hash = md5($_POST['password']);
$url = "http://saacjgec.com/Login/varify.php?code=B068931CC450442B63F5B3D276EA4297&client=".$client."&hash=".$hash;
$to      = $_POST['your_email']; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Verification Link: '.$url.'
------------------------

Best wishes from SAAC.
Thank You


Best regards,
Admin
SAAC
 
'; // Our message above including the link
                     
$headers = 'From:noreply@saacjgec.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
echo "<h1 style='text-align:center;'>Thank You For Registering.</h1>";
?>
<script>
    alert("PLease, Verify Your Email.");
    window.location ="SignUp.html";
</script>
<?php
}
?>

