<?php
session_start();
?>

<?php
include("DBConnect.php"); 


$un = $_POST['txtUsername'];
$pw = $_POST['txtPassword'];

 
$query = 'SELECT * FROM user WHERE Username = "'.$un.'" AND Password="'.$pw.'" AND Type="User"';

     mysql_query($query) or die(mysql_error());
			$rows = mysql_affected_rows();
			$details = mysql_query($query);


  if ($rows == 1)
    {	
		
		while($detailRows=mysql_fetch_array($details))
			{
				$_SESSION['CusName'] = $detailRows["FName"];
			}
		
		$_SESSION['logged_user']=$un; 
        header ('Location: index.php');
		
    }
	
	else
	{
         $msg = "Login Failed, Invalid Username or Password!!!";
         header("Location:Login.php?msg=$msg");

  }
	 

?>
