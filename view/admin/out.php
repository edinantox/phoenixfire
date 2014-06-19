<?php
if(isset($_GET['logoff'])){
	include_once '../../model/defines.php';
	session_destroy();
	setcookie('login',null,time()-1,'/');
	echo '<script>top.location.reload();</script>';
}
?>