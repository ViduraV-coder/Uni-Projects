<%@page import="org.apache.commons.io.FilenameUtils"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="Servlets.Database"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%String id = session.getAttribute("id").toString();%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="ScriptsCss/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="ScriptsCss/datatables.css" rel="stylesheet" type="text/css"/>
        <script src="ScriptsCss/jquery-3.4.0.min.js" type="text/javascript"></script>
        <script src="ScriptsCss/bootstrap.js" type="text/javascript"></script>
        <script src="ScriptsCss/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="ScriptsCss/datatables.js" type="text/javascript"></script>
        <link href="ScriptsCss/style4.css" rel="stylesheet" type="text/css"/>
        <title>Student problem Page</title>
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
            <div style="padding-top: 50px; text-align: center">
                <form  id="form1"  action="studentProblems" method="post" enctype="multipart/form-data">  
                    <textarea id="descript" name="description" rows="20" cols="100" placeholder="description"></textarea><br><br>
                    Select File:<input type="file" name="file" id="file"/><br/><br>
                    <input type="hidden" name="stID" value="<%=id%>"/> 
                    <input style="font-size: 20px; font-weight: bold; height: 40px ; width:20%" type="button" name="Save" value="Save" onclick="submitButton()"/>    
                </form>  
            </div>
            <br><br> <br><br> 
            <div style="padding: 50px;">
                <table id="tbl" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="display:none;"></th>
                            <th>Problem</th>
                            <th>File</th>
                            <th style="display:none;">File Path</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <%
                            Database database = new Database();
                            ResultSet rs = database.getProblems("stProblems_" + id);
                            try {
                                while (rs.next()) {
                                    String fName = FilenameUtils.getName(rs.getString("File"));
                        %>
                        <tr bgcolor="#DEB887">
                            <td style="display:none;"><%=rs.getString("id")%></td>
                            <td style=" width: 75%;"><div style="overflow-y: scroll; width:100%; height:100px;"><%=rs.getString("Problem")%></div></td>
                            <td style="width: 10%"><%=fName%></td>
                            <td style="display:none;"><%=rs.getString("File")%></td>
                            <td style="width: 15%"><input id="update" type="button" value="Update" name="update" onClick="updateButton(this)" />  <br><br>
                                <input id="delete" type="button" value="Delete" name=" delete " onClick="deleteButton(this)"/>  <br><br>
                                <input id="answers" type="button" value="Answers" name="answers" onClick="answersButton(this)"/>
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
            <div id="myModal2" class="modal">
                <div class="modal-content" style="text-align: center">
                    <div style="align-items:center;justify-content: center">
                        <form style="display:none;"  id="form2"  action="studentProblems" method="post" enctype="multipart/form-data">  
                            <textarea id="desc" name="description" rows="20" cols="100" placeholder="description"></textarea><br><br>
                            Select File:<input type="file" name="file" id="file"/><br/><br>
                            <input type="hidden" name="stID" value="<%=id%>"/> 
                            <input id="pID" type="hidden" name="pID" value=""/> 
                            <input style="font-size: 20px; font-weight: bold; height: 40px ;width:50%"  type="submit" name="Save" value="Save"/> 
                        </form>  
                    </div>
                </div>
            </div>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div style="align-items:center;justify-content: center">  
                        <div id="div" style="height:800px; overflow-y: scroll"></div>
                    </div>
                </div>
            </div>
            <form id="form3" style="display:none;" action="Download" method="get">
                <input id="path" type="hidden" name="filePath" value="" />
            </form>
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

        var modal2 = document.getElementById("myModal2");
        window.onclick = function (event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        };

        function answersButton(x) {
            modal.style.display = "block";
            var indx = x.parentNode.parentNode.rowIndex;
            var pid = document.getElementById("tbl").rows[indx].cells[0].innerHTML;
            var inid = "<%=id%>";
            $.ajax({
                type: 'POST',
                url: 'studentProblemsAns',
                data: {inID: inid, pID: pid},
                success: function (xx) {

                    var arr = xx.split("=");
                    var answerGiver = arr[0].split(",");
                    var answer = arr[1].split(",");
                    var file = arr[2].split(",");
                    var temparr = [],
                            rxp = /([^}]+)/g,
                            curMatch;
                    while (curMatch = rxp.exec(answer)) {
                        temparr.push(curMatch[1]);
                    }
                    var exist = document.getElementById("tbll");
                    if (exist) {
                        var parent = document.getElementById("div");
                        var child = document.getElementById("div2");
                        parent.removeChild(child);
                        createTabel(answerGiver, temparr, file);
                    } else {
                        createTabel(answerGiver, temparr, file);
                    }
                }
            });
        }

        function createTabel(answerGiver, answer, file) {

            var d = document.getElementById("div");
            var d2 = document.createElement("div");
            d2.setAttribute("id", "div2");
            d.appendChild(d2);
            var x = document.createElement("table");
            x.setAttribute("id", "tbll");
            x.setAttribute("class", "datatable table table-striped table-bordered");
            x.setAttribute("cellpadding", "0");
            x.setAttribute("cellspacing", "0");
            x.setAttribute("border", "0");
            d2.appendChild(x);
            var th = document.createElement("thead");
            var y1 = document.createElement("tr");
            var h1 = document.createElement("th");
            var t1 = document.createTextNode("Answer Giver");
            var h2 = document.createElement("th");
            var t2 = document.createTextNode("Answer");
            var h3 = document.createElement("th");
            var t3 = document.createTextNode("File");
            h1.appendChild(t1);
            h2.appendChild(t2);
            h3.appendChild(t3);
            y1.appendChild(h1);
            y1.appendChild(h2);
            y1.appendChild(h3);
            th.appendChild(y1);
            x.appendChild(th);

            var tb = document.createElement("tbody");
            for (i = 0; i <= answerGiver.length - 1; i++) {
                var agFinal = null;
                var aFinal = null;
                var fFinal = null;
                if (i === 0) {
                    if (answerGiver.length === 1) {
                        ag = answerGiver[i].slice(1);
                        a = answer[i].slice(2);
                        f = file[i].slice(1);
                        agFinal = ag.slice(0, ag.length - 1);
                        aFinal = a.slice(0, a.length - 1);
                        fFinal = f.slice(0, f.length - 1);
                    } else {
                        agFinal = answerGiver[i].slice(1);
                        aFinal = answer[i].slice(2);
                        fFinal = file[i].slice(1);
                    }
                } else if (i === answerGiver.length - 1) {
                    agFinal = answerGiver[i].slice(0, answerGiver[i].length - 1);
                    a = answer[i].slice(3);
                    aFinal = a.slice(0, a.length - 1);
                    fFinal = file[i].slice(0, file[i].length - 1);

                } else {
                    agFinal = answerGiver[i];
                    aFinal = answer[i];
                    fFinal = file[i];
                }
                var y2 = document.createElement("tr");
                var z1 = document.createElement("td");
                z1.setAttribute("style", "width: 15%");
                var t4 = document.createTextNode(agFinal);
                var z2 = document.createElement("td");
                z2.setAttribute("style", "width: 75%");
                var dd = document.createElement("div");
                dd.setAttribute("class", "up");
                dd.setAttribute("style", "overflow-y: scroll;height:200px;");
                var t5 = document.createTextNode(aFinal);
                var z3 = document.createElement("td");
                var t6 = document.createTextNode(fFinal);
                z3.setAttribute("style", "display:none;");
                z1.appendChild(t4);
                dd.appendChild(t5);
                z2.appendChild(dd);
                z3.appendChild(t6);
                y2.appendChild(z1);
                y2.appendChild(z2);
                y2.appendChild(z3);
                if (agFinal.length !== 0) {
                    if (fFinal.trim() !== "No file uploaded") {
                        var z6 = document.createElement("td");
                        var btn2 = document.createElement("input");
                        btn2.type = "button";
                        btn2.value = "Download";
                        btn2.setAttribute("onclick", "downloadButton2(this)");
                        z6.appendChild(btn2);
                        y2.appendChild(z6);
                    } else {
                        var z6 = document.createElement("td");
                        var t9 = document.createTextNode("No file uploaded");
                        z6.appendChild(t9);
                        y2.appendChild(z6);
                    }
                } else {
                    var z6 = document.createElement("td");
                    y2.appendChild(z6);
                }
                tb.appendChild(y2)
                x.appendChild(tb);
            }
        }

        function downloadButton(x) {
            var indx = x.parentNode.parentNode.rowIndex;
            var filePath = document.getElementById("tbll").rows[indx].cells[2].innerHTML;
            if (filePath.length === 16) {
                alert("No file found!");
            } else {
                document.getElementById("path").value = filePath;
                document.getElementById("form3").submit();
            }
        }

        function submitButton() {
            var x = document.getElementById("descript").value;
            if (x === '') {
                alert("Please write a description!");
            } else {
                document.getElementById("form1").submit();
            }
        }

        function updateButton(x) {
            modal2.style.display = "block";
            var indx = x.parentNode.parentNode.rowIndex;
            var id = document.getElementById("tbl").rows[indx].cells[0].innerHTML;
            var description = document.getElementById("tbl").rows[indx].cells[1].innerText;
            document.getElementById("pID").value = id;
            document.getElementById("desc").value = description;
            document.getElementById("form2").setAttribute("style", "display:block;");
        }

        function deleteButton(x) {
            var indx = x.parentNode.parentNode.rowIndex;
            var pid = document.getElementById("tbl").rows[indx].cells[0].innerHTML;
            var path = document.getElementById("tbl").rows[indx].cells[3].innerHTML;
            var tblname = "stProblems_<%=id%>";
            $.ajax({
                type: 'POST',
                url: 'industryProblemsDelete',
                data: {tblName: tblname, pID: pid, Path: path}
            });
            $(x).closest('tr').remove();
        }

        function closeButton() {
            document.getElementById("form2").setAttribute("style", "display:none;");
        }
    </script>
</html>
