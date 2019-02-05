<?php
include("Logica-Usuario.php");
verificaUsuario();
?>
<?php
include ("cabecalho.php");
include './Class/Disciplina.php';
include './Class/Aula.php';
        include './Dao/CrudDisciplina.php';

            $objdao = new CrudDisciplina();
            $disciplina = new Disciplina();
            $aula = new Aula();
                    if ($_POST) {
    if (isset($_POST['excluir'])){
        if ((isset($_POST['excluir_id']))) {
// resgata variáveis do formulário
            $aula->setId(isset($_POST['excluir_id']) ? $_POST['excluir_id'] : '');

                       $resultado = $objdao->queryDelete2($aula->getId());
            
                if ($resultado == "ok") { ?>
   <script>
    alert("Aula removido com sucesso!");
</script>
    
<?php }else{
    ?>
<script>
    alert("Aula não removida!");
</script>
<?php
}
        }
    }
  
}
    if ($_POST) {
    if (isset($_POST['alterar'])){
        if ((isset($_POST['alterar_id']))) {
        if ((isset($_POST['alterar_id'])) && (isset($_POST['periodo']))&& (isset($_POST['inicio']))&& 
                (isset($_POST['fim']))&& (isset($_POST['cod_disciplina']))) {

            $aula->setId(isset($_POST['alterar_id']) ? $_POST['alterar_id'] : '');
            $aula->setPerido(isset($_POST['periodo']) ? $_POST['periodo'] : '');
            $aula->setData_inicio(isset($_POST['inicio']) ? $_POST['inicio'] : '');
            $aula->setData_fim(isset($_POST['fim']) ? $_POST['fim'] : '');
            $aula->setCod_dis(isset($_POST['cod_disciplina']) ? $_POST['cod_disciplina'] : '');


            $resultado = $objdao->queryUpdate2($aula->getId(),$aula->getPerido(), $aula->getData_inicio(),$aula->getData_fim(),$aula->getCod_dis());
           if ($resultado == "ok") { 
            ?>
    <script>
    alert("Aula alterado com sucesso!");
</script>
    
<?php }else{
    ?>
<script>
    alert("Aula não alterado!");
</script>
 
<?php }
        }
    }
    }
  
}                 
?>
<h1 class="center-align">Listar Aula</h1> 
<table >
    <thead>
        <tr>
            <th> Disciplina </th>
            <th> Periodo </th>
            <th> Data inicio</th>
            <th> Data fim</th>
     
        </tr>
    </thead>
<?php foreach ($objdao->querySelect7() as $value) { ?>
        <tbody>
            <tr>
                <td><?= $value['nome_dis'] ?></td>
                <td><?= $value['periodo'] ?></td>
                <td><?= $value['data_inicio']?></td>
                <td><?= $value['data_fim']?></td>


                <td>
                                         
                    <form class="form_editar" action="EditaAula.php" method="post" style="float: left; margin: 0 15px;">
                                <input name="editar_id" type="hidden" value="<?= $value['id'] ?>"/>
                                <button class="btn tooltipped btn-floating btn-large waves-effect waves-light blue" 
                                        name="editar" type="submit" data-position="bottom" data-tooltip="Editar"><i class="material-icons">create</i></button>
                       </form>
                    
                    
                    <form class="form_excluir" action="ListaAula.php" method="post" style="float: left; margin: 0 15px">
                                <input name="excluir_id" type="hidden" value="<?= $value['id'] ?>"/>
                                <button class="btn tooltipped btn-floating btn-large waves-effect waves-light red" 
                                        name="excluir" type="submit" data-position="bottom" data-tooltip="Excluir"><i class="material-icons">delete</i></button>
                       </form>
                  
                </td>

            </tr>
        </tbody>
<?php } ?>
</table>

    <?php include("Rodape.php"); ?>