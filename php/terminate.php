<?
include("autorization.php");

$id  = htmlspecialchars($_POST['id'],ENT_QUOTES);


$query = "DELETE FROM contracts WHERE contract_id='$id'";

$result = executeRequest($query);

header("Location: ../contracts.php");
?>