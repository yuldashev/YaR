<?php
	$login=$_POST['login'];
	$password=$_POST['password'];
	
	setcookie("login",$login);
	setcookie("password",$password);	
?>
<script>
	window.location.reload();
</script>