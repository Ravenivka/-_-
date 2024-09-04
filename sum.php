<!doctype html>
<meta charset="utf-8">
<?php session_start(); ?>
<?php 		$card=$_SESSION['card'][$_SESSION['num']-1]; 		?>
<?php
$k=$_SESSION['num']-1;
$_SESSION['sum'][$_SESSION['num']-1]=1;
$z=0;
$i=0;
$price=$card['vopros']['price'];
foreach($card['otvet'] as $otvet){
	$c='c'.$otvet['key'];
	
		if(isset($_POST[$c])){
		$a=$_POST[$c]*1;		
		}else{
		$a=0;	
		}
	$b=$otvet['price'];
	if($a!=$b)	{
		$_SESSION['sum'][$_SESSION['num']-1]=0;
	}
}
	
	$_SESSION['num']=$_SESSION['num']+1;
if($_SESSION['num']<($_SESSION['Maxi']+1)){
	header('location: card.php');
}else{
	header('location: final.php');
}
?>