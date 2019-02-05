<?php
include ("cabecalho.php");
 

if ($_POST) {
    if (isset($_POST['editar'])){
        if ((isset($_POST['editar_id']))) {
            
            include './Class/Sala.php';
        include './Dao/CrudSala.php';

            $daoSala = new CrudSala();
            $sala= new Sala();
            
            $sala->setId_sala($_POST['editar_id']);


foreach ($daoSala->querySeleciona($sala->getId_sala()) as $value) {
    ?>

    <h1 class="center-align">Editar Sala</h1>

    <div class="row">
        <form class="col s12" action="ListarSala.php" method="post">
            <input name="alterar_id" type="hidden" value="<?= $value['id'] ?>"/>
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" type="text" name="nome" class="validate" required autofocus value="<?= $value['nome'] ?>">
                    <label for="first_name">Nome</label>
           </div>
                </div>
                <input class="btn btn-primary" type="submit" value="Alterar" name="alterar">
            </div>
        </form>
    </div>
</div>
<?php } 
 }
    }
}
    
 include("Rodape.php"); ?>
