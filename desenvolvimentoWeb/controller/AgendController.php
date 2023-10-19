<?php
session_start();

require_once('../database/Conexao.php');
require_once('../dao/AgendamentoDao.php');
require_once('../model/Agendamento.php');
require_once('../model/Cliente.php');

$agendamento = new Agendamento();
$agendamentodao = new AgendamentoDao();


$dados = filter_input_array(INPUT_POST);

if (isset($_POST['agendar'])) {

    //$agendamento->setIDC($dados[":id"]);
    // o id nao foi setado aqui por que antes de chegar aqui, ela foi setado no user do clienteDao
    $agendamento->setData($dados['data']);
    if($dados['servico'] == 1){
      $agendamento->setTipo('Manutenção');
      $agendamento->setServico('Cabeamento elétrico');

    }else if($dados['servico'] == 2){
      $agendamento->setTipo('Manutenção');
      $agendamento->setServico('Troca/instalação de disjuntores');

    }else if($dados['servico'] == 3){
      $agendamento->setTipo('Manutenção');
      $agendamento->setServico('Montagem de padrão de entrada');

    }else if($dados['servico'] == 4){
      $agendamento->setTipo('Manutenção');
      $agendamento->setServico('Instalação de tomadas, interruptores e disjuntores');

    }else if($dados['servico'] == 5){
      $agendamento->setTipo('Manutenção');
      $agendamento->setServico('Instalação de sistemas de iluminação');

    }else if($dados['servico'] == 6){
      $agendamento->setTipo('Manutenção');
      $agendamento->setServico('Instalação de quadros e painéis elétricos');

    }else if($dados['servico'] == 7){
      $agendamento->setTipo('Avaliação');
      $agendamento->setServico('Apenas visita técnica');  
    }
   
      echo "<script>
      alert(' Seu pedido foi enviado');
      location.href = '../Views';
    </script>";

    if ($agendamentodao->Agendar($agendamento)) {

     
    } else {
        "<script>
             alert('Alguma coisa deu errado');
         </script>";
    }
}else if(isset($_POST['individual'])){
  
  $agendamento->setData($dados['data']);

  if($dados['servico'] == 1){
    $agendamento->setTipo('Manutenção');
    $agendamento->setServico('Cabeamento elétrico');

  }else if($dados['servico'] == 2){
    $agendamento->setTipo('Manutenção');
    $agendamento->setServico('Troca/instalação de disjuntores');

  }else if($dados['servico'] == 3){
    $agendamento->setTipo('Manutenção');
    $agendamento->setServico('Montagem de padrão de entrada');

  }else if($dados['servico'] == 4){
    $agendamento->setTipo('Manutenção');
    $agendamento->setServico('Instalação de tomadas, interruptores e disjuntores');

  }else if($dados['servico'] == 5){
    $agendamento->setTipo('Manutenção');
    $agendamento->setServico('Instalação de sistemas de iluminação');

  }else if($dados['servico'] == 6){
    $agendamento->setTipo('Manutenção');
    $agendamento->setServico('Instalação de quadros e painéis elétricos');

  }else if($dados['servico'] == 7){
    $agendamento->setTipo('Apenas visita técnica');
    $agendamento->setServico('Avaliação');  
  }
  echo " <script>
  alert('Seu pedido foi enviado');
  location.href = '../Views/index.html';
  </script> ";
  if ($agendamentodao->Agendar($agendamento)) {

     
  } else {
      "<script>
           alert('Alguma coisa deu errado');
       </script>";
  }
}
