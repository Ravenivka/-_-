<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Тесты</title>
</head>

<body>
<?php 
	require_once('left.php'); 
	if(session_status()==PHP_SESSION_ACTIVE){
	session_destroy();		
	}
	?>
	<script>
	var A=document.getElementById('addon');
	A.innerHTML='<a href=addDiv.php>Добавить раздел</a>';
	</script>
<div style="position: absolute; left: 25%; width: 75vw; ">
		<h1 align="center">Панель управления тестами</h1>
	Разделы
	<h1 align="center">Разделы</h1>
	<ol>
<?php
		$db=new sqlite3('sign.db');
		$q="Select Name from Лист";
		$Result=$db->query($q);
		while($row=$Result->fetchArray(SQLITE3_ASSOC)){
			echo '<li>';
			echo '<a href="constructor.php?table='.$row['Name'].'">'.$row['Name'].'</a>';
			echo '</li>';
		}
		unset($db);
?>	
	</ol>
</body>
</html>