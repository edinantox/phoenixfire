$(document).ready(function(){
	$(document).mouseup(function(e){
		var i = $("#login-icone");
		var c = $("#login-frame");
		if($('#login-icone').hasClass("fecha")){
			if (!c.is(e.target)&& c.has(e.target).length === 0){
				if (!i.is(e.target)&& i.has(e.target).length === 0){	
					$("#login-frame").fadeOut("slow");
					$("#login-frame").css("display","none");
					$('#login-icone').toggleClass("fecha","abre");
				}
			}
		}
	});
});

function getCookie(cname){
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++){
	  var c = ca[i].trim();
	  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
	}
	return "";
}

function menu_login(c){
	if($(c).hasClass("fecha")){
		$("#login-frame").fadeOut("slow");
		$("#login-frame").css("display","none");
		$('#login-icone').toggleClass("fecha","abre");
	}
	if($(c).hasClass("abre")){
		$("#login-frame").fadeTo("slow",1);
		$("input[name=user]").focus();
		$(c).toggleClass("fecha");
	}
	
}

function login(n,e){
	var i=0;
	if(n==0){
		var tecla=(e.event)?e.keyCode:e.which;
		if(tecla == 13){
			i=1;
		}
	}else{ i=1;	}
	
	if(i==1){
		var u=$('input[name=user]').val();
		var p=$('input[name=pass]').val();
		$('#login-frame #sub #temp').html('<img src="./view/imagens/loading.gif" style="margin-left:35px;">');
		$.post('./view/admin/auth.php',{l:'1',u:u,p:p},function(data){
			$('#login-frame #sub #temp').html(data);
		});
	}
}

function logoff(){
	$.post('./view/admin/out.php?logoff',function(data){
		$("#header").append(data);
	});
}
