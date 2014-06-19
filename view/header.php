<?php
	//---meta e links externos
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<!--[if lt IE 8]>
  		<div style="text-align:center"><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
 	<![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!-->
	<!--<![endif]-->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css">
	<![endif]-->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
	';
	//---carrega css de dentro da pasta /view/css
   $css = dir(CSS);      
   while($arquivo = $css -> read()){
		if((!is_dir(CSS.'/'.$arquivo))){
			if(strstr($arquivo,'-ie')){
				if(strstr($_SERVER['HTTP_USER_AGENT'],'MSIE')){
					echo "\t".'<link rel="stylesheet" href="'.CSS.'/'.$arquivo.'">'."\n";
				}
			}else{
				echo "\t".'<link rel="stylesheet" href="'.CSS.'/'.$arquivo.'">'."\n";
			}
		}
   }
   $css->close();
   
   //---carrega js de dentro da pasta /view/js
   $js = dir(JS);   
   while($arquivo = $js -> read()){
		if((!is_dir(JS.'/'.$arquivo))){
			
			echo "\t\t".'<script type="text/javascript" src="'.JS.'/'.$arquivo.'"></script>'."\n";
		}
   }
   $js->close();
   
   
   	//---carrega parametros de css do banco
	echo '<style>';
		require_class('conexao.class.php');
		$con=new Conexao();
		$qr=$con->query('select * from ui_cores');
		//menu_bg 	menu_link 	menu_link_hover 	menu_icon 	body_bg 	body_link 	body_link_hover 
		while($res=mysql_fetch_array($qr)){
			echo 'body {background:#'.$res['body_bg'].';}';
			echo 'body a{color:#'.$res['body_link'].';}';
			echo 'body a:hover{color:#'.$res['body_link_hover'].';}';
			echo '#header #menu {background:#'.$res['menu_bg'].';}';
			echo '#header #menu a{color:#'.$res['menu_link'].';}';
			echo '#header #menu a:hover{color:#'.$res['menu_link_hover'].';}';
			
		}
	echo '</style>';

?>