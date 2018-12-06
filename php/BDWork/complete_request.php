<?
require_once '/bd_connection.php';

function executeRequest($query)
{
	$link = dbConnect();	
	$result = mysqli_query($link,$query) or die("Ошибка" . mysqli_error($link));	
	mysqli_close($link);
	
	return $result;
}
?>