<%@page import="java.sql.ResultSet"%>
<%@page import="Servlets.Database"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%String id = session.getAttribute("id").toString();%>
<!DOCTYPE html>
<html>
    <head>
        <link href="ScriptsCss/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="ScriptsCss/datatables.css" rel="stylesheet" type="text/css"/>
        <script src="ScriptsCss/jquery-3.4.0.min.js" type="text/javascript"></script>
        <script src="ScriptsCss/bootstrap.js" type="text/javascript"></script>
        <script src="ScriptsCss/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="ScriptsCss/datatables.js" type="text/javascript"></script>
        <link href="ScriptsCss/style4.css" rel="stylesheet" type="text/css"/>
        <title>Approve</title>
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
    <body class="left-menu" style="background-color: #585b60;">  
        <header class="vertical-header">
            <div class="vertical-header-wrapper">
                <nav class="nav-menu">
                    <div class="logo">
                        <a href="universityWelcome.jsp"><img style="width: 80px;" src="Images/infinity-logo.png" alt=""></a>
                    </div>
                    <div class="margin-block"></div>
                    <ul class="primary-menu">
                        <li class="child-menu"><a href="universityWelcome.jsp">welcome<i class="fa fa-angle-right"></i></a></li>
                        <li class="child-menu"><a href="universityApprove.jsp">Approve <i class="fa fa-angle-right"></i></a></li>
                        <li class="child-menu"><a href="universityTimetable.jsp">Timetable<i class="fa fa-angle-right"></i></a>
                        <li class="child-menu"><a href="universityCalendar.jsp">Calender<i class="fa fa-angle-right"></i></a></li> 
                    </ul>    
                </nav>
                <div class="margin-block"></div>
                <div style="padding-top: 100%; text-align: center">
                    <a href="logout.jsp"><button class="buttonn">LogOut</button></a>
                </div>
            </div>
        </header>
        <div id="wrapper" >  
            <div style="padding:50px">
            <table id="tbl" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="display:none;"></th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>University Name</th>
                        <th>Student ID</th>
                        <th>Degree Name</th>
                        <th>Approval</th>
                        <th style="display:none;"></th>
                    </tr>
                </thead>
                <tbody>
                    <%
                        Database database = new Database();
                        ResultSet rs = database.uniGetApproval(id);
                        try {
                            while (rs.next()) {
                    %>
                    <tr>
                        <td style="display:none;"><%=rs.getInt("ID")%></td>
                        <td><%=rs.getString("FirstName")%></td>
                        <td><%=rs.getString("LastName")%></td>
                        <td><%=rs.getString("UniversityName")%></td>
                        <td><%=rs.getInt("StudentID")%></td>
                        <td><%=rs.getString("DegreeName")%></td>
                        <td><%=rs.getString("Approval")%></td>
                        <%
                            String appst = rs.getString("Approval");
                            String app = null;
                            if (appst.equals("Approved")) {
                                app = "Disapprove";
                            } else {
                                app = "Approve";
                            }

                        %>
                        <td><input type="button" value=<%=app%> name="Approval" onclick="data(this)"/></td>
                    </tr>
                    <%
                            }
                        } catch (Exception e) {
                            e.printStackTrace();
                        }
                    %>    
                </tbody>
            </table>
            </div>
            <form action="universityApprove" method="Get" id="form">
                <input id="id" type="hidden" name="id" value="" />
                <input id="appr" type="hidden" name="appr" value="" />
            </form>
        </div>                    
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

            function data(x) {
                var indx = x.parentNode.parentNode.rowIndex;
                document.getElementById('id').value = document.getElementById("tbl").rows[indx].cells[0].innerHTML;
                document.getElementById('appr').value = document.getElementById("tbl").rows[indx].cells[6].innerHTML;
                document.getElementById("form").submit();
            }

        </script>
    </body>
</html> 
