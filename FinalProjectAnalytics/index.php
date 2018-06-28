<?php
session_start();
include('controller/controller.php');
$c = new controller();
$c->deleteTicket_DidntPay_c();
$content = $c->getIndex_Info();
$image_route = $content['image_route'];
$slide = $content['slide'];
$carcollector = $content['carcollector'];
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
						<li class="inline"><a href="index.php" class="active">Trang chủ</a></li>
						<li class="inline"><a href="index.php#intro-part">Giới thiệu</a></li>
						<li class="inline"><a href="search.php">Khuyến mãi</a></li>
						<li class="inline"><a href="index.php#contact-us">Liên hệ</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<article class="content" id="datasearch">
		<div class="row slider">
			<div class="siderbar-menu col-md-3">
				<ul>
					<li><a href="search.php">Tuyến xe khách</a></li>
					<li><a href="search.php">Nhà xe</a></li>
					<li><a href="search.php">Địa điểm</a></li>
					<li><a href="ticket_booking.php">Đặt vé</a></li>
				</ul>
			</div>
			<!-- carousel -->
			<div  id="carousel" class="carousel slide col-md-9" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php
						for($i=0; $i<count($slide); $i++){
							if($i==0){
							?>
								<li data-target="#carousel" data-slide-to="<?=$i?>" class="active"></li>					
							<?php
							}else{
							?>
								<li data-target="#carousel" data-slide-to="<?=$i?>"></li>
							<?php
							}
						}
					?>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">    
					<?php
						for($i=0; $i<count($slide); $i++){
							if($i==0){
							?>
								<div class="item active">
									
							<?php
							}else{
							?>
								<div class="item">
							<?php
							}
							?>
									<img src="<?=$slide[$i]->LINK?>">
								</div>
							<?php
						}
					?>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#carousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>

		<div class="container">
			<div class="row route">
				<a href="search.php"><img class="row title img-responsive" src="view/img/images/title_route.png"></a>
				<div class="row route-content">
					<!-- Swiper -->
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php
							foreach($image_route as $image){
								?>
								<div class="swiper-slide"><img src="<?=$image->ANH?>"></div>
								<?php
							}
							?>
						</div>
						<!-- Add Pagination -->
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
			<div class="row car-manufacturer">
				<a href="search.php"><img class="row title img-responsive" src="view/img/images/title_car.png"></a>
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
			<div class="row intro" id="intro-part">
				<img class="row title img-responsive" src="view/img/images/title_intro.png">
				<div class="row">
					<div class="intro-item col-md-3 col-sm-6 col-xs-10">
						<img class="row intro-img img-responsive" src="view/img/route_icon.png">
						<img class="row intro-icon img-responsive" src="view/img/images/intro_icon.png">
						<div class="intro-item-content">
							<p class="row intro-name">Nhiều tuyến xe lớn</p>
							<p class="row intro-text">Bến xe Miền Đông là bến xe khách lớn nhất Thành phố Hồ Chí Minh về lượng khách vận chuyển mỗi năm và về lưu lượng xe mỗi ngày. Bến xe này là đầu mối cho tất cả các chuyến xe khách đi và đến Thành phố Hồ Chí Minh từ các tỉnh miền Bắc, miền Trung, Tây Nguyên và cả một số tuyến từ các tỉnh miền Đông Nam Bộ</p>
						</div>
					</div>
					<div class="intro-item col-md-3 col-sm-6 col-xs-12">
						<img class="row intro-img img-responsive" src="view/img/prestigious_icon.png">
						<img class="row intro-icon img-responsive" src="view/img/images/intro_icon.png">
						<div class="intro-item-content">
							<p class="row intro-name">Uy tín, trách nhiệm, tận tình</p>
							<p class="row intro-text">Qua hơn 30 năm hoạt động, Bến xe khách Miền Đông luôn đặt lợi ích phục vụ vận chuyển hành khách lên hàng đầu. Bến xe hiện là nơi lưu đậu các phương tiện vận tải hành khách cố định, tổ chức bán vé cho các hãng xe theo hợp đồng uỷ thác và tổ chức điều hành xe ra vào bến. Nhờ đó, việc đón trả khách, giờ xe xuất bến luôn được đảm bảo theo quy định.</p>
						</div>
					</div>
					<div class="intro-item col-md-3 col-sm-6 col-xs-12">
						<img class="row intro-img img-responsive" src="view/img/quality_icon.png">
						<img class="row intro-icon img-responsive" src="view/img/images/intro_icon.png">
						<div class="intro-item-content">
							<p class="row intro-name">Chất lượng đảm bảo</p>
							<p class="row intro-text">Bến xe Miền Đông -TP Hồ Chí Minh - Việt nam là một trong những bến xe lớn nhất của cả nước và đang phục vụ cho tất cả các tuyến xe trên toàn quốc. Phục vụ các tuyến xe liên tỉnh chất lượng cao, có được chứng nhận chất lượng của bộ giao thông vận tải và một số chứng nhận khu vực.</p>
						</div>
					</div>
				</div>
			</div> 
			<div id="contact-us">
				<img class="row title img-responsive" src="view/img/images/title_contactus.png">
				<form action="#">
					<div class="row contact-us-form">
						<div class="col-md-6">
							<div class="form-col">
								<label class="form-row">Tên người dùng:</label>
								<input class="form-row" type="text" name="user-name" placeholder="Nhập tên người dùng">
							</div>          
							<div class="form-col">
								<label class="form-row">Địa chỉ email:</label>
								<input class="form-row" type="email" name="email" placeholder="Nhập địa chỉ email">
							</div>
							<div class="form-col">
								<label class="form-row">Tiêu đề:</label>
								<input class="form-row" type="text" name="title-contact" placeholder="Nhập tiêu đề">
							</div>
							<div class="form-col">
								<label class="form-row">Nội dung:</label>
								<textarea class="form-row" id="txtContent-Contact-Us"></textarea>
							</div>
							<input id="contact-us-send-button" class="form-col" type="button" name="submit" value="Gửi lời nhắn">
							<blockquote>Xin chân thành cám ơn bạn đã đóng góp ý kiến!</blockquote>
						</div>
						<div class="col-md-6">
							<blockquote class="line" id="text-title">Lời cảm ơn</blockquote>
							<blockquote>Cảm ơn quý khách đã sử dụng dịch vụ và đóng góp ý kiến cho chúng tôi. Mọi ý kiến đóng góp sẽ giúp chúng tôi cải thiện chất lượng dịch vụ tốt hơn, giúp quý khách thoải mái hơn. Chúng tôi sẽ cố gắng phản hồi một cách sớm nhất!<br/>Chúc quý khách có một chuyến đi an toàn và thoải mái. Xin chân thành cám ơn!
							</blockquote>
							<a href="#" class="thumbnail" id="location-in-map">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.9569986517076!2d106.70916201435082!3d10.814602792295616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752899e97ed571%3A0xf005860ba5f88dbf!2zQuG6v24gWGUgTWnhu4FuIMSQw7RuZw!5e0!3m2!1svi!2s!4v1527999099818" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
							</a>
						</div>
					</div>
				</form>
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
<script language="javascript" src="view/js/search.js"></script>
<script language="javascript" src="view/js/index.js"></script>
</html>