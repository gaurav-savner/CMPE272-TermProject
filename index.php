<?php

include_once "include/db.php";

if (isset($_POST['Login'])) {

	

	$email = $_POST['uname'];

	$pass = $_POST['psw'];	

	$f=0;

	$db = mysqli_connect($host,$username,$password,$dbName) or die('Error connecting to MySQL server.');

	$query = "SELECT * FROM `user_details` WHERE `email`='".$email."'";

	



	$result = mysqli_query($db, $query);

	while ($row = mysqli_fetch_array($result)) {

			

	 if($row['password']==$pass)

		{

			$f=1;

		$fname=$row['firstname']; 

		$lname=$row['lastname']; 

		$email=$row['email']; 

		setcookie("fname", $fname);

		setcookie("lname", $lname);

		setcookie("email", $email);

		

			header("Refresh: 2; URL='/home.php'");

		echo " <div class=\"w3-panel w3-green w3-card-4\" style=\"margin: 0px;\">

<span onclick=\"this.parentElement.style.display='none'\"

class=\"w3-button w3-green w3-large w3-display-topright\">&times;</span>

<h3>Login Successful!</h3>

<p>Redirecting to Home</p>

</div>";

		}

		

		break;

	}

	if($f==0)	 echo " <div class=\"w3-panel w3-red w3-card-4\" style=\"margin: 0px;\">

<span onclick=\"this.parentElement.style.display='none'\"

class=\"w3-button w3-red w3-large w3-display-topright\">&times;</span>

<h3>Invalid Credentials!</h3>

<p>You can also login using Google or Facebook!</p>

</div>";

}

if (isset($_POST['Guest'])) {

	header("Refresh: 1; URL='/home.php'");

		echo " <div class=\"w3-panel w3-yellow w3-card-4\" style=\"margin: 0px;\">

<span onclick=\"this.parentElement.style.display='none'\"

class=\"w3-button w3-yellow w3-large w3-display-topright\">&times;</span>

<h3>Logging in using Guest</h3>

<p>Redirecting to Home</p>

</div>";

}



if (isset($_POST['signup'])) {

	header("Location: signup.php");

}



?>

<!DOCTYPE html>

<html itemscope itemtype="http://schema.org/Article">

<head>

<title>Login Smart Market</title>

<meta charset="UTF-8">

<style>

body {

	 background: #dedede2e;

	 margin-top: 8px;

    margin-right: 8px;

    margin-bottom: 8px;

    margin-left: 8px;

}

form {

    border: 3px solid #f1f1f1;

	padding-left: 35%;

	padding-right: 35%;

	background: whitesmoke;

	

}



input[type=text], input[type=password] {

    width: 100%;

    padding: 12px 20px;

    margin: 8px 0;

    display: inline-block;

    border: 1px solid #ccc;

    box-sizing: border-box;

}



button {

    background-color: #4CAF50;

    color: white;

    padding: 14px 20px;

    margin: 8px 0;

    border: none;

    cursor: pointer;

    width: 70%;

	text-align:center;

	padding-bottom: 10px;

}



my-signin2 {

padding: 14px 20px;

    margin: 8px 0;

    border: none;

    cursor: pointer;

    width: 100%;

}

button:hover {

    opacity: 0.8;

}



.cancelbtn {

    width: auto;

    padding: 10px 18px;

    background-color: #f44336;

}



.imgcontainer {

    text-align: center;

    margin: 24px 0 12px 0;

}



img.avatar {

    width: 40%;

    border-radius: 50%;

}



.container {

    padding: 16px;

}



span.psw {

    float: right;

    padding-top: 16px;

}



/* Change styles for span and cancel button on extra small screens */

@media screen and (max-width: 300px) {

    span.psw {

       display: block;

       float: none;

    }

    .cancelbtn {

       width: 100%;

    }

}



.loginform {



}

#center {

  margin: 0 auto;

  text-align: center;

}

.abcRioButton

{

   margin-left: 55px;

   width: 255px;

}

.abcRioButtonBlue{

   margin-left: 55px;

   width: 255px;

}

.abcRioButtonIcon{

  

}

</style>

<link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">



</head>

<body>



<!-- Facebook---> 

