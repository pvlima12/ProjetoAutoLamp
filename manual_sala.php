<?php
include("logica-usuario.php");
verificaUsuario();
?>
<?php
include ("cabecalho.php");
?>
<?php
if ($_POST) {
    if (isset($_POST['salvar'])) {
        if ((isset($_POST['cod_sala']))) {
            include './Class/Equipamento.php';
            require_once './Dao/CrudEquipamento.php';

            $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            socket_connect($sock, "192.168.0.140", 80);
            socket_write($sock, 1);

            $status = socket_read($sock, 6);
            if ($status[1] == 1 && $status[5] == 1) {

                echo 'Lampada on<br>';
                echo 'Ventilador On';
            } elseif ($status[1] == 0 && $status[5] == 0) {
                echo 'Lampada Off <br>';
                echo 'Ventilador Off';
            } elseif ($status[1] == 1 && $status[5] == 0) {
                echo 'Lampada Off <br>';
                echo 'Ventilador On';
            } elseif ($status[1] == 0 && $status[5] == 1) {
                echo 'Lampada On <br>';
                echo 'Ventilador Off';
            } else {
                echo 'Erro ao receber dados <br>';
            }

            socket_close($sock);

            $equipamento = new Equipamento();
            $daoEqi = new CrudEquipamento();
// resgata variáveis do formulário
            $equipamento->setCod_sala(isset($_POST['cod_sala']) ? $_POST['cod_sala'] : '');
            foreach ($daoEqi->querySeleciona3($equipamento->getCod_sala()) as $value) {
                ?>

                <tbody>
                    <tr>
                <div class="center-align">      
                    <form action="Manual.php" method="post">

                        <tr>
                            <td><?= $value['nome'] ?></td>
                            <td> <div class="switch">

                                    <label>
                                        Desligar 
                                        <input type="checkbox" name="porta[]" value="<?= $value['nome_Porta'] ?>">
                                        <span class="lever"></span>
                                        Ligar
                                    </label>
                                    <br>
                                    <br>
                                </div></td>
                        </tr>



            <?php } ?>

                    <br>
                    <br>
                    <tr>
                        <td>Selecionar Todos </td>
                        <td> <div class="switch">
                                <label>
                                    Desligar
                                    <input type="checkbox" name="porta[]" id="acao" onclick="marcarTodos(this.checked);">
                                    <span class="lever" ></span> 
                                    Ligar
                                </label>
                            </div></td>
                    </tr>

                    <br>
                    <br>

                    <input class="btn btn-primary" type="submit" value="enviar">

                    </tr>
                    </div>
                    </tbody>
                </form>
                <script type="text/javascript">
                    function marcarTodos(marcar) {
                        var itens = document.getElementsByName('porta[]');

                        if (marcar) {
                            document.getElementById('acao').innerHTML = 'Desmarcar Todos';
                        } else {
                            document.getElementById('acao').innerHTML = 'Marcar Todos';
                        }

                        var i = 0;
                        for (i = 0; i < itens.length; i++) {
                            itens[i].checked = marcar;
                        }

                    }
                </script>

            <?php
        }
    }
}
?>
    <?php include("Rodape.php"); ?>
