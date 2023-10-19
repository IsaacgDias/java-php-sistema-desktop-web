/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package dao;

//import Views.Cadastro_Funcionario;
import database.Conexao;
//import java.security.MessageDigest;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;
import javax.swing.JOptionPane;
import model.Funcionario;


/**
 *
 * @author Aluno_Tarde
 */
public class FuncionarioDao {
    //Cadastro_Funcionario tela = new Cadastro_Funcionario();
    
    
    public void CadastrarFuncionario(Funcionario funcionario){
        String sql = "INSERT INTO funcionario(nome, cpf, idade, telefone, email, senha, tipo) VALUES (?, ?, ?, ?, ?, ?, ?)";
        //String senha = tela.jTextField6.getText();
        Connection conn = null;
        PreparedStatement pstm = null;
        
        try {
//            MessageDigest md = MessageDigest.getInstance("SHA-256");
//            byte messageDigest[] = md.digest(senha.getBytes("UTF-8"));
//            
//            StringBuilder sb = new StringBuilder();
//            
//            for(byte b : messageDigest){
//                sb.append(String.format("%02X", 0xFF & b));
//                
//            }
//            String senhaHex = sb.toString();
            
            conn = Conexao.createConnectionToMysql();
            pstm = (PreparedStatement) conn.prepareStatement(sql);
            
            pstm.setString(1, funcionario.getNome());
            pstm.setString(2, funcionario.getCpf());
            pstm.setInt(3, funcionario.getIdade());
            pstm.setString(4, funcionario.getTelefone());
            pstm.setString(5, funcionario.getEmail());
            //pstm.setString(6, funcionario.getSenha());
            pstm.setString(6, funcionario.getSenha());
            pstm.setString(7, funcionario.getTipo());
            
            pstm.execute();
        } catch (Exception e) {
            System.out.println("Erro ao fazer cadastro");
            e.printStackTrace();
        } finally {
            try {
                if(pstm != null){pstm.close();}
                if(conn != null){conn.close();}
                
            } catch (Exception e) {
                e.printStackTrace();
            }
        }
        
    }
    
    public List<Funcionario> ListarFuncionario(){
         String sql = "SELECT * FROM funcionario";
         List<Funcionario> funcionarios = new ArrayList<Funcionario>();
         
         Connection conn = null;
         PreparedStatement pstm = null;
          
          ResultSet rset = null;
                
          try {
            conn = Conexao.createConnectionToMysql();
            pstm = (PreparedStatement) conn.prepareStatement(sql);
            
             rset = pstm.executeQuery();
             
             while(rset.next()){
                 Funcionario funcionario = new Funcionario();
                 funcionario.setId(rset.getInt("id_funcionario"));
                funcionario.setNome(rset.getString("nome"));
                funcionario.setCpf(rset.getString("cpf"));
                funcionario.setIdade(rset.getInt("idade"));
                funcionario.setTelefone(rset.getString("telefone"));
                funcionario.setEmail(rset.getString("email"));
                
                funcionarios.add(funcionario);
             }
              System.out.println("Funcionarios listados com sucesso!!");
        } catch (Exception e) {
              System.out.println("Erro ao listar funcionarios");
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
          return funcionarios;
      }       
    
    public ResultSet LoginFuncionario(String email, String senha){
         String sql = "SELECT tipo FROM funcionario WHERE email = ? and senha = ? and tipo = 'funcionario'";
           
           Connection conn;
           PreparedStatement pstm = null;
           ResultSet rset = null;
           
         try {
            conn = Conexao.createConnectionToMysql();
            pstm = (PreparedStatement) conn.prepareStatement(sql);
            
            pstm.setString(1, email);
            pstm.setString(2, senha);
            
            rset = pstm.executeQuery();
            return rset;
        } catch (Exception e) {
             JOptionPane.showMessageDialog(null, "FuncionarioDao erro aqui " + e);
             e.printStackTrace();
             return null;
        }
     
    }
    
    
}
