<?php
class Conexao{
	function conectar(){
		$con=mysql_connect("localhost","site","site");
		mysql_select_db("phoenixlight",$con);
		return $con;
	}
	
	function query($qr){
		$con=$this->conectar();
		$res=mysql_query($qr) or die($qr."<br>".mysql_error());
		mysql_close($con);
		return $res;
	}
}
?>