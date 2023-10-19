/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package database;

import java.sql.Connection;
import java.sql.DriverManager;

/**
 *
 * @author Aluno_Tarde
 */
public class Conexao {
    
    
    private static final String USERNAME = "root";
    private static final String PASSWORD = "";
    //Caminho do DB, porta, nome
    private static final String DATABASE_URL = "jdbc:mysql://localhost:3306/eletrotech";
    
    public static Connection createConnectionToMysql() throws Exception{
        
        //Carregar a classe de conexão
        Class.forName("com.mysql.cj.jdbc.Driver");
        
        // Criar conexão
        Connection connection = DriverManager.getConnection(DATABASE_URL, USERNAME, PASSWORD);
    
        return connection;
        
}
    
    public static void main(String[] args) throws Exception {
        
        //Estabelecer ou recuperar conexão com o banco
        Connection conn = createConnectionToMysql();
        
        if (conn != null) {
            
            System.out.println("Conexão estabelecida com sucesso");
            conn.close();
        } else {
            System.out.println("UÉ");
        }
                
    }
    
}
