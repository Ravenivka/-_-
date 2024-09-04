<?php require_once('top.php'); ?>
<?php
	include_once('Functions.php');
	$table = $_POST['table'];
	$file = $_POST['file'];
	$ID = $_POST['id'];
	$Key = $_POST['key'];
	//echo $file;
	?>
<script>
		document.getElementById('b3').disabled = false;
		document.getElementById('b2').disabled = false;
</script>

<div id = "main">
<?php
	$db = new SQLite3($file);
	$res = $db->query('PRAGMA table_info('.$table.')');	
	$names = array();
	$arr = array();
	$n = 0;
	
	while ($row = $res->fetchArray(SQLITE3_NUM)) {		
		$names[$n] = $row[1];	
		$arr[$n] = $row[2];
		$n = $n + 1;
	}	
	$s = "Select * from ".$table." Where ".$Key." = '".$ID."'";
	$res = $db->query($s);
	while ($row = $res->fetchArray(SQLITE3_NUM)) {
		for($i=0; $i<count($row); $i++){
?>
	<div style="border: 1px solid black; width: 100%;">
<?php
			echo '<p>'.$names[$i].'</p>';
			if(($arr[$i] == "BLOB") || ($arr[$i] == "blob")){
				$y = typenumber($names);
				if($row[$y] == 'txt'){
					echo '(none)';
				}else{
					$tmpfile = tempnam(__DIR__, 'temp').'.'.$row[$y];
					file_put_contents($tmpfile, $row[$i]);
					$path_parts = pathinfo($tmpfile);
					$tmpfile = $path_parts['basename'];
					echo '<img alt="" src="'.$tmpfile.'" style="width:10%;" />';					
				}
				echo '<form enctype="multipart/form-data" method="post" action="updatefile.php">';
					echo '<input name="name" value="'.$names[$i].'"  type="hidden" />';
					echo '<input name="table" value="'.$table.'" type="hidden" />';
					echo '<input name="file" value="'.$file.'"  type="hidden" />';
					echo '<input name="ID" value="'.$ID.'"  type="hidden" />';
					echo '<input name="Key" value="'.$Key.'"  type="hidden" />';
					echo '<input type="file" name="upload" />	';
					echo '<button type="submit">SAVE</button></form>';
			} else{
?>
		<form method="post" action="update.php">
		
<?php
				echo '<input name="table" value="'.$table.'" type="hidden" />';
				echo '<input name="file" value="'.$file.'"  type="hidden" />';
				echo '<input name="ID" value="'.$ID.'"  type="hidden" />';
				echo '<input name="Key" value="'.$Key.'"  type="hidden" />';
				echo '<input name="name" value="'.$names[$i].'"  type="hidden" />';
				echo '<input name="new" value="'.$row[$i].'" style="width: 90%;" type="text"  />';
?>
		<button type="submit">SAVE</button>
		</form>
<?php
			}
		echo '</div>';
		unset($db);
		}		
	}
?>	
		

</div>
</body>
</html>