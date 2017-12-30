<?php 

include_once "include/db.php";



if(isset($_COOKIE['email']))



{



$fname=$_COOKIE['fname']; 



$lname=$_COOKIE['lname']; 



$email=$_COOKIE['email']; 



}



else



{



$fname="Guest"; 	



}







	$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');



	$query = "SELECT * FROM `productsTable` ORDER BY `productID` ASC";



	$result = mysqli_query($db, $query);



	// print($result);



?>

<html>

<head>



  <!-- Site made with Mobirise Website Builder v4.3.2, https://mobirise.com -->



  <meta charset="UTF-8">



  <meta http-equiv="X-UA-Compatible" content="IE=edge">



  <meta name="generator" content="Mobirise v4.3.2, mobirise.com">



  <meta name="viewport" content="width=device-width, initial-scale=1">



  <link rel="shortcut icon" href="assets/images/3-852x480.jpg" type="image/x-icon">



  <meta name="description" content="Catalog to view all Products.">



  <title>Products</title>



  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">



  <link rel="stylesheet" href="assets/tether/tether.min.css">



  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">



  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">



  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">



  <link rel="stylesheet" href="assets/dropdown/css/style.css">



  <link rel="stylesheet" href="assets/animate.css/animate.min.css">



  <link rel="stylesheet" href="assets/theme/css/style.css">



  <link rel="stylesheet" href="assets/mobirise-gallery/style.css">



  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

<style>

	select {

		width: 20%;

		margin: 8px 0;

		display: inline-block;

		border: 1px solid #ccc;

		border-radius: 4px;

		box-sizing: border-box;

		height: 45px;

		text-align-last: left;

		padding-left: 2%;		

	}

</style>

</head>

<body>

<section class="menu cid-qCtTZ3KtRT" once="menu" id="menu1-b" data-rv-view="843">







    







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



                        &nbsp;Contact</a></li><li class="nav-item"><a class="nav-link link text-white display-4"><span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>Hi, <?php echo $fname;?></a></li></ul>



            



        </div>



    </nav>



</section>

    

    <section class="carousel slide cid-qCtYsnWM35" data-interval="false" id="slider1-o" data-rv-view="845">



    <div class="full-screen"><div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="false" data-interval="false"><div class="carousel-inner" role="listbox"><div class="carousel-item slider-fullscreen-image active" data-bg-video-slide="false" style="background-image: url(assets/images/sale-2000x1448.jpg);"><div class="container container-slide"><div class="image_wrapper"><div class="mbr-overlay"></div><img src="assets/images/sale-2000x1448.jpg"><div class="carousel-caption justify-content-center"><div class="col-10 align-center"><h2 class="mbr-fonts-style display-1">Grand Saving Week</h2><p class="lead mbr-text mbr-fonts-style display-5">Save 50% in all product<br></p></div></div></div></div></div><div class="carousel-item slider-fullscreen-image" data-bg-video-slide="false" style="background-image: url(assets/images/delivery-2000x1487.jpg);"><div class="container container-slide"><div class="image_wrapper"><div class="mbr-overlay"></div><img src="assets/images/delivery-2000x1487.jpg"><div class="carousel-caption justify-content-center"><div class="col-10 align-left"><h2 class="mbr-fonts-style display-2">Free Shipping</h2><p class="lead mbr-text mbr-fonts-style display-5">For all Items</p></div></div></div></div></div><div class="carousel-item slider-fullscreen-image" data-bg-video-slide="false" style="background-image: url(assets/images/mbr-2-1620x1080.jpg);"><div class="container container-slide"><div class="image_wrapper"><div class="mbr-overlay"></div><img src="assets/images/mbr-2-1620x1080.jpg"><div class="carousel-caption justify-content-center"><div class="col-10 align-right"><h2 class="mbr-fonts-style display-2">Massive Deals</h2><p class="lead mbr-text mbr-fonts-style display-5">Major Savings on all Products</p></div></div></div></div></div></div><a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#slider1-o"><span aria-hidden="true" class="mbri-left mbr-iconfont"></span><span class="sr-only">Previous</span></a><a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#slider1-o"><span aria-hidden="true" class="mbri-right mbr-iconfont"></span><span class="sr-only">Next</span></a></div></div>



</section>



