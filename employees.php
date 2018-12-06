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
	<a href="clientage.php">Клиенты</a><span>/</span>
	<a id="selected" href="#">Сотрудники</a><span>/</span>
	<a href="property_list.php">Список недвижимости</a><span>
</div>

<div id="content ">
<?
	$query = "SELECT * FROM employees";
	$result = executeRequest($query);
		
		if(mysql_num_rows($result) > 0)
		{
			//$result = mysql_fetch_assoc($result);
			
			$rows = array();
			while ($row = mysql_fetch_assoc($result)) 
			{ 
				$rows[] = $row; 
			}
			
			printf("<table border='1'>");
			foreach($rows as $value)
			{
				
				printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$value['employee_id'],$value['surname'],$value['name'],$value['patronymic'],$value['birth_year'],$value['telephone']);
				
			}
			printf("</table>");
		}
?>

<form action='php/deleteempl.php' method='POST'>
		ID<input type='text' name='id' value='' />
		<input type='submit' value='Уволить'/>
</form>

<form action='php/addempl.php' method='POST'>
		Фамилия<input type='text' name='surname' value='' />
		Имя<input type='text' name='name' value='' />
		Отчество<input type='text' name='patronymic' value='' />
		Год рождения<input type='text' name='birth_year' value='' />
		Телефон<input type='text' name='telephone' value='' />
		<input type='submit' value='Взять на работу'/>
</form>
</div>

 <div id="footer">
        
			О разработчиках: Порфирьев А.И.,Андреев Д.А.,Михеев М.С. БИ-31 Copyright © 2018 <a href="index.html" target="_self">Недвижимость"</a>
			<br>
			<img src="img/images.jpg" alt="фотография">
		</div>
</body>
</html>