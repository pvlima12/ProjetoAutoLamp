
<?php include ("Logica-Usuario.php");
        include './Dao/CrudAdm.php';
        include './Class/conexao.php';


 $adm = new Usuario_Adm();
 
 if ((isset($_POST['nome'])) && (isset($_POST['num_mat']))) {
// resgata variáveis do formulário
$adm->setNome(isset($_POST['nome']) ? $_POST['nome'] : '');
$adm->setNum_identi(isset($_POST['num_mat']) ? $_POST['num_mat'] : '');
 
 
// cria o hash da senha
$passwordHash = sha1(md5($adm->getNum_identi()));
 
$con = new conexao();

$sql = "SELECT nome FROM `usuario_adm` WHERE nome = :nome AND num_identificacao = :num_mat";
$stmt = $con->conectar()->prepare($sql);
 
$stmt->bindParam(':nome', $adm->getNome());
$stmt->bindParam(':num_mat', $passwordHash);
 
$stmt->execute();
 
$users = $stmt->fetchAll();

if($users == NULL){
	header("Location: index.php?login=0");
}else{

    logaUsuario($adm->getNome());
	header("Location: index.php?login=1");
}

 }




