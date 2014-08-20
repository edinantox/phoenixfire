<?php
//---SESSION
	session_start();
	if(isset($_COOKIE['login'])){
		$login=1;
		setcookie('login',$_SESSION['user'],time()+1800,'/');
	}else{
		$login=0;
	}
	define("LOGIN",$login);
//---/SESSION


//---PATH's
	define("ROOT",'/www/phoenixfire');
	define("VIEW",'./view');
	define("IMAGENS",VIEW.'/imagens');
	define("PAGINAS",VIEW.'/paginas');
	define("JS",VIEW.'/js');
	define("CSS",VIEW.'/css');
	define("CLASSES",ROOT.'/model/classes/');
			
//---/PATH's


//---HEADER
	header('Content-Type: text/html; charset=UTF-8');
	define("DOCTYPE",'<!DOCTYPE html>');

//---/HEADER


//---LOAD CLASS
	function require_class($classname) { 
	
		if(file_exists(CLASSES.$classname)) {
			require_once(CLASSES.$classname); // looking for the class in the project's classes folder
		} else {
			//echo $classname;
			require_once(CLASSES.$classname); // looking for the class in include_path
		}
	} 
//---/LOAD CLASS

//---LOAD PROFILE IMAGE
	function avatar(){
		require_class('conexao.class.php');
		$con=new Conexao();
		$qr=$con->query("select img from usuarios where user='".$_SESSION['user']."' limit 1");
		while($res=$qr->fetch_array()){
			return $res['img'];
		}
	}

//---/LOAD PROFILE IMAGE
?>
