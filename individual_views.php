<?php 
include_once "include/db.php";
if(isset($_COOKIE['email']))
{
	$fname=$_COOKIE['fname']; 
	$lname=$_COOKIE['lname']; 
	$email=$_COOKIE['email']; 
} else {
	$fname="Guest"; 	
}

?>
<html>

<head>
<title>Data Views</title>

<!-- Site made with Mobirise Website Builder v4.3.2, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.3.2, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/3-852x480.jpg" type="image/x-icon">
  <meta name="description" content="Home">
  <title>Home</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
<!-- for images-->
<style>
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
	opacity: .9;
    background: white;
}
</style>
</head>
<body>
<section class="menu cid-qCtTZ3KtRT" once="menu" id="menu1-v" data-rv-view="929" ">

    

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
                    <a href="https://mobirise.com">
                         <img src="assets/images/3-852x480.jpg" alt="SuperBuy" title="SuperBuy" media-simple="true" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="https://mobirise.com"><span class="mbri-cart-full mbr-iconfont mbr-iconfont-btn"></span>SmartBuy</a></span>
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

<!------------------------------------------------>

<section class="header9 cid-qD6CCw0NXb mbr-fullscreen mbr-parallax-background" id="header9-10" data-rv-view="940" style="background-color: rgb(158, 204, 230); background-image: url(assets/images/Book.jpg);">

    <div class="container" style="max-width:1190px;">
        <div class="media-container-column mbr-white col-md-8">
			<p style="text-align:right;color:#ffffff;font-family: 'Rubik', sans-serif;font-size: 1.5rem;">Top Viewed Products (Delta Electronics)</p> 
        </div>
		<?php 
			$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');
			$query = "SELECT p.productID, p.productName,p.childURL,p.prodDesc,p.prodURL,COUNT(v.productid) AS cnt FROM productsTable p JOIN productsVisited v ON p.productID = v.productid WHERE p.productID BETWEEN 1 AND 9 GROUP BY p.productID, p.productName ORDER BY cnt DESC";
			$result = mysqli_query($db, $query);
			$cnt=1;
			while($row = mysqli_fetch_array($result))
			{
				if($cnt++>10)
					break;
		?>
				<div class="gallery">
				<a target="_blank" href="<?php echo $row['prodURL'];?>">
				<img src="<?php echo $row['prodURL'];?>" alt="<?php echo $row['productName'];?>" width="300" height="200">
				</a>
				<div class="desc"><?php echo $row['productName'];?><br/>Visited Count: <?php echo $row['cnt'];?></div>
				</div>
		<?php
		
			}
		?>
    </div>

  
</section>
<!------------------------------------------------>

<section class="header9 cid-qD6CCw0NXb mbr-fullscreen mbr-parallax-background" id="header9-10" data-rv-view="940" style="background-color: rgb(158, 204, 230); background-image: url(assets/images/Book.jpg);">

    <div class="container" style="max-width:1190px;">
        <div class="media-container-column mbr-white col-md-8">
			<p style="text-align:right;color:#ffffff;font-family: 'Rubik', sans-serif;font-size: 1.5rem;">Top Viewed Products (Aerotyne)</p> 
        </div>
		<?php 
			$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');
			$query = "SELECT p.productID, p.productName,p.childURL,p.prodDesc,p.prodURL,COUNT(v.productid) AS cnt FROM productsTable p JOIN productsVisited v ON p.productID = v.productid WHERE p.productID BETWEEN 11 AND 20 GROUP BY p.productID, p.productName ORDER BY cnt DESC";
			$result = mysqli_query($db, $query);
			$cnt=1;
			while($row = mysqli_fetch_array($result))
			{
				if($cnt++>10)
					break;
		?>
				<div class="gallery">
				<a target="_blank" href="<?php echo $row['prodURL'];?>">
				<img src="<?php echo $row['prodURL'];?>" alt="<?php echo $row['productName'];?>" width="300" height="200">
				</a>
				<div class="desc"><?php echo $row['productName'];?><br/>Visited Count: <?php echo $row['cnt'];?></div>
				</div>
		<?php
		
			}
		?>
    </div>

  
</section>
<!------------------------------------------------>

