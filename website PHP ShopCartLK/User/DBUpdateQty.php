<?php session_start(); ?>

<?php 

include("DBConnect.php");

$un = $_SESSION['logged_user'];
$qty = $_POST['txtQuantity'];
$iid = $_POST["IID"];
$st = $_POST['UnitPrice'] * $_POST['txtQuantity'];

$query='UPDATE `cart` SET `Quantity`="'.$qty.'", `SubTotal`="'.$st.'" WHERE `IID`="'.$iid.'" AND `Username`="'.$un.'" ';

mysql_query($query);
$rows = mysql_affected_rows();
if($rows > 0){
      
     echo "<script> alert('You are successfully updated '); location.href='ViewCart.php'; </script>";
  
}
else
{
    echo "<script> alert('Fail to update '); location.href='ViewCart.php'; </script>";
}

?>
