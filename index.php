<?php include("php/autorization.php"); ?>

<!DOCTYPE HTML> 
<html>

<head>  <title>Агентство "Вечер в хату"</title>
<meta charset="UTF-8">
		<title>Title</title>
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="header">
<i><a id="selected" href="#">Главная</a><span>/</span></i>
	<a href="info.html">О нас</a><span>/</span>
	<a href="contactinfo.html">Контакты</a><span>/</span>
	<?
	if(login())
	{
		echo"<a href='property_list.php'>Список недвижимости</a><span>";
	}
	?>
</div>
	<div id="autorization">
	<fieldset>
	<?
	if(login())
    {    
		$admin = isAdmin();
		echo "<p>Добро пожаловать:</p>";echo $_SESSION['user_login'];
        echo "<form action='php/autorization.php' method='POST'>
		<input type='submit' value='Выход' name = 'log_out' />
	     </form>";
		 if($admin)
		 {			 
		 echo "<a id='selected' href='admin_panel.php'>Панель администратора</a>";
		 }
    }
    else
    {
    echo "
	<legend><h2>Заполните форму авторизации</h2></legend>
	<form action=''  method='POST'>
		Логин<input type='text' name='user_login' value='' />
		Пароль<input type='password' name='user_password' value='' />
		<input type='submit' value='Войти' name = 'log_in' />
	</form>	";
	
	$error = enter();
		
	if(count($error) == 0)
	{
		echo '<script>window.location="index.php"</script>';
	}
	 else
    {
	    echo "$error[0]";
    }
    }
	
    ?>
	</fieldset>	
	</div>
	<div id="content">
 <h1>  Недвижимость</h1>
 <p align="center"><img src="img/298.jpg"></p>
 <MARQUEE>Вечер в хату, часик в радость, чифир в сладость, ногам ходу, голове приходу, матушку удачу, сто тузов по сдаче, ходу воровскому,господа арестанты!</MARQUEE>
<div id="box_text">
 О нас:
<p>В агентстве недвижимости «Вечер в хату» специально для вас мы собрали самую ХУДШУЮ подборку жил. площади!
 <br>
 Только у нас самое оптимальное соотношение высокие цены-ужасное качество! Меняем чифир на дом!
 Мы работаем только с проверенными поставщиками! Отсидевшим скидка! 
  </p></div>
 </div>
 <div id="footer">
        
			О разработчиках: Порфирьев А.И.,Андреев Д.А.,Михеев М.С. БИ-31 Copyright © 2018 <a href="index.html" target="_self">Недвижимость"</a>
			<br>
			<img src="img/images.jpg" alt="фотография">
		</div>
</body>
</html>
