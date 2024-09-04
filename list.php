<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Список</title>
</head>

<body style="margin: 0;">
	<?php
	require_once('user.php');
	if(session_status()==PHP_SESSION_ACTIVE){
	session_destroy();		
	}
	$db=new SQLite3('sign.db');
	$q="Select * from Лист";
	$result=$db->query($q);
	$List=array();
	while($row=$result->fetchArray()){
	$List[]=$row[1];
	}
	?>	
	<div style="position: absolute; left: 25%; ">		
		<?php foreach($List as $val): 	?>
	<ul><?php echo $val; ?>
		<?php 
			$q="select * from marker where division='".$val."'";
			$result=$db->query($q);
			while($row=$result->fetchArray(SQLITE3_ASSOC)){
				//echo $row['Full'];
				?>
		<li><a href="bcard.php?l=<?php echo $l.'&t='.$row['DB'];?>" ><?php echo $row['Full']; ?></a></li>
		<?php
			}
		echo '</ul>';
		endforeach;		
	unset($db); ?>
	</div>
	
</body>
</html>