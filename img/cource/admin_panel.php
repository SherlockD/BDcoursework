<?php include("php/autorization.php"); ?>

<!DOCTYPE HTML> 
<html>

<head>  <title>��������� "����� � ����"</title>
<meta charset="UTF�8">
		<title>Title</title>
		<link rel="stylesheet" href="style.css">
</head>
<body>
<? if(isAdmin())
{	
echo "<div id='header'>
<i><a href='index.html'>�������</a><span>/</span>
<a id='selected' href='#'>���������</a><span>/</span>
	<a href='info.html'>�������</a><span>/</span>
	<a href='box.html'>����������</a><span>
	
</div>
	<div id='content'>
 <p align='center'><img src='img/admin.jpg'></p>
 
 </div>"
}
else
{
	echo "<h1>�� �� ��������� ���������������(�����)<\h2>"
}
 <div id="footer">
        
			� �������������: ��������� �.�.,������� �.�.,������ �.�. ��-31 Copyright � 2018 <a href="index.html" target="_self">������������"</a>
			<br>
			<img src="img/images.jpg" alt="����������">
		</div>
</body>
</html>