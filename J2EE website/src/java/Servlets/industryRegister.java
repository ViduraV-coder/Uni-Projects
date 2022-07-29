/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servlets;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.mindrot.jbcrypt.BCrypt;

/**
 *
 * @author RVishwajith
 */
public class industryRegister extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        String firstname = request.getParameter("firstname");
        String lastname = request.getParameter("lastname");
        String email = request.getParameter("email");
        String password = request.getParameter("password");
        String companyname = request.getParameter("companyname");
        String address = request.getParameter("address");
        String teleno = request.getParameter("teleno");

        String eP = BCrypt.hashpw(password, BCrypt.gensalt(12));

        Database database = new Database();
        database.industryRegister(firstname, lastname, email, eP, companyname, address, teleno);

        RequestDispatcher rd = request.getRequestDispatcher("login.jsp");
        rd.include(request, response);
        response.setContentType("text/html");
        PrintWriter pw = response.getWriter();
        pw.println("<script type=\"text/javascript\">");
        pw.println("alert('Successfully Registered');");
        pw.println("</script>");

    }

}
