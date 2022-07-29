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
	<h1>USER AGREEMENT </h1>
	<hr class="soften"/>
	<div class="row">
		
		<h4>Use of content</h4>
		<p>	The services that we are providing to you via the Sites consist of the Content and the Functionalities available on the Sites or otherwise provided to you as a result of your use of the Sites ("the Services").
You acknowledge and agree that you are only permitted to use the Sites and the Services as expressly set out in these Terms and Conditions or on the Sites.
You agree that the Sites and the Services are for your own personal use only on a single computer or device.
			
			
		</p>		
		<h4>You may not:</h4>
        <p> 

remove, change or obscure in any way anything on the Sites and/or the Services or otherwise use any material obtained whilst using the Sites and/or the Services except as set out in these Terms and Conditions.
reverse engineer or decompile (whether in whole or in part) any software used in the Sites and/or the Services (except to the extent expressly permitted by applicable law) with the exception of the source code provided on the site.
copy or use any material from the Sites and/or the Services for any commercial purpose.
remove, obscure or change any copyright, trade mark or other intellectual property right notices contained in the original material or from any material copied or printed off from the Sites or obtained as a result of the Services.
Any use of caching, http accelerators such as Harvest, Squid, Netscape proxy or Microsoft Catapult, or similar technology is permitted, however, you have the responsibility of ensuring you are viewing the most recent version of the web-page or content.
You may establish a link or "deep link" to the Sites from your site, provided that you have obtained DCL's prior written consent and that at DCL's sole discretion, the context is relevant and the link or its description is not detrimental to DCL.
Users that are not subscribers to the DCL Network acknowledge that access to the Sites and/or the Services may be restricted at the sole discretion of DCL in the interest of fully subscribed customers of the DCL Network.
Some areas of the sites or services may not be accessible for you even you are a subscribed customer of DCL's Mobile Telephony Network, depending on the subscribed services and credit limits.</p>
        
        <h4>Your obligations</h4>
        <p> 

You warrant that you will only use the Sites and the Services in accordance with these Terms and Conditions and in an appropriate and lawful manner and by way of example and not as a limitation that you shall not (and shall not authorise or permit any other party to):
receive, access or transmit any Content which is obscene, pornographic, threatening, racist, menacing, offensive, defamatory, in breach of confidence, in breach of any intellectual property right (including copyright) or otherwise objectionable or unlawful;
circumvent user authentication or security of any host, network or account (referred to as "cracking" or "hacking") nor interfere with service to any user, host or network (referred to as "denial of service attacks") nor copy any pages or register identical keywords with search engines to mislead other users into thinking that they are reading DCL's legitimate web pages (referred to as "page-jacking") or use the Sites or the Services for any other unlawful or objectionable conduct. Users who violate systems or network security may incur criminal or civil liability and DCL will at its absolute discretion fully co-operate with investigations of suspected criminal violations, violation of systems or network security under the leadership of law enforcement or relevant authorities;
knowingly or recklessly transmit any electronic Content (including viruses) through the Sites and/or the Services which shall cause or is likely to cause detriment or harm, in any degree, to computer systems owned by DCL or other Internet users;
hack into, make excessive traffic demands, deliver or forward chain letters, "junk mail" or "spam" of any kind, surveys, contests, pyramid schemes or otherwise engage in any other behavior intended to inhibit other users from using and enjoying the Sites and/or the Services or any other web site, or which is otherwise likely to damage or destroy DCL's reputation or the reputation of any third party.
You acknowledge that chat, discussion group or bulletin board services and similar services offered by DCL ("Public Communication Services") are public communications and your communications may be available to others and consequently you should be cautious when disclosing personal or sensitive information or any information which may identify you. DCL shall not be responsible for, and does not control or endorse any Content of any Public Communication Services.
If any information provided by you is untrue, inaccurate, not current or incomplete, DCL has the right to terminate your account and refuse any and all current or future use of the Services or access to the Sites.</p>
			
            <h4>Proprietary rights </h4>
		 
<p>

