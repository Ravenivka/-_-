<!doctype html>
<meta charset="utf-8">
<?php
				$table=$_POST['table'];
				$file=$_POST['file'];
				$ID=$_POST['ID'];
				$Key=$_POST['Key'];
				$value=$_POST['new'] ;
				$pole=$_POST['name'];

$db = new SQLite3($file);
$query = "UPDATE ".$table." SET ".$pole." = '".$value."' WHERE ".$Key." = '".$ID."'";
$boo=$db->exec($query);
if(!$boo){
	echo "error";
}else{
	echo "Обновлено успешно";
}
unset($db);

//$table = $_POST['table'];
	//$file = $_POST['file'];
	//$ID = $_POST['id'];
	//$Key = $_POST['key'];
?>
<form method="post" action="editrow.php">
<input type="hidden" value="<?php echo $table;?>" name="table" /><input type="hidden" value="<?php echo $file;?>" name="file" />
<input type="hidden" value="<?php echo $ID;?>" name="id" /><input type="hidden" value="<?php echo $Key;?>" name="key" />
<p align="center"><button type="submit">Закрыть</button> </p>


</form>
