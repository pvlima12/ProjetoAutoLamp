<?php
include("logica-usuario.php");
verificaUsuario();
?>

<?php
include ("cabecalho.php");
?>

<h1 class="center-align">Acionamento manual </h1>

<?php
include './Class/Porta.php';
include './Dao/CrudPorta.php';

$porta = new Porta();
$daoporta = new CrudPorta();
$resultado = $daoporta->querySelect2();
?>

<div class="row">
    <form class="col s12" action="manual_sala.php" method="post">
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
                <input class="btn btn-primary" type="submit" value="Selecionar" name="salvar">
            </div>
        </div>
    </form>
</div>

<?php
if ($_POST) {

    $s = array();
    foreach ($_POST as $chave => $valor) {
        if (is_array($valor)) {

            foreach ($valor as $ch => $va) {
                $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
                socket_connect($sock, "192.168.0.140", 80);
                socket_write($sock, $va);

                socket_close($sock);
            }
            echo '<br />';
        } else {
            echo 'Chave: ' . $chave . ' | Valor: ' . $valor . '<br />';
        }
    }
}
?>
<?php include("rodape.php"); ?>
