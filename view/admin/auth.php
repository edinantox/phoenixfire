<?php
include_once '../../model/defines.php';
require_class("conexao.class.php");

if(LOGIN!=0){ //verifica se já está logado
	setcookie('login',$_SESSION['user'],time()+1800,'/');//revalida cookie por mais 3min
	echo '<script>top.location.reload();</script>';
}else{
	$con=new Conexao();//faz conexão e verifica se o usuario existe
	$qr=$con->query('select * from usuarios where user=\''.$_POST['u'].'\' or  email=\''.$_POST['u'].'\'');
	$num=mysql_num_rows($qr);//conta resultados para o caso de o usuario digitado não exista

	if($num<=0){
		echo '<font color="red">Usuário Inválido!</font>';
	}else{
		while($res=mysql_fetch_array($qr)){
			if(strcmp(md5($_POST['p']),$res['auth_key'])==0){//verifica se a senha está correta
				$_SESSION['user']=$_POST['u'];
				setcookie('login',$_SESSION['user'],time()+1800,'/');
				echo '<script>top.location.reload();</script>';
			}else{
				echo '<font color="red">Senha Inválida!</font>';
			}
		}
	}
}
?>