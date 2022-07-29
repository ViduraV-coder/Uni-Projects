<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%String id = session.getAttribute("id").toString();%>
<!DOCTYPE html>
<html>
    <head>
        <script src="ScriptsCss/jquery-3.4.0.min.js" type="text/javascript"></script>
        <link href="ScriptsCss/mini-event-calendar.css" rel="stylesheet" type="text/css"/>
        <script src="ScriptsCss/mini-event-calendar.js" type="text/javascript"></script>
        <link href="ScriptsCss/style4.css" rel="stylesheet" type="text/css"/>
        <title>Calendar</title>
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
            <div style="padding-top:50px;">
            <div id="calendar" ></div>
            </div>
            <div style="padding-top:50px;">      
            <form id="form1" style="display:none" action="universityCalendarAddEdit" method="Post">
                <h3>Add:-</h3>
                <input id="id" type="hidden" name="id" value="<%=id%>" />
                <input id="date" type="hidden" name="date" value="" />
                <input id="yearr" type="text" name="year" value="" /><br><br>
                <select id="monthh" name="month">
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select><br><br>
                <input id="dayy" type="text" name="day" value="" /><br><br>
                <textarea id="ta" name="description" rows="4" cols="20" placeholder="Write event here!"></textarea><br><br>
                <input type="submit" value="Add" name="add" /><input type="button" value="Close" onClick="formClose()"/>
            </form>
            <input id="tempDate" type="hidden" value="" />
            <input id="tempDesc" type="hidden" value="" />
            <form id="form2" style="display:none" action="universityCalendarDelete" method="Post">
                <h3>Edit:-</h3>
                <input id="delId" type="hidden" name="delId" value="<%=id%>" />
                <input id="delDate" type="hidden" name="delDate" value="" />
            </form>
            </div>
        </div>
    </body>

    <script type="text/javascript">

        window.onload = function () {
            var id = "<%=id%>";
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
        };

        function formClose() {
            document.getElementById("form1").setAttribute("style", "display:none");
        }

        function addEvent() {
            document.getElementById("yearr").setAttribute("style", "display:block");
            document.getElementById("yearr").value = new Date().getFullYear();
            document.getElementById("monthh").setAttribute("style", "display:block");
            document.getElementById("dayy").setAttribute("style", "display:block");
            document.getElementById("dayy").value = new Date().getDate();
            document.getElementById("ta").value = "";
            document.getElementById("form1").setAttribute("style", "display:block");
        }

        function editEvent() {
            document.getElementById("yearr").setAttribute("style", "display:none");
            document.getElementById("yearr").value = "";
            document.getElementById("monthh").setAttribute("style", "display:none");
            document.getElementById("dayy").setAttribute("style", "display:none");
            document.getElementById("ta").value = document.getElementById("tempDesc").value;
            document.getElementById("date").value = document.getElementById("tempDate").value;
            document.getElementById("form1").setAttribute("style", "display:block");
        }

        function deleteEvent() {
            document.getElementById("delDate").value = document.getElementById("tempDate").value;
            document.getElementById("form2").submit();
        }
    </script>
</html>
