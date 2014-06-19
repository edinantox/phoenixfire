<?php
class View{
	function init(){
		$this->headers();
		$this->main();
	}
	
	function headers(){
		include_once VIEW.'/header.php';
	}
	function body(){
		require_class("main.class.php");
		$main=new Main();
		include_once VIEW.'/body.php';
		echo '<script>
				$(document).ready(function(){
					$("a.login").colorbox({iframe:true,width:"50%",height:"50%"});
					$("a.frame").colorbox({iframe:true,width:"85%",height:"95%"});
				;})
				
			</script>';
	}
	
}
?>