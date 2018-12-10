<?
include("autorization.php");

$id = mysql_real_escape_string($_POST['id']);

$unadmin = "UPDATE users INNER JOIN employees ON users.user_id = employees.user_id SET is_admin = 0 WHERE employees.employee_id = '$id'";

echo executeRequest($unadmin);

$query = "DELETE FROM employees WHERE employee_id='$id'";

$result = executeRequest($query);

header("Location: ../employees.php");
?>