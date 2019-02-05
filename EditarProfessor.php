<?php
include ("cabecalho.php");
include './class/Usuario_Prof.php';
        include './DAO/CrudProf.php';


$objdao = new CrudProf();
$prof = new Usuario_Prof();

if ($_POST) {
    if (isset($_POST['editar'])){
        if ((isset($_POST['editar_id']))) {
$prof->setId($_POST['editar_id']);


foreach ($objdao->querySeleciona($prof->getId()) as $value) {
    ?>

    <h1 class="center-align">Editar Professor</h1>

    <div class="row">
        <form class="col s12" action="ListaUsuario.php" method="post">
            <input name="alterar_id" type="hidden" value="<?= $value['id'] ?>"/>
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" type="text" name="nome" class="validate" required autofocus value="<?= $value['nome'] ?>">
                    <label for="first_name">Nome</label>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select class="icons" name = "estado" required autofocus>
                            <option value="" disabled selected>Estado</option> 
                            <option value="Ativo" name="ativo" class="left">Ativo</option>
                            <option value="Inativo" name="inativo" class="left">Inativo</option>
                        </select>

                    </div>
                </div> 
                <div class="input-field col s6">
                    <input id="last_name" type="text" name="num_mat" class="validate" value="<?= $value['num_mat'] ?>" required autofocus>
                    <label for="last_name">Número da Matricula</label>
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