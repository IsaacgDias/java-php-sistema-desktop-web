<?php
session_start();
?>
<!DOCTYPE html>
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
    background-color: #ffd214;
    padding-top: 10%;
}

.caixa {
    margin: 0 auto;
    margin-top: 200px;    
}

#login {
    margin: 0 auto;
    text-align: center;
    justify-content: center;
    align-items: center;
    display: flex;
    flex-direction: row; 
}

form{
    margin: 0 auto;
}

div > input::placeholder{
    color: #141414;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

input{
    border: none;
    border-radius: 5px;
    width: 250px;
    height: 40px;
    padding-left: 15px;
    background-color: #ffffffa7;
    color: #000000;
}

.name{   
    margin-bottom: 15px;
}

.email{ 
    margin-bottom: 15px;
}


.tel{
     margin-bottom: 15px;
}

.sexo{
     margin-bottom: 15px;
}

.end{
     margin-top: 15px;
}

.senha{
     margin-top: 15px;
}


.entrar{
    margin: 0 auto;
    float: right;
}

#entrarC{
    margin-right: 30%;
}

#entrarL{
    margin-right: 6%;
    margin-top: 10%;
}

.entrar input {
    margin: 0 auto;
    cursor: pointer;
    width: 120px;
    height: 50px;
    border-radius: 5px;
    border: none;
    /* background-color: rgb(30, 157, 136); */
    background-color: #008b8b;
    color: #141414;
    font-size: 15pt;
}

input::placeholder {
    color: #b6b6b6;
}

h1 {
    color: #FAFAFA;
}


input:focus {
    outline: none;
}

#cadG{
    float: left;
    margin-bottom: 20px;
}

#cadEnd{
    float: right;
    padding-left: 50px;
    border-left: #868686 solid 1px;
    margin-top: -15px;
    margin-bottom: 50px;
    margin-right: 50px;
}
</style>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>CADASTRO</title>

</head>

<body>

    <nav>

        
        <a class="aLeft" href="../Sobre/index.html">SOBRE</a>
        <a class="aLeft" href="../Contato/index.html">CONTATO</a>
        
        <span>
        <a href="login.html">LOGIN</a>
        <a href="cadastro.html" id="ag">CADASTRAR</a>
        </span>

    <div>
        <a href="../index.html">
        <img src="img/Eletro Tech.png" alt="..." id="imglogo"/>
        </a>
    </div>

</nav>

    <main id="login" class="col-6">

       

        <div class="caixa, col-5" id="">
            
            <form action="../../controller/ClienteController.php" method="post" name="entrar" class="col-10">
            
                <div class="col-5">
            
                    <div class="email">
                        <input type="email" id="mail" name="mail" placeholder="E-mail" required>
                    </div>
            
                    <div class="senha">
                        <input type="password" id="senha" name="senha" placeholder="Senha">
                    </div>
            
                </div>
            
                <div class="entrar" id="entrarL">
                    <p>Ainda não tem uma conta? <a href="cadastro.html">Crie uma.</a></p>
                    <input type="submit" id="login" name="login" value="ENTRAR">
                    
                </div>
            
            </form>
            

        </div>

    </main>
    
</body>

</html>