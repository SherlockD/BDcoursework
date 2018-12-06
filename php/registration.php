<?
	include("autorization.php");
	header('Content-Type: text/html; charset=utf-8');
	
	$login = $_POST['user_login'];
	$password = $_POST['user_password'];
	$fio = $_POST['fio'];
	$date = $_POST['birth_date'];
	$gender = $_POST['gender'];
	$password = md5($password);
	
	$querychech = "SELECT user_login FROM users WHERE user_login='$login'";
	
	$chechresult = executeRequest($querychech);
	
	if(mysql_num_rows($chechresult) == 0)
	{	
			
	$query = "INSERT INTO users(user_login,user_password, is_admin) VALUES('$login','$password','false')";
	
	if (preg_match("#^[aA-zZ0-9\-_]+$#",$login) && $fio !="" && $date!="") 
	{
		executeRequest($query);
		$clientquery = "INSERT INTO clientage(client_login,fio,birth_year,gender) VALUES('$login','$fio','$date','$gender')";
		executeRequest($clientquery);
		header("Location: ../success.html");
	} 
	else 
	{
		header("Location: ../error.php");
	}
	}
	else
	{
		header("Location: ../error.php");
	}
?>