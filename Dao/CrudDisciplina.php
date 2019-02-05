<?php

include './Class/conecta.php';


class CrudDisciplina {

    public function queryInsert($id,$nome,$carga_horaria,$sala_id,$professor_id) {

        try {

            $con = new conecta();
  
            $query = $con->conectar()->prepare("SELECT * FROM disciplina WHERE nome=:nome and"
                    . "id=:id");
            $query->bindParam(':nome', $nome);
            $query->bindParam(':id', $id);
            $query->execute();
            $retorno = $query->rowCount();
            if ($retorno == 0) {

                $stmt = $con->conectar()->prepare("INSERT INTO `disciplina` (`id`,`nome`,`carga_horaria`, `sala_id`,`professor_id`) VALUES (:id,:nome,:carga_horaria,:sala_id,:professor_id);");
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':carga_horaria', $carga_horaria);
                $stmt->bindParam(':sala_id', $sala_id);
                $stmt->bindParam(':professor_id', $professor_id);
                $stmt->execute();
                return 'ok';
            } else {

                return 'erro';
            }
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
    }
    public function queryInsertAula($periodo,$data_inicio,$data_fim,$disciplina_id) {

        try {

            $con = new conecta();
 
                $stmt = $con->conectar()->prepare("INSERT INTO `aula` (`periodo`,`data_inicio`, `data_fim`,`disciplina_id`) VALUES (:periodo,:data_inicio,:data_fim,:disciplina_id);");
                
                $stmt->bindParam(':periodo', $periodo);
                $stmt->bindParam(':data_inicio', $data_inicio);
                $stmt->bindParam(':data_fim', $data_fim);
                $stmt->bindParam(':disciplina_id', $disciplina_id);
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
  public function querySelect3() {
        try {
            
           $con = new conecta();

            $stmt = $con->conectar()->prepare("SELECT * from sala");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
        }
  public function querySelect7() {
        try {
            
           $con = new conecta();

            $stmt = $con->conectar()->prepare("SELECT a.id as id ,d.nome as nome_dis,a.periodo as periodo, a.data_inicio as data_inicio,a.data_fim as data_fim FROM aula a,disciplina d WHERE a.disciplina_id=d.id");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
        }
        
    public function querySelect() {
        try {

            $con = new conecta();

            $stmt = $con->conectar()->prepare("SELECT * from disciplina");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
    }

    public function querySeleciona($id) {
        try {
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT * FROM `disciplina` WHERE `id` = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
         public function querySeleciona6($id) {
        try {
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT distinct disciplina.nome as nome, disciplina.id id from disciplina, aula WHERE disciplina.id=aula.disciplina_id and disciplina.id <>:id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
    public function querySelecionaaula($id) {
        try {
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT aula.periodo as periodo , aula.data_inicio as inicio, aula.data_fim as fim , aula.id as id ,disciplina.nome as dis_nome ,disciplina.id as dis_id from disciplina,aula WHERE aula.disciplina_id=disciplina.id and aula.id = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function querySeleciona2($id) {
        try {
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT p.nome as nome_porta,p.id as porta_id from "
                    . "equipamento e ,porta p, sala s where e.cod_porta=p.id and e.cod_equipamento=s.id and e.cod_porta = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
    public function querySelecionaprofEsala($id) {
        try {
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT p.nome as nome_prof, p.id as prof_id FROM disciplina d,usuario_professor p WHERE d.professor_id=p.id and d.id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
    public function querySeleciona4($id) {
        try {
            $con = new conecta();
            $stmt = $con->conectar()->prepare("SELECT * FROM `sala` WHERE `id` = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
 

   public function querySelect5() {
        try {
            
            $con = new conexao();
            $stmt = $con->conectar()->prepare("select * from sala where nome not in ( SELECT p.nome FROM disciplina d,sala p WHERE d.professor_id=p.id)");
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
    public function queryDelete($id) {
        try {
            $con = new conecta();
            $stmt = $con->conectar()->prepare("DELETE FROM `disciplina` WHERE `id` = :id;");
            $stmt->bindParam(":id", $id);
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
    public function queryDelete2($id) {
        try {
            $con = new conecta();
            $stmt = $con->conectar()->prepare("DELETE FROM `aula` WHERE `id` = :id;");
            $stmt->bindParam(":id", $id);
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

    public function queryUpdate($id, $nome, $carga_horaria ,$sala_id ,$professor_id) {
        try {
            $con = new conecta();
	
            $stmt = $con->conectar()->prepare("UPDATE `disciplina` SET  `nome` = :nome,`carga_horaria` = :carga_horaria,`sala_id` = :sala_id ,`professor_id` = :professor_id WHERE `id` = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":carga_horaria", $carga_horaria);
            $stmt->bindParam(":sala_id", $sala_id);
            $stmt->bindParam(":professor_id", $professor_id);
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
    public function queryUpdate2($id, $periodo, $data_inicio ,$data_fim ,$disciplina_id) {
        try {
            $con = new conecta();
	
            $stmt = $con->conectar()->prepare("UPDATE `aula` SET  `periodo` = :periodo,`data_inicio` = :data_inicio,`data_fim` = :data_fim ,`disciplina_id` = :disciplina_id WHERE `id` = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":periodo", $periodo);
            $stmt->bindParam(":data_inicio", $data_inicio);
            $stmt->bindParam(":data_fim", $data_fim);
            $stmt->bindParam(":disciplina_id", $disciplina_id);
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
