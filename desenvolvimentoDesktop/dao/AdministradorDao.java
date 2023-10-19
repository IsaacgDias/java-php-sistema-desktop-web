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
import model.Administrador;
import model.Funcionario;

/**
 *
 * @author Aluno_Tarde
 */
public class AdministradorDao {
     
    public ResultSet LoginAdm(String email, String senha){
       String sql = "SELECT * FROM funcionario WHERE email = ? and senha = ? and tipo = ?";
         
           Connection conn;
           PreparedStatement pstm = null;
           ResultSet rset = null;
           
         try {
            conn = Conexao.createConnectionToMysql();
            pstm = (PreparedStatement) conn.prepareStatement(sql);
            
            pstm.setString(1, email);
            pstm.setString(2, senha);
            pstm.setString(3, "adm");
            
            rset = pstm.executeQuery();
            return rset;
        } catch (Exception e) {
             JOptionPane.showMessageDialog(null, "Erro no AdministradorDao " + e);
             e.printStackTrace();
             return null;
        }
    }
         
    
    
    
}
