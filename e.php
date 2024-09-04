<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Редактор</title>
</head>

<body>
	<h2 align="center">Редактор</h2>
	<?php $parent=$_POST['submit'] ; ?>
	<?php $aim='userlist.php' ; ?>
	<?php
		$db=new SQLite3('user.db');
		$q="Select * from user where Login='".$parent."'";
		$result=$db->query($q);
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			$pwd=$row['Password'];
			$fam=$row['Family'];
			$im=$row['Nm'];
			$gp=$row['Gp'];
		}
	?>
	
	<p style="font-size: 10pt; text-align: center;"> Login и password должны содержать только латинские символы и цифры </p>
	<form method="post" style="position: relative; width: 80%; margin: 0 auto;"><input type="hidden" value="userlist.php" name="parent"/>
		<input type="hidden" value="<?php echo $parent; ?>" name="u"/>
		<br>
		<table id="table1" style="width: 50%; position: relative; margin: 0 auto; ">
			<tr><td>Login</td><td><input type="text" style="width: 95%;" name="login" required id="login" value="<?php echo $parent; ?>"/></td></tr>
			<tr><td>Password</td><td><input type="text" style="width: 95%;" name="password" required id="password" value="<?php echo $pwd; ?>"/></td></tr>
			<tr><td>Фамилия</td><td><input type="text" style="width: 95%;" name="family" required id="family" value="<?php echo $fam;?>"/></td></tr>
			<tr><td>Имя</td><td><input type="text" style="width: 95%;" name="user" required id="user" value="<?php echo $im;?>"/></td></tr>
			<tr><td>Группа</td><td><input type="text" style="width: 95%;" name="group" required id="group" value="<?php echo $gp;?>"/></td></tr>
			<tr><td colspan="2" align="center"><button type="submit" formaction="reg3.php">OK</button> &#9; <button type="button" onClick='location.href= "<?php echo $aim ?>"'>Back</button></td></tr>
		</table>
	</form>
</body>
</body>
</html>