<?php
include("Logica-Usuario.php");
verificaUsuario();
?>
<?php include ("cabecalho.php"); ?>

<h1 class="center-align">Cadastrar Equipamento </h1>
<div class="row">
    <form class="col s12" action="AdicionaEquipamento.php" method="post">
        <div class="row">
            <div class="input-field col s6">
                <input id="first_name" type="text" name="nome_equi" class="validate" required autofocus>
                <label for="first_name">Nome</label>

            </div>
        </div>


        <div class="row">
            <div class="input-field col s6">
                <select class="icons" name = "cod_porta" required autofocus>
                    <option value="" disabled selected>Porta</option> 

                    <?php
                    include './Class/Porta.php';
                    include './Dao/CrudPorta.php';

                    $porta = new Porta();
                    $daoporta = new CrudPorta();
                    $resultado = $daoporta->querySelect2();

                    if ($resultado == 'erro') {
                        ?>
                        <option value="" disabled selected>Sem Porta Disponivel</option> 

                    <?php
                    } else {
                  
                        foreach ($daoporta->querySelect2() as $value) {
                            ?>
                            <option value="<?= $value['id'] ?>"  class="left"><?= $value['nome'] ?></option>


                        <?php }
                    }
                    ?>
                </select>
                 </div>
        </div>

                <div class="row">
            <div class="input-field col s6">
                <select class="icons" name = "cod_sala" required autofocus>
                    <option value="" disabled selected>Sala</option> 

                    <?php
                           
                  
                        foreach ($daoporta->querySelect3() as $value) {
                            ?>
                            <option value="<?= $value['id'] ?>"  class="left"><?= $value['nome'] ?></option>


                        <?php }
                    
                    ?>
                </select>
                <input class="btn btn-primary" type="submit" value="Cadastrar" name="salvar">


            </div>
        </div> 
    </form>
</div>
<?php
if ($_POST) {
    if ($_POST['salvar']) {
        if ((isset($_POST['nome_equi'])) && (isset($_POST['cod_porta']))&& (isset($_POST['cod_sala']))) {
            include './Class/Equipamento.php';
            require_once './Dao/CrudEquipamento.php';


            $equipamento = new Equipamento();
            $daoEqi = new CrudEquipamento();
// resgata variáveis do formulário
            $equipamento->setNome(isset($_POST['nome_equi']) ? $_POST['nome_equi'] : '');
            $equipamento->setCod_porta(isset($_POST['cod_porta']) ? $_POST['cod_porta'] : '');
            $equipamento->setCod_sala(isset($_POST['cod_sala']) ? $_POST['cod_sala'] : '');

            $resultado = $daoEqi->queryInsert($equipamento->getNome(), $equipamento->getCod_porta(),$equipamento->getCod_sala());

            if ($resultado == 'ok') {
                ?>
 <script>
    alert("Equipamento Inserido!");
</script>
    
<?php }else{
    ?>
<script>
    alert("Equipamento não  Inserido!");
</script>
<?php
        }
                }
            }
        }
    
    ?>

<?php include("Rodape.php"); ?>

