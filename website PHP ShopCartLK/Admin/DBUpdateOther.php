

<?php 

// Connect to DB
$db = mysql_connect('localhost','root') or die('Error');

// Select DB
mysql_select_db('ShopCartLK',$db);

$iid= $_POST['txtIID'];
$category= $_POST['txtCategory'];
$iname= $_POST['txtIName'];
$img= $_POST['txtImage'];
$img2= $_POST['txtImage2'];
$price= $_POST['txtPrice'];
$desc= $_POST['txtDescription'];

if(isset($img,$img2))
 {
$query='UPDATE `item` SET `IName`="'.$iname.'",`Price`="'.$price.'",`Category`="'.$category.'",`IType`="Other",`Description`="'.$desc.'",`Image`="../Product_Images/'.$img.'",`Image2`="../Product_Images/'.$img2.'" WHERE `IID`="'.$iid.'"';
 }
	else
	{
	$query='UPDATE `item` SET `IName`="'.$iname.'",`Price`="'.$price.'",`Category`="'.$category.'",`IType`="Other",`Description`="'.$desc.'" WHERE `IID`="'.$iid.'"';
	}
			
			
mysql_query($query);
$rows = mysql_affected_rows();
if($rows > 0){
   echo "<script> alert('You are successfully updated Item details '); location.href='UpdateOther.php'; </script>";
}
else
{
  echo "<script> alert('Fail to Update Items details '); location.href='UpdateOther.php'; </script>";
}

?>