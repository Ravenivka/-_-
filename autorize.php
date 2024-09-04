<!doctype html>
<meta charset="utf-8">
<!-- удаление временных файлов -->
<?php
	$dir=__DIR__;
	if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
			$position = strpos($file, 'tem');
            if($position!==false){
				if (filectime($file)< (time()-600)) {  // 86400 = 60*60*24
          			unlink($file);
        		}
			}
        }
        closedir($dh);
    }



?>
<!-- конец блока удаления -->

<?php
$login=$_POST['login'];
$password=$_POST['password'];
if($login=='root'){
	if($password!='31415'){
		echo 'Ошибочный пароль';
		echo '<form action="index.html"><button type="submit">OK</button></form>';
		exit();
	}else{
		header('location: list.php?l=root');
	}	
}


$db=new SQLite3('user.db');
$result=$db->query("select * from user where Login='".$login."'");
if(!$result){
	echo 'Такой пользователь не существует';
	echo '<form action="index.html"><button type="submit">OK</button></form>';
}else{
	while($row=$result->fetchArray(SQLITE3_ASSOC)){
	$l=$row['Login'];
	$p=$row['Password'];	
}}
if($password==$p){
	header('location: list.php?l='.$l);
}else{
	echo 'Ошибочный пароль';
	echo '<form action="index.html"><button type="submit">OK</button></form>';
}
unset($db);
?>