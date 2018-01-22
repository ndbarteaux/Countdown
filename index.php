<?php include "header.php"; ?>
<form action="#" method="GET">
	Enter Time (seconds): <input type="text" name="userTime" id="userTime" value="0" /><br>
	<input type="button" id="startTime" name="startTime" value="Start Countdown" onclick='countDown_init()' />
</form>
<br><span id="showMin">00</span>:<span id="showSec">00</span><br>
<input type="button" id="reset" name="reset" value="Reset Timer" onclick='resetCount()' /><br>
			  
<script type="text/javascript">
	var time;
	var cntdwn;
	var cntdwnMin;
	var cntdwnID;
	function countDown_init() {
		time = parseInt(document.getElementById('userTime').value);
		document.getElementById('startTime').setAttribute('disabled', 'disabled');
		if(isNaN(time)) {
			document.getElementById('startTime').removeAttribute('disabled');
			alert("Must enter valid number!");
			resetCount();
		} 
		
		if(time > 59) {
			cntdwnMin = (time / 60);
			cntdwnMin = Math.floor(cntdwnMin);
			cntdwn = time % 60;
		} else {
			cntdwnMin = 0;
			cntdwn = time;
		}
		countDown();
	}
	function countDown() {
		if((cntdwnMin > 0) || (cntdwn > 0)) {
			if((cntdwn == 0) && (cntdwnMin > 0)) {
				cntdwnMin--;
				cntdwn = 60;
			} 
			cntdwn--;
			if(cntdwnMin < 10) {
				document.getElementById('showMin').innerHTML = "0" + cntdwnMin;
			} else {
				document.getElementById('showMin').innerHTML = cntdwnMin;
			}
			if(cntdwn < 10) {
				document.getElementById('showSec').innerHTML = "0" + cntdwn;
			} else {
				document.getElementById('showSec').innerHTML = cntdwn;
			}
			
			if((cntdwn > 0) || (cntdwnMin > 0)) {
				cntdwnID = setTimeout('countDown()', 1000);
			} 
		} 
	}
	
	function resetCount() {
		clearTimeout(cntdwnID);
		cntdwn = 0;
		document.getElementById('userTime').value = '0';
		document.getElementById('showMin').innerHTML = '00';
		document.getElementById('showSec').innerHTML = '00';
		document.getElementById('startTime').removeAttribute('disabled');
	}
</script>
</div>
<?php include "footer.php"; ?>