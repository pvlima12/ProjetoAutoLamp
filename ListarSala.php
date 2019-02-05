<?php
include("Logica-Usuario.php");
verificaUsuario();
?>
<?php
include ("cabecalho.php");
include './Class/Sala.php';
        include './Dao/CrudSala.php';
        $sala = new Sala();
        $daoSala = new CrudSala();
        
                    if ($_POST) {
    if (isset($_POST['excluir'])){
        if ((isset($_POST['excluir_id']))) {
// resgata variáveis do formulário
            $sala->setId_sala(isset($_POST['excluir_id']) ? $_POST['excluir_id'] : '');

                       $resultado = $daoSala->queryDelete($sala->getId_sala());
            
        if ($resultado == "ok") { ?>
    <script>
    alert("Sala removido com sucesso!");
</script>
    
<?php }else{
    ?>
<script>
    alert("Sala não removida!");
</script>
 
<?php }
        }
    }
  
}
    if ($_POST) {
    if (isset($_POST['alterar'])){
        if ((isset($_POST['alterar_id']))) {
        if ((isset($_POST['alterar_id'])) && (isset($_POST['nome']))) {

            $sala->setId_sala(isset($_POST['alterar_id']) ? $_POST['alterar_id'] : '');
            $sala->setSala(isset($_POST['nome']) ? $_POST['nome'] : '');

 


            $resultado = $daoSala->queryUpdate($sala->getId_sala(), $sala->getSala());
             if ($resultado == "ok") { ?>
    <script>
    alert("Sala alterado com sucesso!");
</script>
    
<?php }else{
    ?>
<script>
    alert("Sala não Alterado!");
</script>
 
<?php }
        }
    }
    }
  
}                 
?>
<h1 class="center-align">Listar Sala</h1> 
<table >
    <thead>
        <tr>
            <th> Nome </th>   
        </tr>
    </thead>
<?php foreach ($daoSala->querySelect() as $value) { ?>
        <tbody>
            <tr>
                <td><?= $value['nome'] ?></td>

                <td>
                                         
                    <form class="form_editar" action="EditarSala.php" method="post" style="float: left; margin: 0 15px;">
                                <input name="editar_id" type="hidden" value="<?= $value['id'] ?>"/>
                                <button class="btn tooltipped btn-floating btn-large waves-effect waves-light blue" 
                                        name="editar" type="submit" data-position="bottom" data-tooltip="Editar"><i class="material-icons">create</i></button>
                       </form>
                    
                    
                    <form class="form_excluir" action="ListarSala.php" method="post" style="float: left; margin: 0 15px">
                                <input name="excluir_id" type="hidden" value="<?= $value['id'] ?>"/>
                                <button class="btn tooltipped btn-floating btn-large waves-effect waves-light red" 
                                        name="excluir" type="submit" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete</i></button>
                       </form>
                  
                </td>

            </tr>
        </tbody>
<?php } ?>
</table>

    <?php include("rodape.php"); ?>