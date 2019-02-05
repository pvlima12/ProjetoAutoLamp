<?php
include("Logica-Usuario.php");
verificaUsuario();
?>
<?php include ("cabecalho.php"); ?>

<h1 class="center-align">Cadastrar Professor</h1>

<div class="row">
    <form class="col s12" action="AdicionaUsuario.php" method="post">
        <div class="row">
            <div class="input-field col s6">
                <input id="first_name" type="text" name="nome" class="validate" required autofocus>
                <label for="first_name">Nome</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <input id="last_name" type="text" name="num_mat"class="validate" required autofocus>
                <label for="last_name">Número de Identificação </label>
                <input class="btn btn-primary" type="submit" value="Cadastrar" name="salvar">
            </div>
        </div>
    </form>
</div>
<?php
include './Class/Usuario_Prof.php';
        include './Dao/CrudProf.php';


$prof = new Usuario_Prof();
$dao = new CrudProf();
if ($_POST) {
    if ($_POST['salvar']) {
        if ((isset($_POST['nome'])) && (isset($_POST['num_mat']))) {
// resgata variáveis do formulário
            $prof->setNome(isset($_POST['nome']) ? $_POST['nome'] : '');
            $prof->setNum_mat(isset($_POST['num_mat']) ? $_POST['num_mat'] : '');

            $resultado = $dao->queryInsert($prof->getNome(), $prof->getNum_mat());

                if ($resultado == "ok") { ?>
    <script>
    alert("Professor inserido com sucesso!");
</script>
    
<?php }else{
    ?>
<script>
    alert("Professor não inserido!, pois ja tem um cadastro existente.");
</script>
 
<?php }
        }
    }
  
}
    ?>

    <?php include("Rodape.php"); ?>

