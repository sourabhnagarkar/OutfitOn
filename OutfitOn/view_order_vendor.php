<?php
 session_start() ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blog</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--========================================================================
=======================-->	
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
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
.order-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
}

.order-card {
    background-color: #f9f9f9;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    padding: 15px;
    transition: transform 0.3s ease;
}

.order-card:hover {
    transform: scale(1.02);
}

.order-card img {
    width: 100%;
    border-radius: 5px;
}

.order-card .order-details {
    padding-top: 10px;
}

.order-card .order-details span,
.order-card .order-details a {
    display: block;
    margin-top: 5px;
    color: #333;
}

.order-card form {
    margin-top: 10px;
}
footer {
    margin-top: 40px;
    background-color: #222;
    color: #fff;
}

footer h4 {
    color: #fff;
}

footer a {
    color: #ccc;
}

footer a:hover {
    color: #fff;
}

</style>

</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
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

							<li class="active-menu">
								<a href="blog.html">Blog</a>
							</li>

							<li>
								<a href="about.html">About</a>
							</li>

							<li>
								<a href="contact.html">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						<a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
					<ul class="sub-menu-m">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="home-02.html">Homepage 2</a></li>
						<li><a href="home-03.html">Homepage 3</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Your Orders
		</h2>
	</section>	

<div class="order-grid">
<?php
include 'connects.php';
$conn = connectdb();



if (!isset($_SESSION['vendor_id'])) {
    echo "<script>alert('Please login as vendor.'); window.location.href='vendor_login.php';</script>";
    exit();
}
$vendor_id = $_SESSION['vendor_id'];

// Fetch orders where this vendor_id has received orders
$sql = "SELECT o.*, 
               c.name AS cloth_name, c.description AS cloth_description, 
               c.category AS cloth_category, c.size AS cloth_size, 
               c.photo AS cloth_photo, c.price AS cloth_price,
               u.name AS customer_name, u.email AS customer_email, 
               u.phone AS customer_phone, u.city AS customer_city 
        FROM orders o 
        JOIN clothes c ON o.cloth_id = c.id 
        JOIN users u ON o.user_id = u.id 
        WHERE o.vendor_id = ? 
        ORDER BY o.created_at DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $vendor_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="order-card">
            <img src="' . htmlspecialchars($row['cloth_photo']) . '" alt="PRODUCT">

            <div class="order-details">
                <a class="stext-116 cl8 hov-cl1 trans-04">' . htmlspecialchars($row['cloth_name']) . '</a>
                <span>Price: ₹' . number_format($row['cloth_price'], 2) . '</span>
                <span>From: ' . $row['fdate'] . '</span>
                <span>To: ' . $row['tdate'] . '</span>
                <span>Status: <strong>' . ucfirst($row['status']) . '</strong></span>
                <hr>
                <strong>Customer Info:</strong>
                <span>Name: ' . htmlspecialchars($row['customer_name']) . '</span>
                <span>Email: ' . htmlspecialchars($row['customer_email']) . '</span>
                <span>Phone: ' . htmlspecialchars($row['customer_phone']) . '</span>
                <span>City: ' . htmlspecialchars($row['customer_city']) . '</span>';

        // Status update button (if status is pending or approved)
        if (in_array(strtolower($row['status']), ['pending', 'approved'])) {
            echo '
                <form action="update_order_status.php" method="POST">
                    <input type="hidden" name="order_id" value="' . $row['id'] . '">
                    <select name="new_status" class="form-control" required>
                        <option value="">Change Status</option>
                        <option value="approved">Approved</option>
                        <option value="shipped">Shipped</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                    <button type="submit" class="btn btn-success btn-sm mt-2">Update Status</button>
                </form>';
        }

        echo '</div></div>';
    }
} else {
    echo '<p>No orders received yet.</p>';
}

$stmt->close();
$conn->close();
?>

</div>
		
						
	<div>
		
	<!-- Footer -->
<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
	<div class="container">
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
				<p class="stext-107 cl7 size-201">Any questions? Let us know at 8th floor, 379 Hudson St, New York, NY 10018 or call (+1) 96 716 6879</p>
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
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |
				Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				& distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
			</p>
		</div>
	</div>
</footer>
</div>
<div>
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	</div>
</body>
</html> 