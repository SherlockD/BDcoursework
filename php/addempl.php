<?
include("autorization.php");

$surname  = $_POST['surname'];
$name = $_POST['name'];
$patronymic  = $_POST['patronymic'];
$birth_year = $_POST['birth_year'];
$telephone  = $_POST['telephone'];


$query = "INSERT INTO employees(surname,name,patronymic,birth_year,telephone) VALUES('$surname','$name','$patronymic','$birth_year','$telephone')";

$result = executeRequest($query);

header("Location: ../employees.php");
?>