
<?php 

// Connect to DB
$db = mysql_connect('localhost','root') or die('Error');

// Select DB
mysql_select_db('ShopCartLK',$db);

$fname = $_POST['txtFname'];
$lname = $_POST['txtLname'];
$nic = $_POST['txtNIC'];
$gender = $_POST['txtGender'];
$address = $_POST['txtAddress'];
$tp = $_POST['txtTelephone'];
$email = $_POST['txtEmail'];
$un = $_POST['txtUsername'];
$pw = $_POST['txtPassword'];

$query='UPDATE `user` SET `FName`="'.$fname.'",`LName`="'.$lname.'",`NIC`="'.$nic.'",`Gender`="'.$gender.'",`Address`="'.$address.'",`Telephone`="'.$tp.'",`Email`="'.$email.'", `Password`="'.$pw.'" WHERE `Username`="'.$un.'" ';


mysql_query($query);
$rows = mysql_affected_rows();
if($rows > 0){
 echo "<script> alert('You are successfully updated admin details '); location.href='ManageAccount.php'; </script>";
}

else
{
  echo "<script> alert('Fail to update admin details '); location.href='ManageAccount.php'; </script>";
}
?>