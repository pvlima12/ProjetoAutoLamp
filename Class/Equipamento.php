<?php

class Equipamento {
    private $id;
    private $nome;
    private $cod_porta;
    private $cod_sala;

    function getNome() {
        return $this->nome;
    }
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

        function setNome($nome) {
        $this->nome = $nome;
    }

    function getCod_porta() {
        return $this->cod_porta;
    }

    function getCod_sala() {
        return $this->cod_sala;
    }

    function setCod_porta($cod_porta) {
        $this->cod_porta = $cod_porta;
    }

    function setCod_sala($cod_sala) {
        $this->cod_sala = $cod_sala;
    }



}
