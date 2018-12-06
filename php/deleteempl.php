<?
include("autorization.php");

$id  = $_POST['id'];

$query = "DELETE FROM employees WHERE employee_id='$id'";

$result = executeRequest($query);

header("Location: ../employees.php");
?>