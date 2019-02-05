<?php


class Aula {
    private $id;
    private $perido;
    private $data_inicio;
    private $data_fim;
    private $cod_dis;
    
    
    function getId() {
        return $this->id;
    }

    function getPerido() {
        return $this->perido;
    }

    function getData_inicio() {
        return $this->data_inicio;
    }

    function getData_fim() {
        return $this->data_fim;
    }

    function getCod_dis() {
        return $this->cod_dis;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPerido($perido) {
        $this->perido = $perido;
    }

    function setData_inicio($data_inicio) {
        $this->data_inicio = $data_inicio;
    }

    function setData_fim($data_fim) {
        $this->data_fim = $data_fim;
    }

    function setCod_dis($cod_dis) {
        $this->cod_dis = $cod_dis;
    }


    
}
