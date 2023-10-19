<?php
session_start();

require_once('../database/Conexao.php');
require_once('../dao/AssinaturaDao.php');
require_once('../model/Assinatura.php');
require_once('../model/Cliente.php');

$assinatura = new Assinatura();
$assinaturadao = new AssinaturaDao();


$dados = filter_input_array(INPUT_POST);

if (isset($_POST['assinar'])) {

    $assinatura->setTipo($dados['pagar']);
    $assinatura->setValor(3450.73);    
    echo " <script>
    alert('Plano efetuado com Sucesso!!');
    location.href = '../Views/Agendamentos/index.php';
    </script> ";
    if ($assinaturadao->Plano($assinatura)) {
   
    }
}else if (isset($_POST['assinarind'])){
    $assinatura->setTipo($dados['pagar']);
    
    
    echo " <script>
    alert('Plano efetuado com sucesso!!');
    location.href = '../Views/Agendamentos/index2.php';
    </script> ";
    if ($assinaturadao->Plano_Individual($assinatura)) {
        
    }
}else if(isset($_POST['tipo_plano'])) {
    if ($assinaturadao->Tipo($assinatura)) {
        
    }
}

?>