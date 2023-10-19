<?php
Class AssinaturaDao{
public function Plano(Assinatura $assinatura){

    try {

        $sql = "INSERT INTO assinatura(id_cliente, tipo, valor) VALUES (:id_cliente, :tipo, :valor);";
        $stmt = Conexao::getConexao()->prepare($sql);
        
        
        $stmt->bindValue(":id_cliente", $_SESSION['user_session'], PDO::PARAM_INT);
        $stmt->bindValue(":tipo", $assinatura->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(":valor", $assinatura->getValor(), PDO::PARAM_STR);
   

        $stmt->execute();
      

    
    } catch (PDOException $e) {
        echo "Erro ao Inserir AgendamentoDao <br>" . $e->getMessage() . '<br>';
    }
}
public function Plano_Individual(Assinatura $assinatura){

    try {

        $sql = "INSERT INTO assinatura(id_cliente, tipo, valor) VALUES (:id_cliente, :tipo, :valor);";
        $stmt = Conexao::getConexao()->prepare($sql);
        
        
        $stmt->bindValue(":id_cliente", $_SESSION['user_session'], PDO::PARAM_INT);
        $stmt->bindValue(":tipo", $assinatura->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(":valor", 0, PDO::PARAM_STR);
        $stmt->bindValue(":valor", 0, PDO::PARAM_STR);
   

        $stmt->execute();
      

    
    } catch (PDOException $e) {
        echo "Erro ao Inserir AgendamentoDao <br>" . $e->getMessage() . '<br>';
    }
 
}
public function Tipo(Assinatura $assinatura){
    $sql = "SELECT id_cliente FROM assinatura WHERE tipo = ':tipo'";
    $stmt = Conexao::getConexao()->prepare($sql);
    $stmt->bindValue(":tipo", $assinatura->getTipo(), PDO::PARAM_STR);

    if($assinatura->getTipo() == "plano_individual"){
        header("Location: Views/Agendamento/index2.php");
        
    }else if($assinatura->getTipo() == "plano_mensal"){
        header("Location: Views/Agendamento/index.php");
    }else{
        
      echo "<script>
      alert('Voçe Não tem uma assinatura ou não esta logado!');
      location.href = '../Views';
    </script>";
    }
}
}
