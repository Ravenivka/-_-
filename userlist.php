<!doctype html>
<html>
<head>	
<meta charset="utf-8">
<title>Контрольная панель</title>
	<style>
		#table1{
			align-self: center;
			position: relative;
			width: 60vw;
			border-collapse: collapse;
		}	
		#table1 th{
			border: 1px solid black;
			color: navy;
			text-align: center;
			vertical-align: middle;
		}
		#table1 td{
			border: 1px solid black;
			color: navy;
		}
	</style>
	
</head>

<body>
	<?php 	
	require_once('left.php');
	?>
	<div style="position: absolute; left: 25%; ">
		<h1 align="center">Панель управления</h1>
		<table id="table1">
		<tr>
			<th>Login</th><th>Password</th><th>Фамилия</th><th>Имя</th><th>Группа</th><th>e</th><th>Del</th>
		</tr>
<?php
	$db=new SQLite3('user.db');
	$q="Select * from user";
	$result=$db->query($q);
	while($row=$result->fetchArray(SQLITE3_ASSOC)){
		echo '<tr>';
		echo '<td>'.$row["Login"].'</td>';
		echo '<td>'.$row["Password"].'</td>';
		echo '<td>'.$row["Family"].'</td>';
		echo '<td>'.$row["Nm"].'</td>';
		echo '<td>'.$row["Gp"].'</td>';
		echo '<td><form method="post" action="e.php"><input name="submit" type="hidden" value="'.$row['Login'].'"/>  <button type="submit">e</button> </form> </td>';
		echo '<td><form method="post" action="d.php"><input name="submit" type="hidden" value="'.$row['Login'].'"/>  <button type="submit">Del</button> </form> </td>	';
		echo '</tr>';
	}
	unset($db);
?>		
		</table>		
	</div>
	<script>
	var A=document.getElementById('addon');
	A.innerHTML='<a href=add.php>Добавить пользователя</a>';
	</script>
</body>
</html>