<script>



  // This is called with the results from from FB.getLoginStatus().

  function statusChangeCallback(response) {

    console.log('statusChangeCallback');

    console.log(response);

    // The response object is returned with a status field that lets the

    // app know the current login status of the person.

    // Full docs on the response object can be found in the documentation

    // for FB.getLoginStatus().

    if (response.status === 'connected') {

      // Logged into your app and Facebook.

      testAPI();

    } else {

      // The person is not logged into your app or we are unable to tell.

     // document.getElementById('status').innerHTML = 'Please log ' +

        'into this app.';

    }

  }



  // This function is called when someone finishes with the Login

  // Button.  See the onlogin handler attached to it in the sample

  // code below.

  function checkLoginState() {

    FB.getLoginStatus(function(response) {

      statusChangeCallback(response);

    });

  }



  window.fbAsyncInit = function() {

  FB.init({

    appId      : '1062013093848527',

    cookie     : true,  // enable cookies to allow the server to access 

                        // the session

    xfbml      : true,  // parse social plugins on this page

    version    : 'v2.7' // use graph api version 2.8

  });



  // Now that we've initialized the JavaScript SDK, we call 

  // FB.getLoginStatus().  This function gets the state of the

  // person visiting this page and can return one of three states to

  // the callback you provide.  They can be:

  //

  // 1. Logged into your app ('connected')

  // 2. Logged into Facebook, but not your app ('not_authorized')

  // 3. Not logged into Facebook and can't tell if they are logged into

  //    your app or not.

  //

  // These three cases are handled in the callback function.



  FB.getLoginStatus(function(response) {

    statusChangeCallback(response);

  });



  };



  // Load the SDK asynchronously

  (function(d, s, id) {

    var js, fjs = d.getElementsByTagName(s)[0];

    if (d.getElementById(id)) return;

    js = d.createElement(s); js.id = id;

    js.src = "https://connect.facebook.net/en_US/sdk.js";

    fjs.parentNode.insertBefore(js, fjs);

  }(document, 'script', 'facebook-jssdk'));



  // Here we run a very simple test of the Graph API after login is

  // successful.  See statusChangeCallback() for when this call is made.

  function testAPI() {

    console.log('Welcome!  Fetching your information.... ');

    FB.api('/me?fields=email,first_name,last_name', function(response) {

      console.log('Successful login for: ' + response.name);

     // document.getElementById('status').innerHTML ='Thanks for logging in, ' + response.first_name + '!';

		document.cookie = "fname="+response.first_name;

		document.cookie = "lname="+response.last_name;

		document.cookie = "email="+response.email;

		

		window.location.href = '/home.php';

    });

  }

checkLoginState();

</script>

<!-- Facebook end---> 









  





<div class="loginform">



<h2 style="text-align:center;">Login Form</h2>



<form action="" method="post">

  <div class="imgcontainer">

    <img src="/assets/images/img_avatar2.png" alt="Avatar" class="avatar">

  </div>



  <div class="container">

    <label><b>Username</b></label>

    <input type="text" placeholder="Enter Username" name="uname" required>



    <label><b>Password</b></label>

    <input type="password" placeholder="Enter Password" name="psw" required>

           <div id="center">

    <button type="submit" style="margin: 10px;" name="Login">Login</button>

		

	<!-- google button--><div style="text-align:center;" id="my-signin2"></div>

		

  <script>

    function onSuccess(googleUser) {

      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());

	  console.log('Email: ' + googleUser.getBasicProfile().getEmail());

	  		document.cookie = "fname="+googleUser.getBasicProfile().getGivenName();

			document.cookie = "lname="+googleUser.getBasicProfile().getFamilyName();

		document.cookie = "email="+googleUser.getBasicProfile().getEmail();

		

		window.location.href = '/home.php';

    }

    function onFailure(error) {	

      console.log(error);

    }

    function renderButton() {

      gapi.signin2.render('my-signin2', {

        'scope': 'profile email',

        'width':255,

        'height': 45,

        'longtitle': true,

        'theme': 'dark',

        'onsuccess': onSuccess,

        'onfailure': onFailure

      });

    }

  </script>



  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

<!-- Google--->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">

  </script>

  <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer>

  </script>



    <meta name="google-signin-client_id" content="783191219905-q2lk802msrt13m40l30ib8dkv2t4igtq.apps.googleusercontent.com">



  

<!-- Google end--->  





    <!-- facebook  button--> 

	   <div id="center">

	<div class="fb-login-button"  onlogin="checkLoginState();" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false" style="padding-top:10px"></div>

</div>

	<!-- facebook end---> 

<!--



  </div>

  <div class="container" style="background-color:#f1f1f1">

    <button type="button" class="cancelbtn">Cancel</button>

    <span class="psw">Forgot <a href="#">password?</a></span>

  </div>

  -->

	<button type="submit" style="margin: 10px;background: #938f9e;" name="Guest" formnovalidate>Continue as Guest</button>

	<br><br>

	<div class="a-divider a-divider-break">

		<button type="submit" class="btn btn-md btn-primary display-4" style="margin: 10px;background-color: #4285f4;font-family: inherit;" name="signup" formnovalidate> <span class="mbri-rocket mbr-iconfont mbr-iconfont-btn" style="margin-right: 0.5rem;"></span>Create Account

		</button>

	</div>	

  </div>

</form>

   

 </div>

</body>

</html>