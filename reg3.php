<!doctype html>
<meta charset="utf-8">
<?php
$user=$_POST['u'];
$parent=$_POST['parent'];
$login=$_POST['login'];
$password=$_POST['password']	;
$family=$_POST['family'];	
$usver=$_POST['user'];		
$gp=$_POST['group']	;	
$db=new SQLite3('user.db');
$q="delete from user where Login='".$user."'";
$result=$db->query($q);
if(!$result){
	echo "Ошибка записи";
	exit();
}

$q ='insert into user(Login, Password, Family, Nm, Gp) VALUES (?,?, ?, ?, ?)';

$stm=$db->prepare($q);
$stm->bindParam(1, $login);
$stm->bindParam(2, $password);
$stm->bindParam(3, $family);
$stm->bindParam(4, $usver);
$stm->bindParam(5, $gp);
$result = $stm->execute()  ;

if(!$result){
	header('Location: errlog.html');
}else{
	echo '<a href="'.$parent.'">success</a>';
	
}
unset($db);
	?>