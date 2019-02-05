<?php
include("Logica-Usuario.php");
verificaUsuario();
?>
<?php include ("cabecalho.php"); ?>

<h1 class="center-align">Cadastrar Porta </h1>
<div class="row">
    <form class="col s12" action="AdicionaPorta.php" method="post">
        <div class="row">
            <div class="input-field col s6">
                <input id="first_name" type="text" name="nome" class="validate" required autofocus>
                <label for="first_name">Numero</label>
                <input class="btn btn-primary" type="submit" value="Cadastrar" name="salvar">
            </div>
        </div>

    </form>
</div>
<?php
include './Class/Porta.php';
        include './Dao/CrudPorta.php';


$porta = new Porta();
$dao = new CrudPorta();
if ($_POST) {
    if ($_POST['salvar']) {
        if ((isset($_POST['nome']))) {
// resgata variáveis do formulário
            $porta->setNome(isset($_POST['nome']) ? $_POST['nome'] : '');

            $resultado = $dao->queryInsert($porta->getNome());

                if ($resultado == 'ok') { ?>
     <script>
    alert("Porta inserido com sucesso!");
</script>
    
<?php }else{
    ?>
<script>
    alert("Porta não inserido!");
</script>
<?php
        }
    }
  
}
}
    ?>

    <?php include("Rodape.php"); ?>

