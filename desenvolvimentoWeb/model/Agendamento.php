<?php
Class Agendamento{
    private $id;
    private $id_cliente;
    private $id_funcionario;
    private $data;
    private $tipo;
    private $servico;
    private $nome;
    private $orcamento;

    function getOrcamento() {
        return $this->orcamento;
    }
    function getID() {
        return $this->id;
    }
    function getNome() {
        return $this->nome;
    }
    function getIDC() {
        return $this->id_cliente;
    }
    function getIDF() {
        return $this->id_funcionario;
    }
    function getData() {
        return $this->data;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getServico() {
        return $this->servico;
    }
    function setID($id) {
        $this->id = $id;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }
    function setIDC($id_cliente) {
        $this->id_cliente = $id_cliente;
    }
    function setIDF($id_funcionario) {
        $this->id_funcionario = $id_funcionario;
    }
    function setData($data) {
        $this->data= $data;
    }
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    function setServico($servico) {
        $this->servico = $servico;
    }
    function setOrcamento($orcamento) {
        $this->orcamento = $orcamento;
    }

}
?>