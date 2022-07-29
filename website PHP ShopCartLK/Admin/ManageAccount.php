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
	  	  </div>
		</div>
   <div class="main">
		<div class="main_top">
		 <h2>Edit My Details</h2>
		 <div class="main_top_strip">
		 <img src="../images/main_top_strip.png" alt="" /> <br> <br><br><br>
		 </div> 
		 <div class="clear"></div>
		 </div>
         
         <?php

	include('DBConnect.php');

	  
	$query = 'select * from user where Username="'.$_SESSION['logged_admin'].'"';
	
	 
$result = mysql_query($query);

while($row = mysql_fetch_array($result))

 {
$fname= $row['FName'];

$lname= $row['LName'];

$nic= $row['NIC'];

$gen= $row['Gender'];

$add= $row['Address'];

$tp= $row['Telephone'];

$email= $row['Email'];

$un= $row['Username'];

$pw= $row['Password'];

}

mysql_close($db);


?>
         
         <center> <form action="DBUpdateAdmin.php" method="post">
		 <table >
              	<tr>
                	<td>
                	<font class="Fstyle">	First Name </font>
                     </td>
                     <td> <input name="txtFname" type="text" required class="textbox" title="Type your first name" placeholder="Enter your first name"  value='<?php echo $fname; ?>'>			
                	</td>
                </tr>
                <tr>
                	<td> <font class="Fstyle"> Last Name </font> </td>
                     <td><input name="txtLname" type="txt" required class="textbox" title="Type your last name" placeholder="Enter your last name"  value='<?php echo $lname; ?>'></td>
                </tr>
		        <tr>
                	<td> <font class="Fstyle">NIC </font></td>
                     <td> <input name="txtNIC" type="text" required class="textbox" title="Type your NIC No" placeholder="Enter your NIC"  value='<?php echo $nic; ?>'></td>
                </tr>
               <tr>
                	<td><font class="Fstyle"> Gender </font></td>
                     <td> <select name="txtGender" class="select" title="Type your gender">
                <option value="Male"  <?php echo ($gen == 'Male') ? 'selected="selected"': ''; ?>>Male </option>
                <option value="Female"  <?php echo ($gen == 'Female') ? 'selected="selected"': ''; ?>>Female </option> </select></td>
                </tr>
                <tr>
                	<td><font class="Fstyle"> Address </font> </td>
                     <td><input name="txtAddress" type="text" required class="textbox" title="Type your Address" placeholder="Enter your address"  value='<?php echo $add; ?>'></td>
                </tr>
                <tr>
                	<td><font class="Fstyle">Telephone </font></td>
                     <td> <input name="txtTelephone" type="text" required class="textbox" title="Type your Telephone" placeholder="Enter your contact no."  value='<?php echo $tp; ?>'></td>
                </tr>
				<tr>
                	<td> <font class="Fstyle">Email </font></td>
                     <td> <input name="txtEmail" type="text" required class="textbox" title="Type your email" placeholder="Enter your email"  value='<?php echo $email; ?>'></td>
                </tr>
                <tr>
                	<td><font class="Fstyle">Username</font> </td>
                     <td><input name="txtUsername" type="text" required class="textbox" title="you cant change your username" value='<?php echo $un; ?>' readonly>
                     </td>
                </tr>
                <tr>
                	<td><font class="Fstyle">Password </font></td>
                     <td><input name="txtPassword" type="password" required class="textbox" title="Type your password" placeholder="Enter your password"  value='<?php echo $pw; ?>'></td>
                </tr>
                 
             </table> <br> 		
         <center> <input type="submit" value="Change" class="Sbutton" title="Click here to Change"> <center>
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