5.1. All Trade Marks used on the Sites and/or the Services are the trade marks of DCL or one of DCL's affiliates or partnered companies. You shall only make fair use of the Trade Marks and will not use the Trade Marks, whether design or word marks: (1) as or as part of your own trade marks; (2) in a manner which is likely to cause confusion; (3) to identify products to which they do not relate; (4) to imply endorsement or otherwise of products or services to which they do not relate; or (5) in any manner which does or may cause damage to the reputation of DCL or the Trade Marks.
5.2. You acknowledge and agree that the Services and the Sites or any part thereof, whether presented to you by DCL, advertisers or any third party are protected by copyrights, trademarks, service marks, patents, or other proprietary rights and laws. All rights are expressly reserved.
5.3. You are only allowed to use the Sites and the Services as set out in these Terms and Conditions and nothing on the Sites and/or the Services shall be construed as conferring any licence or other transfer of rights to you of any intellectual property or other proprietary rights of DCL, any member of the DCL partnerships or any third party, whether by estoppel, implication or otherwise.
5.4. DCL assumes no responsibility for the violation of any third party copyrights, trademarks, service marks, patents, or other proprietary rights and laws by the third party web sites which are linked to this Site.</p>

 <h4>Costs</h4>
<p>

6.1. Use of the Sites is currently free. However, DCL reserves the right to charge for access to part or all of the Sites in the future, subject to giving you clear notice when entering any part to which charges apply. Some Services may be chargeable as indicated on the Sites and in any accompanying terms and conditions.
6.2. You will need to provide all equipment necessary to access the Sites and the Services on the Internet and be liable for payment for the local telephone call charges at the rates published by the telephone operator with whom you make your local calls or any other Internet access charges to which you may be subject. If your equipment does not support relevant technology including but not limited to encryption you may not be able to use certain Services or access certain information on the Sites.</p>

 <h4>Liability for content</h4>
<p>

7.1. It is your sole responsibility to satisfy yourself prior to using the Sites and the Services in any way that they are suitable for your purposes and up to date. The Services and in particular, prices are periodically updated and you should check the Sites and the Services regularly to ensure that you have the latest information. You should also refresh your browser each time you visit the Sites and the Services to ensure that you download the most up to date version of the Sites and the Services.
7.2. The Sites and the Services are provided on an "as is" basis. Although every effort has been made to provide accurate information on these pages, neither DCL, nor any of its employees, nor any member of the DCL's affiliate or partner companies, their suppliers, nor any of their employees, make any warranty, expressed or implied, or assume any legal liability (to the extent permitted by law) or responsibility for the suitability, reliability, timeliness, accuracy or completeness of the Services or any part thereof contained on the Sites or in the Services.
7.3. In the event of an error or mistake whether technical or human, DCL reserves the right to cancel any order placed by the customer at any time at its sole discretion and refund the payment back to the customer
7.4. You acknowledge that DCL is unable to exercise control over the security or subject matter of Content passing over the DCL Network, the Sites or via the Services and DCL hereby excludes all liability of any kind for the transmission or reception of infringing Content of whatever nature.</p>

 <h4>COD (Cash on Delivery; pay cash when product/s is/are delivered to you)</h4>
<p>
All orders are subject to confirmation from DCL and have upper limit of LKR 100,000 per order. A staff from Customer Experience will contact you to confirm the Order. You cannot cancel the order or refuse to pay when the product/s are delivered to you after your confirmation. 
Any variation in upper limit is at the discretion of DCL.</p>

 <h4>Unavailability of Product / Product Out of Stock</h4>
<p>
Inventory of all products advertised on ShopCartLK are not managed or maintained by ShopCartLK. ShopCartLK only acts as an intermediary between the customer and the supplier for such products. These products may not be available (run out of stock) from time to time due to overselling by the suppliers, however the product may be available for purchase on ShopCartLK if the supplier has not promptly informed us of the fact that the product is unavailable for them to supply us. In such circumstances ShopCartLK does not accept any liability whatsoever. 
In the event of a stock unavailability, ShopCartLK will inform the customer within 3 working days, [P1] and the payment can be refunded within 10 working days.
Customer acknowledges and agrees that the only remedy available for unavailability of product is the refund of the money paid.
Placement of an order including the payment of the order value by the Customer will be construed as an offer. When you place an order to purchase a product from us, you will receive an e-mail confirming receipt of your order and containing the details of your order (the "Order Confirmation E-mail"). The Order Confirmation E-mail is acknowledgement that we have received your order and has been passed for processing and does not confirm acceptance of your offer to buy the product(s) ordered. We only accept your offer, when we have commenced delivery after the supplier has released the product.</p>

 <h4>Refunds & Exchanges</h4>
<p>
Refunds for change of mind will not be accepted.

Products/ services under daily deals are limted time and limited stock promotions that once ordered and paid are non-refundable. The voucher issues when you purchase the product/ service must be utilized (redeemed) during the validity period of the voucher. DCL is not liable for failure to redeem the voucher under any circumstances and cannot be refunded.

All refunds are processed within 2-3 working days by DCL (processing times shown in table below). Further processing back to your credit card/ bank account may require additional time depending on the bank/ institution for which DCL cannot be held liable.</p>
	
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