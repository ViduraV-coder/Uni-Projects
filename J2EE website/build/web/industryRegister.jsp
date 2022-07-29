<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Industry_Registration Page</title>
        <link href="./ScriptsCss/style16.css" rel="stylesheet">
        <script src="ScriptsCss/bootstrap.min.js" type="text/javascript"></script>
        <link href="ScriptsCss/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="ScriptsCss/carousel.css" rel="stylesheet" type="text/css"/>
        <link href="ScriptsCss/style5.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="left-menu" style="background-color: #585b60">  
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
        <div id="wrapper" style="background-image: url(Images/industries1.jpg);background-repeat:no-repeat;background-size: cover">
            <form action="industryRegister" method="post" name="iForm">
                <section>
                    <div class="containerr">
                        <img src="./Images/user-login-png-transparent-6.png" class="person">
                        <h1>SignUp Here</h1>
                        <table>
                            <tr>
                                <td style="color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;">First Name :</td>
                                <td><input type="text" name="firstname" placeholder="Enter Firstname" required=""></td>
                            </tr>
                            <tr>
                                <td style="color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;">Last Name :</td>
                                <td><input type="text" name="lastname" placeholder="Enter Lastname" required=""></td>
                            </tr>
                            <tr>
                                <td style="color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;">Company Name :</td>
                                <td><input type="text" name="companyname" placeholder="Enter Company Name" required=""></td>
                            </tr>
                            <tr>
                                <td style="color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;">E-mail :</td>
                                <td><input type="email" name="email" placeholder="Enter Email" required=""></td>
                            </tr>
                            <tr>
                                <td style="color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;">Password :</td>
                                <td><input type="password" name="password" placeholder="Enter Password" required=""></td>
                            </tr>
                            <tr>
                                <td style="color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;">Confirm Password :</td>
                                <td><input type="password" name="re_password" placeholder="Enter Re-Password" required=""></td>
                            </tr>
                            <tr>
                                <td style="color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;">Address :</td>
                                <td><input type="text" name="address" placeholder="Enter Address" required=""></td>
                            </tr>
                            <tr>
                                <td style="color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;">Mobile No :</td>
                                <td><input type="text" name="teleno" placeholder="Enter TeleNo" required=""></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="2" style="text-align: center"><input type="button" name="action" onClick="xx()" value="Submit" class="btnn" />
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="2" style="text-align: center"><button type="reset" value="RESET" class="btn1">RESET</button></td>
                            </tr>
                        </table>
                    </div>
                </section>
            </form>
        </div>
    </body>
    <script type="text/javascript">
        function xx() {
            var firstname = document.iForm.firstname.value;
            var lastname = document.iForm.lastname.value;
            var companyname = document.iForm.companyname.value;
            var email = document.iForm.email.value;
            var password = document.iForm.password.value;
            var re_password = document.iForm.re_password.value;
            var address = document.iForm.address.value;
            var teleno = document.iForm.teleno.value;
            var illegalChar = /[\W_]/;

            if (firstname == "") {
                alert("Please enter Firstname");
                document.iForm.firstname.focus();
                return false;
            } else if (lastname == "") {
                alert("Please enter Lastname");
                document.iForm.lastname.focus();
                return false;
            } else if (companyname == "") {
                alert("Please enter companyname");
                document.iForm.companyname.focus();
                return false;
            } else if (email == "") {
                alert("Please enter Email");
                document.iForm.email.focus();
                return false;
            } else if (!email.includes("@")) {
                alert("Please enter a valid email");
                document.iForm.email.focus();
                return false;
            } else if (!email.includes(".com")) {
                alert("Please enter a valid email");
                document.iForm.email.focus();
                return false;
            } else if ((email.length < 5) || (email.length > 30)) {
                alert("Email is of invalid length");
                document.iForm.email.focus();
                return false;
            } else if (password == "") {
                alert("Please enter Password");
                document.iForm.password.focus();
                return false;
            } else if ((password.length < 6) || (password.length > 15)) {
                alert("Password should be between 6 and 15 character");
                document.iForm.password.focus();
                return false;
            } else if (illegalChar.test(password)) {
                alert("Password contains illegal character");
                document.iForm.password.focus();
                return false;
            } else if (re_password == "") {
                alert("Please enter Re-Password");
                document.iForm.re_password.focus();
                return false;
            } else if ((re_password.length < 6) || (re_password.length > 15)) {
                alert("Re-Password should be between 6 and 15 character");
                document.iForm.re_password.focus();
                return false;
            } else if (illegalChar.test(re_password)) {
                alert("Re-Password contains illegal character");
                document.iForm.re_password.focus();
                return false;
            } else if (password != re_password) {
                alert("Incorrect Re-Password");
                document.iForm.re_password.focus();
                return false;
            } else if (address == "") {
                alert("Please enter Address");
                document.iForm.address.focus();
                return false;
            } else if (teleno == "") {
                alert("Please enter Tele-No");
                document.iForm.teleno.focus();
                return false;
            } else if (!/^\d+$/.test(teleno)) {
                alert("Please enter a valid Tele-No");
                document.iForm.teleno.focus();
                return false;
            } else {
                document.iForm.submit();
            }
        }
    </script>
</html>
