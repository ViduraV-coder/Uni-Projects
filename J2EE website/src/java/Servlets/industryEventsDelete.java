/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servlets;

import java.io.File;
import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author RVishwajith
 */
public class industryEventsDelete extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String eID = request.getParameter("eID");
        String tblName = request.getParameter("tblName");
        String Path = request.getParameter("Path");
        File file = new File(Path);
        file.delete();
        Database database = new Database();
        database.rowDelete(tblName, eID);
    }
}
