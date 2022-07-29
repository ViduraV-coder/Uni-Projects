<%@page import="java.util.ArrayList"%>
<%@page import="Servlets.Database"%>
<%@page import="java.sql.ResultSet"%>
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
        <title>student answer Page</title>
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
            <div style="padding: 50px;">
                <table id="tbl" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="display:none;"></th>
                            <th>Problem Giver</th>
                            <th style="display:none;"></th>
                            <th>Problem</th>
                            <th style="display:none;"></th>
                            <th>File</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <%
                            Database database = new Database();
                            ArrayList<ArrayList> al = database.getProblemAnswers("student");

                            ArrayList<String> problemGiverID = new ArrayList();
                            ArrayList<String> problemGiverName = new ArrayList();
                            ArrayList<String> problemID = new ArrayList();
                            ArrayList<String> problem = new ArrayList();
                            ArrayList<String> file = new ArrayList();
                            problemGiverID = al.get(0);
                            problemGiverName = al.get(1);
                            problemID = al.get(2);
                            problem = al.get(3);
                            file = al.get(4);

                            for (int i = 0; i <= problemGiverID.size() - 1; i++) {
                        %>
                        <tr bgcolor="#DEB887">
                            <td style="display:none;"><%=problemGiverID.get(i)%></td>
                            <td style=" width: 15%"><%=problemGiverName.get(i)%></td>
                            <td style="display:none;"><%=problemID.get(i)%></td>
                            <td style=" width: 80%"><div style="overflow-y: scroll; width:100%; height:200px;"><%=problem.get(i)%></div></td>
                            <td style="display:none;"><%=file.get(i)%></td>
                            <td><input type="button" value="Download" name="download" onClick="downloadButton(this)"/></td>
                            <td><input type="button" value="Answers" name="answers" onClick="answersButton(this)"/></td>
                        </tr>
                        <%
                            }
                        %>
                    </tbody>
                </table>
            </div>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div style="align-items:center;justify-content: center">
                        <div id="div" style="height:800px; overflow-y: scroll"></div>  
                        <br><br>                           
                        <h3>Give answer:-</h3>
                        <br>
                        <form  id="form2"  action="studentAnswers" method="post" enctype="multipart/form-data">  
                            <textarea id="descript" name="answer" rows="20" cols="50" placeholder="answer"></textarea><br><br>
                            Select File:<input type="file" name="file" id="file"/><br/><br>
                            <input type="hidden" name="stID" value="<%=id%>"/> 
                            <input id="pgID" type="hidden" name="pgID" value=""/> 
                            <input id="pN" type="hidden" name="pN" value=""/> 
                            <input id="pID" type="hidden" name="pID" value=""/> 
                            <input style="font-size: 20px; font-weight: bold; height: 35px ;width:15%" type="button" name="Save" value="Save" onclick="submitButton()"/>  
                        </form>  
                        <input id="indx" type="hidden" name="indx" value="" />
                    </div>
                </div>
            </div> 
            <div id="myModal2" class="modal">
                <div class="modal-content" style="text-align: center">
                    <div style="align-items:center;justify-content: center">
                        <form style="display:none;"  id="form3"  action="studentAnswers" method="post" enctype="multipart/form-data">  
                            <textarea id="descript2" name="answer" rows="20" cols="50" placeholder="answer"></textarea><br><br>
                            Select File:<input type="file" name="file" id="file"/><br/><br>
                            <input type="hidden" name="stID" value="<%=id%>"/>  
                            <input id="aID" type="hidden" name="pID" value=""/> 
                            <input style="font-size: 20px; font-weight: bold; height: 40px ;width:50%" type="submit" name="Save" value="Save"/>  
                        </form> 
                    </div>
                </div>
            </div>
            <form id="form1" style="display:none;" action="Download" method="get">
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

        function deleteButton(x) {
            var indx = x.parentNode.parentNode.rowIndex;
            var aid = document.getElementById("tbll").rows[indx].cells[2].innerHTML;
            var path = document.getElementById("tbll").rows[indx].cells[4].innerHTML;
            var tblname = "stGivenAnswers_<%=id%>";
            $.ajax({
                type: 'POST',
                url: 'studentAnswersDelete',
                data: {tblName: tblname, pID: aid, Path: path}
            });
            $(x).closest('tr').remove();
        }

        function updateButton(x) {
            modal2.style.display = "block";
            var indx = x.parentNode.parentNode.rowIndex;
            var aid = document.getElementById("tbll").rows[indx].cells[2].innerHTML;
            var a = document.getElementById("tbll").rows[indx].cells[3].innerText;
            document.getElementById("aID").value = aid;
            document.getElementById("descript2").value = a;
            document.getElementById("form3").setAttribute("style", "display:block;");
        }

        function submitButton() {
            var x = document.getElementById("indx").value;
            var desc = document.getElementById("descript").value;
            if (desc === "") {
                alert("Please write a description!");
            } else {
                var pgID = document.getElementById("tbl").rows[x].cells[0].innerHTML;
                document.getElementById("pgID").value = pgID;
                var pN = document.getElementById("tbl").rows[x].cells[1].innerHTML;
                document.getElementById("pN").value = pN;
                var pID = document.getElementById("tbl").rows[x].cells[2].innerHTML;
                document.getElementById("pID").value = pID;
                document.getElementById("form2").submit();
            }
        }

        function downloadButton(x) {
            var indx = x.parentNode.parentNode.rowIndex;
            var filePath = document.getElementById("tbl").rows[indx].cells[4].innerHTML;
            if (filePath.length === 16) {
                alert("No file found!");
            } else {
                document.getElementById("path").value = filePath;
                document.getElementById("form1").submit();
            }
        }

        function downloadButton2(x) {
            var indx = x.parentNode.parentNode.rowIndex;
            var filePath = document.getElementById("tbll").rows[indx].cells[4].innerHTML;
            if (filePath.length === 16) {
                alert("No file found!");
            } else {
                document.getElementById("path").value = filePath;
                document.getElementById("form1").submit();
            }
        }

        function answersButton(x) {
            modal.style.display = "block";
            var indx = x.parentNode.parentNode.rowIndex;
            document.getElementById("indx").value = indx;
            var pgid = document.getElementById("tbl").rows[indx].cells[0].innerHTML;
            var pid = document.getElementById("tbl").rows[indx].cells[2].innerHTML;
            $.ajax({
                type: 'POST',
                url: 'studentAnswersAns',
                data: {pgID: pgid, pID: pid},
                success: function (xx) {
                    var arr = xx.split("=");
                    var answerGiverId = arr[0].split(",");
                    var answerGiver = arr[1].split(",");
                    var answerId = arr[2].split(",");
                    var answer = arr[3].split(",");
                    var file = arr[4].split(",");
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
                        createTabel(answerGiverId, answerGiver, answerId, temparr, file);
                        document.getElementById("form3").setAttribute("style", "display:none;");
                        document.getElementById("ansMain").setAttribute("style", "display:block;");
                    } else {
                        createTabel(answerGiverId, answerGiver, answerId, temparr, file);
                        document.getElementById("form3").setAttribute("style", "display:none;");
                        document.getElementById("ansMain").setAttribute("style", "display:block;");
                    }
                }
            });
        }

        function createTabel(answerGiverId, answerGiver, answerId, answer, file) {

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
            for (i = 0; i <= answerGiver.length - 1; i++) {
                var agidFinal = null;
                var agFinal = null;
                var aidFinal = null;
                var aFinal = null;
                var fFinal = null;
                if (i === 0) {
                    if (answerGiver.length === 1) {
                        agid = answerGiverId[i].slice(1);
                        ag = answerGiver[i].slice(1);
                        aid = answerId[i].slice(1);
                        a = answer[i].slice(2);
                        f = file[i].slice(1);
                        agidFinal = agid.slice(0, agid.length - 1);
                        agFinal = ag.slice(0, ag.length - 1);
                        aidFinal = aid.slice(0, aid.length - 1);
                        aFinal = a.slice(0, a.length - 1);
                        fFinal = f.slice(0, f.length - 1);
                    } else {
                        agidFinal = answerGiverId[i].slice(1);
                        agFinal = answerGiver[i].slice(1);
                        aidFinal = answerId[i].slice(1);
                        aFinal = answer[i].slice(2);
                        fFinal = file[i].slice(1);
                    }
                } else if (i === answerGiver.length - 1) {
                    agidFinal = answerGiverId[i].slice(0, answerGiverId[i].length - 1);
                    agFinal = answerGiver[i].slice(0, answerGiver[i].length - 1);
                    aidFinal = answerId[i].slice(0, answerId[i].length - 1);
                    a = answer[i].slice(3);
                    aFinal = a.slice(0, a.length - 1);
                    fFinal = file[i].slice(0, file[i].length - 1);
                } else {
                    agidFinal = answerGiverId[i];
                    agFinal = answerGiver[i];
                    aidFinal = answerId[i];
                    aFinal = answer[i];
                    fFinal = file[i];
                }
                var tb = document.createElement("tbody");
                var y2 = document.createElement("tr");
                var z1 = document.createElement("td");
                var t4 = document.createTextNode(agidFinal);
                z1.setAttribute("style", "display:none;");
                var z2 = document.createElement("td");
                z2.setAttribute("style", "width: 20%");
                var t5 = document.createTextNode(agFinal);
                var z3 = document.createElement("td");
                z3.setAttribute("style", "display:none;");
                var t6 = document.createTextNode(aidFinal);
                z3.setAttribute("style", "display:none;");
                var z4 = document.createElement("td");
                z4.setAttribute("style", "width: 70%");
                var dd = document.createElement("div");
                dd.setAttribute("class", "up");
                dd.setAttribute("style", "overflow-y: scroll;height:200px;");
                var t7 = document.createTextNode(aFinal);
                var z5 = document.createElement("td");
                var t8 = document.createTextNode(fFinal);
                z5.setAttribute("style", "display:none;");
                z1.appendChild(t4);
                z2.appendChild(t5);
                z3.appendChild(t6);
                dd.appendChild(t7);
                z4.appendChild(dd);
                z5.appendChild(t8);
                y2.appendChild(z1);
                y2.appendChild(z2);
                y2.appendChild(z3);
                y2.appendChild(z4);
                y2.appendChild(z5);
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
                if (agidFinal == <%=id%>) {
                    var z7 = document.createElement("td");
                    var btn3 = document.createElement("input");
                    btn3.type = "button";
                    btn3.value = "Update";
                    btn3.setAttribute("onclick", "updateButton(this)");
                    z7.appendChild(btn3);
                    y2.appendChild(z7);
                    var z8 = document.createElement("td");
                    var btn4 = document.createElement("input");
                    btn4.type = "button";
                    btn4.value = "Delete";
                    btn4.setAttribute("onclick", "deleteButton(this)");
                    z8.appendChild(btn4);
                    y2.appendChild(z8);
                }
                tb.appendChild(y2);
                x.appendChild(tb);
            }
        }
    </script>
</body>
</html>
