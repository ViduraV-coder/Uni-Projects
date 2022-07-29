
<?php 

include("DBConnect.php");

$fname = $_POST['txtFname'];
$lname = $_POST['txtLname'];
$nic = $_POST['txtNIC'];
$gender = $_POST['txtGender'];
$address = $_POST['txtAddress'];
$tp = $_POST['txtTelephone'];
$email = $_POST['txtEmail'];
$un = $_POST['txtUsername'];
$pw = $_POST['txtPassword'];
	
	$query = 'INSERT INTO `user`(`FName`, `LName`, `NIC`, `Gender`, `Address`, `Telephone`, `Email`, `Username`, `Password`, `Type`) VALUES ("'.$fname.'","'.$lname.'","'.$nic.'","'.$gender.'","'.$address.'","'.$tp.'","'.$email.'","'.$un.'","'.$pw.'","User")';
			
			mysql_query($query);
			$rows = mysql_affected_rows();
			if($rows > 0)
				echo "<script> alert('You are successfully Registered '); location.href='login.php'; </script>";
								
			else
			{
				echo "<script> alert('Username already exist '); location.href='register.php'; </script>";
			}	
?>

