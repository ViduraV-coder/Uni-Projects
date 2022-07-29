<?php
session_start();
?>

<?php
 // Connect to DB
$db = mysql_connect('localhost','root') or die('Error');

// Select DB
mysql_select_db('ShopCartLK',$db);


$un = $_POST['txtUsername'];
$pw = $_POST['txtPassword'];
 
$query = 'SELECT * FROM user WHERE Username = "'.$un.'" AND Password = "'.$pw.'" ';

     mysql_query($query) or die(mysql_error());
			$rows = mysql_affected_rows();
			$details = mysql_query($query);


  if ($rows == 1)
    {
		while($detailRows=mysql_fetch_array($details))
			{
				$_SESSION['AdminName'] = $detailRows["FName"];
			}
			
		$_SESSION['logged_admin']=$un;
        header('Location: index.php');
    }
	
	else
	{
		 $msg = "Login Failed, Invalid Username or Password!!!";
            header("Location:AdminLogin.php?msg=$msg");
    }
?>

