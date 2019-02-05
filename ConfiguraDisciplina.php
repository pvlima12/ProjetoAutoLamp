<?php include("logica-usuario.php");
verificaUsuario();
?>
<?php include ("cabecalho.php");
            include './Class/Disciplina.php';
            include './Class/Aula.php';
            require_once './Dao/CrudDisciplina.php';
            $daoDis = new CrudDisciplina();
            $aula = new Aula();

           ?> 

         <h1 class="center-align">Cadastrar Aula</h1>             
  <div class="row">
 <form class="col s12" action="ConfiguraDisciplina.php" method="post">
      
   <div class="row">   
  <div class="input-field col s12 m6">
      <select class="icons" name="cod_dis">
      <option value="" disabled selected>Disciplina</option>   
      <?php       
            foreach ($daoDis->querySelect() as $value) {
?>

 
      <option value="<?=$value['id']?>"  class="left"><?=$value['nome']?></option>

      <?php } ?>
    </select>
       </div>
    <div class="input-field col s12 m6">
        <select class="icons" name="periodo">
      <option value="" disabled selected>Período</option>
      <option value="Matutino"  class="left">Matutino</option>
      <option value="Vespertino"  class="left">Vespertino</option>
      <option value="Noturno"  class="left">Noturno</option>
    </select>
  </div>
       </div>
  <h3 class="center-align">Definir Datas</h3>
  <div class="row">
        
        <div class="input-field col s6">
            <h5 class="left-align">Inicio da Aula</h5>
          <input id="first_name" type="date" name="data_inicio" class="validate">
           </div>    
 
        <div class="input-field col s6">
           <h5 class="left-align">Fim da Aula</h5>
          <input id="first_name" type="date" name="data_fim" class="validate">
           </div>    
      </div>
        <div class="row">
         
          <input class="btn btn-primary" type="submit" value="Cadastrar" name="salvar">
      </div>
     
    </form>
  </div>
         
         <?php 
         
         
         if ($_POST) {
    if ($_POST['salvar']) {
        if ((isset($_POST['cod_dis'])) && (isset($_POST['periodo']))&& (isset($_POST['data_inicio']))&& 
                (isset($_POST['data_fim']))) {
// resgata variáveis do formulário
            
           
            $aula->setPerido(isset($_POST['periodo']) ? $_POST['periodo'] : '');
            $aula->setData_inicio(isset($_POST['data_inicio']) ? $_POST['data_inicio'] : '');
            $aula->setData_fim(isset($_POST['data_fim']) ? $_POST['data_fim'] : '');
             $aula->setCod_dis(isset($_POST['cod_dis']) ? $_POST['cod_dis'] : '');

            $resultado = $daoDis->queryInsertAula($aula->getPerido(),$aula->getData_inicio(),
                    $aula->getData_fim(),$aula->getCod_dis());

            if ($resultado == "ok") {
                ?>
                <script>
                    alert("Aula inserido com sucesso!");
                </script>

            <?php } else {
                ?>
                <script>
                    alert("Aula não inserido!, pois ja tem um cadastro existente.");
                </script>

            <?php
            }
        }
    }
}
?>
 <?php include("rodape.php");?>

