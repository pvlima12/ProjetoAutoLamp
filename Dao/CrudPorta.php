<?php
      
require_once './Class/conexao.php';
class CrudPorta{

    public function queryInsert($nome) {

        try {
            $con = new conexao();

            $estado = "ativo";
            $stmt = $con->conectar()->prepare("INSERT INTO `porta` (`nome`,`estado`) VALUES (:nome,:estado);");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':estado', $estado);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
    }

    public function querySelect() {
        try {
            
            $con = new conexao();
            $stmt = $con->conectar()->prepare("SELECT * FROM `porta`;");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
        }
    public function querySelect2() {
        try {
            
            $con = new conexao();
            $stmt = $con->conectar()->prepare("select * from porta where estado='ativo' and nome not in ( SELECT p.nome FROM equipamento e, porta p WHERE e.cod_porta=p.id)");
            $stmt->execute();
            $retorno = $stmt->rowCount();
             if ($retorno > 0) {
                 return $stmt->fetchAll();
            } else {
                return 'erro';
            }
       
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
        }
        
          public function querySelect3() {
        try {
            
            $con = new conexao();

            $stmt = $con->conectar()->prepare("SELECT * from sala");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
        }
          public function querySeleciona($id){
        try{
            $con = new conexao();
            $stmt = $con->conectar()->prepare("SELECT * FROM `porta` WHERE `id` = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    

    public function queryDelete($id) {
        try {
            $con = new conexao();
            $stmt = $con->conectar()->prepare("DELETE FROM `porta` WHERE `id` = :id;");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
    }

    public function queryUpdate($id,$nome,$estado){
        try {
            $con = new conexao();

            $stmt = $con->conectar()->prepare("UPDATE `porta` SET  `nome` = :nome,`estado` = :estado WHERE `id` = :id;");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
          echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
    }

}


