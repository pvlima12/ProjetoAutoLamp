<?php

class Usuario_Adm {

    private $cod;
    private $nome;
    private $num_identi;
    


    function getCod() {
        return $this->cod;
    }

    function getNome() {
        return $this->nome;
    }

    function getNum_identi() {
        return $this->num_identi;
    }

    function setCod($cod) {
        $this->cod = $cod;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setNum_identi($num_identi) {
        $this->num_identi = $num_identi;
    }

}
