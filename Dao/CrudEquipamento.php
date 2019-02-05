<?php
include './Class/conecta.php'; 
class CrudEquipamento {
  
    
    public function queryInsert($nome,$cod_porta,$cod_sala) {

        try {
            $con = new conecta();

            $stmt = $con->conectar()->prepare("INSERT INTO `equipamento` (`nome`,`cod_porta`,`cod_equipamento`) VALUES (:nome,:cod_porta,:cod_sala);");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cod_porta', $cod_porta);
            $stmt->bindParam(':cod_sala', $cod_sala);
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
            
            $con = new conecta();

            $stmt = $con->conectar()->prepare("SELECT e.id,e.nome as nome_equi,p.nome as nome_porta ,s.nome as nome_sala from equipamento e ,porta p, sala s where e.cod_porta=p.id and e.cod_equipamento=s.id");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
        }
    public function querySelect3() {
        try {
            
            $con = new conecta();

            $stmt = $con->conectar()->prepare("SELECT e.id,e.nome as nome_equi,p.nome as nome_porta ,s.nome as nome_sala from equipamento e ,porta p, sala s where e.cod_porta=p.id and e.cod_equipamento=s.id");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
        }
        
          public function querySeleciona($id){
        try{
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT * FROM `equipamento` WHERE `id` = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
          public function querySeleciona2($id){
        try{
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT p.nome as nome_porta,p.id as porta_id from "
                    . "equipamento e ,porta p, sala s where e.cod_porta=p.id and e.cod_equipamento=s.id and e.cod_porta = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
     
    
             public function querySeleciona3($id){
        try{
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT equipamento.nome, equipamento.id FROM equipamento, sala WHERE equipamento.cod_equipamento = sala.id and sala.id = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
             public function querySeleciona4($id){
        try{
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT s.nome as nome_sala, s.id as sala_id FROM equipamento e,porta p, sala s where e.cod_porta=p.id and e.cod_equipamento = s.id and e.id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
             public function querySelecionaN(){
        try{
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT e.nome as nome_equip,p.nome as porta_nome from equipamento e, porta p where e.cod_porta=p.id and e.nome = :nome;");
            $stmt->bindParam(":nome", $nome);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }

       public function querySeleciona5($id) {
        try {
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT DISTINCT sala.nome as sala_nome, sala.id as sala_id FROM `equipamento`, sala WHERE equipamento.cod_equipamento=sala.id and sala.id <> :id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
  
    
    
    public function queryDelete($id) {
        try {
            $con = new conecta();
            $stmt = $con->conectar()->prepare("DELETE FROM `equipamento` WHERE `id` = :id;");
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

    public function queryUpdate($id,$nome,$cod_porta,$cod_sala){
        try {
            $con = new conecta();

            $stmt = $con->conectar()->prepare("UPDATE `equipamento` SET  `nome` = :nome,`cod_porta` = :cod ,`cod_equipamento`=:cod_sala WHERE `id` = :id;");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":cod", $cod_porta);
            $stmt->bindParam(":cod_sala", $cod_sala);
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
