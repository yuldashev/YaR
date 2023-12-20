<?php
	$time=strtotime($_POST['time']);
	
?>
<script>
	$("#timeLinkDiv").html('https://яснаяречка.рф/work.php?t=<?php echo $time; ?>&key=<?php echo crypt($time,'max'); ?>');
</script>