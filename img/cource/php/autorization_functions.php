<?
require_once 'BDWork/complete_request.php';
header('Content-type: text/html; charset=utf-8');
function login()
{
	session_start();
	if(isset($_SESSION['user_id']))
	{
		return true;
	}
	return false;
}

function out()
{
	session_start();
	unset($_SESSION['user_id']);
	//header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
}

function isAdmin($id)
{
	$query = "SELECT is_admin FROM test_table WHERE id='$id'";
	$queryResult = executeRequest($query);
	if(mysql_num_rows(queryResult) == 1)
	{
		$result = mysql_fetch_assoc($queryResult)['is_admin'];
		if($result == true)
		{
			return true;
		}
	}
	return false;
}

function enter($user_login,$user_password)
{
	$errors = array();
	
	if($user_login !="" && $user_password != "")
	{
		$login = $user_login;
		$password = $user_password;
		
		$query = "SELECT * FROM test_table WHERE user_login=$login";
		
		$queryResult = executeRequest($query);
		
		if(mysqli_num_rows($queryResult) == 1)
		{
			$result = mysql_fetch_assoc($queryResult);
			if(md5(password) == $result['user_password'])
			{				
				$_SESSION['user_id'] = $result['user_id'];				
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
		$errors[] = "Пустые поля";
		return $errors;
	}
}
?>