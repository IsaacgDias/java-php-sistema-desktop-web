<?php

Class ClienteDao{
    
    public function CadastrarCliente(Cliente $cliente) {
        try {

            $sql = "INSERT INTO cliente(nome, cpf, telefone, email, senha, rua, numero, cep, bairro, sexo, complemento) VALUES (:nome, :cpf, :telefone, :email, :senha, :rua, :numero, :cep, :bairro, :sexo, :complemento)";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":nome", $cliente->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":cpf", $cliente->getCPF(), PDO::PARAM_STR);
            $stmt->bindValue(":telefone", $cliente->getTelefone(), PDO::PARAM_STR);
            $stmt->bindValue(":email", $cliente->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":senha", $cliente->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(":sexo", $cliente->getSexo(), PDO::PARAM_STR);
            $stmt->bindValue(":rua", $cliente->getRua(), PDO::PARAM_STR);
            $stmt->bindValue(":numero", $cliente->getNumero(), PDO::PARAM_STR);
            $stmt->bindValue(":cep", $cliente->getCep(), PDO::PARAM_STR);
            $stmt->bindValue(":bairro", $cliente->getBairro(), PDO::PARAM_STR);
            $stmt->bindValue(":complemento", $cliente->getComplemento(), PDO::PARAM_STR);
           
            return $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao Inserir usuario <br>" . $e->getMessage() . '<br>';
        }
    
    }
  
    public function login(Cliente $cliente) {
		try {
			$sql = "SELECT * FROM cliente WHERE email = :email";
			$stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":email", $cliente->getEmail(), PDO::PARAM_STR);
         
            $stmt->execute();
			$user_linha = $stmt->fetch(PDO::FETCH_ASSOC);
					
			if($stmt->rowCount() == 1) {

				if(password_verify($cliente->getSenha(), $user_linha['senha'])) {

					$_SESSION['user_session'] = $user_linha['id_cliente'];
                    session_start();
					return true;
                    
				} else {
					return false;
				}
			}
		}
		catch(PDOException $e) {

			echo "Erro ao tentar realizar o login do usuario" . $e->getMessage();
		}
	}
    public function checkLogin() {
		if(isset($_SESSION['user_session'])) {
			return true;
		}else {
            return false;
        }
        
	}
    public function user()
    {
        try {
            $sql = "SELECT * FROM cliente WHERE id_cliente = :id";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id", $_SESSION['user_session'], PDO::PARAM_INT);
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();

            foreach ($lista as $linha) {
                $list[] = $this->listaCliente($linha);
            }

            return $list;
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar buscar Cliente." . $e->getMessage();
        }
    }
    private function listaCliente($linhas)
    {

        $cliente = new Cliente();
        $cliente->setID($linhas['id_cliente']);
        $cliente->setNome($linhas['nome']);
        $cliente->setCPF($linhas['cpf']);
        $cliente->setEmail($linhas['email']);
        $cliente->setTelefone($linhas['telefone']);
        $cliente->setSexo($linhas['sexo']);

        return $cliente;
    }
    public function sair(){
        session_start();
        session_destroy();
		unset($_SESSION['user_session']);
		return true;
    }
  
    
}
