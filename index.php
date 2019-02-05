<?php include ("Logica-Usuario.php");?>
<?php include ("cabecalho2.php");
	
if (isset($_GET["logout"]) && $_GET["logout"]==true ) { ?>

<p class="alert-sucess"> Deslogado com sucesso!!</p>

<?php } ?>

<?php
	if(isset($_GET["login"]) && $_GET["login"]==false){ ?>
<script>
alert("Usuario ou senha invalida");
</script>
<?php } ?>
 

<?php
	 if(isset($_GET["falhaDeSeguranca"]) && $_GET["falhaDeSeguranca"]==true) { ?>
<script>
alert("Faça o login");
</script>
<?php } ?>


	<?php if(usuarioEstaLogado()) {?>
       
<h1 class="center-align">Seja bem vindo!</h1>
 <form  class="form-signin">

 </form>
	
<?php  
}else{ 
?>	


    <div class="container">
        <form action="login.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Nome</label>
        <input type="text" name="nome" id="inputEmail" class="form-control" placeholder="Nome" required autofocus>
        <label for="inputPassword" class="sr-only">Número da Matricula</label>
        <input type="text" name="num_mat" id="inputPassword" class="form-control" placeholder="Número da Matricula" required>
        <button class="btn btn-lg btn-danger btn-block" type="submit">Acessar</button>
     
</form>

<?php  
}
?>

<?php include("Rodape.php"); ?>	