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
		 <h2>Update Furniture</h2>
		 <div class="main_top_strip">
		 <img src="../images/main_top_strip.png" alt="" /> <br> <br><br><br>
		 </div> 
		 <div class="clear"></div>
		 </div>
         <center>
         <form action="UpdateFurniture.php" method="post"> 
            
            <table>
                
                <TR>
                <TD ALIGN=CENTER> <font class="Fstyle">Item ID </font> </TD>
                <TD> <select name="txtIID" class="select" title="Select Item ID" >
              
                <?php
                    include('DBConnect.php');
            $sql=mysql_query('select IID from item where IType="Furnitures" && Username="'.$_SESSION['logged_admin'].'"');
                    while($row=mysql_fetch_array($sql))
                    {
                    $iid=$row['IID'];
                    
                    echo '<option value="'.$iid.'" selected> '.$iid.' </option>';
                     }
                ?>
        </select></TD>
                <TD ALIGN=CENTER><INPUT TYPE="submit" class="Sbutton" VALUE="Find" title="Search Item Details"> </TD>
                </TR>
 
            </table> </center>
        </form> <br> <br>
        
         <?php

// Connect to DB
$db = mysql_connect('localhost','root') or die('Error');

// Select DB
mysql_select_db('ShopCartLK',$db);

if(isset($_POST['txtIID']))
	  $id=$_POST['txtIID'];
	  
	$query = 'Select * from item';
	if(isset ($id))
	$query .=' where IID="'.$id.'"';
	
	 
$result = mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$iid= $row['IID'];

$category= $row['Category'];

$iname= $row['IName'];

$img= $row['Image'];

$img2= $row['Image2'];

$price= $row['Price'];

$desc= $row['Description'];
}

mysql_close($db);

?> 
         <center> <form action="DBUpdateFurniture.php" method="post">
		<table >
          <tr>
            <td><font class="Fstyle">Item ID </font> </td> <td><input class="textbox" name="txtIID" type="text" value='<?php echo $iid; ?>' readonly></td>
                </tr>
		 	<tr>
                	<td><font class="Fstyle">Category </font></td> <td> <select name="txtCategory" class="select" >
               <option value="Sofas" <?php echo ($category == "Sofas") ? 'selected="selected"': ''; ?>>Sofas</option>
               <option value="Dining Set" <?php echo ($category == "Dining Set") ? 'selected="selected"': ''; ?>>Dining Set </option>
               <option value="Bedroom Suits" <?php echo ($category == "Bedroom Suits") ? 'selected="selected"': ''; ?>>Bedroom Suits</option>
               <option value="Mattress" <?php echo ($category == "Mattress") ? 'selected="selected"': ''; ?>>Mattress </option>
               <option value="Wardrobes" <?php echo ($category == "Wardrobes") ? 'selected="selected"': ''; ?>>Wardrobes</option>
               <option value="Other Furniture" <?php echo ($category == "Other Furniture") ? 'selected="selected"': ''; ?>>Other Furniture </option>
               </select></td>
                </tr> 
                
                <tr>
                	<td><font class="Fstyle">Item Name </font></td> <td> <input name="txtIName" class="textbox" type="text" value='<?php echo $iname; ?>'></td>
                </tr>
                 <tr>
                	<td><font class="Fstyle">Image Front </font></td> <td> <input name="txtImage" type="file" value='<?php echo $img; ?>'></td>
                </tr>
                <tr>
                	<td><font class="Fstyle">Image Back </font></td> <td> <input name="txtImage2" type="file" value='<?php echo $img2; ?>'></td>
                </tr>
                <tr>
                	<td><font class="Fstyle">Price </font> </td> <td><input name="txtPrice" class="textbox" type="text" value='<?php echo $price; ?>'></td>
                </tr>
                <tr>
                	<td><font class="Fstyle">Description </font> </td> <td><input name="txtDescription" class="textbox" type="text" value='<?php echo $desc; ?>'></td>
                </tr>
                </table> <br> 		
         <center> <input type="submit" value="Update Items" class="Sbutton" title="Click here to Update Items"> <center>
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

