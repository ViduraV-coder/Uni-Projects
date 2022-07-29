<!-- Session Check and Start -->
<?php
session_start();
if(isset($_SESSION['logged_admin'])){
}
else{
	header('Location: AdminLogin.php');
	}
?>
<!-- End -->

<!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="../css/stylesmenu.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../css/script.js"></script>
<title>Shop Cart LK</title>
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
           
			  <ul>
                 <li> <a href="Logout.php" > <font color="#5dd504"> Logout </font> </a> </li>
					<font color="#999d97"> | </font>
				<li><a href="index.php"><img src="../images/top_bullet2.png" alt="" /></a></li>
				</ul>
		  </div>
		<div class="clear"></div>
		  </div>
	<div class="header_bottom">
	   <div class="header_img">
	      
	   </div>
   <!-- MENU BAR -->
   <div id='cssmenu'>
<ul>
   <li><a href='index.php'><span>Home</span></a></li>
   <li class='active'><a href='#'><span>Manage Items</span></a>
      <ul>
        <li><a href='#'><span>Add Items</span></a>
             <ul> <li> <a href='AddElectronics.php'> <span>Electronics</span></a></li>
                  <li> <a href='AddVehicles.php'> <span>Vehicles</span></a></li>
                  <li> <a href='AddFurniture.php'> <span>Furniture </span></a></li>
                  <li> <a href='AddHomeAppliances.php'> <span>Home Appliances </span></a></li>
                  <li> <a href='AddOther.php'> <span>Other </span></a></li>
             </ul> </li>
         <li><a href='#'><span>Update Items</span></a>
         	 <ul> <li> <a href='UpdateElectronics.php'> <span>Electronics</span></a></li>
                  <li> <a href='UpdateVehicles.php'> <span>Vehicles</span></a></li>
                  <li> <a href='UpdateFurniture.php'> <span>Furniture </span></a></li>
                  <li> <a href='UpdateHomeAppliances.php'> <span>Home Appliances </span></a></li>
                  <li> <a href='UpdateOther.php'> <span>Other </span></a></li>
             </ul> </li>
         <li><a href='DeleteItems.php'><span>Delete Items</span></a></li>
         <li><a href='ViewItems.php'><span>View Items</span></a></li>
         </li>
      </ul>
   </li>
   <li><a href='ManageAccount.php'><span>Manage Account</span></a></li>
  <li class='active'><a href='#'><span>View</span></a>
  <ul>
   <li><a href='ViewPurchases.php'><span>View purchases</span></a></li>
  <li><a href='ViewCustomer.php'><span>View Customers</span></a></li>
  
  </ul>
  </li>
  
</ul>
</div>
<!-- MENU END -->
   </div>
   </div>
  <div class="main">
     <div class="main_top">
         <h2>WELCOME TO Shop Cart LK</h2>
       <div class="main_top_strip">
           <img src="../images/main_top_strip.png" alt="" />
       </div>
      <div class="clear"></div>
     </div>
 <div class="content_top">
     <div class="content_top_img">
          <img src="../images/content_top.jpg" alt="" />
     </div>
           <div class="content_top_data">
               <h3>Strategic Business Partner Of Shop Cart LK.</h3>
                <p>Shop Cart LK, a subsidiary of Shop Cart LK was incorporated on 19th April 2004 to operate as a   entity within the provisions of the  Companies Act No. 78 of 1988 as amended by Act No. 23 of 1991, which was subsequently replaced by the  Business Act No. 42 of 2011.

With an avowed mission to become the foremost  company in Sri Lanka, ShopCartLK  engages in the  capital goods, agricultural equipment and a variety of products marketed by ShopCartLK Sri Lanka, and of their own. </p>
           </div>
     <div class="clear"></div>
 </div>
   <div class="boxes">
      	
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

