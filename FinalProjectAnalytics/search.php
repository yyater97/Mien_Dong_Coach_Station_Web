<?php
session_start();
include('controller/controller.php');
$c = new controller();
$content = $c->getIndex_Info();
$image_route = $content['image_route'];
$carcollector = $content['carcollector'];
$arrSaleOff = $content['arrSaleOff'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ - Bến xe miền Đông</title>

	<!--CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/footer-distributed-with-address-and-phones.css">
	<link rel="stylesheet" href="view/css/bootstrap-3.1.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="view/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/index.css">
	<link rel="stylesheet" type="text/css" href="view/css/search.css">


</head>
<body>
	<nav class="navbar navbar-inverse">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<img id="nav_logo" src="view/img/images/nav_logo.png" alt="nav_logo"/>
			</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<div class="nav navbar-nav navbar-right">
				<div class="line above-bar">
					<div id="search-area" class="inline">
						<input id="txtSearch" type="text" name="txtSearch" placeholder="Nhập thông tin cần tìm kiếm">
						<a id="btnSearch" href="#"></a> 
					</div>
					<div class="inline basket">
						<a href="basket.php">
							<span id="basket-text">Giỏ hàng</span>
							<?php
							if(!isset($_SESSION['amount_ticket_in_basket']))
								$_SESSION['amount_ticket_in_basket']='0';
							?>	
							<span id="amount-in-basket"><?=$_SESSION['amount_ticket_in_basket']?></span>
						</a>
					</div>
					<div class="inline account">
						<?php
						if(isset($_SESSION['user_name']) && isset($_SESSION['type_user']) && isset($_SESSION['user_id'])){
							if($_SESSION['type_account']=='NV'){
								?>
								<a href="staff_account.php">
									<?php
								}else{
									?>
									<a href="account.php">
										<?php
									}
									if(!isset($_SESSION['avatar'])){
										?>
										<img class="avatar-account inline" src="view/img/images/avatar.png" style="margin-top: -40px;" />
										<?php
									}else{
										?>
										<img class="avatar-account inline" src="<?=$_SESSION['avatar']?>" style="margin-top: -40px; width: 71px; height: 71px; border-radius: 50%; border: 2px solid #fff;" />
										<?php
									}
									?>
									<div class="account-info inline">
										<span class="name-account line"><?=$_SESSION['user_name']?></span>
										<span class="type-account line"><?=$_SESSION['type_user']?></span>
										<?php if($_SESSION['type_account']=='NV'){
											?>
											<a href="admin_manager.php"><i class="fa fa-suitcase" aria-hidden="true" style="width: 16px; height: 16px; color: white"></i></a>
											<?php
										}
										?>
										<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true" style="width: 16px; height: 16px; color: white"></i></a>
									</div>
								</a>
								<?php
							}else{
								?>
								<img class="avatar-account inline" src="view/img/images/avatar.png"/>
								<div class="account-info inline">			
									<a href="login.php"><span class="name-account line">Đăng nhập</span></a>
									<span class="type-account line">Tên tài khoản</span>
								</div>
								<?php
							}
							?>
						</div>
					</div>
					<div class="line under-bar">
						<ul>
							<li class="inline"><a href="index.php">Trang chủ</a></li>
							<li class="inline"><a href="index.php#intro-part">Giới thiệu</a></li>
							<li class="inline"><a href="search.php">Khuyến mãi</a></li>
							<li class="inline"><a href="index.php#contact-us">Liên hệ</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>

		<article class="content" id="datasearch">
			<div class="container">
				<div class="row sale_off">
					<img class="row title img-responsive" src="view/img/images/title_sale_off.png">
					<div class="row saleoff-content">
						<!-- Swiper -->
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<?php
								for($i=0; $i<count($image_route); $i++){
									if($arrSaleOff[$i]->GIAMGIA!=0){
									?>
										<div class="swiper-slide">
											<div class="saleoff-item">
												<img src="<?=$image_route[$i]->ANH?>">
												<span class="down-per"><?=-(string)($arrSaleOff[$i]->GIAMGIA*100).'%'?></span>
											</div>
										</div>
									<?php
									}
								}
								?>
							</div>
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				<div class="row route">
					<img class="row title img-responsive" src="view/img/images/title_route.png">
					<div class="row route-content">
						<?php
						foreach($image_route as $image){
							?>
							<img class="col-md-4" src="<?=$image->ANH?>">
							<?php
						}
						?>
					</div>
				</div>
			</div>
			<div class="row car-manufacturer container-fuild">
				<img class="row title img-responsive" src="view/img/images/title_car.png">
				<div class="row car-manufacturer-content">
					<div class="row">
						<?php
						for($i=0; $i<count($carcollector); $i++){
							?>
							<div class="car-manufacturer-item col-md-6 col-sm-12 col-xs-12">						
								<div class="car-manufacturer-text-content">
									<div class="evaluate">
										<?php
										for($j=0; $j<$carcollector[$i]->DANHGIA; $j++){
											?>
											<img class="star-icon" src="view/img/star_icon_active.png"/>
											<?php
										}
										for($j=0; $j<5-$carcollector[$i]->DANHGIA; $j++){
											?>
											<img class="star-icon" src="view/img/star_icon_unactive.png"/>
											<?php
										}
										?>												
									</div>
									<div class="clear"></div>
									<p class="line car-manufacturer-name"><?=$carcollector[$i]->TEN_NX?></p>
									<p class="line car-manufacturer-text"><?=$carcollector[$i]->TOMTAT?></p>
									<form>
										<a href="detail.php?MANX=<?=$carcollector[$i]->MANX?>" class="car-manufacturer-button" type="submit" name="btnSeeMore" value=""></a>
									</form>
								</div>
							</div>
							<?php
						}
						?>	
					</div>
				</div>
			</div>
		</article>

		<!-- footer -->
		<footer class="footer-distributed">
			<div class="footer-left">
				<img src="view/img/footer_logo.png" alt="">
				<p class="footer-links">
					<a href="#">Trang Chủ</a>
					·
					<a href="#">Giới thiệu</a>
					·
					<a href="#">Khuyến mãi</a>
					·
					<a href="#">Liên hệ</a>
				</p>
				<p class="footer-company-name">Nhóm con chim non &copy; 2018</p>
			</div>
			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Khu phố 6, phường Linh Trung</span>Quận Thủ Đức, Tp.Hồ Chí Minh</p>
				</div>
				<div>
					<i class="fa fa-phone"></i>
					<p>(08) 37251993</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:DHCNTT_TPHCM@gm.uit.com.vn">DHCNTT_TPHCM@gm.uit.com.vn</a></p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>Thông tin về nhóm:</span>
					<p class="group-member">Nhóm bao gồm 3 thành viên:</p>
					<p class="group-member">15520801: Dương Văn Thanh</p>
					<p class="group-member">15520680: Phạm Ngọc Quân</p>
					<p class="group-member">15520693: Trần Hưng Quang</p>
				</p>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>
				</div>
			</div>
		</footer>
	</body>
	<script src="view/js/jquery-3.3.1.min.js"></script>
	<script src="view/js/bootstrap.min.js"></script>
	<script src="view/js/swiper.min.js"></script>
	<script language="javascript" src="view/js/index.js"></script>
	<script language="javascript" src="view/js/search.js"></script>
	</html>