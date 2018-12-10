<?
include("autorization.php");

$email  = mysql_real_escape_string($_POST['email']);

$toisadmin = "UPDATE users SET is_admin = 1 where Email='$email'";

executeRequest($toisadmin);

$userid = executeRequest("SELECT user_id FROM users WHERE Email='$email'");

$userid = mysql_fetch_assoc($userid);

$userid = $userid['user_id'];

$query = "INSERT INTO employees(user_id,Date) VALUES('$userid',Now())";

$result = executeRequest($query);

header("Location: ../employees.php");
?>