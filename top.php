<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SQLite3 редактор</title>
<style>
	#b2:disabled{
		 pointer-events: none; 
 		 opacity: 0.65;
	}
	#b3:disabled{
		 pointer-events: none; 
 		 opacity: 0.65;
	}
</style>
<link href="general.css" rel="stylesheet" type="text/css"> 
</head>

<body id = "fon">
<div id="top">
<div class="topmenu"> 
		<button class="topbutton" id="b1" form="topform">Выбор файла</button>  
		<button class="topbutton" id="b2" onClick="s2()" disabled form="topform2">Выбор таблицы</button>
		<button class="topbutton" id="b3" onClick="s2()" disabled >Таблица</button>
</div>
	<form id="topform" action="sqe.php" method="get"></form>
</div>
	

