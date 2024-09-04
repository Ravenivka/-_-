<!doctype html>
<meta charset="utf-8">
<?php
				$table=$_POST['table'];
				$file=$_POST['file'];
				$ID=$_POST['ID'];
				$Key=$_POST['Key'];				
				$pole=$_POST['name'];
				$upload = $_FILES['upload']['tmp_name'];
				$value = file_get_contents($upload);


//echo $table.'<br>';
//echo $file.'<br>';
//echo $ID.'<br>';
//echo $Key.'<br>';
//echo $pole.'<br>';
//echo $upload.'<br>';


$db = new SQLite3($file);
$sql = "UPDATE ".$table." SET ".$pole." = ? WHERE ".$Key." = '".$ID."'";
$sth = $db->prepare ($sql);
$result = $sth->bindValue (1, $value, SQLITE3_BLOB);

$boo=$sth->execute ();
if(!$boo){
	echo "error";
}else{
	echo "Обновлено успешно";
}
unset($db);


?>
<form method="post" action="editrow.php">
<input type="hidden" value="<?php echo $table;?>" name="table" /><input type="hidden" value="<?php echo $file;?>" name="file" />
<input type="hidden" value="<?php echo $ID;?>" name="id" /><input type="hidden" value="<?php echo $Key;?>" name="key" />
<p align="center"><button type="submit">Закрыть</button> </p>


</form>