<!doctype html>
<meta charset="utf-8">
<?php 	
	session_start();
	require_once('user.php');
	function Mera($x, $Moxi){
		if($x<(0.33*$Moxi)){
			$r=2;
			return($r);
			//break;
		}elseif($x<(0.66*$Moxi)){
			$r=3;
			return($r);
			//break;
		}elseif($x<=(0.9*$Moxi)){
			$r=4;
			return($r);
		}else{
			$r=5;
			return($r);
		}
	}	
		$X=date("d.m.y");
		$filename=$_SESSION['filename'];
		$db=new SQLite3($filename);			
		$re=0;
		foreach($_SESSION['sum'] as $u){
			$re=$u*1+$re;			
		}
	$_SESSION['Q']=$re;		
		$mu=Mera($re,$_SESSION['Maxi']);
		$stmt = $db->prepare("Insert  into res  values(?,?,?,?,?,?)");
		$stmt->bindValue(1, null, SQLITE3_TEXT);
$stmt->bindValue(2, $f, SQLITE3_TEXT);
$stmt->bindValue(3, $i, SQLITE3_TEXT);
$stmt->bindValue(4, $g, SQLITE3_TEXT);
$stmt->bindValue(5, $X, SQLITE3_TEXT);
$stmt->bindValue(6, $mu, SQLITE3_INTEGER);
$result = $stmt->execute();
		unset($db);		
		$_SESSION['mu']=$mu;
		header('location: final2.php');

		?>
		