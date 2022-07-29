<%@page import="java.util.ArrayList"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="Servlets.Database"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%String id = session.getAttribute("id").toString();%>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="ScriptsCss/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="ScriptsCss/datatables.css" rel="stylesheet" type="text/css"/>
        <script src="ScriptsCss/jquery-3.4.0.min.js" type="text/javascript"></script>
        <script src="ScriptsCss/bootstrap.js" type="text/javascript"></script>
        <script src="ScriptsCss/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="ScriptsCss/datatables.js" type="text/javascript"></script>
        <link href="ScriptsCss/style4.css" rel="stylesheet" type="text/css"/>
        <title>Welcome!</title>      
        <style>
            .buttonn {
                background-color: #1374DC;
                border: none;
                color: white;
                padding: 12px 30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }

        </style>
    </head>
    <body class="left-menu"style="background-color: #585b60;">  
        <header class="vertical-header">
            <div class="vertical-header-wrapper">
                <nav class="nav-menu">
                    <div class="logo">
                        <a href="studentWelcome.jsp"><img style="width: 80px;" src="Images/infinity-logo.png" alt=""></a>
                    </div>
                    <div class="margin-block"></div>
                    <ul class="primary-menu">
                        <li class="child-menu"><a href="studentWelcome.jsp">Welcome<i class="fa fa-angle-right"></i></a></li>
                        <li class="child-menu"><a href="studentProblems.jsp">Problems<i class="fa fa-angle-right"></i></a> </li>                     
                        <li class="child-menu"><a href="studentAnswers.jsp">Answers<i class="fa fa-angle-right"></i></a></li>
                    </ul>    
                </nav>
                <div class="margin-block"></div>
                <div style="padding-top: 100%; text-align: center">
                    <a href="logout.jsp"><button class="buttonn">LogOut</button></a>
                </div>
            </div>
        </header>
        <div id="wrapper">
            <h3 style="padding-top:50px; padding-left: 50px">JOBS</h1>
                <div style="padding: 50px;">
                    <table id="tbl1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Position</th>
                                <th>Description</th>
                                <th style="display:none;">File Path</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <%
                                Database database = new Database();
                                ArrayList<ArrayList> al = database.stGetJobs();

                                ArrayList<String> companyName = new ArrayList();
                                ArrayList<String> type = new ArrayList();
                                ArrayList<String> descriptions = new ArrayList();
                                ArrayList<String> file = new ArrayList();
                                companyName = al.get(0);
                                type = al.get(1);
                                descriptions = al.get(2);
                                file = al.get(3);

                                for (int i = 0; i <= companyName.size() - 1; i++) {
                                    System.out.println(file.get(i).trim());
                            %>
                            <tr bgcolor="#DEB887">
                                <td style="width: 18%"><%=companyName.get(i)%></td>
                                <td style="width: 15%"><%=type.get(i)%></td>
                                <td style="width: 45%"><%=descriptions.get(i)%></td>
                                <td style="display:none;"><%=file.get(i)%></td>
                                <% if (!file.get(i).trim().equals("No file uploaded")) { %>
                                <td style="width: 20%"><input type="button" value="Download the Attachment" onClick="downloadButton(this)"/></td>
                                    <% } else {%>     
                                <td>No file uploaded</td>
                                <%}%> 
                            </tr>
                            <%
                                }
                            %>
                        </tbody>
                    </table>
                </div>
                <h3  style="padding-top:50px; padding-left: 50px">EVENTS</h1>
                    <div style="padding: 50px;">
                        <table id="tbl2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                            <thead
                                <tr>
                                    <th>Company</th>
                                    <th>Description</th>
                                    <th style="display:none;">File Path</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <%
                                    ArrayList<ArrayList> al2 = database.stGetEvents();

                                    ArrayList<String> companyName2 = new ArrayList();
                                    ArrayList<String> descriptions2 = new ArrayList();
                                    ArrayList<String> file2 = new ArrayList();
                                    companyName2 = al2.get(0);
                                    descriptions2 = al2.get(1);
                                    file2 = al2.get(2);

                                    for (int i = 0; i <= companyName2.size() - 1; i++) {
                                %>
                                <tr bgcolor="#DEB887">
                                    <td style="width: 20%"><%=companyName2.get(i)%></td>
                                    <td style="width: 60%"><%=descriptions2.get(i)%></td>
                                    <td style="display:none;"><%=file2.get(i)%></td>
                                    <% if (!file2.get(i).trim().equals("No file uploaded")) { %>
                                    <td style="width: 20%"><input type="button" value="Download the Attachment" onClick="downloadButton2(this)"/></td>
                                        <% } else {%>     
                                    <td>No file uploaded</td>
                                    <%}%> 
                                </tr>
                                <%
                                    }
                                %>
                            </tbody>
                        </table>
                    </div>
                    <form id="form" style="display:none;" action="Download" method="get">
                        <input id="path" type="hidden" name="filePath" value="" />
                    </form>
                    </div>
                    </body>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.datatable').dataTable({
                                "PagingType": "bs_four_button"
                            });
                            $('.datatable').each(function () {
                                var datatable = $(this);
                                var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                                search_input.attr('placeholder', 'Search');
                                search_input.addClass('form-control input-sm');
                                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                                length_sel.addClass('form-control input-sm');
                            });
                        });

                        function downloadButton(x) {
                            var indx = x.parentNode.parentNode.rowIndex;
                            var filePath = document.getElementById("tbl1").rows[indx].cells[3].innerHTML;
                            if (filePath.length == "No file found" || filePath == "null") {
                                alert("No file found!");
                            } else {
                                document.getElementById("path").value = filePath;
                                document.getElementById("form").submit();
                            }
                        }

                        function downloadButton2(x) {
                            var indx = x.parentNode.parentNode.rowIndex;
                            var filePath = document.getElementById("tbl2").rows[indx].cells[2].innerHTML;
                            if (filePath.length == "No file found" || filePath == "null") {
                                alert("No file found!");
                            } else {
                                document.getElementById("path").value = filePath;
                                document.getElementById("form").submit();
                            }
                        }
                    </script>
                    </html>

