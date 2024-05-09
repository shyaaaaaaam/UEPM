<!DOCTYPE html>
<html lang="en">
<head>
    <title>UEPM</title>
    <link rel="stylesheet" href="indexstyle.css">
</head>
<body>

    <div class="main">
    <?php
        function checkCookie($cookieName) {
            return isset($_COOKIE[$cookieName]);
        }
        
        if (checkCookie('email')) {
            if (checkCookie('password')) {
                $email = $_COOKIE["email"];
                $pword = $_COOKIE["password"];
                $con=mysqli_connect("localhost", "root", "", "uepmuser");
                $confirm=mysqli_query($con, "SELECT * FROM userdata WHERE email = '$email' and pword = '$pword';");
                if(mysqli_num_rows($confirm) > 0) {
                    $row = mysqli_fetch_assoc($confirm);  
                    $xz=mysqli_close($con);
                    if (isset($rem)){
                        setcookie("id", $row["id"], time()+3600*24*365*10, "/");
                        setcookie("email", $email, time()+3600*24*365*10, "/");
                        setcookie("password", $pword, time()+3600*24*365*10, "/");
                        setcookie("name", $row['name'], time()+3600*24*365*10, "/");
                    } else {
                        setcookie("id", $row["id"], 0, "/");
                        setcookie("email", $email, 0, "/");
                        setcookie("password", $pword, 0, "/");
                        setcookie("name", $row['name'], 0, "/");
                    }
                    echo '<script>window.open("map.html","_self")</script>';
                }
                else {
                    $xz=mysqli_close($con);
                    echo '<script>alert("This Account Doesnt Exist, Please Try Creating An Account");</script>';
                    echo '<script>window.open("register.html","_self")</script>';
                }
            } else {
                echo '
                <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Universal Environment Pollution Monitoring</title>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/all.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-light top-nav fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="logo" width="250" height="70" />
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" href="log.php">Login</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="services.html">Services</a>
                  </li>
				  <li class="nav-item">
                    <a class="nav-link" href="classification.html">Classification</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownExplore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Explore
                     </a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" href="explore.html">Africa</a>
                        <a class="dropdown-item" href="explore.html">Asia</a>
                        <a class="dropdown-item" href="explore.html">Europe</a>
                        <a class="dropdown-item" href="explore.html">North America</a>
                        <a class="dropdown-item" href="explore.html">South America</a>
                        <a class="dropdown-item" href="explore.html">Oceania</a>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="map.html">Maps</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about.html">About</a>
                  </li>
               </ul>
            </div>
        </div>
    </nav>

	<div class="full-title">
		<div class="container">
			<h1 class="mt-4 mb-3">Login
				<small>A Socially Relevant Project</small>
			</h1>
		</div>
	</div>
	
    <div class="container">
		<div class="breadcrumb-main">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.html">Home</a>
				</li>
				<li class="breadcrumb-item active">Login</li>
			</ol>
		</div>

		<div style="display: flex; justify-content: center; align-items: center;">
            <div style="display: flex; flex-direction: column; align-items: center; border: 1px solid black; padding: 10px; width: 300px; border-radius: 5px;">
                <form action="login.php" method="post">
                    <label for="email">Email:‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ </label>
                    <input type="email" id="email" name="email" required>

                    <label for="pwd">Password:</label>
                    <input type="password" id="pwd" name="pwd" required>
                    <br>
                    <input type="checkbox" id="RM" name="RM" value="Remember">
                    <label for="RM" id="rem" name="rem">Remember Me</label>
                    <br>
                    <input type="submit" value="Login">
                    <input type="button" value="Don\'t Have An Account?" onclick="location.href=\'register.html\';">
                </form>
            </div>
        </div>
        <br>
	</div>

	<footer class="footer">
        <div class="container bottom_border">
            <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
					<p class="mb10">We Are Students Of Anna University, We Are Located Out Of This University.</p>
					<p><i class="fa fa-location-arrow"></i> Madras Institute of Technology, Radha Nagar, Chromepet, Chennai, Tamil Nadu 600044 </p>
					<p><i class="fa fa-phone"></i> +91-7358460622 </p>
					<p><i class="fa fa fa-envelope"></i> uepmfeedback@gmail.com </p>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Follow us</h5>
					<ul class="footer_ul2_amrc">
						<li>
							<a href="#"><i class="fab fa-instagram fleft padding-right"></i> </a>
							<p><a href="#">Instagram</a></p>
						</li>
						<li>
							<a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a>
							<p><a href="#">X (Twitter)</a></p>
						</li>
						<li>
							<a href="#"><i class="fab fa-linkedin fleft padding-right"></i> </a>
							<p><a href="#">Linkedin</a></p>
						</li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
					<ul class="footer_ul_amrc">
						<li><a href="#">Home</a></li>
						<li><a href="register.html">Sign Up</a></li>
						<li><a href="services.html">Services</a></li>
						<li><a href="explore.html">Explore</a></li>
						<li><a href="maps.html">Maps</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						<li><a href="about.html">About</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 ">
					<h5 class="headin5_amrc col_white_amrc pt2">Featured posts</h5>
					<ul class="footer_ul_amrc">
						<li class="media">
							<div class="media-left">
								<img class="img-fluid" src="images/post-img-01.jpg" alt="" />
							</div>
							<div class="media-body">
								<p><a href="https://en.wikipedia.org/wiki/Air_pollution">Wikipedia\'s Take On Air Pollution</a></p>
								<span>02 April 2024</span>
							</div>
						</li>
						<li class="media">
							<div class="media-left">
								<img class="img-fluid" src="images/post-img-02.jpg" alt="" />
							</div>
							<div class="media-body">
								<p><a href="https://www.icwpt.net/#:~:text=2024%209th%20International%20Conference%20on,industry%20and%20government%20is%20welcome.">Latest ICWPT Conference</a></p>
								<span>02 April 2024</span>
							</div>
						</li>
						<li class="media">
							<div class="media-left">
								<img class="img-fluid" src="images/post-img-03.jpg" alt="" />
							</div>
							<div class="media-body">
								<p><a href="https://www.theguardian.com/science/2024/feb/18/the-perfect-storm-for-small-talk-weather-forecasters-aim-at-long-range-accuracy">Talk On Accuracy Of Weather Prediction</a></p>
								<span>18 February 2024</span>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
        <div class="container">
            <div class="footer-logo">
				<a href="#"><img src="images/logo.png" alt="" /></a>
			</div>
            <p class="copyright text-center">All Rights Reserved. &copy; 2024 <a href="contact.html">UEPM</a></p>
            <ul class="social_footer_ul">
				<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
				<li><a href="#"><i class="fab fa-twitter"></i></a></li>
				<li><a href="#"><i class="fab fa-linkedin"></i></a></li>
				<li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </footer>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

            ';
            }
        } else {
            echo '
            <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Universal Environment Pollution Monitoring</title>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/all.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-light top-nav fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="logo" width="250" height="70" />
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" href="log.php">Login</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="services.html">Services</a>
                  </li>
				  <li class="nav-item">
                    <a class="nav-link" href="classification.html">Classification</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownExplore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Explore
                     </a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" href="explore.html">Africa</a>
                        <a class="dropdown-item" href="explore.html">Asia</a>
                        <a class="dropdown-item" href="explore.html">Europe</a>
                        <a class="dropdown-item" href="explore.html">North America</a>
                        <a class="dropdown-item" href="explore.html">South America</a>
                        <a class="dropdown-item" href="explore.html">Oceania</a>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="map.html">Maps</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about.html">About</a>
                  </li>
               </ul>
            </div>
        </div>
    </nav>

	<div class="full-title">
		<div class="container">
			<h1 class="mt-4 mb-3">Login
				<small>A Socially Relevant Project</small>
			</h1>
		</div>
	</div>
	
    <div class="container">
		<div class="breadcrumb-main">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.html">Home</a>
				</li>
				<li class="breadcrumb-item active">Login</li>
			</ol>
		</div>

		<div style="display: flex; justify-content: center; align-items: center;">
            <div style="display: flex; flex-direction: column; align-items: center; border: 1px solid black; padding: 10px; width: 300px; border-radius: 5px;">
                <form action="login.php" method="post">
                    <label for="email">Email:‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ </label>
                    <input type="email" id="email" name="email" required>

                    <label for="pass">Password:</label>
                    <input type="password" id="pass" name="pass" required>
                    <br>
                    <input type="checkbox" id="RM" name="RM" value="Remember">
                    <label for="RM" id="rem" name="rem">Remember Me</label>
                    <br>
                    <input type="submit" value="Login">
                    <input type="button" value="Don\'t Have An Account?" onclick="location.href=\'register.html\';">
                </form>
            </div>
        </div>
        <br>
	</div>

	<footer class="footer">
        <div class="container bottom_border">
            <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
					<p class="mb10">We Are Students Of Anna University, We Are Located Out Of This University.</p>
					<p><i class="fa fa-location-arrow"></i> Madras Institute of Technology, Radha Nagar, Chromepet, Chennai, Tamil Nadu 600044 </p>
					<p><i class="fa fa-phone"></i> +91-7358460622 </p>
					<p><i class="fa fa fa-envelope"></i> uepmfeedback@gmail.com </p>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Follow us</h5>
					<ul class="footer_ul2_amrc">
						<li>
							<a href="#"><i class="fab fa-instagram fleft padding-right"></i> </a>
							<p><a href="#">Instagram</a></p>
						</li>
						<li>
							<a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a>
							<p><a href="#">X (Twitter)</a></p>
						</li>
						<li>
							<a href="#"><i class="fab fa-linkedin fleft padding-right"></i> </a>
							<p><a href="#">Linkedin</a></p>
						</li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
					<ul class="footer_ul_amrc">
						<li><a href="#">Home</a></li>
						<li><a href="register.html">Sign Up</a></li>
						<li><a href="services.html">Services</a></li>
						<li><a href="explore.html">Explore</a></li>
						<li><a href="maps.html">Maps</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						<li><a href="about.html">About</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 ">
					<h5 class="headin5_amrc col_white_amrc pt2">Featured posts</h5>
					<ul class="footer_ul_amrc">
						<li class="media">
							<div class="media-left">
								<img class="img-fluid" src="images/post-img-01.jpg" alt="" />
							</div>
							<div class="media-body">
								<p><a href="https://en.wikipedia.org/wiki/Air_pollution">Wikipedia\'s Take On Air Pollution</a></p>
								<span>02 April 2024</span>
							</div>
						</li>
						<li class="media">
							<div class="media-left">
								<img class="img-fluid" src="images/post-img-02.jpg" alt="" />
							</div>
							<div class="media-body">
								<p><a href="https://www.icwpt.net/#:~:text=2024%209th%20International%20Conference%20on,industry%20and%20government%20is%20welcome.">Latest ICWPT Conference</a></p>
								<span>02 April 2024</span>
							</div>
						</li>
						<li class="media">
							<div class="media-left">
								<img class="img-fluid" src="images/post-img-03.jpg" alt="" />
							</div>
							<div class="media-body">
								<p><a href="https://www.theguardian.com/science/2024/feb/18/the-perfect-storm-for-small-talk-weather-forecasters-aim-at-long-range-accuracy">Talk On Accuracy Of Weather Prediction</a></p>
								<span>18 February 2024</span>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
        <div class="container">
            <div class="footer-logo">
				<a href="#"><img src="images/logo.png" alt="" /></a>
			</div>
            <p class="copyright text-center">All Rights Reserved. &copy; 2024 <a href="contact.html">UEPM</a></p>
            <ul class="social_footer_ul">
				<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
				<li><a href="#"><i class="fab fa-twitter"></i></a></li>
				<li><a href="#"><i class="fab fa-linkedin"></i></a></li>
				<li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </footer>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
            ';
        }
    ?>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>