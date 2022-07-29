/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package patient.clinical.information.system;

import java.sql.Connection;
import java.sql.*;
//Create connection with DB
public class MySqlConnect {
            Connection conn=null;
            public static Connection ConnectDB(){
                try{
                    Class.forName("com.mysql.jdbc.Driver");
                    Connection conn = DriverManager.getConnection("jdbc:mysql://localhost/hospital","root","");
                    return conn;
                } catch (Exception e){
                    return null;
                }
            }
        }

   
    
