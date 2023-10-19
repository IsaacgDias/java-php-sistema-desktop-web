/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package dao;

import database.Conexao;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;
import javax.swing.JOptionPane;
import model.Agendamento;
import model.Cliente;

/**
 *
 * @author Aluno_Tarde
 */
public class ClienteDao {
     
     
        
    public List<Cliente> ListarCliente(){
        String sql = "SELECT * FROM cliente";
          List<Cliente> clientes = new ArrayList<Cliente>();
        
          Connection conn = null;
          PreparedStatement pstm = null;
          
          ResultSet rset = null;
          
          try {
            conn = Conexao.createConnectionToMysql();
            pstm = (PreparedStatement) conn.prepareStatement(sql);
            
            rset = pstm.executeQuery();
            while(rset.next()){
                Cliente cliente = new Cliente();
                //cliente.setId(rset.getInt("id_cliente"));
                cliente.setId(rset.getInt("id_cliente"));
                cliente.setNome(rset.getString("nome"));
                cliente.setCpf(rset.getString("cpf"));
                cliente.setTelefone(rset.getString("telefone"));
                cliente.setEmail(rset.getString("email"));
                cliente.setRua(rset.getString("rua"));
                cliente.setNumero(rset.getString("numero"));
                cliente.setCep(rset.getString("cep"));
                cliente.setBairro(rset.getString("bairro"));
                cliente.setComplemento(rset.getString("complemento"));
              
                
                clientes.add(cliente);
            }
            System.out.println("Clientes listados com sucesso!!");
        } catch (Exception e) {
                  System.out.println("Erro ao listar os clientes!!");
              e.printStackTrace();
              
        } finally {
              try {
                
                if(pstm != null){pstm.close();}
                if(conn != null){conn.close();}
                if(rset != null){conn.close();}
                
              } catch (Exception e) {
                  e.printStackTrace();        
              }
          }
        return clientes;
    }
//    public List<Cliente> Pedido(){
//      // String sql = "SELECT id_cliente FROM agendamento where id_agendamento = ?";
//      String sql = "SELECT c.id_cliente, c.nome, c.cpf, c.telefone, c.cep , c.rua , c.bairro , c.numero , c.complemento, a.data,a.tipo,a.servico FROM agendamento as a inner join cliente as c on a.id_cliente = c.id_cliente  where a.id_cliente = ?;";
//      
////SELECT id_cliente FROM agendamento where id_agendamento = 1;
////SELECT c.id_cliente, c.nome, c.cpf, c.telefone, c.cep , c.rua , c.bairro , c.numero , c.complemento, a.data,a.tipo,a.servico FROM agendamento as a inner join cliente as c on a.id_cliente = c.id_cliente  where a.id_cliente = 1;

//    } 
    public List<Cliente> Pedido(){
        String sql = "SELECT c.id_cliente, c.nome, c.telefone, c.rua, c.bairro, c.numero, c.complemento, a.data, a.servico FROM agendamento as a inner join cliente as c on a.id_cliente = c.id_cliente";
       // sql = "SELECT * FROM agendamento";
       //SELECT id_cliente FROM agendamento where id_agendamento = 1;
    
          List<Cliente> clientes = new ArrayList<>();
       
          Connection conn = null;
          PreparedStatement pstm = null;
          
          ResultSet rset = null;
          
          try {
            conn = Conexao.createConnectionToMysql();
            pstm = (PreparedStatement) conn.prepareStatement(sql);
            
            rset = pstm.executeQuery();
            while(rset.next()){
            
                Cliente cliente = new Cliente();
                
                //Tabela cliente
                cliente.setId(rset.getInt("id_cliente"));
                cliente.setNome(rset.getString("nome"));
                
                cliente.setTelefone(rset.getString("telefone"));
                cliente.setRua(rset.getString("rua"));
                cliente.setBairro(rset.getString("bairro"));
                cliente.setNumero(rset.getString("numero"));
                cliente.setComplemento(rset.getString("complemento"));
  
                // Esse setdata pega do banco tela agendamento atraves do inner join.
                //Tabela Agendamento
                cliente.setData(rset.getString("data"));
                cliente.setServico(rset.getString("servico"));
       
                
                clientes.add(cliente);
            
   
            }
            System.out.println("Clientes listados com sucesso!!");
        } catch (Exception e) {
                  System.out.println("Erro ao listar os dados!!");
              e.printStackTrace();
              
        } finally {
              try {
                
                if(pstm != null){pstm.close();}
                if(conn != null){conn.close();}
                if(rset != null){conn.close();}
                
              } catch (Exception e) {
                  e.printStackTrace();        
              }
          }
        return clientes;
    }
}