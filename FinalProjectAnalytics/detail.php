<?php
session_start();
include('controller/controller.php');
$c = new controller();
$content = $c->getDetail_Info();
$cc_fi = $content['carCollector_FullInfo'];
$cc_fi = $cc_fi[0];
$best_cc = $content['bestCarCollector'];
$rand_cc = $content['randCarCollector'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />
	<title>World History - Detail Information</title>

	<!-- CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/footer-distributed-with-address-and-phones.css">
	<link rel="stylesheet" href="view/css/bootstrap-3.1.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/index.css">
	<link rel="stylesheet" type="text/css" href="view/css/detail.css">
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
	<!-- Page Content -->
	<div class="container-fluid" id="datasearch">
		<div class="row">

			<!-- Blog Post Content Column -->
			<div class="col-md-9 content">
				<div class="main-content">

					<!-- Blog Post -->

					<!-- Title -->
					<h1>Nhà xe <?=$cc_fi->TEN_NX?></h1>

					<!-- Author -->
					<p class="lead">
						by <a href="#">Nhóm con chim non</a>
					</p>


					<div class="evaluate">
						<?php
						for($j=0; $j<$cc_fi->DANHGIA; $j++){
							?>
							<img class="star-icon" src="view/img/star_icon_active.png"/>
							<?php
						}
						for($j=0; $j<5-$cc_fi->DANHGIA; $j++){
							?>
							<img class="star-icon" src="view/img/star_icon_unactive.png"/>
							<?php
						}
						?>												
					</div>

					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#content">Nội dung</a></li>
						<li><a data-toggle="tab" href="#video">Video</a></li>
					</ul>

					<div class="tab-content">
						<div id="content" class="tab-pane fade in active">

							<!-- Post Content -->
							<p class="lead">
								<?=$cc_fi->GIOITHIEU?>
							</p>						

						</div>

						<div id="video" class="tab-pane fade">
							<div class="img-responsive">
								<?php
								if($cc_fi->VIDEO!=NULL){	
									?>				
									<video src="<?=$cc_fi->VIDEO?>" controls="controls" style="width:100%; height: auto"></video>	
									<?php
								}else{
									?>
									<blockquote>Hiện tại nhà xe chưa có video giới thiệu!</blockquote>						
									<?php
								}	
								?>
							</div>				
						</div>

						<hr>
						<div class="carcollector_address_form">
							<form>
							<div class="form-row">
								<label>Địa chỉ:</label>
								<div class="signup-form-input">
									<i class="fa fa-globe icon" aria-hidden="true"></i>
									<input type="text" name="address" disabled="true" value="<?=$cc_fi->DIACHI_NX?>">
								</div>
							</div>
							<div class="form-row">
								<label>Số điện thoại:</label>
								<div class="signup-form-input">
									<i class="fa fa-phone icon" aria-hidden="true"></i>
									<input type="text" name="phone_number" disabled="true" value="<?=$cc_fi->SDT_NX?>">
								</div>
							</div>
							<div class="form-row">
								<label>Email:</label>
								<div class="signup-form-input">
									<i class="fa fa-envelope icon" aria-hidden="true"></i>
									<input type="text" name="email" disabled="true" value="<?=$cc_fi->EMAIL_NX?>">
								</div>
							</div>
							<div class="form-row">
								<label>Số xe:</label>
								<div class="signup-form-input">
									<i class="fa fa-car icon" aria-hidden="true"></i>
									<input type="text" name="amount_car" disabled="true" value="<?=$cc_fi->SOXE?>">
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Blog Sidebar Widgets Column -->
			<div class="col-md-3 aside-bar">

				<div class="panel panel-default">
					<div class="panel-heading"><b>Nhà xe có chất lượng tốt</b></div>
					<div class="panel-body">

						<!-- item -->
						<?php 
						foreach($best_cc as $element){
							?>
							<div class="row" style="margin-top: 10px; padding: 0 15px">
								<div class="col-md-5">
									<a href="detail.php?MaSK=<?=$element->MANX?>">
										<img class="img-responsive" src="<?=$element->ANH?>" alt="">
									</a>
								</div>
								<div class="col-md-7">
									<a href="detail.php?MANX=<?=$element->MANX?>"><b><?=$element->TEN_NX?></b></a>
								</div>
								<!--<p><?=$hi->TomTatSK?></p>-->
								<div class="break"></div>
							</div>
							<!-- end item -->
							<?php
						}
						?>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><b>Các nhà xe khác</b></div>
					<div class="panel-body">

						<!-- item -->
						<?php 
						foreach($rand_cc as $element){
							?>
							<div class="row" style="margin-top: 10px; padding: 0 15px">
								<div class="col-md-5">
									<a href="detail.php?MaSK=<?=$element->MANX?>">
										<img class="img-responsive" src="<?=$element->ANH?>" alt="">
									</a>
								</div>
								<div class="col-md-7">
									<a href="detail.php?MANX=<?=$element->MANX?>"><b><?=$element->TEN_NX?></b></a>
								</div>
								<!--<p><?=$hi->TomTatSK?></p>-->
								<div class="break"></div>
							</div>
							<!-- end item -->
							<?php
						}
						?>
					</div>
				</div>

			</div>

		</div>
		<!-- /.row -->
	</div>
	<!-- end Page Content -->

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

	<!-- JS -->
	<script src="view/js/jquery-3.3.1.min.js"></script>
	<script src="view/js/bootstrap.min.js"></script>
	<script language="javascript" src="view/js/search.js"></script>
</body>
</html>