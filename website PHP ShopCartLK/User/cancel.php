<?php
session_start();
echo "<h1>Payment Canceled</h1>";
echo "You're now going back to ShopCartLK .
If you are not redirected within 10 seconds, <a href='index.php'>  click here. </a> ";

header('Refresh: 6;url=index.php');
?>