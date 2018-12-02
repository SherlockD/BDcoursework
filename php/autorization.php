<?

header('Content-type: text/html; charset=utf-8');

$host ='localhost';
$database = 'swlddhzn_siteBD';
$user = 'swlddhzn_admin';
$password = '72qwerty72';

    if(isset($_POST['log_out']))
    {
        echo "log out";
        out();
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
	session_destroy();
	header("Location: http://persas.u-host.in/cource/index.php");
}

/*function isAdmin($id)
{
	$query = "SELECT is_admin FROM users WHERE user_id='$id'";
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
*/
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
			    session_start();
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
		$errors[] = "Введите имя пользователя и пароль";
		return $errors;
	}
}
?>