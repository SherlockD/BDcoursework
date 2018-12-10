<?

function bdConnect()
{
    return mysql_connect ("127.0.0.1", "superuser","123") or die("Error" .mysql_error());
}

function userexecuteRequest($query)
{
	$link = mysql_connect ("127.0.0.1", "simpleuser","123") or die("Error" .mysql_error());
	$db = mysql_select_db("bd",$link);
	$result = mysql_query($query) or die("Error " . mysql_error());	
	mysql_close($link);
	
	return $result;
}

function executeRequest($query)
{
	$link = mysql_connect ("127.0.0.1", "superuser","123") or die("Error" .mysql_error());
	$db = mysql_select_db("bd",$link);
	$result = mysql_query($query) or die("Error " . mysql_error());	
	mysql_close($link);
	
	return $result;
}

function login()
{
	//session_start();
	if(isset($_COOKIE['user_email']))
	{
		return true;
	}
	return false;
}


function isAdmin()
{
	$email = $_COOKIE['user_email'];
	$query = "SELECT is_admin FROM users WHERE Email='$email'";
	$queryResult = executeRequest($query);
	if(mysql_num_rows($queryResult) == 1)
	{
		$result = mysql_fetch_assoc($queryResult);
		if($result['is_admin'] == 1)
		{
			return 1;
		}
	}
	return 0;
}

function enter()
{
	$errors = array();
	
	if(!isset($_COOKIE['user_email']))
	{
	if($_POST['user_email'] !="" && $_POST['user_password'] != "")
	{
		$email = mysql_real_escape_string($_POST['user_email']);
		$password = mysql_real_escape_string($_POST['user_password']);
		
		$password = md5($password);
		
		$query = "SELECT * FROM users WHERE Email='$email' AND user_password='$password'";
		
		$queryResult = executeRequest($query);
		
		if(mysql_num_rows($queryResult) == 1)
		{
			$result = mysql_fetch_assoc($queryResult);
			if(md5($password == $result['user_password']))
			{		
				$user_email_result = $result['Email'];
				if(setcookie('user_email',$user_email_result,time()+3600))
				{
					$addlog="INSERT INTO log(email,login_date) VALUES('$user_email_result',Now())";
					executeRequest($addlog);
					return $errors;
				}
				$errors[] = "Не удалось установить куки";
				return $errors;
			}
			else
			{
				$errors[] = "Неверный логин или пароль";
				return $errors;	
			}
		}
		else
		{
			$errors[] = "Пользователь не найден";
			return $errors;		
		}
	}
	else
	{
		$errors[] = "Введите имя пользователя и пароль";
		return $errors;
	}
	}
	else{
		$error[] = "Куки уже заняты";
	}
}
?>