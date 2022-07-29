/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servlets;

import java.io.IOException;
import java.util.ArrayList;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author RVishwajith
 */
public class universityTimetableGetData extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String tblnm = request.getParameter("Tblnm");
        Database database = new Database();
        ArrayList<ArrayList> newarr = database.uniTimetableGetData(tblnm);
        response.setContentType("text/plain");
        response.setCharacterEncoding("UTF-8");
        response.getWriter().write(newarr.get(0).toString() + "=" + newarr.get(1).toString() + "=" + newarr.get(2).toString());
        
    }
}
