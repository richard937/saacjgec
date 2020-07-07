<?php
require 'config.php';
session_start();
	$sql = "SELECT Name, id, PASS, status FROM admin WHERE Email = '".$_POST['your_email']."'";
	$result = $pdo->query($sql);
	$row=$result->fetch(PDO::FETCH_ASSOC);
	if($row['PASS'] != ""){
	$name = $row['Name'];
	if($row['status'] == 0){
	$status = "Not-Varified";    
	}
	else{
	    $status = "Varified";    
	}
	$pass = $row['PASS'];
	$to      = $_POST['your_email']; // Send email to our user
	
    $subject = 'SAAC | FORGET'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your Information is given Bellow.
 
------------------------
------------------------
Name: '.$name.'
Password: '.$pass.'
Status: '.$status.'
------------------------
------------------------

Best wishes from SAAC.

                                                 Thank You

Best regards,
Admin
Sristi 2020
 
'; // Our message above including the link
                     
$headers = 'From:noreply@sristi.co' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
?>
<script>
    alert("PLease, Check Your Email for name and password.");
    window.location ="LogIn.html";
</script>
<?php
}
if($row['PASS'] == ""){
?>
<script>
    alert("Sorry, We can't find your account.");
    window.location ="SignUp.html";
</script>
	<?php
}
?>