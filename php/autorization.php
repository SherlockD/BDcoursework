<?

header('Content-type: text/html; charset=utf-8');
session_start();
$host ='localhost';
$database = 'swlddhzn_siteBD';
$user = 'swlddhzn_admin';
$password = '72qwerty72';


    if(isset($_POST['log_out']))
    {
        echo "log out";
        out();
		echo '<script>window.location="../index.php"</script>';
    }
 


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
	if(isset($_SESSION['user_login']))
	{
		return true;
	}
	return false;
}

function out()
{
	unset($_SESSION['user_login']);
	session_destroy();
	
}

function isAdmin()
{
	session_start();
	$id = $_SESSION['user_login'];
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
	
	if($_POST['user_login'] !="" && $_POST['user_password'] != "")
	{
		$login = $_POST['user_login'];
		$password = $_POST['user_password'];
		
		$query = "SELECT * FROM users WHERE user_login='$login'";
		
		$queryResult = executeRequest($query);
		
		if(mysql_num_rows($queryResult) == 1)
		{
			$result = mysql_fetch_assoc($queryResult);
			if(md5($password) == $result['user_password'])
			{				
				$_SESSION['user_login'] = $result['user_login'];	
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
?>