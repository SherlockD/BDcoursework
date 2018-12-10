<?php include("php/autorization.php"); ?>
<!DOCTYPE HTML> 
<html>

<head>  <title>Агентство "Вечер в хату"</title>
<meta charset="UTF­8">
		<title>Title</title>
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="header">
<i><a href="index.php">Главная</a><span>/</span>
<a href="contracts.php">Контракты</a><span>/</span>
	<a id="selected" href="#">Клиенты</a><span>/</span>
	<a href="employees.php">Сотрудники</a><span>/</span>
	<a href="property_list.php">Список недвижимости</a><span>
</div>

<div id="content">
<form action='' method='POST'>
		ID<input type='text' name='email' value='email' />
		<input type='submit' value='Найти'/>
</form>
<?
	$email = mysql_escape_string($_POST['email']);
	
	if($email!="email")
	{
		$query = "SELECT * FROM clientage RIGHT JOIN users ON users.user_id = clientage.user_id WHERE Email='$email'";
		$result = userexecuteRequest($query);
	}
		
		if(mysql_num_rows($result) > 0)
		{
			//$result = mysql_fetch_assoc($result);
			
			$rows = array();
			while ($row = mysql_fetch_assoc($result)) 
			{ 
				$rows[] = $row; 
			}
			
			printf("<table border='1'>");
			printf("<tr><td>ID пользователя</td><td>ID клиента</td><td>Имя</td><td>Адрес</td><td>Почта</td></tr>");
			foreach($rows as $value)
			{
				
				printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$value['user_id'],$value['client_id'],$value['Name'],$value['Address'],$value['Email']);
				
			}
			printf("</table>");
		}
?>

<form action='php/deleteclient.php' method='POST'>
		Email<input type='text' name='email' value='' />
		<input type='submit' value='Удалить'/>
</form>

</div>	

 <div id="footer">
        
			О разработчиках: Порфирьев А.И.,Андреев Д.А.,Михеев М.С. БИ-31 Copyright © 2018 <a href="index.html" target="_self">Недвижимость"</a>
			<br>
			<img src="img/images.jpg" alt="фотография">
		</div>
</body>
</html>