<section class="header9 cid-qD6CCw0NXb mbr-fullscreen mbr-parallax-background" id="header9-10" data-rv-view="940" style="background-color: rgb(158, 204, 230); background-image: url(assets/images/Book.jpg);">

    <div class="container" style="max-width:1190px;">
        <div class="media-container-column mbr-white col-md-8">
			<p style="text-align:right;color:#ffffff;font-family: 'Rubik', sans-serif;font-size: 1.5rem;">Top Viewed Products (ABC Computers)</p> 
        </div>
		<?php 
			$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');
			$query = "SELECT p.productID, p.productName,p.childURL,p.prodDesc,p.prodURL,COUNT(v.productid) AS cnt FROM productsTable p JOIN productsVisited v ON p.productID = v.productid WHERE p.productID BETWEEN 21 AND 30 GROUP BY p.productID, p.productName ORDER BY cnt DESC";
			$result = mysqli_query($db, $query);
			$cnt=1;
			while($row = mysqli_fetch_array($result))
			{
				if($cnt++>10)
					break;
		?>
				<div class="gallery">
				<a target="_blank" href="<?php echo $row['prodURL'];?>">
				<img src="<?php echo $row['prodURL'];?>" alt="<?php echo $row['productName'];?>" width="300" height="200">
				</a>
				<div class="desc"><?php echo $row['productName'];?><br/>Visited Count: <?php echo $row['cnt'];?></div>
				</div>
		<?php
		
			}
		?>
    </div>

  
</section>

<!------------------------------------------------>

<section class="header9 cid-qD6CCw0NXb mbr-fullscreen mbr-parallax-background" id="header9-10" data-rv-view="940" style="background-color: rgb(158, 204, 230); background-image: url(assets/images/Book.jpg);">

    <div class="container" style="max-width:1190px;">
        <div class="media-container-column mbr-white col-md-8">
			<p style="text-align:right;color:#ffffff;font-family: 'Rubik', sans-serif;font-size: 1.5rem;">Top Viewed Products (Maheshwari Academy)</p> 
        </div>
		<?php 
			$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');
			$query = "SELECT p.productID, p.productName,p.childURL,p.prodDesc,p.prodURL,COUNT(v.productid) AS cnt FROM productsTable p JOIN productsVisited v ON p.productID = v.productid WHERE p.productID BETWEEN 31 AND 40 GROUP BY p.productID, p.productName ORDER BY cnt DESC";
			$result = mysqli_query($db, $query);
			$cnt=1;
			while($row = mysqli_fetch_array($result))
			{
				if($cnt++>10)
					break;
		?>
				<div class="gallery">
				<a target="_blank" href="<?php echo $row['prodURL'];?>">
				<img src="<?php echo $row['prodURL'];?>" alt="<?php echo $row['productName'];?>" width="300" height="200">
				</a>
				<div class="desc"><?php echo $row['productName'];?><br/>Visited Count: <?php echo $row['cnt'];?></div>
				</div>
		<?php
		
			}
		?>
    </div>

  
</section>

<!------------------------------------------------>

<section class="header9 cid-qD6CCw0NXb mbr-fullscreen mbr-parallax-background" id="header9-10" data-rv-view="940" style="background-color: rgb(158, 204, 230); background-image: url(assets/images/Book.jpg);">


    <div class="container" style="max-width:1190px;">
        <div class="media-container-column mbr-white col-md-8">         
			<p style="text-align:right;color:#ffffff;font-family: 'Rubik', sans-serif;font-size: 1.5rem;">Top Rated Products (Delta Electronics)</p>
        </div>
		<?php 
			$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');
			$query = "SELECT p.productID, p.productName,p.childURL,p.prodDesc,p.prodURL,AVG(v.rating) AS avg FROM productsTable p JOIN ratings v ON p.productID = v.pid WHERE p.productID BETWEEN 1 AND 9 GROUP BY p.productID ORDER BY avg DESC";
			$result = mysqli_query($db, $query);
			$cnt=1;
			while($row = mysqli_fetch_array($result))
			{
				if($cnt++>6)
					break;
		?>
				<div class="gallery">
					<a target="_blank" href="<?php echo $row['prodURL'];?>">
						<img src="<?php echo $row['prodURL'];?>" alt="<?php echo $row['productName'];?>" width="300" height="200">
					</a>
					<div class="desc"><?php echo $row['productName'];?><br/>Overall Rating: <?php echo(round($row['avg'], 1, PHP_ROUND_HALF_DOWN));?></div>
				</div>
		<?php
			}
		?>
    </div>
</section>

