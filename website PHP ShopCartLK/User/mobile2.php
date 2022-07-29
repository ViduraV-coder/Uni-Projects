<!DOCTYPE html>
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
	<div class="span6">Welcome !</div>
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
		<form class="form-inline navbar-search" method="post" action="DVD2.php" >
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

	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
	
	  </div> 
</div>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
   
	  <ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a> ELECTRONICS </a>
				<ul>
				<li><a class="active" href="DVD2.php"><i class="icon-chevron-right"></i>DVD Players </a></li>
				<li><a href="audio2.php"><i class="icon-chevron-right"></i>Audio Equipments </a></li>
				<li><a href="mobile2.php"><i class="icon-chevron-right"></i>Mobile Phone </a></li>
				<li><a href="printer2.php"><i class="icon-chevron-right"></i>Printers & Scanners</a></li>
                <li><a href="camera2.php"><i class="icon-chevron-right"></i>Digital Camera & Camcorders</a></li>
                <li><a href="homeTh2.php"><i class="icon-chevron-right"></i>Home Theater Systems</a></li>
                <li><a href="computer2.php"><i class="icon-chevron-right"></i>Computer & Notebook</a></li>
				</ul>
			</li>
			<li class="subMenu"><a> VEHICLES</a>
			<ul style="display:none">
				<li><a href="car2.php"><i class="icon-chevron-right"></i>Car</a></li>
				<li><a href="van2.php"><i class="icon-chevron-right"></i>Van</a></li>												
				<li><a href="bus2.php"><i class="icon-chevron-right"></i>Bus</a></li>	
				<li><a href="threeWheel2.php"><i class="icon-chevron-right"></i>ThreeWheel </a></li>
				<li><a href="bike2.php"><i class="icon-chevron-right"></i>Motor Bike</a></li>												
				<li><a href="other2.php"><i class="icon-chevron-right"></i>Other</a></li>												
														
			</ul>
			</li>
			<li class="subMenu"><a>FURNITURE</a>
				<ul style="display:none">
				<li><a href="sofas2.php"><i class="icon-chevron-right"></i>Sofas</a></li>
				<li><a href="dining2.php"><i class="icon-chevron-right"></i>Dining Set</a></li>												
				<li><a href="bed2.php"><i class="icon-chevron-right"></i>Bedroom Suits</a></li>	
				<li><a href="mattress2.php"><i class="icon-chevron-right"></i>Mattress</a></li>
				<li><a href="wardrobes2.php"><i class="icon-chevron-right"></i>Wardrobes</a></li>												
				<li><a href="otherFur2.php"><i class="icon-chevron-right"></i>Other Furniture</a></li>												
																
			</ul>
			</li>
            <li class="subMenu"><a>HOME APPLIENCES</a>
				<ul style="display:none">
			<li><a href="TV2.php"><i class="icon-chevron-right"></i>Televisions</a></li>
            <li><a href="refrigator2.php"><i class="icon-chevron-right"></i>Refrigators</a></li>
            <li><a href="rice2.php"><i class="icon-chevron-right"></i>Rice Cookers</a></li>
            <li><a href="sewing2.php"><i class="icon-chevron-right"></i>Sewing Machines</a></li>
            <li><a href="kitchen2.php"><i class="icon-chevron-right"></i>Kitchen Appliances</a></li>
            <li><a href="gas2.php"><i class="icon-chevron-right"></i>Gas burners & Ovens </a></li>
            <li><a href="otherHome2.php"><i class="icon-chevron-right"></i>Other</a></li>
            </ul> </li>
            
			 <li class="subMenu"><a>OTHER</a>
				<ul style="display:none">
			<li><a href="Geni2.php"><i class="icon-chevron-right"></i>Generators</a></li>
            <li><a href="water2.php"><i class="icon-chevron-right"></i>Water Pumps</a></li>
            <li><a href="fitness2.php"><i class="icon-chevron-right"></i>Fitness Equipment</a></li>
            <li><a href="agro2.php"><i class="icon-chevron-right"></i>Agro Products</a></li>
           
            </ul> </li>
		</ul>
		<br/>
		  
			
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
		<div class="span9">
		<h4>Our Products </h4>
			  <ul class="thumbnails">
				
				
                  <?php
				  
				  include("DBConnect.php");
	
	$query="SELECT * FROM `item` WHERE `Category`='Mobile Phones' ";
	
	$result = mysql_query($query);
	
	{
		while($row=mysql_fetch_array($result))
		
		{
			?>
            <li class="span3">
				  <div class="thumbnail">
            <form method="post" action="login.php">
			
            <input type="hidden" name="IID" value="<?php echo $row["IID"]; ?>">
            <input type="hidden" name="Username" value="<?php echo $row["Username"]; ?>">
            <input type="hidden" name="Category" value="<?php echo $row["Category"]; ?>">
            <input type="hidden" name="UnitPrice" value="<?php echo $row["Price"]; ?>">
			<input type="hidden" name="IName" value="<?php echo $row["IName"]; ?>">
           <center> <img src="<?php echo $row["Image"]; ?>"> </center>
			
					<div class="caption">
                    
					  <h5><?php echo $row["IName"]; ?></h5>
					  <p> 
						<strong><?php echo $row["Description"]; ?></strong>
					  </p>
                      
					   <h4 style="text-align:center"> 
                       <INPUT TYPE="submit" VALUE="View" onclick="form.action='product_details2.php';" title="Details" class="btn">
                        <input type="submit" value="Add to cart" class="btn" />
                        <a class="btn btn-primary" ><?php echo "Rs.".$row["Price"]; ?></a></h4>
					</div>
                    <div><input type="hidden" name="txtQuantity" value="1" size="2" id="shopping-cart" />
           
           
			</form>
				  </div>
				</li>
				<?php
			}
	}

	?>
			  </ul>	

		</div>
		</div>
	</div>
</div>
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
				<a href="facebook.com"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="twitter.com"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="youtube.com"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
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