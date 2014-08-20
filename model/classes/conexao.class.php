<?php
class Conexao{
	function conectar(){
		$con=new mysqli("localhost","site","site","phoenixlight");
		if ($con->connect_error) {
			die('Connect Error (' . $mysqli->connect_errno . ') '. $con->connect_error);
		}
		return $con;
	}
	
	function query($qr){
		$con=$this->conectar();
		$res=$con->query($qr) or die($qr."<br>".mysql_error());
		$con->close();
		return $res;
	}
}
?>
