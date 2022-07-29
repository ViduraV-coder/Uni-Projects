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
				<a href="index.html"><img src="../images/logo.png" alt="" /></a>
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
<?php
include("DBConnect.php");
// GENERATE IID
$queryGetIID = 'SELECT * FROM item';
$resultFrmIt = mysql_query($queryGetIID);

$IID = array();
$IID[0] = 0; // set first element to zero
$x = 1; // initialize array element selector

	while($recordsFrmIt=mysql_fetch_array($resultFrmIt)) 
	{
		$IID[$x] = $recordsFrmIt["IID"]; // assign value from IID to the x element of the array
		$x = $x + 1; // increase the array element selector
	}
	
	$newIID = max($IID) + 1; // add one to the maximum IID
	$_SESSION['IIDnew']=$newIID;
?>
	  	  </div>
		</div>
   <div class="main">
		<div class="main_top">
		 <h2>Add Home Appliances</h2>
		 <div class="main_top_strip">
		 <img src="../images/main_top_strip.png" alt="" /> <br> <br><br><br>
		 </div> 
		 <div class="clear"></div>
		 </div>
         
         <center> <form action="DBAddHomeAppliances.php" method="post">
		<table >
          <tr>
            <td><font  class="Fstyle">Item ID </font> </td> <td><input name="txtIID" type="text" required class="textbox" title="Type Item ID" value="<?php echo $newIID; ?>" readonly></td>
                </tr>
		 	<tr>
                	<td><font  class="Fstyle">Category </font></td> <td> <select class="select" name="txtCategory" title="Select Category">
                            <option value="Televisions" SELECTED>Televisions</option>
                            <option value="Refrigerator" >Refrigerator </option>
                            <option value="Rice Cookers" >Rice Cookers </option>
                            <option value="Sewing Machines" >Sewing Machines </option>
                            <option value="Kitchen Appliances" >Kitchen Appliances</option>
                            <option value="Gas burners & Ovens" >Gas burners & Ovens  </option>
                            <option value="OtherHome">Other</option>
                                                       
                        </select></td>
                </tr> 
                
                <tr>
                	<td><font  class="Fstyle">Item Name </font></td> <td> <input name="txtIName" type="text" required class="textbox" title="Type Item Name"></td>
                </tr>
                <tr>
                	<td><font  class="Fstyle">Image Front </font></td> <td> <input name="txtImage" type="file" required  title="Select Image"></td>
                </tr>
                 <tr>
                	<td><font  class="Fstyle">Image Back </font></td> <td> <input name="txtImage2" type="file" required  title="Select Image"></td>
                </tr>
                <tr>
                	<td><font class="Fstyle">Price </font> </td> <td><input name="txtPrice" type="text" required class="textbox" title="Enter Price"></td>
                </tr>
                <tr>
                	<td><font  class="Fstyle">Description </font> </td> <td><input name="txtDescription" type="text" required class="textbox" title="Type Description"></td>
                </tr>
                </table> <br> 		
          <input type="submit" value="Add Items"  class="Sbutton" title="Click here to Add Items"> 
         </form> </center><br>
         
	 		<div class="clear"></div>
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

