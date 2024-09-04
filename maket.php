<!doctype html>
<html>
<head>
	
<meta charset="utf-8">
<title>Выбор</title>
</head>
	<body>
	<?php
	$file=$_GET['table'];
		$r=$_GET['r'];
		require_once('left.php');
		$ur='constructor.php?table='.$r;
	?>

<div style="position: absolute; left: 25%; width: 75vw;">	
	<h1 align="center">Панель управления тестами</h1>
	<a href="testlist.php">Разделы</a> >>>> <a href="<?php echo $ur;?>">Тесты</a> >>>> Выбор<br>
<table style="position: relative; width: 60vw; margin: 0 auto;">
<tr><td><a href="card2.php">Содержимое теста</a></td><td><a href="res.php" >Результаты теста</a></td></tr>
</table>
<?php
if(session_status()==PHP_SESSION_ACTIVE){
	session_destroy();		
	}
session_start();
$_SESSION['File']=$file;
$_SESSION['div']=$r;
$Vopros=array();
$i=0;
$db=new SQLite3($file);
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

$_SESSION['Vopros']=$Vopros;

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

$_SESSION['Otvet']=$Otvet;

$i=0;
$result=$db->query('select * from res');
$Res=array();
while($row=$result->fetchArray(SQLITE3_ASSOC)){
		$Res[$i]['ID']=$row['ID'];
		$Res[$i]['Family']=$row['Family'];
		$Res[$i]['Name']=$row['Name'];
		$Res[$i]['Group']=$row['Group'];
		$Res[$i]['Day']=$row['Day'];
		$Res[$i]['Ball']=$row['Ball'];
		$i=$i+1;
}

$_SESSION['Res']=$Res;
$_SESSION['n']=0;
unset($db);
?>
		</div>
</body>
</html>