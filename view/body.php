<?php

	
	//---carrega pagina
	switch($_SERVER['QUERY_STRING']){
		case "login":
				include_once PAGINAS.'/login.php';
			break;
		default:	
				include_once PAGINAS.'/main.php';
			break;
	}
	
	
	
?>