<?php
	include_once "include/db.php";
	$id = $_GET['id'];
	if(isset($_POST['rating'])) {
		$ratingSelected = $_POST['rating'];
	}
	$dbRatingValue = 0;
	if (isset($_COOKIE['email'])) {
		$fname=$_COOKIE['fname'];
		$lname=$_COOKIE['lname']; 
		$email=$_COOKIE['email']; 
	}
 	
	// $percent=25;
	$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');
	$query = "SELECT * FROM `productsTable` WHERE `productID`=".$id;
	//$query = "SELECT * FROM `productsTable` WHERE `productID`=1";

	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_array($result);
	$productName = $row['productName'];
	$prodDesc = $row['prodDesc'];
	$paypal = $row['paypal'];
	// $avgRatings = $row['avgRating'];
	$childURL = $row['childURL'];
	$photoURL = $row['prodURL'];
		
	
	if(!isset($_POST['Submit']) && isset($_COOKIE['email']) && isset($_POST['rating'])) {
		$query = "SELECT * FROM ratings where pid ='".$id."' AND email='".$email."'";
		$result = mysqli_query($db, $query);
		$ratingSubmitted = 0;
		while ($row = mysqli_fetch_array($result)) {
			$query = "Update ratings SET `rating`= ".$ratingSelected." where pid ='".$id."' AND email ='".$email."'";
			$result = mysqli_query($db, $query);
			$ratingSubmitted = 1;
			$dbRatingValue = $ratingSelected;
			break;
		}
		if ($ratingSubmitted == 0) {
			$query = "INSERT INTO `ratings`(`email`, `pid`, `rating`) VALUES ('".$email."','".$id."',".$ratingSelected.")";
			$result = mysqli_query($db, $query);		
		}		
	}	

	if(isset($_COOKIE['email'])) {

		//inserting in `productsVisited`
		if (!isset($_POST['Submit']) && !isset($_POST['rating'])) {
			$query = "INSERT INTO `productsVisited`(`email`, `productid`) VALUES ('".$email."','".$id."')";
			$result = mysqli_query($db, $query);			
		}else if(isset($_POST['Submit'])) {
			//Insert review into db;
			$star = $_POST['rating'];
			$comments = $_POST['comments'];
			$query = "INSERT INTO `reviews`(`pid`, `email`, `comment`) VALUES ('".$id."','".$email."','".$comments."')";
			$result = mysqli_query($db, $query); //Inserting
			// echo "<script type='text/javascript'>alert('$star - $comments');</script>";
			echo " <div class=\"w3-panel w3-green w3-card-4\" style=\"margin: 0px;\">
			<span onclick=\"this.parentElement.style.display='none'\"
			class=\"w3-button w3-green w3-large w3-display-topright\">&times;</span>
			<h3>Thank You!</h3>
			<p>Thank you for taking time and submitting review for this product!</p>
			</div>";				

		}
	}
	else
	{
		$fname="Guest"; 	
	}

	/*Code for ratings*/
	$query = "SELECT * FROM ratings where pid ='".$id."'";
	$result = mysqli_query($db, $query);
	$sum = 0;
	$numOfRatings = 0;
	$numOfReviews = 0;
	$avgRatings = 0;
	while ($row = mysqli_fetch_array($result)) {
		
		$numOfRatings++;
		$sum = $sum + $row['rating'];

	}
	if ($numOfRatings > 0) {
		$avgRatings = $sum/$numOfRatings;
	}

	/*Code for reviews*/
	$query = "SELECT * FROM reviews where pid ='".$id."'";
	$result = mysqli_query($db, $query);

	while ($row = mysqli_fetch_array($result)) {
		$numOfReviews++;
	}
	
	if(isset($_COOKIE['email'])){
		
		$query = "SELECT * FROM ratings where pid ='".$id."' AND email='".$email."'";
		$result = mysqli_query($db, $query);
		while ($row = mysqli_fetch_array($result)) {
			$dbRatingValue = $row['rating'];
			break;
		}
	}
	
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v4.3.2, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.3.2, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/3-852x480.jpg" type="image/x-icon">
  <meta name="description" content="Catalog to view all Products.">
  <title>ViewProduct</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
	<style>
		.star-ratings {
			unicode-bidi: bidi-override;
			color: #c5c5c5;
			font-size: 50px;
			height: 50px;
			width: 250px;
			margin: 1em auto;
			position: relative;
			padding: 0;
		}
		.star-ratings-bottom { z-index: 0; }	
		.star-ratings-top {
			color: gold;
			padding: 0;
			position: absolute;
			z-index: 1;
			display:block;
			left: 0px;
			overflow: hidden;
		}	
		.rating {
			float:left;
		}

		/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
		   follow these rules. Every browser that supports :checked also supports :not(), so
		   it doesn’t make the test unnecessarily selective */
		.rating:not(:checked) > input {
			position:absolute;
			// top:-9999px;
			clip:rect(0,0,0,0);
		}

		.rating:not(:checked) > label {
			float:right;
			width:1em;
			padding:0 .1em;
			overflow:hidden;
			white-space:nowrap;
			cursor:pointer;
			font-size:200%;
			line-height:1.2;
			color:#ddd;
			text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
		}

		.rating:not(:checked) > label:before {
			content: '★ ';
		}

		.rating > input:checked ~ label {
			color: #f70;
			text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
		}

		.rating:not(:checked) > label:hover,
		.rating:not(:checked) > label:hover ~ label {
			color: gold;
			text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
		}

		.rating > input:checked + label:hover,
		.rating > input:checked + label:hover ~ label,
		.rating > input:checked ~ label:hover,
		.rating > input:checked ~ label:hover ~ label,
		.rating > label:hover ~ input:checked ~ label {
			color: #ea0;
			text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
		}

		.rating > label:active {
			position:relative;
			top:2px;
			left:2px;
		}
		label, legend {
			padding: 0;
			border: 0;
			font-weight: 700;
			font-size: 17px;
		}
		p {
			margin-bottom: 0px;
		}
	</style>  		
