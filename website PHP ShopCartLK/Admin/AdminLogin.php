
<!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="../css/stylesmenu.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../css/script.js"></script>
<title>Shop Cart LK </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
<div class="wrap">
	<div class="wrapper">
	   <div class="header">
		   <div class="header_top">
			   <div class="logo">
				<a href="#"><img src="../images/logo.png" alt="" /></a>
			   </div>
		   <div class="header_top_list">
           
			<!--   <ul>
              
				  <li><a href="contact.html"><img src="images/top_bullet1.png" alt="" /></a></li>
				<li><a href="#"><img src="images/top_bullet2.png" alt="" /></a></li>
			  </ul> -->
		  </div>
		<div class="clear"></div>
		  </div>
	<div class="header_bottom">
	   <div class="header_img">
	      
	   </div>
   <!-- MENU BAR -->
   <div id='cssmenu'>
<ul>
  <!--  
  
   <li><a href='services.php'><span>Services</span></a></li>
   <li class='last'><a href='about.php'><span>About Us</span></a></li>
   <li class='last'><a href='contact.php'><span>Contact</span></a></li> -->
</ul>
</div>
<!-- MENU END -->
   </div>
   </div> <br> <br>
   
   
 <div class="main">
     <div class="main_top">
          <h2><center> <h3>Admin Login &nbsp; &nbsp;<img src="../images/main_top_strip.png" alt="" /> </h3><br>
            <form action="DBAdminLogin.php" method="post">
               

             <font class="Fstyle">  Username </font> <input name="txtUsername"  type="text" required class="textbox2" title="Type your username"><br><br>
               <font class="Fstyle"> Password </font> <input name="txtPassword" type="password" required class="textbox2" title="Type your password"><br>
                
                <font color="#FF0000">
		              <?php 
		 			    if(isset($_GET['msg']))
         				echo '<br>'. $_GET['msg']; 
		 			   ?> </font>
                
                <center><font color="#e88113"> </font></center><br>
                <center> <input type="submit" value="Login" class="Sbutton" title="Click here to login to the system">				  				<center><br>

            </form> </center></h2>
       
      <div class="clear"> </div>
     </div>
       
  </div>
     <div class="footer">
         <div class="copy_right">
	        <p>© 2017 rights Reseverd </p>
	     </div>
      </div>
</div>
</div>
</body>
</html>
  