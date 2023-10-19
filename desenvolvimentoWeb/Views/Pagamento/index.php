<?php
session_start();

require_once('../../database/Conexao.php');
require_once('../../dao/ClienteDao.php');
require_once('../../dao/AgendamentoDao.php');
require_once('../../model/Agendamento.php');
require_once('../../model/Cliente.php');
require_once('../../dao/AssinaturaDao.php');
require_once('../../model/Assinatura.php');

$agendamento = new Agendamento();
$agendamentodao = new AgendamentoDao();
$clientedao = new ClienteDao();

$assinatura = new Assinatura();
$assinaturadao = new AssinaturaDao();

$cliente = new Cliente();
$login = new ClienteDao();

if(!$login->checkLogin()) {
           
    header("Location: ../login");
    echo "<script>
             alert('Faça o login!!');
           </script>";
}


?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Sobre - EletroTech</title>

    <style>
        *{
    font-family:Georgia, 'Times New Roman', Times, serif;
}

body {
    font-family: 'Roboto', sans-serif;
    background-color: #ffd214;
    color: rgb(0, 0, 0);
    align-items: center;
}


nav{
    width: 100vw;
    height: 20vh;
    background-color: #0D0454;
}

nav > div{
    padding: 0;
    position: relative;
    border-radius: 5px;
    margin: 0 auto;
    margin-top: -1.5%;
    height: 200px;
    width: 300px;
    background-color: #0D0454;
}

a {
    text-decoration: none;
    color: rgb(30, 152, 152);
    padding: 1%;
}

nav > a{
    font-size: 20pt;
    color: #e4e4e4;
}

.aLeft{
    padding-top: 5%;
}

span {
    margin-left: 50%;
    font-size: 20pt;
}

span > a{
    color: #e4e4e4;
    margin-top: 15%;
}

#imglogo {
    margin-left: 23%;
    margin-top: -3.5%;
    width: 210px;
}

main{
    margin: 0 auto;
    align-items: center;
    background-color: #ffd214;
    padding-top: 10%;
}

.caixa{
    margin: 0 auto;
    margin-top: 200px;  
    padding-right: 30%;  
    text-align: justify;
    align-items: center;
}

section{
    text-align: justify;
    margin-left: 30%;
}

p{
    font-size: 15pt;
}

form{
    margin: 0 auto;
    float: right;
}

input{
    border: none;
    border-radius: 5px;
    width: 250px;
    height: 40px;
    padding-left: 15px;
    background-color: #ffffffa7;
    color: #000000;
    margin-bottom: 15px;
    outline: none;
}

button{
    background-color: #008b8b;
    outline: none;
    border: none;
    border-radius: 5px;
    width: 120px;
    height: 60px;
    font-size: 13pt;
    margin-bottom: 20px;
    margin-left: 30%;
}

#preco_final{
    float: right;
}
    </style>

</head>

<body>

    <nav>

        
        <a class="aLeft" href="../Sobre/index.html">SOBRE</a>
        <a class="aLeft" href="../Contato/index.html">CONTATO</a>
        
        <span>
        <a href="../Login/index.php">LOGIN</a>
        <a href="./Login/cadastro.html" id="ag">CADASTRAR</a>
        </span>

    <div>
        <a href="../index.html">
        <img src="../Login/img/Eletro Tech.png" alt="..." id="imglogo"/>
        </a>
    </div>

</nav>

    <main class="col-10">

        <div class="caixa, col-8">

            <!-- action="../Agendamentos/index.html" -->

            <form action="../../controller/AssiController.php" method="post" class="col-5">
            <?php foreach ($clientedao->user() as $cliente) : ?> 
                <input type="hidden" id="id_c" name="id_c" value="<?php echo $agendamento->getIDC(); ?>" />
                <input type="hidden" id="id_c2" name="id_c2" value="<?php echo $assinatura->getIDC(); ?>" />

         
                <input type="text" name="cpfP" id="cpfP" placeholder="CPF do titular"  maxlength="14" minlength="14" required>
                
                <input type="text" name="cartao" id="cartao" placeholder="Número do cartão" minlength="13" maxlength="16" required>
                <input type="text" name="cvv" id="cvv" placeholder="CVV" minlength="3" maxlength="3" required>
                <label>Aceita os termos? </label>
                <input type="checkbox" id="pagar" name="pagar" value="plano_mensal" required />
                <button type="submit" id="assinar" name="assinar">CONIFRMAR</button>

            </form>
            <?php endforeach ?>

        </div>

    </main>
    
</body>

<script src="logica.js"></script>

</html>