<?php include("php/autorization.php"); ?>

<!DOCTYPE HTML> 
<html>

<head>  <title>Агентство "Вечер в хату"</title>
<meta charset="UTF­8">
		<title>Title</title>
		<link rel="stylesheet" href="style.css">
</head>
<body>
<? if(isAdmin())
{	
echo "<div id='header'>
<i><a href='index.php'>Главная</a><span>/</span>
<a id='selected' href='#'>Контракты</a><span>/</span>
	<a href='clientage.php'>Клиенты</a><span>/</span>
	<a href='employees.php'>Сотрудники</a><span>/</span>
	
</div>
	<div id='content'>
 <p align='center'><img src='img/admin.jpg'></p>
 
 </div>";
}
else
{
	echo "<h1>Вы не являетесь администратором(ухади)<\h1>";
}
?>
 <div id="footer">
        
			О разработчиках: Порфирьев А.И.,Андреев Д.А.,Михеев М.С. БИ-31 Copyright © 2018 <a href="index.html" target="_self">Недвижимость"</a>
			<br>
			<img src="img/images.jpg" alt="фотография">
		</div>
</body>
</html>