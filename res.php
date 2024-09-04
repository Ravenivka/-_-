<!doctype html>
<html>
	<?php session_start();?>
	<?php $file=$_SESSION['File']; ?>
	<?php $r=$_SESSION['div']; ?>
	<?php $ur='constructor.php?table='.$r;?>
	<?php $x= 'maket.php?table='.$file.'&r='.$r;?>
<head>
<meta charset="utf-8">
<title><?php echo $_SESSION['File'];?></title>
</head>

<body>
	<h1 align="center">Таблица результатов</h1>
	<a href="testlist.php">Разделы</a> >>>> <a href="<?php echo $ur;?>">Тесты</a> >>>> <a href="<?php echo $x; ?>">Выбор</a> >>>> Таблица результатов<br>
	<table style="position: relative; width: 70vw; margin: 0 auto; border-collapse: collapse;" border="1">
	<tr><th>Имя</th><th>Фамилия</th><th>Группа</th><th>Дата</th><th>Оценка</th></tr>
		<?php		
		$db=new SQLite3($file);
		$q="Select * from res";
		$result=$db->query($q);
		while($row=$result->fetchArray(SQLITE3_ASSOC)):
	?>
		<tr>
		<?php
			echo "<td>".$row['Name']."</td>";
			echo "<td>".$row['Family']."</td>";
			echo "<td>".$row['Group']."</td>";
			echo "<td>".$row['Day']."</td>";
			echo "<td>".$row['Ball']."</td>";
			?>
		</tr>
		<?php endwhile; ?>
	<?php unset($db); ?>
	</table>
</body>
</html>