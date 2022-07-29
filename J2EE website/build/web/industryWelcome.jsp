<%@page import="java.util.ArrayList"%>
<%@page import="Servlets.Database"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%String id = session.getAttribute("id").toString();%>
<!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="ScriptsCss/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="ScriptsCss/datatables.css" rel="stylesheet" type="text/css"/>
    <script src="ScriptsCss/jquery-3.4.0.min.js" type="text/javascript"></script>
    <script src="ScriptsCss/bootstrap.js" type="text/javascript"></script>
    <script src="ScriptsCss/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="ScriptsCss/datatables.js" type="text/javascript"></script>
    <link href="ScriptsCss/mini-event-calendar.css" rel="stylesheet" type="text/css"/>
    <script src="ScriptsCss/mini-event-calenda-clean.js" type="text/javascript"></script>
    <script src="ScriptsCss/jquery.timespace.clean.js" type="text/javascript"></script>
    <link href="ScriptsCss/jquery.timespace.dark.css" rel="stylesheet" type="text/css"/>
    <link href="ScriptsCss/style4.css" rel="stylesheet" type="text/css"/>
    <title>Welcome!</title>
    <style>
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
        <div id="div1" style=" width: 50%; padding: 5% ;float: left">
            <table id="tbl1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="display:none;"></th>
                        <th>University Name</th>
                        <th style="display:none;"></th>
                        <th style="display:none;"></th>
                    </tr>
                </thead>
                <tbody>
                    <%
                        Database database = new Database();
                        ArrayList<ArrayList> al = database.inGetAllUniversities();

                        ArrayList<String> uniID = new ArrayList();
                        ArrayList<String> uniName = new ArrayList();
                        uniID = al.get(0);
                        uniName = al.get(1);

                        for (int i = 0; i <= uniID.size() - 1; i++) {
                    %>
                    <tr bgcolor="#DEB887">
                        <td style="display:none;"><%=uniID.get(i)%></td>
                        <td style=" width: 80%"><%=uniName.get(i)%></td>
                        <td style=" width: 10%"><input type="button" value="Calendars" name="calendarss" onClick="getCalendars(this)"/></td>
                        <td style=" width: 10%"><input type="button" value="Timetables" name="timetables" onClick="getTimetables(this)"/></td>
                    </tr>
                    <%
                        }
                    %>
                </tbody>
            </table>
        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span id="s1" class="close">&times;</span>
                <div id="c" style="align-items:center;justify-content: center">
                    <div id="calendar"></div>        
                </div> 
            </div> 
        </div>
        <div id="div2" style="display:none; width: 50%; padding: 6%; float: right">
            <p id="p"></p>
            <div id="indiv">
                <table id="tbl2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
                </table>
            </div>
        </div>
        <div id="myModal2" class="modal">
            <div class="modal-content">
                <span id="s2" class="close">&times;</span>
                <div id="c2" style="align-items:center;justify-content: center">
                    <div id="timelineClock"></div>
                </div> 
            </div> 
        </div> 
    </div>
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
        var span = document.getElementById("s1");
        span.onclick = function () {
            modal.style.display = "none";
        };
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };

        var modal2 = document.getElementById("myModal2");
        var span2 = document.getElementById("s2");
        span2.onclick = function () {
            modal2.style.display = "none";
        };
        window.onclick = function (event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        };

        function getCalendars(x) {

            modal.style.display = "block";
            var indx = x.parentNode.parentNode.rowIndex;
            var id = document.getElementById("tbl1").rows[indx].cells[0].innerHTML;
            $.ajax({
                type: 'POST',
                url: 'universityCalendarGet',
                data: {ID: id},
                success: function (events) {
                    var arr = events.split("=");
                    var datee = arr[0].split(",");
                    var descriptionn = arr[1].split(",");
                    var myEvents = [];

                    for (var i = 0; i <= datee.length - 1; i++) {

                        var daFinal = null;
                        var deFinal = null;
                        if (i === 0) {
                            if (datee.length === 1) {
                                da = datee[i].slice(1);
                                de = descriptionn[i].slice(1);
                                daFinal = da.slice(0, da.length - 1);
                                deFinal = de.slice(0, de.length - 1);
                            } else {
                                daFinal = datee[i].slice(1);
                                deFinal = descriptionn[i].slice(1);
                            }
                        } else if (i === datee.length - 1) {
                            daFinal = datee[i].slice(0, datee[i].length - 1);
                            deFinal = descriptionn[i].slice(0, descriptionn[i].length - 1);
                        } else {
                            daFinal = datee[i];
                            deFinal = descriptionn[i];
                        }

                        myEvents.push({title: "" + deFinal + "", date: "" + daFinal + "", link: ""});
                    }

                    $("#calendar").MEC({
                        from_monday: true,
                        events: myEvents
                    });
                }
            });
        }

        function getTimetables(x) {
            var parent = document.getElementById("indiv");
            var child = document.getElementById("tbl2");
            parent.removeChild(child);
            var tbl = document.createElement("table");
            tbl.setAttribute("id", "tbl2");
            tbl.setAttribute("class", "datatable table table-striped table-bordered");
            tbl.setAttribute("cellpadding", "0");
            tbl.setAttribute("cellspacing", "0");
            tbl.setAttribute("border", "0");
            parent.appendChild(tbl);

            var d = document.getElementById("div2");
            d.style.display = "block";
            var indx = x.parentNode.parentNode.rowIndex;
            var uniID = document.getElementById("tbl1").rows[indx].cells[0].innerHTML;
            $.ajax({
                type: 'POST',
                url: 'industryWelcome',
                data: {uniID: uniID},
                success: function (xx) {
                    var tables = xx.split(",");
                    var parent = document.getElementById("tbl2");
                    var child1 = document.getElementById("th");
                    var child2 = document.getElementById("tb");
                    if (child1) {
                        parent.removeChild(child1);
                        parent.removeChild(child2);
                        createTabel(tables);
                        document.getElementById("form3").setAttribute("style", "display:none;");
                        document.getElementById("ansMain").setAttribute("style", "display:block;");
                    } else {
                        createTabel(tables);
                        document.getElementById("form3").setAttribute("style", "display:none;");
                        document.getElementById("ansMain").setAttribute("style", "display:block;");
                    }
                }
            });
        }

        function createTabel(tables) {
            if (tables[0] != "[]") {
                var d = document.getElementById("div2");
                var p = document.getElementById("p");
                d.removeChild(p);
                var d2 = document.getElementById("indiv");
                d2.style.display = "block";

                var x = document.getElementById("tbl2");
                var th = document.createElement("thead");
                th.setAttribute("id", "th");
                var y1 = document.createElement("tr");
                var h1 = document.createElement("th");
                h1.setAttribute("style", "display:none;");
                var h2 = document.createElement("th");
                var t2 = document.createTextNode("Time Tables");
                var h3 = document.createElement("th");
                h3.setAttribute("style", "display:none;");
                h2.appendChild(t2);
                y1.appendChild(h1);
                y1.appendChild(h2);
                y1.appendChild(h3);
                th.appendChild(y1);
                x.appendChild(th);
                for (i = 0; i <= tables.length - 1; i++) {
                    var tableFinal = null;
                    if (i === 0) {
                        if (tables.length === 1) {
                            t = tables[i].slice(1);
                            tableFinal = t.slice(0, t.length - 1);
                        } else {
                            tableFinal = tables[i].slice(1);
                        }
                    } else if (i === tables.length - 1) {
                        tableFinal = tables[i].slice(0, tables[i].length - 1);
                    } else {
                        tableFinal = tables[i];
                    }

                    var tableName = tableFinal.replace(/\_\d+$/, "");
                    var tb = document.createElement("tbody");
                    tb.setAttribute("id", "tb");
                    var y2 = document.createElement("tr");
                    var z1 = document.createElement("td");
                    var t4 = document.createTextNode(tableFinal);
                    z1.setAttribute("style", "display:none;");
                    var z2 = document.createElement("td");
                    z2.setAttribute("style", "width: 80%");
                    var t5 = document.createTextNode(tableName);
                    var z3 = document.createElement("td");
                    z3.setAttribute("style", "width: 20%");
                    var btn = document.createElement("input");
                    btn.type = "button";
                    btn.value = "Open";
                    btn.setAttribute("onclick", "openTable(this)");
                    z1.appendChild(t4);
                    z2.appendChild(t5);
                    z3.appendChild(btn);
                    y2.appendChild(z1);
                    y2.appendChild(z2);
                    y2.appendChild(z3);
                    tb.appendChild(y2);
                    x.appendChild(tb);
                }
            } else {
                var d = document.getElementById("indiv");
                d.style.display = "none";
                var p = document.getElementById("p");
                if (p) {
                    var ptn = document.createTextNode("No tables found!");
                    p.appendChild(ptn);
                    var d2 = document.getElementById("div2");
                    d2.appendChild(p);
                } else {
                    var pp = document.createElement("p");
                    pp.setAttribute("id", "p");
                    var ptn = document.createTextNode("No tables found!");
                    pp.appendChild(ptn);
                    var d2 = document.getElementById("div2");
                    d2.appendChild(pp);
                }
            }
        }

        function openTable(x) {
            modal2.style.display = "block";
            var parent = document.getElementById("c2");
            var child = document.getElementById("timelineClock");
            parent.removeChild(child);
            var div = document.createElement("div");
            div.setAttribute("id", "timelineClock");
            parent.appendChild(div);
            var indx = x.parentNode.parentNode.rowIndex;
            var name = document.getElementById("tbl2").rows[indx].cells[0].innerHTML;
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
    </script>

</body>
</html>

