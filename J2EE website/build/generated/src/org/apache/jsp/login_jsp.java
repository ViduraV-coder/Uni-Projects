package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;

public final class login_jsp extends org.apache.jasper.runtime.HttpJspBase
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
      out.write("        <title>Login Form</title>\n");
      out.write("        <link rel=\"stylesheet\" href=\"./ScriptsCss/style.css\">\n");
      out.write("        <script src=\"ScriptsCss/bootstrap.min.js\" type=\"text/javascript\"></script>\n");
      out.write("        <link href=\"ScriptsCss/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\"/>\n");
      out.write("        <link href=\"ScriptsCss/carousel.css\" rel=\"stylesheet\" type=\"text/css\"/>\n");
      out.write("        <link href=\"ScriptsCss/style5.css\" rel=\"stylesheet\" type=\"text/css\"/>\n");
      out.write("        <script type=\"text/javascript\">\n");
      out.write("\n");
      out.write("            function validate() {\n");
      out.write("                var email = document.myForm.email.value;\n");
      out.write("                if (email == \"\") {\n");
      out.write("                    alert(\"Please enter Email\");\n");
      out.write("                    document.myForm.email.focus();\n");
      out.write("                    return false;\n");
      out.write("                }\n");
      out.write("                if ((email.length < 5) || (email.length > 30)) {\n");
      out.write("                    alert(\"Email is of invalid length\");\n");
      out.write("                    document.myForm.email.focus();\n");
      out.write("                    return false;\n");
      out.write("                }\n");
      out.write("                var password = document.myForm.password.value;\n");
      out.write("                var illegalChar = /[\\W_]/;\n");
      out.write("                if (password == \"\") {\n");
      out.write("                    alert(\"Please enter Password\");\n");
      out.write("                    document.myForm.password.focus();\n");
      out.write("                    return false;\n");
      out.write("                } else if ((password.length < 6) || (password.length > 15)) {\n");
      out.write("                    alert(\"Password should be between 6 and 15 character\");\n");
      out.write("                    document.myForm.password.focus();\n");
      out.write("                    return false;\n");
      out.write("                } else if (illegalChar.test(password)) {\n");
      out.write("                    alert(\"Password contains illegal character\");\n");
      out.write("                    document.myForm.password.focus();\n");
      out.write("                    return false;\n");
      out.write("                }\n");
      out.write("                var isLoggedIn = \"");
      out.write((java.lang.String) org.apache.jasper.runtime.PageContextImpl.evaluateExpression("${isLoggedIn}", java.lang.String.class, (PageContext)_jspx_page_context, null));
      out.write("\";\n");
      out.write("                if (isLoggedIn === true)\n");
      out.write("                    window.location.href = \"welcome.jsp\";\n");
      out.write("            }\n");
      out.write("        </script>\n");
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
      out.write("        <div id=\"wrapper\" style=\"background-image: url(Images/little-fish-coffee-shops-kauai-hawaii.jpg);background-repeat:no-repeat;background-size: cover\">\n");
      out.write("\n");
      out.write("            ");

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
            
      out.write("\n");
      out.write("            <form action=\"Login\" method=\"post\" name=\"myForm\">\n");
      out.write("                <section>     \n");
      out.write("                    <div class=\"LoginBox\">\n");
      out.write("                        ");
      out.print(request.getAttribute("msg") != null ? request.getAttribute("msg") : "");
      out.write("\n");
      out.write("                        <img src=\"./Images/user-login-png-transparent-6.png\" class=\"person\" alt=\"\">\n");
      out.write("                        <h1>Login Here</h1>\n");
      out.write("                        <table>\n");
      out.write("                            <tr>\n");
      out.write("                                <td style=\"color: purple; font-size: 18px; font-family: sans-serif; font-weight: bold; text-align: right;\">E-mail :</td>\n");
      out.write("                                <td><input type=\"email\" name=\"email\" placeholder=\"Enter Email\" required=\"\"></td>\n");
      out.write("                            </tr> \n");
      out.write("                            <tr>\n");
      out.write("                                <td style=\"color: purple; font-size: 18px; font-family: sans-serif; font-weight: bold; text-align: right;\">Password :</td>\n");
      out.write("                                <td><input type=\"password\" name=\"password\" placeholder=\"Enter Password\" required=\"\"></td>\n");
      out.write("                            </tr>\n");
      out.write("                            <tr>\n");
      out.write("                                <td><br></td>\n");
      out.write("                            </tr>\n");
      out.write("                            <tr>\n");
      out.write("                                <td></td>\n");
      out.write("                            </tr>\n");
      out.write("                            <tr>\n");
      out.write("                                <td>&nbsp;</td>\n");
      out.write("                                <td><input type=\"checkbox\" name=\"remember\">Remember Me</td>\n");
      out.write("                            </tr>\n");
      out.write("                            <tr>\n");
      out.write("                                <td>&nbsp;</td>\n");
      out.write("                                <td colspan=\"2\" style=\"text-align: center\"><button type=\"submit\" name=\"action\" onclick=\"return validate();\" value=\"login\" class=\"btn\">LOGIN</button></td>\n");
      out.write("                            </tr>\n");
      out.write("                        </table>\n");
      out.write("                    </div>\n");
      out.write("                </section>\n");
      out.write("            </form>\n");
      out.write("        </div>\n");
      out.write("    </body>\n");
      out.write("</html>");
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
