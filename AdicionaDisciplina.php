<?php
include("Logica-Usuario.php");
verificaUsuario();
?>
<?php include ("cabecalho.php");
                    include './Class/Disciplina.php';
                    include './Dao/CrudDisciplina.php';
                    $disciplina = new Disciplina();
                    $daoDis = new CrudDisciplina();
?>

<h1 class="center-align">Cadastrar Disciplina </h1>
<div class="row">
    <form class="col s12" action="AdicionaDisciplina.php" method="post">
        <div class="row">
            <div class="input-field col s6">
                <input placeholder="Ex:Matemática" id="first_name" name="nome_dis" type="text" class="validate" required autofocus>
                <label for="first_name">Nome</label>
            </div>
            <div class="input-field col s6">
                <input id="last_name" type="text" name="cod_dis" class="validate" required autofocus>
                <label for="last_name">Código</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="first_name" type="text" name="carga_horaria" class="validate" required autofocus>
                <label for="first_name">Carga Horária</label>


            </div>
        </div>


        <div class="row">
            <div class="input-field col s6">
                <select class="icons" name="cod_professor" required autofocus>
                    <option value="" disabled selected>Professor</option> 

                    <?php

                    include './Dao/CrudProf.php';


                    $daoProf = new CrudProf();



                    foreach ($daoProf->querySelect2() as $value) {
                        ?>
                        <option value="<?= $value['id'] ?>"  class="left"><?= $value['nome'] ?></option>


                    <?php }
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <select class="icons" name="cod_sala" required autofocus>
                    <option value="" disabled selected>Sala</option> 

                    <?php
                 
                    foreach ($daoDis->querySelect3() as $value) {
                        ?>
                        <option value="<?= $value['id'] ?>"  class="left"><?= $value['nome'] ?></option>


                    <?php }
                    ?>
                </select>
                <input class="btn btn-primary" type="submit" value="Cadastrar" name="salvar">


            </div>
        </div> 

        </table>

    </form>
</div>
<?php
                    
if ($_POST) {
    if ($_POST['salvar']) {
        if ((isset($_POST['cod_dis'])) && (isset($_POST['nome_dis']))&& (isset($_POST['carga_horaria']))&& 
                (isset($_POST['cod_professor']))&& (isset($_POST['cod_sala']))) {
// resgata variáveis do formulário
            $disciplina->setCod_disciplina(isset($_POST['cod_dis']) ? $_POST['cod_dis'] : '');
            $disciplina->setNome(isset($_POST['nome_dis']) ? $_POST['nome_dis'] : '');
            $disciplina->setCsrgaHoraria(isset($_POST['carga_horaria']) ? $_POST['carga_horaria'] : '');
            $disciplina->setProfessor_id(isset($_POST['cod_professor']) ? $_POST['cod_professor'] : '');
            $disciplina->setSala_id(isset($_POST['cod_sala']) ? $_POST['cod_sala'] : '');

            $resultado = $daoDis->queryInsert($disciplina->getCod_disciplina(),$disciplina->getNome(),
                    $disciplina->getCsrgaHoraria(),$disciplina->getSala_id(),$disciplina->getProfessor_id());

            if ($resultado == "ok") {
                ?>
                <script>
                    alert("Disciplina inserido com sucesso!");
                </script>

            <?php } else {
                ?>
                <script>
                    alert("Disciplina não inserido!, pois ja tem um cadastro existente.");
                </script>

            <?php
            }
        }
    }
}
?>

<?php include("Rodape.php"); ?>

