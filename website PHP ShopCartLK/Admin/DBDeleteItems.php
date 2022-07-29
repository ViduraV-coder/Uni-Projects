
<?php // Connect to DB
$db = mysql_connect('localhost','root') or die('Error');

// Select DB
mysql_select_db('ShopCartLK',$db);

$iid = $_POST["txtIID"];

$query = 'DELETE FROM `item` WHERE IID="'.$iid.'"';
mysql_query($query);
$rows = mysql_affected_rows();
			if($rows > 0)
			{
		echo "<script> alert('You are successfully deleted items detail '); location.href='DeleteItems.php'; </script>";
			}
			else
			{
		echo "<script> alert('Fail to Delete Items detail '); location.href='DeleteItems.php'; </script>";
			}

?>