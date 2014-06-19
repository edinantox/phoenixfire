<?php
class Login{
	private $user;
	private $auth_key;
	__construct($u,$p){
		$this->user=$u;
		$this->auth_key=$p;
	}
	
	function login(){
		require_class("conexao.class.php");
		$conn=new Conexao();
		$res=$conn->query("select * from usuarios where (user=".$this->user." or=".$this->user.") and auth_key=".$this->auth_key);
		if(mysql_num_rows($res)==0){
			return false;
		}else{
			query("insert into log(acao,user,ip) values('Logou',".$this->user.",".$_SERVER['REMOTE_ADDR']."-".$_SERVER['HTTP_X_FORWARDED_FOR']."-";$_SERVER['HTTP_CLIENT_IP']")");
			setcookie('login',$_SESSION['user'],time()+300,'/');
		}
	}

}
?>