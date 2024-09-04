<!doctype html>
<html>
<head>
	<?php
if(!isset($_REQUEST['l'])){
	header('location: index.html');
}
$user=$_REQUEST['l'];
if($user!='root'){
	header('location: index.html');
}
?>
<meta charset="utf-8">
<title>Контрольная панель</title>
</head>

<body>
	<?php 	require_once('left.php');?>
	<div style="position: absolute; left: 25%; ">
		<h1 align="center">Панель управления</h1>
		<p><a href="userlist.php">Пользователи</a></p>
		<p><a href="testlist.php">Тесты</a></p>
		<p><a href="sqe.php">Редактор SQLite</a></p>
	</div>
	
	
</body>
</html>