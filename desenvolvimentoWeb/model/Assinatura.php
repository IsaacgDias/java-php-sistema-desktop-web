<?php
Class Assinatura{
private $id;
private $id_cliente;
private $data;
private $tipo;
private $valor;

    
function getID() {
    return $this->id;
}
    
function getIDC() {
    return $this->id_cliente;
}
    
function getData() {
    return $this->data;
}
    
function getTipo() {
    return $this->tipo;
}
    
function getValor() {
    return $this->valor;
}
function setID($id) {
    $this->id = $id;
}
function setIDC($id_cliente) {
    $this->id_cliente = $id_cliente;
}
function setData($data) {
    $this->data= $data;
}
function setValor($valor) {
    $this->valor = $valor;
}
function setTipo($tipo){
    $this->tipo = $tipo;
}
}
?>