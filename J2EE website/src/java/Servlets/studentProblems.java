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
public class studentProblems extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String description = null;
        String stID = null;
        String pID = null;
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
                        case "stID":
                            stID = item.getString();
                            break;
                        case "pID":
                            pID = item.getString();
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
                String pathFinal = "C://StudentProblemUploads_" + stID + "//";
                File directory = new File("C://StudentProblemUploads_" + stID);
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

        String tbln = "stProblems_" + stID;
        Database database = new Database();
        if ("".equals(pID) || pID == null) {
            if (file == null) {
                database.addProblems(tbln, description, "No file uploaded");
            } else {
                database.addProblems(tbln, description, file);
            }

        } else {
            if (file == null) {
                database.updateProblems(tbln, pID, description, "");
            } else {
                database.updateProblems(tbln, pID, description, file);
            }
        }
        response.sendRedirect("studentProblems.jsp");
    }
}
