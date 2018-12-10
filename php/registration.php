<?
	include("autorization.php");
	header('Content-Type: text/html; charset=utf-8');
	
	$login = mysql_real_escape_string($_POST['user_login']);
	$password = mysql_real_escape_string($_POST['user_password']);
	$fio = mysql_real_escape_string($_POST['fio']);
	$date = mysql_real_escape_string($_POST['birth_date']);
	$gender = isset($_POST['gender'])?1:0;
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