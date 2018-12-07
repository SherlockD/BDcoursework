<?
include("autorization.php");

$id  = htmlspecialchars($_POST['id'],ENT_QUOTES);

$query = "DELETE FROM employees WHERE employee_id='$id'";

$result = executeRequest($query);

header("Location: ../employees.php");
?>