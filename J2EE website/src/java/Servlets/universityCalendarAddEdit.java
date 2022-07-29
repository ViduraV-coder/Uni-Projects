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
public class universityCalendarAddEdit extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String id = request.getParameter("id");
        String year = request.getParameter("year").trim();
        String month = request.getParameter("month").trim();
        String day = request.getParameter("day").trim();
        String date = request.getParameter("date");
        String finalDate = month + " " + day + " " + year;
        String description = request.getParameter("description");
        Database database = new Database();       
       if(year.equals("")){
            database.uniCalendarEdit(id, date, description);
       }else{
           database.uniCalendarAdd(id, finalDate, description);
       }
        response.sendRedirect("universityCalendar.jsp");
    }
}
