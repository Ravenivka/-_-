<?php require_once('top.php'); ?>	


	<?php
		$file = $_GET['file'];
		//echo $file;
	?>
	<script>
		document.getElementById('b2').disabled = false;
	</script>

<div id = "main">
	<h3>Список таблиц</h3>
<?php
	$string = "";
	$db = new SQLite3($file);
	$tablesquery = $db->query("SELECT name FROM sqlite_master WHERE type='table';");
    while ($table = $tablesquery->fetchArray(SQLITE3_ASSOC)) {
		if($table['name'] != 'sqlite_sequence'){
			echo '<form action="sqe2.php" method="get">';
       		echo '<input type="hidden" name="table" value="'.$table['name'] .'"/>';
			echo '<input type="hidden" name="file" value="'.$file .'"/>';
			echo '<button class="white" type="submit" >'.$table['name'].'</button></form>';
		}
    }
?>
	

</div>
</body>
</html>