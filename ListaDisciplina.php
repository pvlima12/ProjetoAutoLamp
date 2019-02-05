<?php
include("Logica-Usuario.php");
verificaUsuario();
?>
<?php
include ("cabecalho.php");
include './Class/Disciplina.php';
        include './Dao/CrudDisciplina.php';

            $objdao = new CrudDisciplina();
            $disciplina = new Disciplina();
        
                    if ($_POST) {
    if (isset($_POST['excluir'])){
        if ((isset($_POST['excluir_id']))) {
// resgata variáveis do formulário
            $disciplina->setCod_disciplina(isset($_POST['excluir_id']) ? $_POST['excluir_id'] : '');

                       $resultado = $objdao->queryDelete($disciplina->getCod_disciplina());
            
                if ($resultado == "ok") { ?>
   <script>
    alert("Disciplina removido com sucesso!");
</script>
    
<?php }else{
    ?>
<script>
    alert("Disciplina não removida!");
</script>
<?php
}
        }
    }
  
}
    if ($_POST) {
    if (isset($_POST['alterar'])){
        if ((isset($_POST['alterar_id']))) {
        if ((isset($_POST['alterar_id'])) && (isset($_POST['nome']))&& (isset($_POST['carga_horaria']))&& 
                (isset($_POST['cod_professor']))&& (isset($_POST['cod_sala']))) {

            $disciplina->setCod_disciplina(isset($_POST['alterar_id']) ? $_POST['alterar_id'] : '');
            $disciplina->setNome(isset($_POST['nome']) ? $_POST['nome'] : '');
            $disciplina->setCsrgaHoraria(isset($_POST['carga_horaria']) ? $_POST['carga_horaria'] : '');
            $disciplina->setProfessor_id(isset($_POST['cod_professor']) ? $_POST['cod_professor'] : '');
            $disciplina->setSala_id(isset($_POST['cod_sala']) ? $_POST['cod_sala'] : '');


            $resultado = $objdao->queryUpdate($disciplina->getCod_disciplina(), $disciplina->getNome(),$disciplina->getCsrgaHoraria(),$disciplina->getSala_id(),$disciplina->getProfessor_id());
           if ($resultado == "ok") { ?>
             <script>
    alert("Disciplina alterada com sucesso!");
</script>
    
<?php }else{
    ?>
<script>
    alert("Disciplina não alterada!");
</script>
<?php
        }
    }
    }
    }
}                 
?>
<h1 class="center-align">Listar Disciplina</h1> 
<table >
    <thead>
        <tr>
            <th> Nome </th>
            <th> Código </th>
            <th> Carga Horária </th>
     
        </tr>
    </thead>
<?php foreach ($objdao->querySelect() as $value) { ?>
        <tbody>
            <tr>
                <td><?= $value['nome'] ?></td>
                <td><?= $value['id'] ?></td>
                <td><?= $value['carga_horaria']?>H</td>


                <td>
                                         
                    <form class="form_editar" action="EditaDisciplina.php" method="post" style="float: left; margin: 0 15px;">
                                <input name="editar_id" type="hidden" value="<?= $value['id'] ?>"/>
                                <button class="btn tooltipped btn-floating btn-large waves-effect waves-light blue" 
                                        name="editar" type="submit" data-position="bottom" data-tooltip="Editar"><i class="material-icons">create</i></button>
                       </form>
                    
                    
                    <form class="form_excluir" action="ListaDisciplina.php" method="post" style="float: left; margin: 0 15px">
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