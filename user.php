<!doctype html>
<meta charset="utf-8">
<style>
	#user{
		width: 20%;
		height: 100vh;
		float: left;
		background: #72E9A1;
		margin: 0;
		position: absolute;
		top:0;
		left:0;
	}
</style>
<div id="user">
<?php
	if(isset($_REQUEST['l'])){
	$l=$_REQUEST['l'];
	}else{
		$l=$_SESSION['user'];
	}
	
	if($l!='root'){
	
	$db=new SQLite3('user.db');
$result=$db->query("select * from user where Login='".$l."'");
	while($row=$result->fetchArray(SQLITE3_ASSOC)){
	$f=$row['Family'];
	$i=$row['Nm'];
	$g=$row['Gp'];
}
unset($db);	
	}else{
	$f='Администратор';
	$i='';
	$g='<b><i>Администраторы</i></b>';	
	}
	
?>

<div style="padding-left: 2%;">
	<p id="userp"> <?php echo $f ?></p>
	<p id="userp"> <?php echo $i ?></p>
	<p id="userp"> <?php echo $g ?></p>
	<p align="center"><a href="index.html">Выход</a></p>
</div>
<?php
	if($l=='root'){
		echo('<form action="control.php" method="post">');
		echo('<input type="hidden" value="root" name="l"/>');
		echo('<p align="center"><button type="submit">Контрольная панель</button></p>');
		echo('</form>');
	}
	
?>	
</div>
