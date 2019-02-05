<?php 
session_start();

function usuarioEstaLogado(){

	return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario(){
if(!usuarioEstaLogado()){
	header("Location: index.php?falhaDeSeguranca=true");
	die();
}
}

function usuarioLogado(){
	return $_SESSION["usuario_logado"];
}


function logaUsuario($login){
	$_SESSION["usuario_logado"] = $login;
}


function logout(){
    session_destroy();
}
 ?>