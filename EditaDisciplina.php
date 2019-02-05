<?php
include ("cabecalho.php");
 

if ($_POST) {
    if (isset($_POST['editar'])){
        if ((isset($_POST['editar_id']))) {
            
          include './Class/Disciplina.php';
        include './Dao/CrudDisciplina.php';

            $objdao = new CrudDisciplina();
            $disciplina = new Disciplina();
            
            $disciplina->setCod_disciplina($_POST['editar_id']);


foreach ( $objdao->querySeleciona($disciplina->getCod_disciplina()) as $value) {
    ?>

    <h1 class="center-align">Editar Disciplina</h1>

    <div class="row">
        <form class="col s12" action="ListaDisciplina.php" method="post">
            <input name="alterar_id" type="hidden" value="<?= $value['id'] ?>"/>
                <div class="row">
            <div class="input-field col s6">
                <input id="first_name" name="nome" type="text" value="<?= $value['nome'] ?>" class="validate" required autofocus>
                <label for="first_name">Nome</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="first_name" type="text" name="carga_horaria"value="<?= $value['carga_horaria']?>" class="validate" required autofocus>
                <label for="first_name">Carga Horária</label>


            </div>
        </div>
                
             <div class="row">
            <div class="input-field col s6">
                <select class="icons" name ="cod_professor" required autofocus>
                    <?php

                    include './Dao/CrudProf.php';


                    $daoProf = new CrudProf();

         

                    foreach ($daoProf->querySeleciona($value['professor_id']) as $val) {
                        ?>
                        <option value="<?= $val['id'] ?>"  class="left"><?= $val['nome'] ?></option>


                    <?php }
                    foreach ($objdao->querySelect2() as $val2) {
                        ?>
                        <option value="<?= $val2['id'] ?>"  class="left"><?= $val2['nome'] ?></option>


                    <?php }
                    ?>
                </select>
            </div>
        </div>
                <div class="row">
            <div class="input-field col s6">
                <select class="icons" name="cod_sala" required autofocus>

                    <?php
               
                    foreach ($objdao->querySeleciona4($value['sala_id'])as $valor) {
                        ?>
                        <option value="<?= $valor['id'] ?>"  class="left"><?= $valor['nome'] ?></option>


                    <?php }
                      foreach ($objdao->querySelect5() as $val3) {
                        ?>
                        <option value="<?= $val3['id'] ?>"  class="left"><?= $val3['nome'] ?></option>


                    <?php }
                    ?>
                    
                </select>
                <input class="btn btn-primary" type="submit" value="Alterar" name="alterar">
                            </div>
        </div> 
     
    </form>
</div>
<?php } 
 }
    }
}
    
 include("Rodape.php"); ?>
