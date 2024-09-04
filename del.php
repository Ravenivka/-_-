<!doctype html>
<meta charset="utf-8">
<?php
$r=$_POST['r'];
$db=new SQLite3('user.db');
	$q="delete from user where Login='".$r."'"  ;
	$result=$db->query($q);
	if(!$result){
	echo "ошибка удаления"	;
	}else{
		header('Location: userlist.php');
	}
?>