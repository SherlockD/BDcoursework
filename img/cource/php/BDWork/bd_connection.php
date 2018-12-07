<?
require_once '/connection_info.php';

function bdConnect()
{
	return mysqli_connect($host,$user,$password,$database) or die("Ошибка подключения к БД");
}	
?>