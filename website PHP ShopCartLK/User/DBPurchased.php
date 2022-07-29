<?php session_start();?>

<?php

include("DBConnect.php");

// GENERATE PID
$queryGetPID = 'SELECT * FROM purchases';
$resultFrmPurchases = mysql_query($queryGetPID);

$PID = array();
$PID[0] = 0; // set first element to zero
$x = 1; // initialize array element selector

	while($recordsFrmPurchases=mysql_fetch_array($resultFrmPurchases)) 
	{
		$PID[$x] = $recordsFrmPurchases["PID"]; // assign value from PID to the x element of the array
		$x = $x + 1; // increase the array element selector
	}
	
	$newPID = max($PID) + 1; // add one to the maximum PID
	$_SESSION['PIDnew']=$newPID;
	
	
//Get records from cart
$querySelectFrmCart = 'select * from cart where Username="'.$_SESSION['logged_user'].'"';
	
	 
$resultFrmCart = mysql_query($querySelectFrmCart);


		
		while($rowsFrmCart=mysql_fetch_array($resultFrmCart))	
   {
	  
	   			//Get records from Cart
				
				$iid = $rowsFrmCart["IID"]; 
				$qty = $rowsFrmCart["Quantity"]; 
                $up = $rowsFrmCart["UnitPrice"];
                $st = $rowsFrmCart["SubTotal"];
				$iname = $rowsFrmCart["IName"];
                $cat = $rowsFrmCart["Category"]; 
				$Pun = $rowsFrmCart['PUsername'];
				
				$Username = $_SESSION['logged_user'];
				$crdz = $_POST['txtCredit'];
				$date = date("l, d F, Y");
				
				//Send records to the Purchase Table

				$queryInsertToPurchases = 'INSERT INTO `purchases`(`PID`,`IID`,`IName`,`PUsername`,`Category`, `Username`, `Quantity`, `UnitPrice`, `Total`,`PDate`,`CreditNo`) VALUES ("'.$newPID.'","'.$iid.'","'.$iname.'","'.$Pun.'","'.$cat.'","'.$Username.'","'.$qty.'","'.$up.'","'.$st.'","'.$date.'","'.$crdz.'")';

				mysql_query($queryInsertToPurchases) or die(mysql_error());


	          	} 
				$rows = mysql_affected_rows();
			if($rows > 0){
			
			header('Location:index.php');
				
			}
			else
			{
				echo "<script> alert('Fail to purchase'); location.href='Purchased.php'; </script>";
			}	
?>



<?php
// Delete All from Cart

$un = $_SESSION['logged_user'];

$query = 'DELETE FROM `cart` WHERE `Username`="'.$un.'" ';
mysql_query($query);
$rows = mysql_affected_rows();
			

?>

