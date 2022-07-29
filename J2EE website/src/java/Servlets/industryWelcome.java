/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servlets;

import java.io.IOException;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author OVERLORD
 */
public class industryWelcome extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String uniID = request.getParameter("uniID");
        Database database = new Database();
        ResultSet rs = database.uniGetTimetables(uniID);
        ArrayList<String> arr = new ArrayList<>();
        try {
            while (rs.next()) {
                arr.add(rs.getString("TableName"));
            }
        } catch (SQLException ex) {
            Logger.getLogger(industryWelcome.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        response.setContentType("text/plain");
        response.setCharacterEncoding("UTF-8");
        response.getWriter().write(arr.toString());
    }
}
