<?
include("autorization.php");

$id  = $_POST['id'];

$getloginquery = "SELECT client_login FROM clientage WHERE client_id='$id'";
$getlogin = mysql_fetch_assoc(executeRequest($getloginquery));

$login = $getlogin['client_login'];

$query = "DELETE FROM clientage WHERE client_id='$id'";

$result = executeRequest($query);

$query = "DELETE FROM users WHERE user_login = '$login'";
executeRequest($query);

header("Location: ../clientage.php");

?>