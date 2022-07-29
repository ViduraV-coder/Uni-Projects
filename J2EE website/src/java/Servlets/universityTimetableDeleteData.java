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
public class universityTimetableDeleteData extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String time = request.getParameter("Time");
        String tblnm = request.getParameter("Tblname");

        String[] parts = time.split(" ");
        String start = parts[0].trim();
        String end = parts[3].trim();

        String start1 = null;
        String end1 = null;

        if (parts[1].trim().equals("PM")) {
            if (start.split("\\:")[0].trim().equals("1")) {
                start1 = "13";
            } else if (start.split("\\:")[0].trim().equals("2")) {
                start1 = "14";
            } else if (start.split("\\:")[0].trim().equals("3")) {
                start1 = "15";
            } else if (start.split("\\:")[0].trim().equals("4")) {
                start1 = "16";
            } else if (start.split("\\:")[0].trim().equals("5")) {
                start1 = "17";
            } else {
                start1 = start.split("\\:")[0];
            }

        }else{
            start1 = start.split("\\:")[0];
        }

        if (parts[4].trim().equals("PM")) {

            if (end.split("\\:")[0].trim().equals("1")) {
                end1 = "13";
            } else if (end.split("\\:")[0].trim().equals("2")) {
                end1 = "14";
            } else if (end.split("\\:")[0].trim().equals("3")) {
                end1 = "15";
            } else if (end.split("\\:")[0].trim().equals("4")) {
                end1 = "16";
            } else if (end.split("\\:")[0].trim().equals("5")) {
                end1 = "17";
            } else {
                end1 = end.split("\\:")[0];
            }
        }else{
            end1 = end.split("\\:")[0];
        }

        int start2 = Integer.parseInt(start.split("\\:")[1]);
        int end2 = Integer.parseInt(end.split("\\:")[1]);
        int fstart2 = (start2 * 100) / 60;
        int fend2 = (end2 * 100) / 60;

        String startFinal = start1 + "." + Integer.toString(fstart2);
        String endFinal = end1 + "." + Integer.toString(fend2);

        System.out.println(startFinal);
        System.out.println(endFinal);

        Database database = new Database();
        database.uniTimetableDeleteData(tblnm, startFinal, endFinal);
        response.sendRedirect("universityTimetable.jsp");
    }
}
