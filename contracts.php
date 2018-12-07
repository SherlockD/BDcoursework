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
<a id="selected" href="#">Контракты</a><span>/</span>
	<a href="clientage.php">Клиенты</a><span>/</span>
	<a href="employees.php">Сотрудники</a><span>/</span>
	<a href="property_list.php">Список недвижимости</a><span>
</div>

<div id="content">
<?
	$query = "SELECT * FROM contracts";
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
			printf("<tr><td>ID контракта</td><td>ID клиента</td><td>Код недвижимости</td><td>Стоимость</td><td>Дата заключения</td></tr>");
			foreach($rows as $value)
			{
				printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$value['contract_id'],$value['client_id'],$value['property_code'],$value['cost'],$value['conclusion_date']);
			}
			printf("</table>");
		}
?>

<form action='php/terminate.php' method='POST'>
		ID<input type='text' name='id' value='' />
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