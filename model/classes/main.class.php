<?php
	class Main{
		public $login;
		function login_icone(){
			if(LOGIN==0){
				echo '<img src="'.IMAGENS.'/login.png" width="25" style="cursor:pointer;"  class="abre">
				';
				$this->login='
					<center>Log In</center>
					<div id="inp">
						<b>Usuário</b>
						<div id="inp-login">
							<input type="text" name="user" onkeydown="login(0,event)">
						</div>
						
						<b>Senha</b>
						<div id="inp-login">
							<input type="password" name="pass" onkeydown="login(0,event)">
						</div>
						<div id="sub">
						<div id="temp"></div>
							<img src="'.IMAGENS.'/logar.png" style="cursor:pointer;" onclick="login(1,null)" onmouseover="this.src=\''.IMAGENS.'//logar-hover.png\'" onmouseout="this.src=\''.IMAGENS.'//logar.png\'">
						</div>
					</div>
					<div id="rec">
						<a href="?registrar">Cadastrar</a>
						<a href="?rec_senha">Esqueceu Sua Senha?</a>
					</div>
				';
			}else{
				echo '<img src="'.IMAGENS.'/cat.png" width="25" style="cursor:pointer;"  >';
				$this->login='
					
					<div id="account">
						<div id="avatar">
							<img src="'.IMAGENS.'/profiles/'.avatar().'" width="35" height="35" id="avatar" ondragstart="return false">
						</div>
						<div id="user">'.$_SESSION['user'].'</div>
						<div id="config" onclick="config()"></div>
						<div id="logoff" onclick="logoff()"></div>
						<hr width="200" style="color:#727272; border-bottom:1px solid #ccc; margin-top:15px;">
					</div>
					
				';
			}
		}
		
		function menu_principal(){
			require_class("conexao.class.php");
			$con=new Conexao();
			$qr=$con->query("select * from menus");
			while($res=mysql_fetch_array($qr)){
				echo '<a href="'.$res['link'].'">'.$res['desc_menu'].'</a>';
			}
		}
	}
?>