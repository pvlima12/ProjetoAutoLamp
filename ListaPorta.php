<?php
include("Logica-Usuario.php");
verificaUsuario();
?>
<?php
include ("cabecalho.php");
include './Class/Porta.php';
        include './Dao/CrudPorta.php';

            $objdao = new CrudPorta();
            $porta = new Porta();
   
    if ($_POST) {
    if (isset($_POST['alterar'])){
        if ((isset($_POST['alterar_id']))) {
        if ((isset($_POST['alterar_id'])) && (isset($_POST['nome']))&& (isset($_POST['estado']))) {
// resgata variáveis do formulário
            $porta->setId(isset($_POST['alterar_id']) ? $_POST['alterar_id'] : '');
            $porta->setNome(isset($_POST['nome']) ? $_POST['nome'] : '');
            $porta->setEstado(isset($_POST['estado']) ? $_POST['estado'] : '');


            $resultado = $objdao->queryUpdate($porta->getId(), $porta->getNome(),$porta->getEstado());
           if ($resultado == "ok") { 
            ?>
    <script>
    alert("Porta aletrado com sucesso!");
</script>
    
<?php }else{
    ?>
<script>
    alert("Porta não alterada!");
</script>
 
<?php }
        }
    }
    }
  
}                 
?>
<h1 class="center-align">Listar Porta</h1> 
<table >
    <thead>
        <tr>
            <th> Nome </th>
            <th> Estado </th>
        </tr>
    </thead>
<?php foreach ($objdao->querySelect() as $value) { ?>
        <tbody>
            <tr>
                <td><?= $value['nome'] ?></td>
                <td><?= $value['estado'] ?></td>

                <td>
                                         
                    <form class="form_editar" action="EditarPorta.php" method="post" style="float: left; margin: 0 15px;">
                                <input name="editar_id" type="hidden" value="<?= $value['id'] ?>"/>
                                <button class="btn tooltipped btn-floating btn-large waves-effect waves-light blue" 
                                        name="editar" type="submit" data-position="bottom" data-tooltip="Editar"><i class="material-icons">create</i></button>
                       </form>
                    

                </td>

            </tr>
        </tbody>
<?php } ?>
</table>

    <?php include("rodape.php"); ?>