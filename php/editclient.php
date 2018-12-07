<?
include("autorization.php");

$id  = htmlspecialchars($_POST['id'],ENT_QUOTES);
$fio  = htmlspecialchars($_POST['fio'],ENT_QUOTES);
$type  = htmlspecialchars($_POST['type'],ENT_QUOTES);
$adress  = htmlspecialchars($_POST['adress'],ENT_QUOTES);


$query = "UPDATE clientage SET fio='$fio',property_type='$type',property_adress='$adress'";

$result = executeRequest($query);

echo $result;
?>