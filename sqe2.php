<?php require_once('top.php'); ?>
	
	<?php
	$table = $_GET['table'];
	$file = $_GET['file'];
	//echo $table;
	?>
<script>
		document.getElementById('b3').disabled = false;
		document.getElementById('b2').disabled = false;
	</script>

<div id = "main">
	<h3 align="center">Таблица <?php echo $table;  ?></h3>
	<table style="width: 98%;" border="1">
		<tr>
<?php
	$db = new SQLite3($file);
	$res = $db->query('PRAGMA table_info('.$table.')');
	$arr = array();
	$names = array();
	$n = 0;
	
	while ($row = $res->fetchArray(SQLITE3_NUM)) {
		
    	echo '<th>';
		echo $row[1].'<br>';
		echo $row[2];
		echo '</th>';
		$names[$n] = $row[1];
		$arr[$n] = $row[2];
		$n = $n + 1;
	}
?>
	<th>	</th><th></th>	</tr>
<?php
	$res = $db->query('select * from '.$table);
		
	while ($row = $res->fetchArray()) {
		$i = 0;
		echo '<tr>';
		for($i = 0; $i < count($arr); $i++){
			echo '<td>';
			if($arr[$i] == 'blob'){
				echo 'файл';
			}elseif($arr[$i] == 'BLOB'){				
					echo 'файл';				
			}else{
				echo $row[$i];				
			}
			echo '</td>';
		}
		echo '<td><form action="removerow.php" method="post">';
		echo '<input name="id" value="'.$row[0].'" type="hidden" /><input type="hidden" name="key" value="'.$names[0].'" />';
		echo '<input name="file" value="'.$file.'" type="hidden" /><input type="hidden" name="table" value="'.$table.'" />';
		echo '<button type="submit"><font color="red">&#10007;</font></button></form></td>';
		
		echo '<td><form action="editrow.php" method="post">';
		echo '<input name="id" value="'.$row[0].'" type="hidden" /><input type="hidden" name="key" value="'.$names[0].'" />';
		echo '<input name="file" value="'.$file.'" type="hidden" /><input type="hidden" name="table" value="'.$table.'" />';
		echo '<button type="submit">&#9998;</button></form></td>';
		
		echo '</tr>';
	}
		unset($db);
?>
	
	</table>



</div>
</body>
</html>