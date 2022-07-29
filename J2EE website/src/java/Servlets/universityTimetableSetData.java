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
public class universityTimetableSetData extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String name = request.getParameter("Name").trim();
        String start = request.getParameter("Start").trim();
        String end = request.getParameter("End").trim();
        String title = request.getParameter("Title");

        String start1 = start.split("\\.")[0];
        String end1 = end.split("\\.")[0];
        int start2 = Integer.parseInt(start.split("\\.")[1]);
        int end2 = Integer.parseInt(end.split("\\.")[1]);
        int fstart2 = (start2 * 100)/60;
        int fend2 = (end2 * 100)/60;
        
        String startFinal = start1 +"."+ Integer.toString(fstart2);
        String endFinal = end1 +"."+ Integer.toString(fend2);
        Database database = new Database();
        database.uniTimetableSetData(name,startFinal,endFinal,title);
        response.sendRedirect("universityTimetable.jsp");
    }
}
