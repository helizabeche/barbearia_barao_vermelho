package br.com.infox.dal;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */



import java.sql.*;

/**
 *
 * @author admin
 */
public class ModuloConexao {
    //metodo responsavel por estabelecer conexao com banco de dados
    public static Connection conector(){
        java.sql.Connection conexao= null;
        // a linha abaixo chama o driver
        String driver= "com.mysql.cj.jdbc.Driver";
        // armazenar infor referente ao banco
        String url="jdbc:mysql://localhost:3306/prjinfox";
        String user="root";
        String password="";
        // estabelecer conexao com o banco
        try {
            Class.forName(driver);
            conexao=DriverManager.getConnection(url,user,password);
            return conexao;
        } catch (Exception e) {
            System.out.println(e);
            return null;
        }
    }
    
}
