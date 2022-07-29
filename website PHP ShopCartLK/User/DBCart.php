<?php
session_start();
?>

<?php 

include("DBConnect.php");

$un = $_SESSION['logged_user'];
$iid = $_POST['IID'];
$iname = $_POST['IName'];
$cat = $_POST['Category'];
$qty = $_POST['txtQuantity'];
$up = $_POST['UnitPrice'];
$st = $_POST['UnitPrice'] * $_POST['txtQuantity'];
	

$query = 'INSERT INTO `cart`(`Username`, `IID`, `IName` , `Category`, `Quantity`, `UnitPrice`, `SubTotal`) VALUES ("'.$un.'","'.$iid.'","'.$iname.'","'.$cat.'","'.$qty.'","'.$up.'","'.$st.'")';
			
			mysql_query($query); //or die(mysql_error());
			$rows = mysql_affected_rows();
			if($rows > 0){
			
	echo "<script> alert('Item added successfully '); location.href='index.php'; </script>";
			}
			else
			{
				echo "<script> alert('Item already exists in the cart'); location.href='index.php'; </script>";
			}	

?>