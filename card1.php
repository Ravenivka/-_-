<!doctype html>
<html>
<head>
	
<meta charset="utf-8">
	<?php session_start(); ?>
	
<title><?php echo $_SESSION['Full']; ?></title>
</head>

<body>
	<?php
	require_once('user.php');
	$_SESSION['num']=1;
	?>
	<div style="position: absolute; left: 25%; width: 70%;">
	<h1 align="center"><?php echo $_SESSION['Full']; ?></h1>
		<?php
		if($_SESSION['Once']==0){
			?>
	<p>Тест содержит <?php echo $_SESSION['Maxi'];?> вопросов, на некоторые из них надо дать более 1 ответа.</p>
		<?php
		}else{
			?>
		<p>Тест содержит <?php echo $_SESSION['Maxi'];?> вопросов, c 1 правильным ответом.</p>
		<?php
		}
		?>
	<form action="card.php" method="post">
	<p align="center"><button type="submit">СТАРТ</button></p>
	</form>
	</div>
</body>
</html>