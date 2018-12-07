<?

header('Content-type: text/html; charset=utf-8');
session_start();
$host ='localhost';
$database = 'swlddhzn_siteBD';
$user = 'swlddhzn_admin';
$password = '72qwerty72';

function bdConnect()
{
    return  mysql_connect ("localhost", "superuser","123") or die("Error" .mysql_error());
}

function executeRequest($query)
{
	$link = mysql_connect ("localhost", "superuser","123") or die("Error" .mysql_error());
	$db = mysql_select_db("bd",$link);
	$result = mysql_query($query) or die("Error " . mysql_error());	
	mysql_close($link);
	
	return $result;
}

function login()
{
	//session_start();
	if(isset($_COOKIE['user_login']))
	{
		return true;
	}
	return false;
}


function isAdmin()
{
	$id = $_COOKIE['user_login'];
	$query = "SELECT is_admin FROM users WHERE user_login='$id'";
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
	
	if(!isset($_COOKIE['user_login']))
	{
	if($_POST['user_login'] !="" && $_POST['user_password'] != "")
	{
		$login = htmlspecialchars($_POST['user_login'],ENT_QUOTES);
		$password = htmlspecialchars($_POST['user_password'],ENT_QUOTES);
		
		$query = "SELECT * FROM users WHERE user_login='$login'";
		
		$queryResult = executeRequest($query);
		
		if(mysql_num_rows($queryResult) == 1)
		{
			$result = mysql_fetch_assoc($queryResult);
			if(md5($password) == $result['user_password'])
			{		
				$user_login_result = $result['user_login'];
				if(setcookie('user_login',$user_login_result,time()+3600))
				{
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
}
?>