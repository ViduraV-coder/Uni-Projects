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
        <script src="ScriptsCss/jquery.timespace.js" type="text/javascript"></script>
        <link href="ScriptsCss/jquery.timespace.dark.css" rel="stylesheet" type="text/css"/>
        <link href="ScriptsCss/style4.css" rel="stylesheet" type="text/css"/>
        <title>Time Tables</title>
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
            <div style="width:90%; margin: auto;"><br><br>
                <form id="Form" action="universityTimetableAdd" method="post">
                    <input id="nametxt" type="text" name="Name" value="" />
                    <input id="id" type="hidden" name="ID" value="<%=id%>" />
                    <input type="button" value="Add" onClick="addTable()"/><br><br>
                </form>
                <div>
                    <div style="width:35%;">
                        <table id="tbll" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="display:none"></th>
                                    <th>Time Tables</th>
                                    <th style="display:none"></th>
                                    <th style="display:none"></th>
                                </tr>
                            </thead>
                            <tbody id="tb">
                                <%
                                    Database database = new Database();
                                    ResultSet rss = database.uniGetTimetables(id);
                                    try {
                                        while (rss.next()) {
                                            String x = rss.getString("TableName");
                                            int index = x.lastIndexOf("_");
                                            String y = x.substring(0, index);

                                %>
                                <tr>
                                    <td style="display:none"><%=x%></td>
                                    <td style=" width: 80%"><%=y%></td>
                                    <td style=" width: 10%"><input type="button" value="Open" onClick="openTable(this)"/></td>
                                    <td style=" width: 10%"><input type="button" value="Delete" onClick="deleteTable(this)"/></td>
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
                </div> 
                <div id="op" style="display:none" >    
                    <form id="form2" action="universityTimetableSetData" method="POST">
                        <input id="n" type="hidden" name="Name" value="" />
                        <input id="s" type="text" name="Start" value="" placeholder="eg:12.00"/>
                        <input id="e" type="text" name="End" value="" placeholder="eg:14.00"/>
                        <input id="t" type="text" name="Title" value="" placeholder="eg:Designing"/>
                        <input type="button" value="Add" onClick="addData()" />
                    </form>  
                    <div id="div">
                        <div id="timelineClock"></div>
                    </div>
                </div>
            </div> 
            <form style="display:none" id="form3" action="universityTimetableDeleteData" method="POST">
                <input id="st" type="hidden" name="st" value="" /> 
                <input id="ed" type="hidden" name="ed" value="" /> 
                <input id="timee" type="hidden" name="Time" value="" /> 
                <input id="tn" type="hidden" name="Tblname" value="" />      
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


        function addData() {
            var start = document.getElementById("s").value;
            var end = document.getElementById("e").value;
            var title = document.getElementById("t").value;
            if (start === "" || start === null) {
                alert("Please input the start time!");
            } else if (end === "" || end === null) {
                alert("Please input the end time!");
            } else if (title === "" || title === null) {
                alert("Please input the title!");
            } else if (parseFloat(start) >= 25.00 || parseFloat(end) >= 25.00) {
                alert("Please enter a valid time!");
            } else {
                document.getElementById("form2").submit();
            }
        }

        function deleteData() {
            document.getElementById("tn").value = document.getElementById("n").value;
            document.getElementById("form3").submit();
        }

        function addTable() {

            var v = null;
            var name = document.getElementById("nametxt").value + "_" + <%=id%>;
            var rows = document.getElementById('tbll').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            var rl = rows.length + 1;
            for (i = 1; i < rl; i++) {
                var xx = document.getElementById("tbll").rows[i].cells[0].innerHTML;
                if (name === xx) {
                    v = "yes";
                }
            }
            if (v === "yes") {
                alert("A time table with that name already exists!");
            } else if (name === "_" + <%=id%>) {
                alert("Please give a name to the time table!");
            } else if (name.charAt(0).match(/^[0-9]+$/)) {
                alert("First letter of the name cannot be a number!");
            } else {
                document.getElementById("Form").submit();
            }
        }

        function openTable(x) {

            var parent = document.getElementById("div");
            var child = document.getElementById("timelineClock");
            parent.removeChild(child);
            var newChild = document.createElement("div");
            newChild.setAttribute("id", "timelineClock");
            parent.appendChild(newChild);
            document.getElementById("op").setAttribute("style", "display:block");

            var indx = x.parentNode.parentNode.rowIndex;
            var name = document.getElementById("tbll").rows[indx].cells[0].innerHTML;
            document.getElementById("n").value = name;
            $.ajax({
                type: 'POST',
                url: 'universityTimetableGetData',
                data: {Tblnm: name},
                success: function (events) {
                    var arr = events.split("=");
                    var start = arr[0].split(",");
                    var end = arr[1].split(",");
                    var title = arr[2].split(",");
                    var myEvents = [];

                    for (var i = 0; i <= start.length - 1; i++) {
                        var sFinal = null;
                        var eFinal = null;
                        var tFinal = null;
                        if (i === 0) {
                            if (start.length === 1) {
                                s = start[i].slice(1);
                                e = end[i].slice(1);
                                t = title[i].slice(1);
                                sFinal = s.slice(0, s.length - 1);
                                eFinal = e.slice(0, e.length - 1);
                                tFinal = t.slice(0, t.length - 1);
                            } else {
                                sFinal = start[i].slice(1);
                                eFinal = end[i].slice(1);
                                tFinal = title[i].slice(1);
                            }
                        } else if (i === start.length - 1) {
                            sFinal = start[i].slice(0, start[i].length - 1);
                            eFinal = end[i].slice(0, end[i].length - 1);
                            tFinal = title[i].slice(0, title[i].length - 1);
                        } else {
                            sFinal = start[i];
                            eFinal = end[i];
                            tFinal = title[i];
                        }

                        myEvents.push({start: "" + sFinal + "", end: "" + eFinal + "", title: "" + tFinal + ""});
                    }

                    $('#timelineClock').timespace({
                        startTime: 6,
                        endTime: 18,

                        selectedEvent: -1,
                        data: {
                            headings: [
                                {start: 6, end: 12, title: 'Morning'},
                                {start: 12, end: 18, title: 'Afternoon'}
                            ],
                            events: myEvents
                        }
                    });
                }
            });
        }

        function deleteTable(x) {
            var indx = $(x).closest('tr').index();
            var name = document.getElementById("tbll").rows[indx + 1].cells[0].innerHTML;
            var id = "<%=id%>";
            $.ajax({
                type: 'POST',
                url: 'universityTimetableDelete',
                data: {ID: id, Name: name}
            });
            $(x).closest('tr').remove();
        }

    </script>   
</html>