<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login Form</title>
        <link rel="stylesheet" href="./ScriptsCss/style.css">
        <script src="ScriptsCss/bootstrap.min.js" type="text/javascript"></script>
        <link href="ScriptsCss/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="ScriptsCss/carousel.css" rel="stylesheet" type="text/css"/>
        <link href="ScriptsCss/style5.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">

            function validate() {
                var email = document.myForm.email.value;
                if (email == "") {
                    alert("Please enter Email");
                    document.myForm.email.focus();
                    return false;
                }
                if ((email.length < 5) || (email.length > 30)) {
                    alert("Email is of invalid length");
                    document.myForm.email.focus();
                    return false;
                }
                var password = document.myForm.password.value;
                var illegalChar = /[\W_]/;
                if (password == "") {
                    alert("Please enter Password");
                    document.myForm.password.focus();
                    return false;
                } else if ((password.length < 6) || (password.length > 15)) {
                    alert("Password should be between 6 and 15 character");
                    document.myForm.password.focus();
                    return false;
                } else if (illegalChar.test(password)) {
                    alert("Password contains illegal character");
                    document.myForm.password.focus();
                    return false;
                }
                var isLoggedIn = "${isLoggedIn}";
                if (isLoggedIn === true)
                    window.location.href = "welcome.jsp";
            }
        </script>
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
                        <li class="child-menu"><a href="index.html">Home <i></i></a> 
                        </li>
                        <li class="child-menu"><a href="login.jsp">Login <i></i></a> 
                        </li>
                        <li class="child-menu"><a href="#">Register <i class="fa fa-angle-right"></i></a>
                            <div class="sub-menu-wrapper">
                                <ul class="sub-menu center-content">
                                    <li><a href="studentRegister.jsp">Register as a Student</a></li>
                                    <li><a href="industryRegister.jsp">Register as a Industry</a></li>
                                    <li><a href="universityRegister.jsp">Register as a University</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="margin-block"></div>
            </div>
        </header>
        <div id="wrapper" style="background-image: url(Images/little-fish-coffee-shops-kauai-hawaii.jpg);background-repeat:no-repeat;background-size: cover">

            <%
                Cookie[] cookies = request.getCookies();
                String email = "", password = "", remember = "";
                if (cookies != null) {
                    for (Cookie cookie : cookies) {
                        if (cookie.getName().equals("cookemail")) {
                            email = cookie.getValue();
                        }
                        if (cookie.getName().equals("cookpass")) {
                            password = cookie.getValue();
                        }
                        if (cookie.getName().equals("cookrem")) {
                            remember = cookie.getValue();
                        }
                    }
                }
            %>
            <form action="Login" method="post" name="myForm">
                <section>     
                    <div class="LoginBox">
                        <%=request.getAttribute("msg") != null ? request.getAttribute("msg") : ""%>
                        <img src="./Images/user-login-png-transparent-6.png" class="person" alt="">
                        <h1>Login Here</h1>
                        <table>
                            <tr>
                                <td style="color: purple; font-size: 18px; font-family: sans-serif; font-weight: bold; text-align: right;">E-mail :</td>
                                <td><input type="email" name="email" placeholder="Enter Email" required=""></td>
                            </tr> 
                            <tr>
                                <td style="color: purple; font-size: 18px; font-family: sans-serif; font-weight: bold; text-align: right;">Password :</td>
                                <td><input type="password" name="password" placeholder="Enter Password" required=""></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="checkbox" name="remember">Remember Me</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="2" style="text-align: center"><button type="submit" name="action" onclick="return validate();" value="login" class="btn">LOGIN</button></td>
                            </tr>
                        </table>
                    </div>
                </section>
            </form>
        </div>
    </body>
</html>