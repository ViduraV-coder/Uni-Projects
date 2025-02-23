﻿<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Shop Cart LK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!</div>
	<div class="span6"></div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="../index.html"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" method="post" action="products.php" >
		  <select class="srchTxt">
			<option>All</option>
			<option>ELECTRONICS </option>
			<option>VEHICLES </option>
			<option>FURNITURES </option>
			<option>HOME APPLIENCES </option>
			<option>OTHER </option>
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-left">
     <li class="">&nbsp;&nbsp;&nbsp;&nbsp;</li>
	 <li class=""><a href="../index.html">HOME</a></li>
	 <li class=""><a href="../About Us.html">ABOUT US</a></li>
	 <li class=""><a href="../contact.html">CONTACT</a></li>
   
	 <li class="">
      <a href="login.php"  style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
	</li><li class="">&nbsp;&nbsp;&nbsp;&nbsp;</li>
     <li class=""><a href="register.php"  style="padding-right:0"><span class="btn btn-large btn-success">Register</span></a></li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a> ELECTRONICS </a>
				<ul>
				<li><a class="active" href="DVD2.php"><i class="icon-chevron-right"></i>DVD Players </a></li>
				<li><a href="../audio2.php"><i class="icon-chevron-right"></i>Audio Equipments </a></li>
				<li><a href="../mobile2.php"><i class="icon-chevron-right"></i>Mobile Phone </a></li>
				<li><a href="../printer2.php"><i class="icon-chevron-right"></i>Printers & Scanners</a></li>
                <li><a href="../camera2.php"><i class="icon-chevron-right"></i>Digital Camera & Camcorders</a></li>
                <li><a href="../homeTh2.php"><i class="icon-chevron-right"></i>Home Theater Systems</a></li>
                <li><a href="../computer2.php"><i class="icon-chevron-right"></i>Computer & Notebook</a></li>
				</ul>
			</li>
			<li class="subMenu"><a> VEHICLES</a>
			<ul style="display:none">
				<li><a href="../car2.php"><i class="icon-chevron-right"></i>Car</a></li>
				<li><a href="../van2.php"><i class="icon-chevron-right"></i>Van</a></li>												
				<li><a href="../bus2.php"><i class="icon-chevron-right"></i>Bus</a></li>	
				<li><a href="../threeWheel2.php"><i class="icon-chevron-right"></i>ThreeWheel </a></li>
				<li><a href="../bike2.php"><i class="icon-chevron-right"></i>Motor Bike</a></li>												
				<li><a href="../other2.php"><i class="icon-chevron-right"></i>Other</a></li>												
														
			</ul>
			</li>
			<li class="subMenu"><a>FURNITURE</a>
				<ul style="display:none">
				<li><a href="../sofas2.php"><i class="icon-chevron-right"></i>Sofas</a></li>
				<li><a href="../dining2.php"><i class="icon-chevron-right"></i>Dining Set</a></li>												
				<li><a href="../bed2.php"><i class="icon-chevron-right"></i>Bedroom Suits</a></li>	
				<li><a href="../mattress2.php"><i class="icon-chevron-right"></i>Mattress</a></li>
				<li><a href="../wardrobes2.php"><i class="icon-chevron-right"></i>Wardrobes</a></li>												
				<li><a href="../otherFur2.php"><i class="icon-chevron-right"></i>Other Furniture</a></li>												
																
			</ul>
			</li>
            <li class="subMenu"><a>HOME APPLIENCES</a>
				<ul style="display:none">
			<li><a href="../TV2.php"><i class="icon-chevron-right"></i>Televisions</a></li>
            <li><a href="../refrigator2.php"><i class="icon-chevron-right"></i>Refrigators</a></li>
            <li><a href="../rice2.php"><i class="icon-chevron-right"></i>Rice Cookers</a></li>
            <li><a href="../sewing2.php"><i class="icon-chevron-right"></i>Sewing Machines</a></li>
            <li><a href="../kitchen2.php"><i class="icon-chevron-right"></i>Kitchen Appliances</a></li>
            <li><a href="../gas2.php"><i class="icon-chevron-right"></i>Gas burners & Ovens </a></li>
            <li><a href="../otherHome2.php"><i class="icon-chevron-right"></i>Other</a></li>
            </ul> </li>
            
			 <li class="subMenu"><a>OTHER</a>
				<ul style="display:none">
			<li><a href="../Geni2.php"><i class="icon-chevron-right"></i>Generators</a></li>
            <li><a href="../water2.php"><i class="icon-chevron-right"></i>Water Pumps</a></li>
            <li><a href="../fitness2.php"><i class="icon-chevron-right"></i>Fitness Equipment</a></li>
            <li><a href="../agro2.php"><i class="icon-chevron-right"></i>Agro Products</a></li>
           </ul></li>
            </ul>
		<br/>
		  <div class="thumbnail">
			<img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>Panasonic</h5>
				<h4 style="text-align:center"> <a class="btn" href="login.php">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" >Rs.222.00</a></h4>
			</div>
		  </div><br/>
			<div class="thumbnail">
				<img src="themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
				<div class="caption">
				  <h5>Kindle</h5>
				    <h4 style="text-align:center"> <a class="btn" href="login.php">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" >Rs.222.00</a></h4>
				</div>
			  </div><br/>
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="../index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>	
	<div class="well">
	<!--
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	 <div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div> -->
	
		<h4>Your personal information</h4>
		<div class="control-group">
		 <form action="DBRegister.php" method="post">
              <table >
              	<tr>
                	<td>
                	<font class="Fstyle">	First Name </font>
                     </td>
                     <td> <input name="txtFname" type="text" required class="textbox" title="Type your first name" placeholder="Enter your first name">			
                	</td>
                </tr><br>
                
                <tr>
                	<td> <font class="Fstyle"> Last Name </font> </td>
                     <td><input name="txtLname" type="text" required class="textbox" title="Type your last name" placeholder="Enter your last name"></td>
                </tr>
		        <tr>
                	<td> <font class="Fstyle"> NIC </font></td>
                     <td> <input name="txtNIC" type="text" required class="textbox" maxlength="10" title="Type your NIC No" placeholder="Enter your NIC"></td>
                </tr>
               <tr>
                	<td> <font class="Fstyle"> Gender </font></td>
                     <td> <select name="txtGender" class="select" title="Type your gender">
                <option value="Male" >Male </option>
                <option value="Female" >Female </option> </select></td>
                </tr>
                <tr>
                	<td><font class="Fstyle"> Address </font> </td>
                     <td><input name="txtAddress" type="text"  required class="textbox" title="Type your Address" placeholder="Enter your address"></td>
                </tr>
                <tr>
                	<td><font class="Fstyle"> Telephone </font></td>
                     <td> <input name="txtTelephone" type="text" required class="textbox" title="Type your Telephone" placeholder="Enter your contact no."></td>
                </tr>
				<tr>
                	<td><font class="Fstyle"> Email </font></td>
                     <td> <input name="txtEmail" type="email" required class="textbox" title="Type your email" placeholder="Enter your email"></td>
                </tr>
                <tr>
                	<td><font class="Fstyle"> Username </font> </td>
                     <td><input name="txtUsername" type="text" required class="textbox" title="Type your username" placeholder="Enter your username"></td>
                </tr>
                <tr>
                	<td> <font class="Fstyle"> Password </font></td>
                     <td><input name="txtPassword" type="password" required class="textbox" title="Type your password" placeholder="Enter your password"></td>
                </tr>
             </table>
	<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-large btn-success" type="submit" value="Register" title="Click here to register" />

	</form>
</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="../index.html">HOME</a>  
				<a href="register.php">REGISTER</a>  
				<a href="../About Us.html">ABOUT US</a>  
				<a href="../contact.html">CONTACT</a> 
				
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
		
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
	<div id="themeContainer">
	<div id="hideme" class="themeTitle">Style Selector</div>
	<div class="themeName">Oregional Skin</div>
	<div class="images style">
	<a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
	<a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
	</div>
	<div class="themeName">Bootswatch Skins (11)</div>
	<div class="images style">
		<a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
		<a href="themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	
		<a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
	</div>
	<div class="themeName">Background Patterns </div>
	<div class="images patterns">
		<a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
		<a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>
		
		<a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>
		
		<a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>
		 
	</div>
	</div>
</div>
<span id="themesBtn"></span>
</body>
</html>