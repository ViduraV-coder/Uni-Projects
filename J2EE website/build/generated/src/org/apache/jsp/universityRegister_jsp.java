package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;

public final class universityRegister_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

  private static final JspFactory _jspxFactory = JspFactory.getDefaultFactory();

  private static java.util.List<String> _jspx_dependants;

  private org.glassfish.jsp.api.ResourceInjector _jspx_resourceInjector;

  public java.util.List<String> getDependants() {
    return _jspx_dependants;
  }

  public void _jspService(HttpServletRequest request, HttpServletResponse response)
        throws java.io.IOException, ServletException {

    PageContext pageContext = null;
    HttpSession session = null;
    ServletContext application = null;
    ServletConfig config = null;
    JspWriter out = null;
    Object page = this;
    JspWriter _jspx_out = null;
    PageContext _jspx_page_context = null;

    try {
      response.setContentType("text/html;charset=UTF-8");
      pageContext = _jspxFactory.getPageContext(this, request, response,
      			null, true, 8192, true);
      _jspx_page_context = pageContext;
      application = pageContext.getServletContext();
      config = pageContext.getServletConfig();
      session = pageContext.getSession();
      out = pageContext.getOut();
      _jspx_out = out;
      _jspx_resourceInjector = (org.glassfish.jsp.api.ResourceInjector) application.getAttribute("com.sun.appserv.jsp.resource.injector");

      out.write("\n");
      out.write("<!DOCTYPE html>\n");
      out.write("<html>\n");
      out.write("    <head>\n");
      out.write("        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n");
      out.write("        <title>University_Registration Page</title>\n");
      out.write("        <link rel=\"stylesheet\" href=\"./ScriptsCss/style2.css\">\n");
      out.write("        <script src=\"ScriptsCss/bootstrap.min.js\" type=\"text/javascript\"></script>\n");
      out.write("        <link href=\"ScriptsCss/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\"/>\n");
      out.write("        <link href=\"ScriptsCss/carousel.css\" rel=\"stylesheet\" type=\"text/css\"/>\n");
      out.write("        <link href=\"ScriptsCss/style5.css\" rel=\"stylesheet\" type=\"text/css\"/>\n");
      out.write("    </head>\n");
      out.write("    <body class=\"left-menu\" style=\"background-color: #585b60;\">  \n");
      out.write("        <header class=\"vertical-header\">\n");
      out.write("            <div class=\"vertical-header-wrapper\">\n");
      out.write("                <nav class=\"nav-menu\">\n");
      out.write("                    <div class=\"logo\">\n");
      out.write("                        <a href=\"industryWelcome.jsp\"><img style=\"width: 80px;\" src=\"Images/infinity-logo.png\" alt=\"\"></a>\n");
      out.write("                    </div>\n");
      out.write("                    <div class=\"margin-block\"></div>\n");
      out.write("                    <ul class=\"primary-menu\">\n");
      out.write("                        <li class=\"child-menu\"><a href=\"index.html\">Home <i></i></a> \n");
      out.write("                        </li>\n");
      out.write("                        <li class=\"child-menu\"><a href=\"login.jsp\">Login <i></i></a> \n");
      out.write("                        </li>\n");
      out.write("                        <li class=\"child-menu\"><a href=\"#\">Register <i class=\"fa fa-angle-right\"></i></a>\n");
      out.write("                            <div class=\"sub-menu-wrapper\">\n");
      out.write("                                <ul class=\"sub-menu center-content\">\n");
      out.write("                                    <li><a href=\"studentRegister.jsp\">Register as a Student</a></li>\n");
      out.write("                                    <li><a href=\"industryRegister.jsp\">Register as a Industry</a></li>\n");
      out.write("                                    <li><a href=\"universityRegister.jsp\">Register as a University</a></li>\n");
      out.write("                                </ul>\n");
      out.write("                            </div>\n");
      out.write("                        </li>\n");
      out.write("                    </ul>\n");
      out.write("                </nav>\n");
      out.write("                <div class=\"margin-block\"></div>\n");
      out.write("            </div>\n");
      out.write("        </header>\n");
      out.write("        <div id=\"wrapper\" style=\"background-image: url(Images/study-notebooks.jpg);background-repeat:no-repeat;background-size: cover\">\n");
      out.write("\n");
      out.write("            <form action=\"universityRegister\" method=\"post\" name=\"iForm\">\n");
      out.write("                <section>     \n");
      out.write("                    <div class=\"LoginBox\">\n");
      out.write("\n");
      out.write("                        <img src=\"./Images/user-login-png-transparent-6.png\" class=\"person\">\n");
      out.write("\n");
      out.write("                        <h1>SignUp Here</h1>\n");
      out.write("\n");
      out.write("                        <table>\n");
      out.write("                            <tr>\n");
      out.write("                                <td style=\"color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;\">First Name :</td>\n");
      out.write("                                <td><input type=\"text\" name=\"firstname\" placeholder=\"Enter Firstname\" required=\"\"></td>\n");
      out.write("                            </tr>\n");
      out.write("                            <tr>\n");
      out.write("                                <td style=\"color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;\">Last Name :</td>\n");
      out.write("                                <td><input type=\"text\" name=\"lastname\" placeholder=\"Enter Lastname\" required=\"\"></td>\n");
      out.write("                            </tr>\n");
      out.write("                            <tr>\n");
      out.write("                                <td style=\"color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;\">University Name :</td>\n");
      out.write("                                <td><input type=\"text\" name=\"universityname\" placeholder=\"Enter University Name\" required=\"\"></td>\n");
      out.write("                            </tr>\n");
      out.write("                            <tr>\n");
      out.write("                                <td style=\"color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;\">E-mail :</td>\n");
      out.write("                                <td><input type=\"email\" name=\"email\" placeholder=\"Enter Email\" required=\"\"></td>\n");
      out.write("                            </tr>\n");
      out.write("                            <tr>\n");
      out.write("                                <td style=\"color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;\">Password :</td>\n");
      out.write("                                <td><input type=\"password\" name=\"password\" placeholder=\"Enter Password\" required=\"\"></td>\n");
      out.write("                            </tr>\n");
      out.write("                            <tr>\n");
      out.write("                                <td style=\"color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;\">Confirm Password :</td>\n");
      out.write("                                <td><input type=\"password\" name=\"re_password\" placeholder=\"Enter Re-Password\" required=\"\"></td>\n");
      out.write("                            </tr>\n");
      out.write("                            <tr>\n");
      out.write("                                <td style=\"color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;\">Address :</td>\n");
      out.write("                                <td><input type=\"text\" name=\"address\" placeholder=\"Enter Address\" required=\"\"></td>\n");
      out.write("                            </tr>\n");
      out.write("                            <tr>\n");
      out.write("                                <td style=\"color: purple; font-size: 17px; font-family: sans-serif; font-weight: bold; text-align: right;\">Tele No :</td>\n");
      out.write("                                <td><input type=\"text\" name=\"teleno\" placeholder=\"Enter TeleNo\" required=\"\"></td>\n");
      out.write("                            </tr>\n");
      out.write("                            <tr>\n");
      out.write("                                <td colspan=\"2\" style=\"text-align: center;\"><input type=\"button\" name=\"action\" onClick=\"xx()\" value=\"Submit\" class=\"btnn\" /></td>\n");
      out.write("                                <td colspan=\"2\" style=\"text-align: center;\"><button class=\"btn1\" type=\"reset\" value=\"RESET\" >RESET</button></td>\n");
      out.write("                            </tr>\n");
      out.write("\n");
      out.write("                        </table>\n");
      out.write("                    </div>\n");
      out.write("                </section>\n");
      out.write("            </form>\n");
      out.write("        </div>\n");
      out.write("    </body>\n");
      out.write("    <script type=\"text/javascript\">\n");
      out.write("        function xx() {\n");
      out.write("            var firstname = document.iForm.firstname.value;\n");
      out.write("            var lastname = document.iForm.lastname.value;\n");
      out.write("            var email = document.iForm.email.value;\n");
      out.write("            var password = document.iForm.password.value;\n");
      out.write("            var re_password = document.iForm.re_password.value;\n");
      out.write("            var universityname = document.iForm.universityname.value;\n");
      out.write("            var address = document.iForm.address.value;\n");
      out.write("            var teleno = document.iForm.teleno.value;\n");
      out.write("            var illegalChar = /[\\W_]/;\n");
      out.write("            \n");
      out.write("            if (firstname == \"\") {\n");
      out.write("                alert(\"Please enter Firstname\");\n");
      out.write("                document.iForm.firstname.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if (lastname == \"\") {\n");
      out.write("                alert(\"Please enter Lastname\");\n");
      out.write("                document.iForm.lastname.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if (email == \"\") {\n");
      out.write("                alert(\"Please enter Email\");\n");
      out.write("                document.iForm.email.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if (!email.includes(\"@\")) {\n");
      out.write("                alert(\"Please enter a valid email\");\n");
      out.write("                document.iForm.email.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if (!email.includes(\".com\")) {\n");
      out.write("                alert(\"Please enter a valid email\");\n");
      out.write("                document.iForm.email.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if ((email.length < 5) || (email.length > 30)) {\n");
      out.write("                alert(\"Email is of invalid length\");\n");
      out.write("                document.iForm.email.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if (password == \"\") {\n");
      out.write("                alert(\"Please enter Password\");\n");
      out.write("                document.iForm.password.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if ((password.length < 6) || (password.length > 15)) {\n");
      out.write("                alert(\"Password should be between 6 and 15 character\");\n");
      out.write("                document.iForm.password.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if (illegalChar.test(password)) {\n");
      out.write("                alert(\"Password contains illegal character\");\n");
      out.write("                document.iForm.password.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if (re_password == \"\") {\n");
      out.write("                alert(\"Please enter Re-Password\");\n");
      out.write("                document.iForm.re_password.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if ((re_password.length < 6) || (re_password.length > 15)) {\n");
      out.write("                alert(\"Re-Password should be between 6 and 15 character\");\n");
      out.write("                document.iForm.re_password.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if (illegalChar.test(re_password)) {\n");
      out.write("                alert(\"Re-Password contains illegal character\");\n");
      out.write("                document.iForm.re_password.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if (password != re_password) {\n");
      out.write("                alert(\"Incorrect Re-Password\");\n");
      out.write("                document.iForm.re_password.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if (universityname == \"\") {\n");
      out.write("                alert(\"Please enter University Name\");\n");
      out.write("                document.iForm.universityname.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if (address == \"\") {\n");
      out.write("                alert(\"Please enter Address\");\n");
      out.write("                document.iForm.address.focus();\n");
      out.write("                return false;\n");
      out.write("            } else if (teleno == \"\") {\n");
      out.write("                alert(\"Please enter Tele-No\");\n");
      out.write("                document.iForm.teleno.focus();\n");
      out.write("                return false;\n");
      out.write("            }else if (!/^\\d+$/.test(teleno)) {\n");
      out.write("                alert(\"Please enter a valid Tele-No\");\n");
      out.write("                document.iForm.teleno.focus();\n");
      out.write("                return false;\n");
      out.write("            }\n");
      out.write("            else{\n");
      out.write("                document.iForm.submit();\n");
      out.write("            }\n");
      out.write("        }\n");
      out.write("    </script>\n");
      out.write("</html>\n");
    } catch (Throwable t) {
      if (!(t instanceof SkipPageException)){
        out = _jspx_out;
        if (out != null && out.getBufferSize() != 0)
          out.clearBuffer();
        if (_jspx_page_context != null) _jspx_page_context.handlePageException(t);
        else throw new ServletException(t);
      }
    } finally {
      _jspxFactory.releasePageContext(_jspx_page_context);
    }
  }
}
