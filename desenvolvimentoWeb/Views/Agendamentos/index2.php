<?php
session_start();

require_once('../../database/Conexao.php');
require_once('../../dao/ClienteDao.php');
require_once('../../dao/AgendamentoDao.php');
require_once('../../model/Agendamento.php');
require_once('../../model/Cliente.php');

$agendamento = new Agendamento();
$agendamentodao = new AgendamentoDao();
$clientedao = new ClienteDao();

$cliente = new Cliente();
$login = new ClienteDao();

if(!$login->checkLogin()) {
    header("Location: ../login");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Eletro tech</title>
</head>

<body>

    <nav>

        
        <a class="aLeft" href="../Sobre/index.html">SOBRE</a>
        <a class="aLeft" href="../Contato/index.html">CONTATO</a>
        
        <span>
        <a href="../Login/index.html">LOGIN</a>
        <a href="./Login/cadastro.html" id="ag">CADASTRAR</a>
        <a href="../../controller/ClienteController.php?logout=true"> Sair </a> 
        </span>

    <div>
        <a href="../index.html">
        <img src="../Login/img/Eletro Tech.png" alt="..." id="imglogo"/>
        </a>
    </div>

</nav>

    <main>

        <div class="caixa, col-5" id="">
     
            <form action="../../controller/AgendController.php"  method="post" class="col-5" name="plan_individual">
         
                <label>Selecione a data para agendar </label>
                <br/>
                
                <input type="date" name="data" id="data" max="2023-12-31"/>
                <select name="servico" id="servico">
                    <option name="opt" value="0" selected="select"> -- Tipo do serviço -- </option>
                    <option name="opt2" value="1">Cabeamento elétrico</option>
                    <option name="opt3" value="2">Troca/instalação de disjuntores</option>
                    <option name="opt4" value="3">Montagem de padrão de entrada</option>
                    <option name="opt5" value="4">Instalação de tomadas, interruptores e disjuntores</option>
                    <option name="opt6" value="5">Instalação de sistemas de iluminação</option>
                    <option name="opt7" value="6">Instalação de quadros e painéis elétricos</option>
                    <option name="opt8" value="7">Apenas visita técnica</option>

                </select>
                    <input type="submit" id="individual" name="individual" value="ENVIAR">

                </form>
                 
     
              

        </div>

        
    </main>
        
</body>

</html>