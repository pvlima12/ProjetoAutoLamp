<?php
include("Logica-Usuario.php");
verificaUsuario();
?>
<?php
include ("cabecalho.php");
include './Class/Equipamento.php';
        include './Dao/CrudEquipamento.php';

            $objdao = new CrudEquipamento();
            $equipamento= new Equipamento();
        
                    if ($_POST) {
    if (isset($_POST['excluir'])){
        if ((isset($_POST['excluir_id']))) {
// resgata variáveis do formulário
            $equipamento->setId(isset($_POST['excluir_id']) ? $_POST['excluir_id'] : '');

                       $resultado = $objdao->queryDelete($equipamento->getId());
            
                if ($resultado == "ok") { ?>
   <script>
    alert("Equipamento removido com sucesso!");
</script>
    
<?php }else{
    ?>
<script>
    alert("Equipamento não removido!");
</script>
<?php
}
        }
    }
  
}
    if ($_POST) {
    if (isset($_POST['alterar'])){
        if ((isset($_POST['alterar_id']))) {
        if ((isset($_POST['alterar_id'])) && (isset($_POST['nome']))&& (isset($_POST['cod_porta']))&& (isset($_POST['cod_sala']))) {

            $equipamento->setId(isset($_POST['alterar_id']) ? $_POST['alterar_id'] : '');
            $equipamento->setNome(isset($_POST['nome']) ? $_POST['nome'] : '');
            $equipamento->setCod_porta(isset($_POST['cod_porta']) ? $_POST['cod_porta'] : '');
            $equipamento->setCod_sala(isset($_POST['cod_sala']) ? $_POST['cod_sala'] : '');


            $resultado = $objdao->queryUpdate($equipamento->getId(), $equipamento->getNome(),$equipamento->getCod_porta(),$equipamento->getCod_sala());
           if ($resultado == "ok") { 
            ?>
       <script>
    alert("Equipamento alterado com sucesso!");
</script>
    
<?php }else{
    ?>
<script>
    alert("Equipamento não alterado!");
</script>
<?php
}
    }
        }
  
}
    }
?>
<h1 class="center-align">Listar Equipamento</h1> 
<table >
    <thead>
        <tr>
            <th> Nome </th>
            <th> Número da Porta Serial</th>     
            <th> Sala</th>     
        </tr>
    </thead>
<?php foreach ($objdao->querySelect() as $value) { ?>
        <tbody>
            <tr>
                <td><?= $value['nome_equi'] ?></td>
                <td><?= $value['nome_porta'] ?></td>
                <td><?= $value['nome_sala'] ?></td>

                <td>
                                         
                    <form class="form_editar" action="EditarEquipamento.php" method="post" style="float: left; margin: 0 15px;">
                                <input name="editar_id" type="hidden" value="<?= $value['id'] ?>"/>
                                <button class="btn tooltipped btn-floating btn-large waves-effect waves-light blue" 
                                        name="editar" type="submit" data-position="bottom" data-tooltip="Editar"><i class="material-icons">create</i></button>
                       </form>
                    
                    
                    <form class="form_excluir" action="ListaEquipamento.php" method="post" style="float: left; margin: 0 15px">
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