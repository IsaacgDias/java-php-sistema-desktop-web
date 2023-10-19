<?php
session_start();
require_once("../SA_php/database/Conexao.php");
require_once("../SA_php/dao/ClienteDao.php");
require_once("../SA_php/model/Cliente.php");
$cliente = new Cliente();
$clientedao = new ClienteDao();

$login = new ClienteDao();

if(!$login->checkLogin()) {
    header("Location: Views");
}
?>