<?php include("logica-usuario.php");
verificaUsuario();
?>
<?php include ("cabecalho.php");?>

<?php if (array_key_exists("adicionado", $_GET) && $_GET['adicionado']=='true'){ ?>
	<p class="alert-success">Usuário inserido com sucesso. </p>
<?php } ?>
<?php 

$nome=array($_POST['equip']);
foreach ($nome as $i => $value) {


?>
 <h1 class="center-align">Cadastrar Sala</h1>             
  
    <form class="col s12" action="AdicionaSala.php" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" name="nome" class="validate">
          <label for="first_name">Nome da Sala</label>
        </div>
</div>
<h3 class="center-align">Adicionar Equipamentos para Sala</h3>
<div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" name="equip[]" class="validate">
          <label for="first_name">Nome do Equipamento</label>
           </div>
     <a id="scale-demo" href="#!" class="btn tooltipped btn-floating btn-large scale-transition"  data-position="bottom" data-tooltip="Adicionar">
    <i class="material-icons">add</i>
  </a>
         </div>
           
 
  </div><div class="row">
      <table>
        <thead>
          <tr>
              <th>Nome</th>

          </tr>
        </thead>

        <tbody>
          <tr>
            <td><?= $value[$i]?></td>
      <td>
        <a class="btn tooltipped btn-floating btn-large waves-effect waves-light blue" data-position="bottom" data-tooltip="Editar" href="usuario-altera-formulario.php?cod=<?=$value['cod']?>"><i class="material-icons">create</i></a>
        <a class="btn tooltipped btn-floating btn-large waves-effect waves-light red" data-position="bottom" data-tooltip="Excluir" href="delete-usuario.php?cod=<?=$value['cod']?>"><i class="material-icons">delete</i></a>
  </td>
 
          </tr>
       
        </tbody>
      </table>
        </div><div class="row">
          <button class="btn btn-primary" type="submit">Cadastrar</button>
      </div>
    </form>
 <?php } ?>

 <?php include("Rodape.php");?>

