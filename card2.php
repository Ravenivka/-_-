<!doctype html>
<?php session_start(); ?>
<html>
<head>
	
<meta charset="utf-8">
<title>Карточка</title>
</head>

<body>
	<?php 	
	require_once('left.php');
	$m=$_SESSION['n']+1;
	$Vopros=$_SESSION['Vopros'];
	$file=__DIR__ .'/tmp/tmp.'.$Vopros[$_SESSION['n']]['type'];
	file_put_contents($file, $Vopros[$_SESSION['n']]['value']);
	?>
	<div style="position: absolute; left: 25%; width: 75vw;">
	<h1 align="center">Вопрос № <?php echo $m;?> </h1>
		<hr>
		<form action="save.php" method="post">
<table style="position: relative; margin: 0 auto; width: 60vw;"><tr>
<td> <input type="radio" value="txt" name="type"/> <input type="text" value="" name="text"/> </td>			
<td><input type="radio" value="<?php echo $Vopros[$_SESSION['n']]['type'];?>" name="type"/><img style="height: 15vh;" alt="File" src="<?php echo $file;?>"/><br> </td>	
			
			
			
		?>
		<hr>
		<ul>
		<?php
		foreach($card['otvet'] as $otvet){
			echo "<li>";
			echo '<input type="checkbox" name="c'.$otvet['key'].'" value=1 />';
			if($otvet['type']=='txt'){
				echo $otvet['text'];				
			}
			echo "</li>";
		}
		
		?>
			<p align="center"><button type="submit">Далее</button></p>
			</form>
		</ul>
	</div>
</body>
</html>