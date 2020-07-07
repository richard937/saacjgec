<?php
//<! DATABSE CONNECTION>//
#**********************************************************

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=u571263316_saac','u571263316_saac','sanat');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "<---#MYSQL Server Connected Sucessfully#--->";


?>