<!------------------------------------------------>
<section class="header9 cid-qD6CCw0NXb mbr-fullscreen mbr-parallax-background" id="header9-10" data-rv-view="940" style="background-color: rgb(158, 204, 230); background-image: url(assets/images/Book.jpg);">


    <div class="container" style="max-width:1190px;">
        <div class="media-container-column mbr-white col-md-8">         
			<p style="text-align:right;color:#ffffff;font-family: 'Rubik', sans-serif;font-size: 1.5rem;">Top Rated Products (Aerotyne)</p>
        </div>
		<?php 
			$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');
			$query = "SELECT p.productID, p.productName,p.childURL,p.prodDesc,p.prodURL,AVG(v.rating) AS avg FROM productsTable p JOIN ratings v ON p.productID = v.pid WHERE p.productID BETWEEN 11 AND 20 GROUP BY p.productID ORDER BY avg DESC";
			$result = mysqli_query($db, $query);
			$cnt=1;
			while($row = mysqli_fetch_array($result))
			{
				if($cnt++>6)
					break;
		?>
				<div class="gallery">
					<a target="_blank" href="<?php echo $row['prodURL'];?>">
						<img src="<?php echo $row['prodURL'];?>" alt="<?php echo $row['productName'];?>" width="300" height="200">
					</a>
					<div class="desc"><?php echo $row['productName'];?><br/>Overall Rating: <?php echo(round($row['avg'], 1, PHP_ROUND_HALF_DOWN));?></div>
				</div>
		<?php
			}
		?>
    </div>
</section>

<!------------------------------------------------>
<section class="header9 cid-qD6CCw0NXb mbr-fullscreen mbr-parallax-background" id="header9-10" data-rv-view="940" style="background-color: rgb(158, 204, 230); background-image: url(assets/images/Book.jpg);">


    <div class="container" style="max-width:1190px;">
        <div class="media-container-column mbr-white col-md-8">         
			<p style="text-align:right;color:#ffffff;font-family: 'Rubik', sans-serif;font-size: 1.5rem;">Top Rated Products (ABC Computers)</p>
        </div>
		<?php 
			$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');
			$query = "SELECT p.productID, p.productName,p.childURL,p.prodDesc,p.prodURL,AVG(v.rating) AS avg FROM productsTable p JOIN ratings v ON p.productID = v.pid WHERE p.productID BETWEEN 21 AND 30 GROUP BY p.productID ORDER BY avg DESC";
			$result = mysqli_query($db, $query);
			$cnt=1;
			while($row = mysqli_fetch_array($result))
			{
				if($cnt++>6)
					break;
		?>
				<div class="gallery">
					<a target="_blank" href="<?php echo $row['prodURL'];?>">
						<img src="<?php echo $row['prodURL'];?>" alt="<?php echo $row['productName'];?>" width="300" height="200">
					</a>
					<div class="desc"><?php echo $row['productName'];?><br/>Overall Rating: <?php echo(round($row['avg'], 1, PHP_ROUND_HALF_DOWN));?></div>
				</div>
		<?php
			}
		?>
    </div>
</section>

<!------------------------------------------------>
<section class="header9 cid-qD6CCw0NXb mbr-fullscreen mbr-parallax-background" id="header9-10" data-rv-view="940" style="background-color: rgb(158, 204, 230); background-image: url(assets/images/Book.jpg);">


    <div class="container" style="max-width:1190px;">
        <div class="media-container-column mbr-white col-md-8">         
			<p style="text-align:right;color:#ffffff;font-family: 'Rubik', sans-serif;font-size: 1.5rem;">Top Rated Products (Maheshwari Academy)</p>
        </div>
		<?php 
			$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');
			$query = "SELECT p.productID, p.productName,p.childURL,p.prodDesc,p.prodURL,AVG(v.rating) AS avg FROM productsTable p JOIN ratings v ON p.productID = v.pid WHERE p.productID BETWEEN 31 AND 40 GROUP BY p.productID ORDER BY avg DESC";
			$result = mysqli_query($db, $query);
			$cnt=1;
			while($row = mysqli_fetch_array($result))
			{
				if($cnt++>6)
					break;
		?>
				<div class="gallery">
					<a target="_blank" href="<?php echo $row['prodURL'];?>">
						<img src="<?php echo $row['prodURL'];?>" alt="<?php echo $row['productName'];?>" width="300" height="200">
					</a>
					<div class="desc"><?php echo $row['productName'];?><br/>Overall Rating: <?php echo(round($row['avg'], 1, PHP_ROUND_HALF_DOWN));?></div>
				</div>
		<?php
			}
		?>
    </div>
</section>
<!------------------------------------------------>
<?php mysqli_close($db);?>
</body>