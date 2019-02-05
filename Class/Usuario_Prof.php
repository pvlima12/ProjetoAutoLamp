<?php

class Usuario_Prof {
    private  $id;
    private  $nome;
    private  $estado;
    private  $num_mat;
    

    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEstado() {
        return $this->estado;
    }

    function getNum_mat() {
        return $this->num_mat;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setNum_mat($num_mat) {
        $this->num_mat = $num_mat;
    }


}
