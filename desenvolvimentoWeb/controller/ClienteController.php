<?php

require_once("../database/Conexao.php");
require_once("../dao/ClienteDao.php");
require_once("../model/Cliente.php");

$cliente = new Cliente();
$clientedao = new ClienteDao();

$dados = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){

    $cliente->setNome($dados['nome']);
    $cliente->setCPF($dados['cpf']);
    $cliente->setTelefone($dados['telefone']);
    $cliente->setEmail($dados['mail']);
    $cliente->setSenha(password_hash($dados['senha'], PASSWORD_DEFAULT)); 
    $cliente->setSexo($dados['sexo']);
    $cliente->setRua($dados['rua']);
    $cliente->setNumero($dados['numero']);
    $cliente->setCep($dados['cep']);
    $cliente->setBairro($dados['bairro']);
    $cliente->setComplemto($dados['complemento']);
   


    if($clientedao->CadastrarCliente($cliente)) {

    echo "<script>
            alert('Cadastrado');
            location.href = '../Views/login/index.php';
          </script>";
    }
}else if(isset($_POST['login'])) {

	$cliente->setEmail(strip_tags($dados['mail']));
	$cliente->setSenha(strip_tags($dados['senha'])); 

    $clientedao->login($cliente);

	if($clientedao->login($cliente)) {

     echo "<script>
            alert('Login com sucesso!!');        
            location.href = '../Views/index.html';
           </script>";

	} else {
        echo "Email ou senha incorreta";
   // echo "<script>
         //   alert('Acesso inválido! login ou senha incorretos!');
           // location.href = '../../Views/login';
       // </script>";
  }
}else if(isset($_POST['logout'])) {

 session_start();
  unset($_SESSION['user_session']);
  echo "<script>
  alert('Conta Deslogada');        
  location.href = '../Views/login/index.php';
 </script>";
 
}
?>