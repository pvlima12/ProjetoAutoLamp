<?php
include ("cabecalho.php");


if ($_POST) {
    if (isset($_POST['editar'])) {
        if ((isset($_POST['editar_id']))) {

            include './Class/Disciplina.php';
            include './Class/Aula.php';
            include './Dao/CrudDisciplina.php';

            $objdao = new CrudDisciplina();
            $disciplina = new Disciplina();
            $aula = new Aula();

            $aula->setId($_POST['editar_id']);


            foreach ($objdao->querySelecionaaula($aula->getId()) as $value) {
                ?>

                <h1 class="center-align">Editar Aula</h1>

                <div class="row">
                    <form class="col s12" action="ListaAula.php" method="post">
                        <input name="alterar_id" type="hidden" value="<?= $value['id'] ?>"/>


                        <div class="row">
                            <div class="input-field col s6">
                                <select class="icons" name ="cod_disciplina" required autofocus>
                                    <option value="<?= $value['dis_id'] ?>"  class="left"><?= $value['dis_nome'] ?></option>
                                       <?php
  
               
                    foreach ($objdao->querySeleciona6($value['dis_id']) as $va) {
                        ?>

                        <option value="<?= $va['id'] ?>"  class="left"><?= $va['nome'] ?></option>


                    <?php } ?>
                                </select>

                            </div>
                            <div class="input-field col s6">
                                <select class="icons" name ="periodo" required autofocus>
                                    <option value="<?= $value['periodo'] ?>"  class="left"><?= $value['periodo'] ?></option>
                                    <option value="Matutino"  class="left">Matutino</option>
                                    <option value="Vespertino"  class="left">Vespertino</option>
                                    <option value="Noturno"  class="left">Noturno</option>
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <h3 class="center-align">Alterar Datas</h3>

                            <div class="input-field col s6">
                                <h5 class="left-align">Inicio da Aula</h5>
                                <input type="date" value="<?= $value['inicio'] ?>" name="inicio">
                            </div>

                            <div class="input-field col s6">
                                <h5 class="left-align">Fim da Aula</h5>
                                <input type="date" value="<?= $value['fim'] ?>" name="fim">

                            </div>
                        </div>
                        
                                    <?php }
                                    ?>

                                </select>
                                <input class="btn btn-primary" type="submit" value="Alterar" name="alterar">
                            </div>
                        </div> 

                    </form>
                </div>
                <?php
            }
        }
    }


include("Rodape.php");
?>
