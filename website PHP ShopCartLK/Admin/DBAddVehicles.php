
<?php 
session_start();

// Connect to DB
$db = mysql_connect('localhost','root') or die('Error');

// Select DB
mysql_select_db('ShopCartLK',$db);

$newIID= $_SESSION['IIDnew'];
$producer = $_SESSION['logged_admin'];
$category= $_POST['txtCategory'];
$iname= $_POST['txtIName'];
$img= $_POST['txtImage'];
$img2= $_POST['txtImage2'];
$price= $_POST['txtPrice'];
$desc= $_POST['txtDescription'];
	
	$query = 'INSERT INTO `item`(`IID`, `Username`,`IName`, `Price`, `Category`, `IType`, `Description`, `Image`, `Image2`) VALUES ("'.$newIID.'","'.$producer.'","'.$iname.'","'.$price.'","'.$category.'","Vehicles","'.$desc.'","../Product_Images/'.$img.'","../Product_Images/'.$img2.'")';
	
				
			mysql_query($query) or die(mysql_error());
			$rows = mysql_affected_rows();
			if($rows > 0)
				echo "<script> alert('You are successfully Added '); location.href='AddVehicles.php'; </script>";
				
			else
			{
				echo "<script> alert('Fail to Add '); location.href='AddVehicles.php'; </script>";
			}


?>