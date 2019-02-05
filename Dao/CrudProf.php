<?php

include './class/conexao.php';

class CrudProf {

    public function queryInsert($nome, $num_mat) {

        try {

            $con = new conexao();
            $estado = "ativo";


            $query = $con->conectar()->prepare("SELECT * FROM usuario_professor WHERE nome=:nome and"
                    . " num_mat=:num_mat");
            $query->bindParam(':nome', $nome);
            $query->bindParam(':num_mat', $num_mat);
            $query->execute();
            $retorno = $query->rowCount();
            if ($retorno == 0) {

                $stmt = $con->conectar()->prepare("INSERT INTO `usuario_professor` (`nome`, `estado`,`num_mat`) VALUES (:nome,:estado,:num_mat);");
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':estado', $estado);
                $stmt->bindParam(':num_mat', $num_mat);
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

    public function querySelect() {
        try {
            $con = new conexao();
            $stmt = $con->conectar()->prepare("SELECT * FROM `usuario_professor`;");
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
            $stmt = $con->conectar()->prepare("SELECT nome,id FROM `usuario_professor` where estado='ativo';");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (ErrorException $ex) {
            echo "<p>Atenção!! Falha na conexao com o banco de dados....</p><br>"
            . "<p>Verifique a sua conexão com a Internet</p>";
        }
    }

    public function querySeleciona($id) {
        try {
            $con = new conexao();
            $stmt = $con->conectar()->prepare("SELECT * FROM `usuario_professor` WHERE `id` = :id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function queryDelete($id) {
        try {
            $con = new conexao();
            $stmt = $con->conectar()->prepare("DELETE FROM `usuario_professor` WHERE `id` = :id;");
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

    public function queryUpdate($id, $nome, $estado, $num_mat) {
        try {
            $con = new conexao();

            $stmt = $con->conectar()->prepare("UPDATE `usuario_professor` SET  `nome` = :nome,`estado` = :estado, `num_mat` = :num_mat WHERE `id` = :id;");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmt->bindParam(":num_mat", $num_mat, PDO::PARAM_STR);
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
