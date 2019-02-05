<?php
include ("cabecalho.php");
include './Class/Porta.php';
        include './Dao/CrudPorta.php';


$objdao = new CrudPorta();
$porta = new Porta();

if ($_POST) {
    if (isset($_POST['editar'])){
        if ((isset($_POST['editar_id']))) {
$porta->setId($_POST['editar_id']);


foreach ($objdao->querySeleciona($porta->getId()) as $value) {
    ?>

    <h1 class="center-align">Editar Porta</h1>

    <div class="row">
        <form class="col s12" action="ListaPorta.php" method="post">
            <input name="alterar_id" type="hidden" value="<?= $value['id'] ?>"/>
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" type="text" name="nome" class="validate" required autofocus value="<?= $value['nome'] ?>">
                    <label for="first_name">Número</label>
           </div>
                </div>
                <div class="row">
                <div class="input-field col s6">
                         <select class="icons" name = "estado" required autofocus>
                            <option value="" disabled selected>Estado</option> 
                            <option value="Ativo" name="ativo" class="left">Ativo</option>
                            <option value="Inativo" name="inativo" class="left">Inativo</option>
                        </select>

                    </div>
                  
                    <input class="btn btn-primary" type="submit" value="Alterar" name="alterar">
                </div>
 
        </form>
    </div>

<?php } 
 }
    }
}
    
 include("Rodape.php"); ?>
