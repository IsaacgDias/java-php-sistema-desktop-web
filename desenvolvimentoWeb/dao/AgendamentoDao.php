<?php

class AgendamentoDao
{
    public function Agendar(Agendamento $agendamento)
    {

        try {

            $sql = "INSERT INTO agendamento(id_cliente, data, tipo, servico) VALUES (:id_cliente, :data, :tipo, :servico);";
            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(":id_cliente", $_SESSION['user_session'], PDO::PARAM_INT);
            $stmt->bindValue(":data", $agendamento->getData(), PDO::PARAM_STR);
            $stmt->bindValue(":servico", $agendamento->getServico(), PDO::PARAM_STR);
            $stmt->bindValue(":tipo", $agendamento->getTipo(), PDO::PARAM_STR);

            $stmt->execute();
          

        
        } catch (PDOException $e) {
            echo "Erro ao Inserir AgendamentoDao <br>" . $e->getMessage() . '<br>';
        }
    }

  
}