</head>
<body>
<section class="menu cid-qCtTZ3KtRT" once="menu" id="menu1-1j" data-rv-view="226">

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="home.php">
                         <img src="assets/images/3-852x480.jpg" alt="SuperBuy" title="SuperBuy" media-simple="true" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="home.php"><span class="mbri-cart-full mbr-iconfont mbr-iconfont-btn"></span>SmartBuy</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-white display-4" href="home.php">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Home</a>
                </li><li class="nav-item"><a class="nav-link link text-white display-4" href="about.php"><span class="mbri-question mbr-iconfont mbr-iconfont-btn"></span>
                        
                        About</a></li><li class="nav-item"><a class="nav-link link text-white display-4" href="products.php"><span class="mbri-extension mbr-iconfont mbr-iconfont-btn"></span>
                        &nbsp;Product</a></li><li class="nav-item"><a class="nav-link link text-white display-4" href="contact.php"><span class="mbri-letter mbr-iconfont mbr-iconfont-btn"></span>
                        &nbsp;Contact</a></li><li class="nav-item"><a class="nav-link link text-white display-4" ><span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>Hi, <?php echo $fname;?></a></li></ul>
            
        </div>
    </nav>
</section>

<section once="" class="cid-qCtVx4UIpa" id="footer6-1m" data-rv-view="228">

</section>

