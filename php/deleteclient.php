<?
include("autorization.php");

$email  = mysql_real_escape_string($_POST['email']);

$query = "DELETE FROM users WHERE Email='$email'";

executeRequest($query);

header("Location: ../clientage.php");

?>