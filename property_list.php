<?php include("php/autorization.php"); 
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML> 
<html>

<head>  <title>Агентство "Вечер в хату"</title>
<meta charset="UTF-8">
		<title>Title</title>
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="header">
<i><a href="index.php">Главная</a><span>/</span>
<?if(isAdmin()){
	echo"
<a href='contracts.php'>Контракты</a><span>/</span>
	<a href='clientage.php'>Клиенты</a><span>/</span>
	<a href='employees.php'>Сотрудники</a><span>/</span>
	";
	}
	?>
	<a id='selected' href='property_list.php'>Список недвижимости</a><span>
	
</div>

<div id="content">
<?
$query = "SELECT * FROM property WHERE deleted!=1";
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
				
				printf("<tr><td><form action='php/buy.php' method='POST'>
						<input type='text' name='id' value='%s' readonly />
						<input type='text' name='code' value='%s' readonly />
						<input type='text' name='cost' value='%s' readonly />
						<input type='text' name='adress' value='%s' readonly />
						<input type='text' name='type' value='%s' readonly />
						<input type='submit'  value='Купить'/>
						</form></td></tr>",
						$value['id_property'],$value['property_code'],$value['cost'],$value['address'],$value['property_type']
				);
				
			}
			printf("</table>");
		}
?>
</div>	

 <div id="footer">
        
			О разработчиках: Порфирьев А.И.,Андреев Д.А.,Михеев М.С. БИ-31 Copyright © 2018 <a href="index.html" target="_self">Недвижимость"</a>
			<br>
			<img src="img/images.jpg" alt="фотография">
		</div>
</body>
</html>