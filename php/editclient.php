<?
include("autorization.php");

$id  = $_POST['id'];
$fio  = $_POST['fio'];
$type  = $_POST['type'];
$adress  = $_POST['adress'];


$query = "UPDATE clientage SET fio='$fio',property_type='$type',property_adress='$adress'";

$result = executeRequest($query);

echo $result;
?>