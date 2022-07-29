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
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import org.mindrot.jbcrypt.BCrypt;

/**
 *
 * @author RVishwajith
 */
public class Login extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String email = request.getParameter("email");
        String password = request.getParameter("password");
        Database database = new Database();
        String logName[] = database.login(email);

        if (logName[2] == "industries") {
            if (BCrypt.checkpw(password, logName[1])) {
                HttpSession session = request.getSession();
                session.setAttribute("id", logName[0]);
                cookies(request, response, email, password);
                response.sendRedirect("industryWelcome.jsp");
            } else {
                RequestDispatcher rd = request.getRequestDispatcher("login.jsp");
                rd.include(request, response);
                response.setContentType("text/html");
                PrintWriter pw = response.getWriter();
                pw.println("<script type=\"text/javascript\">");
                pw.println("alert('Invalid Password!');");
                pw.println("</script>");
            }
        } else if (logName[2] == "students") {
            if (BCrypt.checkpw(password, logName[1])) {
                HttpSession session = request.getSession();
                session.setAttribute("id", logName[0]);
                cookies(request, response, email, password);
                response.sendRedirect("studentWelcome.jsp");
            } else {
                RequestDispatcher rd = request.getRequestDispatcher("login.jsp");
                rd.include(request, response);
                response.setContentType("text/html");
                PrintWriter pw = response.getWriter();
                pw.println("<script type=\"text/javascript\">");
                pw.println("alert('Invalid Password!');");
                pw.println("</script>");
            }
        } else if (logName[2] == "universities") {
            if (BCrypt.checkpw(password, logName[1])) {
                HttpSession session = request.getSession();
                session.setAttribute("id", logName[0]);
                cookies(request, response, email, password);
                response.sendRedirect("universityWelcome.jsp");
            } else {
                RequestDispatcher rd = request.getRequestDispatcher("login.jsp");
                rd.include(request, response);
                response.setContentType("text/html");
                PrintWriter pw = response.getWriter();
                pw.println("<script type=\"text/javascript\">");
                pw.println("alert('Invalid Password!');");
                pw.println("</script>");
            }
        } else {
            RequestDispatcher rd = request.getRequestDispatcher("login.jsp");
            rd.include(request, response);
            response.setContentType("text/html");
            PrintWriter pw = response.getWriter();
            pw.println("<script type=\"text/javascript\">");
            pw.println("alert('Invalid Email!');");
            pw.println("</script>");
        }

    }

    public void cookies(HttpServletRequest request, HttpServletResponse response, String email, String password) {
        String remember = request.getParameter("remember_me");
        if (request.getParameter("remember") != null) {

            Cookie cemail = new Cookie("cookemail", email.trim());
            Cookie cpassword = new Cookie("cookpass", password.trim());
            Cookie cremember = new Cookie("cookrem", remember.trim());

            cemail.setMaxAge(60 * 60 * 24 * 7);
            cpassword.setMaxAge(60 * 60 * 24 * 7);
            cremember.setMaxAge(60 * 60 * 24 * 7);

            response.addCookie(cemail);
            response.addCookie(cpassword);
            response.addCookie(cremember);
        }
    }
}
