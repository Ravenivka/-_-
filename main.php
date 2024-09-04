<!doctype html>
<meta charset="utf-8">
<?php $file = ""; ?>
<script>
	function s1(){
		var A = document.getElementById('step1');
		A.style.visibility = 'visible';	
		var B = document.getElementById('b2');
		B.disabled = true;
	}
	function showme(x){
		var A = document.getElementById('sm');
		A.value = x;
		var B = document.getElementById('b2');
		B.disabled = false;
		<?php
			$string = "";
			$db = new SQLite3($file);
			$tablesquery = $db->query("SELECT name FROM sqlite_master WHERE type='table';");
    		while ($table = $tablesquery->fetchArray(SQLITE3_ASSOC)) {
        		$string = $string.$table['name'] . '<br />';
    		}
		?>
		var C = document.getElementById('step2');
		C.innerHTML = <?php echo $string; ?>;
		
	}
</script>



	<table style="width: 99%; border-collapse: collapse;">
	<tr>
		<td style="align-content: center; width: 50%; vertical-align: top;">
			
			<div id="step1" style="visibility: visible; margin-left: 2%; vertical-align: top;">
			
			</div>
		</td>	
		<td style="vertical-align: top;">
			<h3 align="center">Список таблиц</h3>
			<div id="step2" style="visibility: visible ; margin-left: 2%; vertical-align: top;">
				
			</div>
		</td>
	</tr>
	</table>
	
	
	
	<input type="text" id="sm" /><br/>
	
</div>
