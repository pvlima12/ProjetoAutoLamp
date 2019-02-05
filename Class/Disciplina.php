<?php

class Disciplina {

    private $nome;
    private $cod_disciplina;
    private $csrgaHoraria;
    private $sala_id;
    private $professor_id;
    function getNome() {
        return $this->nome;
    }

    function getCod_disciplina() {
        return $this->cod_disciplina;
    }

    function getCsrgaHoraria() {
        return $this->csrgaHoraria;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCod_disciplina($cod_disciplina) {
        $this->cod_disciplina = $cod_disciplina;
    }

    function setCsrgaHoraria($csrgaHoraria) {
        $this->csrgaHoraria = $csrgaHoraria;
    }
    function getSala_id() {
        return $this->sala_id;
    }

    function getProfessor_id() {
        return $this->professor_id;
    }

    function setSala_id($sala_id) {
        $this->sala_id = $sala_id;
    }

    function setProfessor_id($professor_id) {
        $this->professor_id = $professor_id;
    }


}
