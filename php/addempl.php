<?
include("autorization.php");

$surname  = htmlspecialchars($_POST['surname'],ENT_QUOTES);
$name = htmlspecialchars($_POST['name'],ENT_QUOTES);
$patronymic  = htmlspecialchars($_POST['patronymic'],ENT_QUOTES);
$birth_year = htmlspecialchars($_POST['birth_year'],ENT_QUOTES);
$telephone  = htmlspecialchars($_POST['telephone'],ENT_QUOTES);


$query = "INSERT INTO employees(surname,name,patronymic,birth_year,telephone) VALUES('$surname','$name','$patronymic','$birth_year','$telephone')";

$result = executeRequest($query);

header("Location: ../employees.php");
?>