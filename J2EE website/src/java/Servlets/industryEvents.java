/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servlets;

import java.io.File;
import java.io.IOException;
import java.util.List;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.apache.commons.fileupload.FileItem;
import org.apache.commons.fileupload.FileUploadException;
import org.apache.commons.fileupload.disk.DiskFileItemFactory;
import org.apache.commons.fileupload.servlet.ServletFileUpload;
import org.apache.commons.io.FilenameUtils;

/**
 *
 * @author RVishwajith
 */
public class industryEvents extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        String description = null;
        String inID = null;
        String eID = null;
        String file = null;
        String getName = "";
        FileItem itemm = null;

        try {

            ServletFileUpload sf = new ServletFileUpload(new DiskFileItemFactory());
            List<FileItem> multifiles = sf.parseRequest(request);

            for (FileItem item : multifiles) {
                if (item.isFormField()) {
                    String fName = item.getFieldName();
                    switch (fName) {
                        case "inID":
                            inID = item.getString();
                            break;
                        case "eID":
                            eID = item.getString();
                            break;
                        case "description":
                            description = item.getString();
                            break;
                        default:
                            break;
                    }
                } else if (null != item.getName()) {
                    getName = item.getName();
                    itemm = item;
                }
            }

            if (!"".equals(getName)) {
                String name = FilenameUtils.getName(getName);
                String pathFinal = "C://IndustryEventsUploads_" + inID + "//";
                File directory = new File("C://IndustryEventsUploads_" + inID);
                File fileCheck = new File(pathFinal + name);
                if (!directory.exists()) {
                    directory.mkdir();
                    itemm.write(new File(pathFinal, name));
                    file = pathFinal + name;
                } else if (fileCheck.exists()) {
                    String[] split = name.split("\\.(?=[^\\.]+$)");
                    String first = split[0];
                    String last = split[1];
                    String newName = first + "new." + last;
                    itemm.write(new File(pathFinal, newName));
                    file = pathFinal + newName;
                } else {
                    itemm.write(new File(pathFinal, name));
                    file = pathFinal + name;
                }
            }

        } catch (FileUploadException e) {
        } catch (Exception e) {
        }

        Database database = new Database();
        if ("".equals(eID) || eID == null) {
            if (file == null) {
                database.inAddEvents(inID, description, "No file uploaded");
            } else {
                database.inAddEvents(inID, description, file);
            }

        } else {
            if (file == null) {
                database.inUpdateEvents(inID, eID, description, "");
            } else {
                database.inUpdateEvents(inID, eID, description, file);
            }
        }
        response.sendRedirect("industryEvents.jsp");
    }
}
