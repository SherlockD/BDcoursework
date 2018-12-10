<?
include("autorization.php");

$id  = mysql_real_escape_string($_POST['id']);


$query = "DELETE FROM contracts WHERE contract_id='$id'";

$result = executeRequest($query);

header("Location: ../contracts.php");
?>