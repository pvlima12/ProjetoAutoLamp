<?php include("logica-usuario.php");
verificaUsuario();
?>
<?php include ("cabecalho.php");?>
                          
<?php
        include './Class/Sala.php';
        include './Dao/CrudSala.php';   
        $sala = new Sala();
        $daoSala = new CrudSala();
        
if ($_POST && $_POST['salvar'] && isset($_POST['nome'])){
  $sala->setSala($_POST['nome']);
 

  $resultado = $daoSala->queryInsert($sala->getSala());
    
           if ($resultado == "ok") { ?>
    <script>
    alert("Sala inserido com sucesso!");
</script>
    
<?php }else{
    ?>
<script>
    alert("Sala não inserido!, pois ja tem um cadastro existente.");
</script>
 
<?php }
}	
?>
 <h1 class="center-align">Cadastrar Sala</h1>             
  
    <form class="col s12" action="AdicionaSala.php" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" name="nome" class="validate">
          <label for="first_name">Nome da Sala</label>
        </div>
</div>
<div class="row">
          <input class="btn btn-primary" type="submit" value="Cadastrar" name="salvar">
      </div>
    </form>

 <?php include("Rodape.php");?>

