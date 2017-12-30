<?php 

  $title = "Home"; 

  include_once "include/header.php";

  include_once "include/db.php";

?>



 <?php

if($fname!="Guest")

{

//check if email id is present in the system or not and insert in db 	

	$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');

	$query = "SELECT * FROM `user_details` WHERE `email`='".$email."'";

		$result = mysqli_query($db, $query);

	$lcount=0;

	while ($row = mysqli_fetch_array($result)) {

		$lcount++;

		break;

	}

	if($lcount==0)

	{

		//insert in database

		$query = "INSERT INTO `user_details`(`firstname`, `lastname`, `email`) VALUES ('".$fname."','".$lname."','".$email."')";

			$result = mysqli_query($db, $query);	

		

	}

	

	mysqli_close($db);

}

 

 ?>

<body>

  <?php include_once "include/nav.php" ?>



<section class="header10 cid-qD6CCWsbZR mbr-fullscreen mbr-parallax-background" id="header10-11" data-rv-view="934">

<div class="container">

        <div class="media-container-column mbr-white col-lg-8 col-md-10 ml-auto" style="margin-left: 0px !important;">

            <h1 class="mbr-section-title align-left mbr-bold pb-3 mbr-fonts-style display-1">

                SMART BUY

            </h1>

            <h3 class="mbr-section-subtitle align-left mbr-light pb-3 mbr-fonts-style display-2">

                

            </h3>

            <p align="justify" class="mbr-text align-left pb-3 mbr-fonts-style display-5" >

               Smart Buy is a multinational e-commerce corporation headquartered in San Jose, California that facilitates consumer-to-consumer and business-to-consumer sales through its website.

            </p>

            <div class="mbr-section-btn align-left"><a class="btn btn-md btn-primary display-4" href="about.php">LEARN MORE</a>

            </div>

        </div>

    </div>

</section>

<section class="header1 cid-qD6CDOpQFP mbr-parallax-background" id="header1-12" data-rv-view="937">

    <div class="container">

        <div class="row justify-content-md-center">

            <div class="mbr-white col-md-10">

                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">

                    Want to buy our products?

                </h1>

                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">

                </h3>

                <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">

                   Take a look at our products from all around the world, get the best price around.

                </p>

                <div class="mbr-section-btn align-center">

                    <a class="btn btn-md btn-primary display-4" href="products.php">

                        <span class="mbr-iconfont mbri-file"></span>LEARN MORE</a>

                </div>

            </div>

        </div>

    </div>

    </div>

</section>

<section class="header9 cid-qD6CCw0NXb mbr-fullscreen mbr-parallax-background" id="header9-10" data-rv-view="940">

    <div class="container">

        <div class="media-container-column mbr-white col-md-8">

            <h1 class="mbr-section-title align-left mbr-bold pb-3 mbr-fonts-style display-1">

                Looking for some guidance?

            </h1>

            <h3 class="mbr-section-subtitle align-left mbr-light pb-3 mbr-fonts-style display-2">

                

            </h3>

            <p class="mbr-text align-left pb-3 mbr-fonts-style display-5">

                We are happy to assist.

            </p>

            <div class="mbr-section-btn align-left">

                <a class="btn btn-md btn-primary display-4" href="contact.php">LEARN MORE</a>

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

  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>

  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>

  <script src="assets/jarallax/jarallax.min.js"></script>

  <script src="assets/dropdown/js/script.min.js"></script>

  <script src="assets/theme/js/script.js"></script>



  <input name="animation" type="hidden">

  

  </body>

</html>