<section class="header3 cid-qD9ZMqkJDM" id="header3-1n" data-rv-view="231">

   </br>
   </br>
    <div class="container">
        <div class="media-container-row">
            <div class="mbr-figure" style="width: 80%; padding-right:30px;align-self: start;padding-top: 115px;">
                <img src="<?php echo $photoURL ; ?>" alt="Mobirise" media-simple="true" style="padding-bottom: 15px;">
				<div style="padding-bottom:15px;text-align: center;">
					<a class="display-4" href="<?php echo $childURL ; ?>">Open in Child Site</a>
				</div>
				<div style="padding-bottom:30px;">
					<p class="mbr-text mbr-fonts-style display-5"> Overall Rating:</p>
					<p class="mbr-text mbr-fonts-style display-6"><?php echo(round($avgRatings, 1, PHP_ROUND_HALF_DOWN)) ?> out of 5</p>
					<p class="mbr-text mbr-fonts-style display-6">(<?php echo ($numOfRatings." Ratings and ".$numOfReviews." Reviews")?>)</p>
				</div>				
            </div>

            <div class="media-content" style="padding-top:30px;">
                <h1 class="mbr-section-title mbr-black pb-3 mbr-fonts-style display-2"><?php echo(strtoupper($productName)); ?></h1>
                
                <div class="mbr-section-text mbr-white pb-3 " style="color:black;">
                    <p class="mbr-text mbr-fonts-style display-5"> Description</p>
						<p class="mbr-text mbr-fonts-style display-6"> <?php print($prodDesc); ?></p>
						<br>
						<p class="mbr-text mbr-fonts-style display-5"> Customer Reviews </p>
						<form method="post">
							<fieldset class="rating">
								<p class="mbr-text mbr-fonts-style display-6">Enter your Rating</p>
								<input type="radio" id="star5" name="rating" value="5" onclick="this.form.submit();" <?php if($dbRatingValue == 5) echo("checked")?>/><label for="star5" title="Rocks!">5 stars</label>
								<input type="radio" id="star4" name="rating" value="4" onclick="this.form.submit();" <?php if($dbRatingValue == 4) echo("checked")?> /><label for="star4" title="Pretty good">4 stars</label>
								<input type="radio" id="star3" name="rating" value="3" onclick="this.form.submit();" <?php if($dbRatingValue == 3) echo("checked")?>/><label for="star3" title="Meh">3 stars</label>
								<input type="radio" id="star2" name="rating" value="2" onclick="this.form.submit();" <?php if($dbRatingValue == 2) echo("checked")?>/><label for="star2" title="Kinda bad">2 stars</label>
								<input type="radio" id="star1" name="rating" value="1" onclick="this.form.submit(); <?php if($dbRatingValue == 1) echo("checked")?>"/><label for="star1" title="Sucks big time">1 star</label>
							</fieldset>
							<fieldset style = "width: 100%">
								<label></label>
								<input type="hidden" name="subject" id="mySubject" value="">
							</fieldset>
							<fieldset style = "font-size: 17px;font-weight: 700;">
								<textarea name="comments" id="Mymessage" rows="5" cols="30" class="text" placeholder="Comments" style="font-family: Arial;width: 50%;"></textarea>
							</fieldset>
						<br>
						<br>							
							<fieldset>
								<input type="submit" name="Submit" id="Mysubmitted" value="Submit Review" class="btn btn-md btn-primary display-4">
							</fieldset>
						</form>
						<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="<?php echo $paypal ?>">
							<input type="image" src="assets/images/addCart.jpg" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!" style="margin-left: 12px;width: 210px;height: 49px;margin-top: 20px;">
							<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
						</form>

                </div>
				<!--
                <div class="mbr-section-btn" style="padding-bottom:30px;">
                    <a class="btn btn-md btn-primary display-4" name="Submit" href="https://mobirise.com">SUBMIT</a>
                    <a class="btn btn-md btn-white-outline display-4" style="background-color:grey;" href="<?php echo $childURL ; ?>">OPEN IN CHILD SITE</a>
                </div>
				-->
            </div>
        </div>
    </div>

</section>

<section class="testimonials4 cid-qDa0FFF8sL mbr-parallax-background" id="testimonials4-1o" data-rv-view="234">

  

  <div class="mbr-overlay" style="opacity: 0.5; background-color: white; padding-top:30px;">
  <
  </div>
  <div class="container">
    
    
    <div class="col-md-10 testimonials-container" > 
      
    <div class="testimonials-item" style="padding-top:30px;">
		<h2 style="padding-bottom:30px; text-align:left;margin-left: -15px;margin-right: -15px;">User Reviews</h2>
		<?php
				$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');		
				$query = "SELECT comment,firstname FROM `reviews` r1 CROSS JOIN `user_details` u1 on r1.email = u1.email WHERE r1.pid = '".$id."'";
				$result = mysqli_query($db, $query);
				for($i = 0; $i < mysqli_num_rows($result);$i++)
				{
					$row = mysqli_fetch_array($result);
					echo " 
						<div class=\"user row\">
							<div class=\"testimonials-caption\">
								<div class=\"user_name mbr-bold mbr-fonts-style align-left pt-3 display-7\">
									".$row['firstname']."
								</div>
								<div class=\"user_text \">
									<p class=\"mbr-fonts-style display-7\">
										<em>\"".nl2br($row['comment'])."\"</em>
									</p>
								</div>
								 
							</div>
						</div>
					";
				}
		 ?>
      </div></div>
  </div>
</section>
<section once="" class="cid-qCtVx4UIpa" id="footer6-i" data-rv-view="892">

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="col-12">
                <p class="mbr-text mb-0 mbr-fonts-style display-7">CMPE 272 Fall 2017 - San Jose State University</p><p></p>
            </div>
        </div>
    </div>
</section>

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/jarallax/jarallax.min.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
  <input name="animation" type="hidden">
  </body>
</html>