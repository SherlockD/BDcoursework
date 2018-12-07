<?
	include("autorization.php");
	
	$login = $_POST['user_login'];
	$password = $_POST['user_password'];
	$password = md5($password);
	
	$query = "INSERT INTO users(user_login,user_password, is_admin) VALUES('$login','$password','false')";
	
	if (preg_match("#^[aA-zZ0-9\-_]+$#",$login)) 
	{
		executeRequest($query);
		header("Location: succes.html");
	} 
	else 
	{
		header("Location: error.html");
	}
	
?>