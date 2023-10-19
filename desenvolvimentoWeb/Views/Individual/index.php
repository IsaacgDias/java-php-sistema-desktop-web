<?php
session_start();
require_once('../../database/Conexao.php');
require_once('../../dao/ClienteDao.php');
require_once('../../model/Assinatura.php');
$assinatura = new Assinatura();
$login = new ClienteDao();

if(!$login->checkLogin()) {
    header("Location: ../login");
}
?>
<script> 
function calculo_orcamento() {

var servico = parseInt(document.getElementById("servico").value);


var tamanho = parseInt(document.getElementById("tamanho").value) * 55;
var interruptor = parseInt(document.getElementById("interruptor").value) * 86;
var tomada = parseInt(document.getElementById("tomada").value) * 70;
var disjuntor = parseInt(document.getElementById("disjuntor").value) * 248;
var pontoLuz = parseInt(document.getElementById("pontoLuz").value) * 30;

 text = tamanho + interruptor + tomada + disjuntor + pontoLuz + servico;


document.getElementById("orcamento").style.display = "block";
document.getElementById("contratar").style.display = "block";

document.getElementById("orcamento").value = "R$ " + text;


document.getElementById("calculo").style.display = "none";


// var preco = document.getElementById("orcamento").value;

// document.getElementById("preco_final").innerHTML = preco;

    return false;
}

// mascarar as coisas

var tamanhoM = document.getElementById("tamanho");
tamanhoM.addEventListener('keyup', mascara1);

function mascara1(e){
    
    let carac = e.target.value.replace(/\D/g, "");

    e.target.value = carac;
 
}
</script>
<style> 
*{
    font-family:Georgia, 'Times New Roman', Times, serif;
}

body {
    font-family: 'Roboto', sans-serif;
    background-color: #ffd214;
    color: #fff;
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
    background-color: #ffd214;
    padding-top: 10%;
    text-align: justify;
}

#caixa {
    margin: 0 auto;
    margin-top: 20px;
    align-items: center;
    /* padding-bottom: 50px; */
}

form{
    margin: 0 auto;
}

input, select{
    border: none;
    border-radius: 5px;
    width: 250px;
    height: 40px;
    padding-left: 15px;
    background-color: #ffffffa7;
    color: #000000;
    margin-bottom: 15px;
}

input::placeholder{
    color: rgb(64, 64, 64);
}

#calculo{
    width: 90px;
    height: 45px;
    margin-left: 50%;
    font-size: 10pt;
    background-color: #008b8b;
    display: block;
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
    display: none;
}



#orcamento{
    font-size: 13pt;
    color: #000;
    margin-right: 10%;
    display: none;
}


label{
    font-size: 13pt;
    color: #000;
    margin-right: 10%;
}
</style>
<!DOCTYPE html>
<html lang="pt-br">
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
        <a href="../Login/index.php">LOGIN</a>
          <a href="./Login/cadastro.html" id="ag">CADASTRAR</a>
        </span>

    <div>
        <a href="../index.html">
        <img src="../Login/img/Eletro Tech.png" alt="..." id="imglogo"/>
        </a>
    </div>

</nav>

    <main class="col-12"> 

        <div class="col-6" id="caixa">
           
            <form method="post" class="col-5" name="plan_individual">
            <input type="hidden" name="servico" id="servico" value="1"/>
            

                <input type="text" name="tamanho" id="tamanho" placeholder="Tamanho em m²">
                <input type="number" name="interruptor" id="interruptor" placeholder="interruptores">
                <input type="number" name="tomada" id="tomada" placeholder="tomadas">
                <input type="number" name="disjuntor" id="disjuntor" placeholder="disjuntores">
                <input type="number" name="pontoLuz" id="pontoLuz" placeholder="Pontos de luz">

               

                <input id="orcamento" name="orcamento" placeholder="R$ --">
                
                <button id="calculo" onclick="return calculo_orcamento()">CALCULAR</button>
                


            </form>

            <a href="../Pagamento/index2.php"><button type="submit" id="contratar">CONTRATAR</button></a>



           
        </div>

        
    </main>
        
</body>


</html>