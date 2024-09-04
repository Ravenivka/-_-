<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Тесты</title>
</head>

<body>
<?php 
	require_once('left.php'); 
	$razdel=$_GET['table'];
?>
	<script>
	var A=document.getElementById('addon');
	A.innerHTML='<a href=addtest.php>Добавить тест</a>';
	</script>
<div style="position: absolute; left: 25%; width: 75vw; ">
		<h1 align="center">Панель управления тестами</h1>
	<a href="testlist.php">Разделы</a> >>>> Тесты
	<h1 align="center">Тесты</h1>
	<ol>
<?php
		$db=new sqlite3('sign.db');
		$q="Select * from marker where Division='".$razdel."'"  ;
		$Result=$db->query($q);
		while($row=$Result->fetchArray(SQLITE3_ASSOC)){
			echo '<li>';
			echo '<a href="maket.php?table='.$row['DB'].'&r='.$razdel.'">'.$row['Full'].'</a>';
			echo '</li>';
		}
		unset($db);
?>	
	</ol>
</body>
</html>