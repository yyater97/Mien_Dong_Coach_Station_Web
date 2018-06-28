<?php
session_start();
include('controller/controller.php');
$c = new controller();
$content = $c->getTicketBooking_Info();
$image_route = $content['image_route'];
$car_collector = $content['car_collector'];

if(isset($_POST['book'])){
	$schedule_id = $_POST['time_begin'];
	$wait_position = $_POST['wait_position'];
	$char_name = $_POST['char_name'];
	$amount_char = $_POST['amount_char'];
	$note = $_POST['note'];
	$ticket = $c->insertTicket($schedule_id, $wait_position, $amount_char, $char_name, $note);	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="refresh" content="number">
	<title>Tiến hành đặt vé - Bến xe miền Đông</title>

	<!--CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/footer-distributed-with-address-and-phones.css">
	<link rel="stylesheet" href="view/css/bootstrap-3.1.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="view/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/index.css">
	<link rel="stylesheet" type="text/css" href="view/css/ticket-booking.css">

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

	<article class="row content container-fuild" id="datasearch">
		<div class="row booking-form">
			<form method="POST" action="#">
				<p class="form-row" id="booking-title">Thông tin đặt vé</p>
				<div class="main-content">
				<?php
					if(isset($_SESSION['insertTicket_error'])){
						echo "<div class='alert alert-danger'>".($_SESSION['insertTicket_error'])."</div>";
					}
					else if(isset($_SESSION['insertTicket_success'])){
						echo "<div class='alert alert-success'>".($_SESSION['insertTicket_success'])."</div>";
					}
				?>
				<div class="form-col col-md-4">
					<div class="car-model col-md-12">
						<ul class="nav nav-tabs">
    						<li class="active"><a data-toggle="tab" href="#floor-1">Tầng 1</a></li>
    						<li><a data-toggle="tab" href="#floor-2">Tầng 2</a></li>
  						</ul>

  						<div class="tab-content">
    						<div id="floor-1" class="tab-pane fade in active">
    							<div class="seat-row seat-row-left">
									<p class="seat" id="A1">A3</p>
									<p class="seat" id="A4">A4</p>
									<p class="seat" id="A9">A9</p>
									<p class="seat" id="A10">A10</p>
									<p class="seat" id="A15">A15</p>
									<p class="seat" id="A16">A16</p>
									<p class="seat" id="A23">A23</p>
								</div>
								<div class="seat-row seat-row-mid">
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="seat" id="A22">A22</p>
								</div>
								<div class="seat-row seat-row-center">
									<p class="seat" id="A2">A2</p>
									<p class="seat" id="A5">A5</p>
									<p class="seat" id="A8">A8</p>
									<p class="seat" id="A11">A11</p>
									<p class="seat" id="A14">A14</p>
									<p class="seat" id="A17">A17</p>
									<p class="seat" id="A21">A21</p>
								</div>
								<div class="seat-row seat-row-mid">
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="seat" id="A13">A20</p>
								</div>
								<div class="seat-row seat-row-right">
									<p class="seat" id="A1">A1</p>
									<p class="seat" id="A6">A6</p>
									<p class="seat" id="A7">A7</p>
									<p class="seat" id="A12">A12</p>
									<p class="seat" id="A13">A13</p>
									<p class="seat" id="A18">A18</p>
									<p class="seat" id="A19">A19</p>
								</div>
      						</div>
    						<div id="floor-2" class="tab-pane fade">
    							<div class="seat-row seat-row-left">
									<p class="seat" id="B1">B3</p>
									<p class="seat" id="B4">B4</p>
									<p class="seat" id="B9">B9</p>
									<p class="seat" id="B10">B10</p>
									<p class="seat" id="B15">B15</p>
									<p class="seat" id="B16">B16</p>
									<p class="seat" id="B23">B23</p>
								</div>
								<div class="seat-row seat-row-mid">
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="seat" id="B22">B22</p>
								</div>
								<div class="seat-row seat-row-center">
									<p class="seat" id="B2">B2</p>
									<p class="seat" id="B5">B5</p>
									<p class="seat" id="B8">B8</p>
									<p class="seat" id="B11">B11</p>
									<p class="seat" id="B14">B14</p>
									<p class="seat" id="B17">B17</p>
									<p class="seat" id="B21">B21</p>
								</div>
								<div class="seat-row seat-row-mid">
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="no-seat"></p>
									<p class="seat" id="B13">B20</p>
								</div>
								<div class="seat-row seat-row-right">
									<p class="seat" id="B1">B1</p>
									<p class="seat" id="B6">B6</p>
									<p class="seat" id="B7">B7</p>
									<p class="seat" id="B12">B12</p>
									<p class="seat" id="B13">B13</p>
									<p class="seat" id="B18">B18</p>
									<p class="seat" id="B19">B19</p>
								</div>
    						</div>
    					</div>
					</div>
				</div>
				<div class="form-col col-md-4">
					<div class="form-row">
						<label>Tên nhà xe:</label>
						<select name="car_collector" id="car_collector">
							<?php
								for($i=0; $i<count($car_collector); $i++){
									?>
										<option value="<?=$car_collector[$i]->MANX?>"><?=$car_collector[$i]->TEN_NX?></option>
									<?php
								}
							?>
						</select>
					</div>
					<div class="form-row">
						<label>Biển số xe:</label>
						<select name="car_code" id="car_code">
						</select>
					</div>
					<div class="form-row">
						<label>Tuyến:</label>
						<select name="route" id="route">
						</select>
					</div>
					<div class="form-row">
						<label>Giá vé (giá tiền 1 vé):</label>
						<select name="cost" id="cost">
						</select>
					</div>
					<div class="form-row">
						<label>Số lượng:</label>
						<div class="login-form-input">
							<i class="fa fa-sort-numeric-asc icon" aria-hidden="true"></i>
							<input type="text" name="amount_char" id="amount_char" value="0" placeholder="Số lượng ghế đã đặt">
						</div>
					</div>
					<div class="form-row">
						<label>Số ghế:</label>
						<div class="login-form-input">
							<i class="fa fa-th-large icon" aria-hidden="true"></i>
							<input type="text" name="char_name" id="char_name" value="" placeholder="Chọn số ghế cần đặt ở mô hình">
						</div>
					</div>
				</div>
				<div class="form-col col-md-4">
					<div class="form-row">
						<label>Thời gian đi:</label>
						<select name="time_begin" id="time_begin">
						</select>
					</div>
					<div class="form-row">
						<label>Thời gian đến dự kiến:</label>
						<select id="time_end">
						</select>
					</div>
					<div class="form-row">
						<label>Vị trí chờ xe:</label>
						<div class="login-form-input">
							<i class="fa fa-thumb-tack icon" aria-hidden="true"></i>
							<input type="text" name="wait_position" placeholder="Nhập tài vị trí chờ xe khách">
						</div>
					</div>
					<div class="form-row">
						<label>Ghi chú:</label>
						<textarea name="note"></textarea>
					</div>
				</div>
				<div class="clear"></div>
			</div>
				<div class="form-row">
					<input type="submit" name="book" id="book-button" value="Tiến hành đặt vé">
				</div>
			</form>
		</div>
		<div class="row sale-off-item">
			<img class="row title img-responsive" src="view/img/images/title_route.png">
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
	<script src="view/js/ticket-booking.js"></script>
</html>