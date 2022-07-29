<?php session_start(); ?>

<?php 
include("DBConnect.php");

$iid = $_POST["IID"];
$un = $_SESSION['logged_user'];

$query = 'DELETE FROM `cart` WHERE `IID`="'.$iid.'" AND `Username`="'.$un.'" ';
mysql_query($query);
$rows = mysql_affected_rows();
			
			if($rows > 0)
				 echo "<script> alert('You are successfully deleted the item '); location.href='ViewCart.php'; </script>";
			else
			{
				echo "<script> alert('Fail to delete the item '); location.href='ViewCart.php'; </script>";
			}

?>
