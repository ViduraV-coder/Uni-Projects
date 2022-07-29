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
public class studentProblemsAns extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String inID = request.getParameter("inID");
        String pID = request.getParameter("pID");
        Database database = new Database();
        String user = "student";
        ArrayList<ArrayList> newarr = database.getAnsForProblems(user, inID, pID);

        response.setContentType("text/plain");
        response.setCharacterEncoding("UTF-8");
        response.getWriter().write(newarr.get(0).toString() + "=" + newarr.get(1).toString() + "=" + newarr.get(2).toString());
    }
}
