<!doctype html>
<?php
if(isset($_POST['n'])){
	$n=$_POST['n'];
}else{
	$n=1;
}
$user=$_REQUEST['l'];
$filename=$_REQUEST['t'];
//echo $filename;
session_start();
$_SESSION['sum']=array();
$db=new SQLite3('sign.db');
$q="select * from marker where DB='".$filename."'";
			$result=$db->query($q);
			while($row=$result->fetchArray(SQLITE3_ASSOC)){
			$m=$row['Maxi'];
				$fu=$row['Full'];
				$Once=$row['Once'];
			}
//echo $m;
//die();
	$_SESSION['Maxi']=$m;
$_SESSION['Once']=$Once;
$_SESSION['Full']=$fu;
unset($db);
$_SESSION['user']=$user;
$_SESSION['filename']=$filename;
$Vopros=array();
$i=0;
$db=new SQLite3($filename);
$result=$db->query('Select * from Вопрос');
$Otvet=array();
while($row=$result->fetchArray(SQLITE3_ASSOC)){
	$Vopros[$i]['text']= $row['Вопрос'];
	$Vopros[$i]['price']= $row['Цена'];
	$Vopros[$i]['type']= $row['Тип'];
	$Vopros[$i]['value']= $row['Value'];
	$Vopros[$i]['key']=$row['Код'];
	$i=$i+1;
}
$result=$db->query('select * from Ответ');
$i=0;
while($row=$result->fetchArray(SQLITE3_ASSOC)){
	$Otvet[$i]['text']= $row['Ответ'];
	$Otvet[$i]['price']= $row['Цена'];
	$Otvet[$i]['type']= $row['Тип'];
	$Otvet[$i]['value']= $row['Value'];
	$Otvet[$i]['ally']= $row['Ally'];
	$Otvet[$i]['key']=$row['Код'];
	$i=$i+1;
}
$i=0;
$card = array();
foreach($Vopros as $item){
$o=array();	
	foreach($Otvet as $obj){
		if($item['key']==$obj['ally']){
			$o[]=$obj;			
		}
	}
	$card[$i]['vopros']=$item;
	shuffle($o) ;
	$card[$i]['otvet']=$o;
	$i=$i+1;
}
shuffle($card);
$_SESSION['card']=$card;
unset($db);
header('location: card1.php');

?>