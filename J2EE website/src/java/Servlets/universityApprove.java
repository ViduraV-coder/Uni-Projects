/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servlets;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author RVishwajith
 */
public class universityApprove extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String id = request.getParameter("id");
        String appr = request.getParameter("appr");
        Database b = new Database();
        if (appr.equals("Approved")) {
            b.uniSetApproval(id, "Not Approved");
        } else if (appr.equals("Pending")) {
            b.uniSetApproval(id, "Approved");
        } else if (appr.equals("Not Approved")) {
            b.uniSetApproval(id, "Approved");
        }
        response.sendRedirect("universityApprove.jsp");
    }
}
