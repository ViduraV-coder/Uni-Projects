<%@page import="org.apache.commons.io.FilenameUtils"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="Servlets.Database"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%String id = session.getAttribute("id").toString();%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Jobs Page</title>
        <link href="ScriptsCss/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="ScriptsCss/datatables.css" rel="stylesheet" type="text/css"/>
        <script src="ScriptsCss/jquery-3.4.0.min.js" type="text/javascript"></script>
        <script src="ScriptsCss/bootstrap.js" type="text/javascript"></script>
        <script src="ScriptsCss/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="ScriptsCss/datatables.js" type="text/javascript"></script>
        <link href="ScriptsCss/style4.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            .modal {
                display: none; 
                position: fixed; 
                z-index: 1; 
                padding-top: 100px; 
                padding-left: 15%;
                left: 0;
                top: 0;
                width: 100%; 
                height: 100%;
                overflow: auto; 
                background-color: rgb(0,0,0); 
                background-color: rgba(0,0,0,0.4);
            }

            .modal-content {
                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
            }

            .close {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }

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
                        <a href="industryWelcome.jsp"><img style="width: 80px;" src="Images/infinity-logo.png" alt=""></a>
                    </div>
                    <div class="margin-block"></div>
                    <ul class="primary-menu">
                        <li class="child-menu"><a href="industryWelcome.jsp">Welcome <i class="fa fa-angle-right"></i></a></li>
                        <li class="child-menu"><a href="industryProblems.jsp">Problems<i class="fa fa-angle-right"></i></a>   </li>                     
                        <li class="child-menu"><a href="industryAnswers.jsp">Answers<i class="fa fa-angle-right"></i></a></li>
                        <li class="child-menu"><a href="industryEvents.jsp">Events<i class="fa fa-angle-right"></i></a> </li>
                        <li class="child-menu"><a href="industryJobs.jsp">Jobs<i class="fa fa-angle-right"></i></a></li>  
                    </ul>    
                </nav>
                <div class="margin-block"></div>
                <div style="padding-top: 100%; text-align: center">
                    <a href="logout.jsp"><button class="buttonn">LogOut</button></a>
                </div>
            </div>
        </header>
        <div id="wrapper">
            <div style="padding-top: 50px; text-align: center">
                <form  id="form1"  action="industryJobs" method="post" enctype="multipart/form-data">  
                    <textarea id="type" name="type" rows="2" cols="50" placeholder="Job Type"></textarea><br><br>
                    <textarea id="descript" name="description" rows="20" cols="100" placeholder="description"></textarea><br><br>
                    Select File:<input type="file" name="file" id="file"/><br/><br>
                    <input type="hidden" name="inID" value="<%=id%>"/> 
                    <input style="font-size: 20px; font-weight: bold; height: 40px ; width:20%" type="button" name="Save" value="Save" onclick="submitButton()"/>    
                </form>  
            </div>
            <br><br>
            <div style="padding: 50px;">
                <table id="tbl" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="display:none;"></th>
                            <th>Job Type</th>
                            <th>Description</th>
                            <th>File</th>
                            <th style="display:none;">File Path</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <%
                            Database database = new Database();
                            ResultSet rs = database.inGetJobs(id);
                            try {
                                while (rs.next()) {
                                    String fName = FilenameUtils.getName(rs.getString("File"));
                        %>
                        <tr bgcolor="#DEB887">
                            <td style="display:none;"><%=rs.getString("id")%></td>
                            <td style=" width: 10%" ><%=rs.getString("Type")%></td>
                            <td style=" width: 80%" ><div style="overflow-y: scroll; width:100%; height:100px;"><%=rs.getString("Description")%></div></td>
                            <td style=" width: 10%" ><%=fName%></td>
                            <td style="display:none;"><%=rs.getString("File")%></td>
                            <td><input id="update" type="button" value="Update" name="update" onClick="updateButton(this)" />  
                                <input id="delete" type="button" value="Delete" name="delete" onClick="deleteButton(this)"/>
                            </td>
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
            <div id="myModal" class="modal">
                <div class="modal-content" style="text-align: center">
                    <span class="close">&times;</span>
                    <div style="align-items:center;justify-content: center">
                        <form style="display:none;"  id="form2"  action="industryJobs" method="post" enctype="multipart/form-data">  
                            <textarea id="type2" name="type" rows="2" cols="50" placeholder="Job Type"></textarea><br><br>
                            <textarea id="desc" name="description" rows="20" cols="100" placeholder="description"></textarea><br><br>
                            Select File:<input type="file" name="file" id="file2"/><br/><br>
                            <input type="hidden" name="inID" value="<%=id%>"/> 
                            <input id="jID" type="hidden" name="jID" value=""/> 
                            <input style="font-size: 20px; font-weight: bold; height: 40px ;width:50%" type="submit" name="Save" value="Save"/>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
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

        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function () {
            modal.style.display = "none";
        };
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };

        function submitButton() {
            var x = document.getElementById("descript").value;
            var y = document.getElementById("type").value;
            var file = document.getElementById("file").value;
            var ext = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (x === '') {
                alert("Please write a description!");
            } else if (y === '') {
                alert("Please enter the job type!");
            } else if (file !== '') {
                if (!ext.exec(file)) {
                    alert('Please upload only .jpeg, .jpg, .png or .gif files!.');
                } else {
                    document.getElementById("form1").submit();
                }
            } else {
                document.getElementById("form1").submit();
            }
        }

        function updateButton(x) {
            modal.style.display = "block";
            var indx = x.parentNode.parentNode.rowIndex;
            var id = document.getElementById("tbl").rows[indx].cells[0].innerHTML;
            var type = document.getElementById("tbl").rows[indx].cells[1].innerHTML;
            var description = document.getElementById("tbl").rows[indx].cells[2].innerText;
            document.getElementById("jID").value = id;
            document.getElementById("type2").value = type;
            document.getElementById("desc").value = description;
            document.getElementById("form2").setAttribute("style", "display:block;");
        }

        function deleteButton(x) {
            var indx = x.parentNode.parentNode.rowIndex;
            var jid = document.getElementById("tbl").rows[indx].cells[0].innerHTML;
            var path = document.getElementById("tbl").rows[indx].cells[3].innerHTML;
            var tblname = "injobs_<%=id%>";
            $.ajax({
                type: 'POST',
                url: 'industryJobsDelete',
                data: {tblName: tblname, jID: jid, Path: path}
            });
            $(x).closest('tr').remove();
        }

    </script>
</html>
