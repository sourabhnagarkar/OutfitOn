
<?php
session_start();

if (isset($_SESSION['vendor_id'])) {
    header("Location: vendor_dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, #1CB5E0, #000851);
            padding: 10px 0 0 0;
        }
        .topbar {
            background: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .topbar a {
            text-decoration: none;
            color: #4f46e5;
            margin-left: 20px;
            font-weight: bold;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-button {
            background-color: #e53e3e;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            min-width: 160px;
            z-index: 1;
        }
        .dropdown-content a {
            color: red;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #f2f2f2;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }
        .left-panel {
            flex: 1 1 300px;
            min-height: 250px;
            background: url('login.jpeg') center/cover no-repeat;
            filter: brightness(0.6) hue-rotate(270deg);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            text-align: center;
        }
        .left-panel h2 { font-size: 2rem; margin-bottom: 10px; }
        .left-panel p { font-size: 0.9rem; margin-top: auto; }

        form {
            flex: 1 1 400px;
            padding: 30px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #444;
        }
        input[type="text"], input[type="password"], select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        input[type="submit"] {
            margin-top: 25px;
            width: 100%;
            background-color: #4f46e5;
            color: white;
            font-weight: bold;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #3730a3;
        }
        @media (max-width: 768px) {
            .container { flex-direction: column; }
            .left-panel { order: -1; padding: 40px 20px; }
            form { padding: 20px; }
        }
        @media (max-width: 480px) {
            .left-panel h2 { font-size: 1.5rem; }
            form h2 { font-size: 1.4rem; }
            input, select, textarea { font-size: 0.9rem; }
            input[type="submit"] { font-size: 0.95rem; padding: 10px; }
        }
    </style>
    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
  <div>  

<div class="topbar">
    <a href="#" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>
    <div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.html">Home</a>
								<ul class="sub-menu">
									<li><a href="index.html">Homepage 1</a></li>
									<li><a href="home-02.html">Homepage 2</a></li>
									<li><a href="home-03.html">Homepage 3</a></li>
								</ul>
							</li>

							<li>
								<a href="product.html">Shop</a>
							</li>

							<li class="label1" data-label1="hot">
								<a href="shoping-cart.html">Features</a>
							</li>

							<li>
								<a href="blog.html">Blog</a>
							</li>

							<li>
								<a href="about.html">About</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>
						</ul>
					</div>	
                    
    <?php if (isset($_SESSION['vendors'])): ?>
        <div class="dropdown">
            <button class="dropdown-button">👤</button>
            <div class="dropdown-content">gn up
                <a href="account_manage.php">Account Manage</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    <?php else: ?>
        <a href="vendor_login.php">Login</a>
        <a href="vendor_register.php">Register</a>
    <?php endif; ?>
</div>

<div class="container">
    <div class="left-panel">
        <h2>Welcome Back</h2>
        <p>Login to list your store on <strong>OutfitOn</strong></p>
    </div>
        
            <form name="vendorForm" action="vendor_login_check.php" method="POST" onsubmit="return validatePassword();">
                <h2>Vendor Login</h2>

        <label>Email:</label>
        <input type="text" name="email" id="email" required placeholder="e.g. user@example.com" />

        <label>Password:</label>
        <input type="password" name="password" id="password" required placeholder="Min 6 chars, letters, numbers & symbols" />

        <input type="submit" name="submit" value="Login" />
    </form>
</div>
</div>

<footer class="bg3 p-t-75 p-b-32">
    <div class="footer-content">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">Categories</h4>
                <ul>
                    <li class="p-b-10"><a href="#" class="stext-107 cl7 hov-cl1 trans-04">Women</a></li>
                    <li class="p-b-10"><a href="#" class="stext-107 cl7 hov-cl1 trans-04">Men</a></li>
                    <li class="p-b-10"><a href="#" class="stext-107 cl7 hov-cl1 trans-04">Shoes</a></li>
                    <li class="p-b-10"><a href="#" class="stext-107 cl7 hov-cl1 trans-04">Watches</a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">Help</h4>
                <ul>
                    <li class="p-b-10"><a href="#" class="stext-107 cl7 hov-cl1 trans-04">Track Order</a></li>
                    <li class="p-b-10"><a href="#" class="stext-107 cl7 hov-cl1 trans-04">Returns</a></li>
                    <li class="p-b-10"><a href="#" class="stext-107 cl7 hov-cl1 trans-04">Shipping</a></li>
                    <li class="p-b-10"><a href="#" class="stext-107 cl7 hov-cl1 trans-04">FAQs</a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">GET IN TOUCH</h4>
                <p class="stext-107 cl7 size-201">Any questions? Let us know at 8th floor, 379 Hudson St, New York, NY or call (+1) 96 716 6879</p>
                <div class="p-t-27">
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16"><i class="fa fa-pinterest-p"></i></a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">Newsletter</h4>
                <form>
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
                        <div class="focus-input1 trans-04"></div>
                    </div>
                    <div class="p-t-18">
                        <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-t-40">
            <div class="flex-c-m flex-w p-b-18">
                <a href="#" class="m-all-1"><img src="images/icons/icon-pay-01.png" alt="ICON-PAY"></a>
                <a href="#" class="m-all-1"><img src="images/icons/icon-pay-02.png" alt="ICON-PAY"></a>
                <a href="#" class="m-all-1"><img src="images/icons/icon-pay-03.png" alt="ICON-PAY"></a>
                <a href="#" class="m-all-1"><img src="images/icons/icon-pay-04.png" alt="ICON-PAY"></a>
                <a href="#" class="m-all-1"><img src="images/icons/icon-pay-05.png" alt="ICON-PAY"></a>
            </div>

            <p class="stext-107 cl6 txt-center">
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> & distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </p>
        </div>
    </div>
</footer>
</body>
</html>
