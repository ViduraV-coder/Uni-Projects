<!-- Session Check and Start -->
<?php
session_start();
if(isset($_SESSION['logged_user'])){
}
else{
	header('Location: login.php');
	}
?>
<!-- End -->

<!--View Cart count -->
<?php 

include ("DBConnect.php");
// GENERATE CART COUNT
$queryGet = 'SELECT * FROM cart WHERE Username="'.$_SESSION['logged_user'].'"';

$resultFrm = mysql_query($queryGet);

$x = 0;

	while($recordsFrm=mysql_fetch_array($resultFrm)) 
	{
		$x = $x + 1;
	}
	
	
?>
<!-- End -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Shop Cart LK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome <strong> <?php echo $_SESSION['CusName'];?> </strong>!</div>
	<div class="span6"></div>
    <div class="pull-right">
<a href="ViewCart.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ <?php echo $x; ?> ] Itemes in your cart </span> </a></div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
		
    <ul id="topMenu" class="nav pull-left">
	 <li class="">&nbsp;&nbsp;&nbsp;&nbsp;</li>
	 <li class=""><a href="index.php">HOME</a></li>
     <li class=""><a href="privacy.php">PRIVACY POLICY</a></li>
     <li class=""><a href="faqs.php">FAQs</a></li>
     <li class=""><a href="agrement.php">USER AGREEMENT</a></li>
	 <li class=""><a href="About Us.php">ABOUT US</a></li>
	 <li class=""><a href="contact.php">CONTACT</a></li>
     <li class=""><a href="account.php">MY ACCOUNT</a></li>
	 <li class="">
      <a href="Logout.php"  style="padding-right:0"><span class="btn btn-large btn-success">Logout</span></a>
	
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
<div class="container">
	<hr class="soften">
	<h1>FAQs </h1>
	<hr class="soften"/>
	<div class="row">
		
		<h4>1. How do I select items to purchase?</h4>
		<p>	
As you browse through the ShopCart Online Store, click on the "add to shopping cart" button beneath the items that you wish to purchase.

			
			
		</p>		
		<h4>2. How do I know what is in my shopping cart?</h4>
        <p> 
When browsing through ShopCart, simply look to the right-side of the screen to see which items you have in your shopping cart.  Use the arrows to move between items in your cart.</p>
        
        <h4>3. How do I remove an item from my shopping cart?</h4>
        <p> 
Click the "remove" check box and click "modify cart" to remove that item from your cart. You may also change the quantity of items to "0" (zero) to remove the item from your shopping cart.</p>
			
            <h4>4. How do I modify the quantity of a product in my shopping cart? </h4>
		
<p>
Click on "view shopping cart" to see an itemized list of the products in your shopping cart. Change the quantity of the item and click "modify cart" to update the contents of your shopping cart.</p>

 <h4>5. How do I empty out my shopping cart?</h4>
<p>
To remove items from your shopping cart click on "view cart", check the "remove" box for each item that you would like to remove from your shopping cart and then click on "update total".</p>

 <h4>6. How do I pay for my merchandise?</h4>
<p>
We accept Visa, Mastercard, American Express, and Discover for online orders, subject to proper authorization. In some cases, we can bill your Airway Manual Customer Account if you have one (subject to approval). If you wish to pay by another method, simply submit your request via email without any payment information to: product_orders@shopcart.lk, and we will contact you to make arrangements for payment.</p>

 <h4>7. Is it safe to give you my credit card number over the Internet?</h4>
<p>
Yes, read about ShopCart web site security here. However, if you are still uncomfortable providing your credit card information over the Internet -- no problem. Simply submit your request via email without any payment information to: product_orders@shopcart.lk, and we will contact you to make arrangements for payment.</p>

 <h4>8. How do I know that Shop Cart has received my order?</h4>
<p>
Our ordering system will automatically send you an email confirming that your order was successfully submitted. Please make certain that the email address you provide is correct. Upon processing, we will send you an additional email message confirming your order with applicable taxes and shipping charges calculated, and a shipping order number for your records.</p>

 <h4>9. How safe is my information and credit card number?</h4>
<p>
Your information is very safe at ShopCart.com and we take site and data security as a serious issue. The shopcart.lk website uses 128-bit encryption to ensure that your data is secure.

With regards to the safety and privacy of your credit card, we've implemented a state-of-the-art e-commerce solution for the new shopcart.lk. The new site offers improved security over our previous site and many other existing websites by encrypting your credit card information in such a way that it is not accessible by employees within shopcart.lk, or by anyone who would try to compromise the security of shopcart.lk. As a result, our site meets the rigorous security standards set by many privacy watchdog groups and standards set by the Internet community in general.

When you entered your credit card in our store, only the last four digits of your card are visible on the site. Even you (or anyone who logs in as you) cannot access the details of your credit card from our store.</p>

<h4>10. What is Shop Cart LK’s return policy and who do I contact regarding returns?</h4>
<p>
If for some reason you need to return an item to Shop Cart please email the details of your particular situation to: returns@shopcart.lk.  

For our complete Returns and Cancellations Policy, <a href="privacy.php">click here.</a></p>
	
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="index.php">HOME</a>  
				<a href="About Us.php">ABOUT US</a>  
				<a href="contact.php">CONTACT</a> 
				
			 </div>
             <div class="span3">
				<h5>SHOP CART LK</h5>
				<a href="privacy.php">PRIVACY POLICY</a>  
      			<a href="faqs.php">FAQs</a>  
				<a href="agrement.php">User Agrement</a> 
				
			 </div>
			<div class="span3">
            <h5>ACCOUNT</h5>
				<a href="account.php">YOUR ACCOUNT</a> 
				
			 </div>
			
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
	<div id="themeContainer">
	<div id="hideme" class="themeTitle">Style Selector</div>
	<div class="themeName">Oregional Skin</div>
	<div class="images style">
	<a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
	<a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
	</div>
	<div class="themeName">Bootswatch Skins (11)</div>
	<div class="images style">
		<a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
		<a href="themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	
		<a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
	</div>
	<div class="themeName">Background Patterns </div>
	<div class="images patterns">
		<a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
		<a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>
		
		<a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>
		
		<a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>
		 
	</div>
	</div>
</div>
<span id="themesBtn"></span>
</body>
</html>