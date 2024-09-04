<!doctype html>
<?php session_start(); ?>
<html>
<head>
	
<meta charset="utf-8">
<title>Карточка</title>
</head>

<body>
	<?php 	require_once('user.php');?>
	<div style="position: absolute; left: 25%; width: 75vw;">
	<h1 align="center">Вопрос № <?php echo $_SESSION['num'];?> </h1>
	<?php 		$card=$_SESSION['card'][$_SESSION['num']-1]; 		?>
		<hr>
		<form action="sum.php" method="post">
		<?php
		if($card['vopros']['type']=='txt'){
		?>
		<p><font size="+2"><?php echo $card['vopros']['text']; ?>  </font></p>
	<?php
		} else{
			//$tmpfile = tempnam(__DIR__, 'temp').'.'.$row[$y];
			$file=tempnam(__DIR__, 'temp').'.'.$card['vopros']['type'];
			file_put_contents($file, $card['vopros']['value']);
			$path_parts = pathinfo($file);
					$file = $path_parts['basename'];
			echo '<p align="center"><img alt="" src="'.$file.'" height="100" /> </p>';
		}
		?>
		<hr>
		<ul>
		<?php
		foreach($card['otvet'] as $otvet){
			echo "<li>";
			echo '<input type="checkbox" name="c'.$otvet['key'].'" value=1 />';
			if($otvet['type']=='txt'){
				echo $otvet['text'];				
			}else{
				$file=tempnam(__DIR__, 'temp').'.'.$otvet['type'];
				file_put_contents($file, $otvet['value']);
				$path_parts = pathinfo($file);
					$file = $path_parts['basename'];
			echo '<p><img alt="" src="'.$file.'" height="100" /> </p>';
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