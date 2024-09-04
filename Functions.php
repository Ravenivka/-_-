<meta charset="utf-8">

<?php
function typenumber($arr)
{
   for($i=0; $i < count($arr); $i++){
	   if($arr[$i] == "Тип"){
		   return $i;
	   }
   }
}
?>


