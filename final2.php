<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Результат</title>
</head>

<body>
<?php 	
	session_start();
	require_once('user.php');
	$re=$_SESSION['Q'];
	$mu=$_SESSION['mu'];
	$maxi=$_SESSION['Maxi'];	
	?>
	<div style="position: absolute; left: 25%; width: 70%;">		
		<?php
		session_destroy();	
		?>
		<hr>
		<h2 align="center">Результат</h2>
		<p>Вы ответили правильно на <?php echo($re); ?> из <?php echo $maxi ; ?> вопросов </p>
		<p>Ваш результат <?php echo($mu); ?> баллов </p>
		<form action="list.php" method="post">
			<input type="hidden" value="<?php echo $l; ?>" name="l"/>
		<p align="center"><button type="submit">OK</button></p>
		</form>
		
	</div>
</body>
</html>