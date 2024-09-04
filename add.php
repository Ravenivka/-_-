<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Добавить пользователя</title>
</head>

<body>
	<h2 align="center">Добавить пользователя</h2>
	<?php $parent='add.php' ; ?>
	<?php $aim='userlist.php' ; ?>
	<p style="font-size: 10pt; text-align: center;"> Login и password должны содержать только латинские символы и цифры </p>
	<form method="post" style="position: relative; width: 80%; margin: 0 auto;"><input type="hidden" value="userlist.php" name="parent"/>
		<br>
		<table id="table1" style="width: 50%; position: relative; margin: 0 auto; ">
			<tr><td>Login</td><td><input type="text" style="width: 95%;" name="login" required id="login"/></td></tr>
	<?php require_once('reg_small.php'); ?>
		</table>
	</form>
</body>
</body>
</html>