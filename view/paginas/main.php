<div id="header">

	<div id="logo">
		<img src="<?php echo IMAGENS;?>/logo.png" width="180" height="100">
	</div>
	
	<div id="menu">
		<?php $main->menu_principal();?>
	</div>
	<div id="search">
		<input type="text" onkeypress="busca_geral()" name="busca-barra">
		<img id="lupa" src="<?php echo IMAGENS;?>/buscar.png" onclick="buscar()" onmouseover="this.src='<?php echo IMAGENS;?>/buscar-hover.png'" onmouseout="this.src='<?php echo IMAGENS;?>/buscar.png'" style="cursor:pointer;">
	</div>
	
	<div id="login-icone" class="abre" onclick="menu_login(this)">
		<?php $main->login_icone();?>
	</div>
	<div id="login-frame">
		<?php echo $main->login;?>
	</div>
	
</div>