<section class="mbr-gallery mbr-slider-carousel cid-qD6zUwjFPb" id="gallery2-q" data-rv-view="857">

	<div class="container">

		<div>

			<!-- Filter -->

			<div class="mbr-gallery-filter container gallery-filter-active">

				<ul buttons="0">

					<li class="mbr-gallery-filter-all">

						<a class="btn btn-md btn-primary active display-4" href="">All</a>

					</li>

				</ul>

			</div>

			<div style="padding-bottom:25px;">

				<div style="text-align: left;padding-left: 20px;float: left;">

					<a class="display-5" href="/views.php" style="font-weight: 400;">Top Viewed (Marketplace)</a>

				</div>

				<div style="text-align: left;padding-left: 20px;float: left;">

					<a class="display-5" href="/individual_views.php" style="font-weight: 400;">Top Viewed (Individual)</a>

				</div>

				<div style="text-align: right;padding-right: 20px;">

					

						<form>

							<select name = "sortBy" onchange="this.form.submit();" style="margin-top: 0px;">

								<option value="All">--Sort By--</option>

								<option value="ASC">Price (low to high)</option>

								<option value="DESC">Price (high to low)</option>

							</select>

						</form>

										

				</div>				

			</div>

			

			<!-- Gallery -->

			<div class="mbr-gallery-row">

				<div class="mbr-gallery-layout-default">

					<div>

						<div>

							<?php

							if(isset($_GET['sortBy']) && $_GET['sortBy'] != "All")

							{

								$orderValue = $_GET['sortBy'];

								$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');

								$query = "SELECT * FROM `productsTable` ORDER BY `price` $orderValue";

								$result = mysqli_query($db, $query);

								for ($i=1;$i<=40;$i++) 

								{

									if ($i==10) {

										continue;

									}

									$row = mysqli_fetch_array($result);

									$prodName = $row['productName'];

									$prodURL = $row['prodURL'];

									$prodPrice = $row['price'];

									

									$datatag = "";

									if ($row['productID']>0 && $row['productID']<10) {

										$datatag = "Delta Electronics";

										

									} else if ($row['productID']>10 && $row['productID']<=20){

										$datatag = "Aerotyne";

									} else if ($row['productID']>20 && $row['productID']<=30){

										$datatag = "ABC Computers";

									} else if ($row['productID']> 30 && $row['productID']<=40){

										$datatag = "Maheshwari Academy";

									}

									

									echo ("

										<div class='mbr-gallery-item mbr-gallery-item--p2' data-video-url='false' data-tags=\"$datatag\">

											<div onclick=\"location.href='siteProducts.php?id=$i';\">

												<img src='$prodURL' alt=''>

												<span class='icon-focus' style ='left: 20%;font-size: 16px !important;'>$prodName <br>Price: \$$prodPrice

												</span>

											</div>

										</div>

									");									

								}	

								

							}else {

								

								for ($i=1;$i<=40;$i++) {

									if ($i==10) {

										continue;

									}

									$row = mysqli_fetch_array($result);

									$prodName = $row['productName'];

									$prodPrice = $row['price'];

									$datatag = "";

									if ($i>0 && $i<10) {

										$datatag = "Delta Electronics";

										

									} else if ($i>10 && $i<=20){

										$datatag = "Aerotyne";

									} else if ($i>20 && $i<=30){

										$datatag = "ABC Computers";

									} else if ($i> 30 && $i<=40){

										$datatag = "Maheshwari Academy";

									}

									echo ("

										<div class='mbr-gallery-item mbr-gallery-item--p2' data-video-url='false' data-tags=\"$datatag\">

											<div onclick=\"location.href='siteProducts.php?id=$i';\">

												<img src='assets/images/$i.jpg' alt=''>

												<span class='icon-focus' style ='left: 20%;font-size: 16px !important;'>$prodName <br>Price: \$$prodPrice

												</span>

											</div>

										</div>

									");									

								}								

							}							



							?>

							<!--

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Delta Electronics">

								<div onclick="location.href='siteProducts.php?id=1';">

									<img src="assets/images/connector.jpg" alt="">

									<p class="mbr-text mbr-fonts-style display-5"> Connector</p>

									<span class="icon-focus">

									</span>

								</div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Delta Electronics">

								<div onclick="location.href='siteProducts.php?id=2';"><img src="assets/images/Magnets.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Delta Electronics">

								<div onclick="location.href='siteProducts.php?id=3';"><img src="assets/images/optoelectronics.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Delta Electronics">

								<div onclick="location.href='siteProducts.php?id=4';"><img  src="assets/images/resistors.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Delta Electronics">

								<div onclick="location.href='siteProducts.php?id=5';"><img src="assets/images/resistors.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Delta Electronics">

								<div onclick="location.href='siteProducts.php?id=6';"><img  src="assets/images/Sensors.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

						

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Delta Electronics">

								<div onclick="location.href='siteProducts.php?id=7';"><img src="assets/images/capacitor.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Delta Electronics">

								<div onclick="location.href='siteProducts.php?id=8';"><img src="assets/images/encoder.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Delta Electronics">

								<div onclick="location.href='siteProducts.php?id=9';"><img src="assets/images/Audio.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Maheshwari Academy">

								<div onclick="location.href='siteProducts.php?id=31';"><img src="assets/images/p1.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Maheshwari Academy">

								<div onclick="location.href='siteProducts.php?id=32';"><img src="assets/images/p2.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Maheshwari Academy">

								<div onclick="location.href='siteProducts.php?id=33';"><img src="assets/images/p3.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Maheshwari Academy">

								<div onclick="location.href='siteProducts.php?id=34';"><img src="assets/images/p4.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Maheshwari Academy">

								<div onclick="location.href='siteProducts.php?id=35';"><img src="assets/images/p5.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Maheshwari Academy">

								<div onclick="location.href='siteProducts.php?id=36';"><img src="assets/images/p6.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Maheshwari Academy">

								<div onclick="location.href='siteProducts.php?id=37';"><img src="assets/images/p7.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Maheshwari Academy">

								<div onclick="location.href='siteProducts.php?id=38';"><img src="assets/images/p8.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Maheshwari Academy">

								<div onclick="location.href='siteProducts.php?id=39';"><img src="assets/images/p9.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Maheshwari Academy">

								<div onclick="location.href='siteProducts.php?id=40';"><img src="assets/images/p10.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Aerotyne">

								<div onclick="location.href='siteProducts.php?id=11';"><img src="assets/images/11.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Aerotyne">

								<div onclick="location.href='siteProducts.php?id=12';"><img src="assets/images/12.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Aerotyne">

								<div onclick="location.href='siteProducts.php?id=13';"><img src="assets/images/13.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Aerotyne">

								<div onclick="location.href='siteProducts.php?id=14';"><img src="assets/images/14.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Aerotyne">

								<div onclick="location.href='siteProducts.php?id=15';"><img src="assets/images/15.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Aerotyne">

								<div onclick="location.href='siteProducts.php?id=16';"><img src="assets/images/16.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Aerotyne">

								<div onclick="location.href='siteProducts.php?id=17';"><img src="assets/images/17.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Aerotyne">

								<div onclick="location.href='siteProducts.php?id=18';"><img src="assets/images/18.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Aerotyne">

								<div onclick="location.href='siteProducts.php?id=19';"><img src="assets/images/19.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Aerotyne">

								<div onclick="location.href='siteProducts.php?id=20';"><img src="assets/images/20.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="ABC Computers">

								<div onclick="location.href='siteProducts.php?id=21';"><img src="assets/images/product1_1.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="ABC Computers">

								<div onclick="location.href='siteProducts.php?id=22';"><img src="assets/images/product2_1.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="ABC Computers">

								<div onclick="location.href='siteProducts.php?id=23';"><img src="assets/images/product3_1.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="ABC Computers">

								<div onclick="location.href='siteProducts.php?id=24';"><img src="assets/images/product4_1.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="ABC Computers">

								<div onclick="location.href='siteProducts.php?id=25';"><img src="assets/images/product5_1.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="ABC Computers">

								<div onclick="location.href='siteProducts.php?id=26';"><img src="assets/images/product6_1.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="ABC Computers">

								<div onclick="location.href='siteProducts.php?id=27';"><img src="assets/images/product7_1.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="ABC Computers">

								<div onclick="location.href='siteProducts.php?id=28';"><img src="assets/images/product8_1.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="ABC Computers">

								<div onclick="location.href='siteProducts.php?id=29';"><img src="assets/images/product9_1.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="ABC Computers">

								<div onclick="location.href='siteProducts.php?id=30';"><img src="assets/images/product10_1.jpg" alt=""><span class="icon-focus"></span></div>

							</div>

							-->

						</div>

					</div>

					<div class="clearfix"></div>

				</div>

			</div>

			<!-- Lightbox -->

			<div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery2-q">

				<div class="modal-dialog">

					<div class="modal-content">

						<div class="modal-body">

							<div class="carousel-inner">

								<div class="carousel-item active"><img src="assets/images/gallery00.jpg" alt=""></div>

								<div class="carousel-item"><img src="assets/images/gallery01.jpg" alt=""></div>

								<div class="carousel-item"><img src="assets/images/gallery02.jpg" alt=""></div>

								<div class="carousel-item"><img src="assets/images/gallery03.jpg" alt=""></div>

								<div class="carousel-item"><img src="assets/images/gallery04.jpg" alt=""></div>

								<div class="carousel-item"><img src="assets/images/gallery05.jpg" alt=""></div>

								<div class="carousel-item"><img src="assets/images/gallery06.jpg" alt=""></div>

								<div class="carousel-item"><img src="assets/images/gallery07.jpg" alt=""></div>

							</div>

							<a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery2-q"><span class="mbri-left mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery2-q"><span class="mbri-right mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Next</span></a><a class="close" href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span></a>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>



<?php include_once "include/footer.php"; ?>





  <script src="assets/web/assets/jquery/jquery.min.js"></script>

  <script src="assets/popper/popper.min.js"></script>

  <script src="assets/tether/tether.min.js"></script>

  <script src="assets/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/smooth-scroll/smooth-scroll.js"></script>

  <script src="assets/dropdown/js/script.min.js"></script>

  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>

  <script src="assets/masonry/masonry.pkgd.min.js"></script>

  <script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>

  <script src="assets/jquery-mb-ytplayer/jquery.mb.ytplayer.min.js"></script>

  <script src="assets/jquery-mb-vimeo_player/jquery.mb.vimeo_player.js"></script>

  <script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>

  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>

  <script src="assets/theme/js/script.js"></script>

  <script src="assets/mobirise-slider-video/script.js"></script>

  <script src="assets/mobirise-gallery/player.min.js"></script>

  <script src="assets/mobirise-gallery/script.js"></script>

  

  

  <input name="animation" type="hidden">

  </body>

</html>

