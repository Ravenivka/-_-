<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Внимание</title>	
</head>

<body>	
	<?php
	$R=$_POST['submit'];
	?>
	
	<p>Вы действительно желаете удалить запись <?php echo $R; ?>?</p>
	<table><tr>
		<form method="post">
	<td><button type="submit" formaction="userlist.php">Нет</button></td><td><input type="hidden" value="<?php echo $R; ?>" name="r" /><button type="submit" formaction="del.php">Да</button></td>
			</form>
	</tr>	</table>
</body>
</html>