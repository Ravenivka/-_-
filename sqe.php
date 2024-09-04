	<?php require_once('top.php'); ?>	
<?php
$rootDir = __DIR__;
$allFiles = array_diff(scandir($rootDir . "/"), [".", ".."]);
$ext = array('db', 'sqlite', 'db3', 'sqlite3', 'Db', 'Sqlite', 'Db3', 'Sqlite3', 'DB', 'DB3', 'SQLITE', 'SQLITE3');
?>
<div id = "main">
	<h3>Список файлов</h3>
	<?php 
		foreach($allFiles as $file){ 
			$pathinfo = pathinfo($file);
			if (isset($pathinfo['extension'])){
				$exten = $pathinfo['extension'];
			}else{
				$exten="";
			}
			if(in_array($exten, $ext)){
			?>
			<form method="get" action="sqe1.php">
			<input type="hidden" value="<?=$file ?>" name="file" />
			<button class="white" type="submit" ><?=$file ?> </button>
			</form><br>
	<?php } } ?>
</div>

</body>
</html>
	