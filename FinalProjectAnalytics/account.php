<?php
session_start();
include('controller/controller.php');
$c = new controller();

$content = $c->getAccount_Info($_SESSION['user_id']);
$account_info = $content['account_info'];
$invoiceID = $content['invoiceID'];

$amount_ticket = 0;

for($i=0; $i<count($invoiceID); $i++){
	$tickets = $c->getAccount_BookHistory($invoiceID[$i]->MAHD);
	$amount_ticket = $amount_ticket + count($tickets);
}

if(isset($_POST['save'])){
	$account_name = $_POST['account_name'];
	$user_password = $_POST['password'];
	if($user_password != $account_info[0]->MATKHAU)
		$user_password = md5($user_password);
	$name = $_POST['name'];
	$birthday = $_POST['birthday'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];

	$updateAccountInfo = $c->updateAccount_Info($_SESSION['user_id'], $user_name, $user_password, $name, $birthday, $address, $email, $phone_number);
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thông tin tài khoản - Bến xe miền Đông</title>

	<!--CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/footer-distributed-with-address-and-phones.css">
	<link rel="stylesheet" href="view/css/bootstrap-3.1.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/index.css">
	<link rel="stylesheet" type="text/css" href="view/css/account.css">

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
		<img class="row title img-responsive" src="view/img/images/account/title_account_info.png">
		<div class="row user-info-form col-md-9">
			<form method="POST" action="#">
				<div class="side-bar form-col col-md-4">
					<div class="form-row">
						<img class="avatar" src="<?=$account_info[0]->ANHDD?>">
					</div>
					<div class="extra_form_info">
						<div class="form-row">
							<label>Ngày tham gia:</label>
							<div class="signup-form-input">
								<i class="fa fa-calendar icon" aria-hidden="true"></i>
								<input type="text" name="joining_time" value="<?=$account_info[0]->NGAYLAP?>" disabled="true">
							</div>
						</div>
						<div class="form-row">
							<label>Số lượng vé đã đặt:</label>
							<div class="signup-form-input">
								<i class="fa fa-ticket icon" aria-hidden="true"></i>
								<input type="text" name="amount_ticket" value="<?=$amount_ticket?>" disabled="true">
							</div>
						</div>
						<div class="form-row">
							<label>Loại khách hàng:</label>
							<div class="signup-form-input">
								<i class="fa fa-meh-o icon" aria-hidden="true"></i>
								<input type="text" name="type_account" value="<?=$account_info[0]->LOAI?>" disabled="true">
							</div>
						</div>
						<div class="form-row">
							<label>Chiếc khấu ưu đãi:</label>
							<div class="signup-form-input">
								<i class="fa fa-balance-scale icon" aria-hidden="true"></i>
								<input type="text" name="discount" value="<?=($account_info[0]->CHIETKHAU*100)?>%" disabled="true">
							</div>
						</div>
					</div>
				</div>
				<div class="main_form_info form-col col-md-8">
					<div class="form-row">
						<label>Tài khoản:</label>
						<div class="signup-form-input">
							<i class="fa fa-user-circle-o icon" aria-hidden="true"></i>
							<input type="text" name="account_name" placeholder="Nhập tài khoản người dùng" value="<?=$account_info[0]->TAIKHOAN?>">
						</div>
					</div>
					<div class="form-row">
						<label>Mật khẩu:</label>
						<div class="signup-form-input">
							<i class="fa fa-key icon" aria-hidden="true"></i>
							<input type="password" name="password" placeholder="Nhập mật khẩu người dùng" value="<?=$account_info[0]->MATKHAU?>">
						</div>
					</div>
					<div class="form-row">
						<label>Tên khách hàng:</label>
						<div class="signup-form-input">
							<i class="fa fa-address-card-o icon" aria-hidden="true"></i>
							<input type="text" name="name" placeholder="Nhập tên người dùng" value="<?=$account_info[0]->TENKH?>">
						</div>
					</div>
					<div class="form-row">
						<label>Ngày sinh:</label>
						<div class="signup-form-input">
							<i class="fa fa-birthday-cake icon" aria-hidden="true"></i>
							<input type="text" name="birthday" placeholder="Nhập ngày sinh người dùng (d/m/Y)" value="<?=$account_info[0]->NGAYSINH_KH?>">
						</div>
					</div>
					<div class="form-row">	
						<label>Địa chỉ:</label>
						<div class="signup-form-input">
							<i class="fa fa-globe icon" aria-hidden="true"></i>
							<input type="text" name="address" placeholder="Nhập địa chỉ người dùng" value="<?=$account_info[0]->DIACHI_KH?>">
						</div>
					</div>
					<div class="form-row">
						<label>Email:</label>
						<div class="signup-form-input">
							<i class="fa fa-envelope icon" aria-hidden="true"></i>
							<input type="text" name="email" placeholder="Nhập email người dùng" value="<?=$account_info[0]->EMAIL_KH?>">
						</div>
					</div>
					<div class="form-row">
						<label>Số điện thoại:</label>
						<div class="signup-form-input">
							<i class="fa fa-phone icon" aria-hidden="true"></i>
							<input type="text" name="phone_number" placeholder="Nhập số điện thoại người dùng" value="<?=$account_info[0]->SDT_KH?>">
						</div>
					</div>
					<div class="form-row signup-button">
						<input class="save-button" class="inline" type="submit" name="save" value="">
						<input class="cancel-button" class="inline" type="button" name="cancel" value="">
					</div>
				</div>
				<?php
					if(isset($_SESSION['updateAccount_error'])){
						echo "<div class='alert alert-danger form-row'>".($_SESSION['updateAccount_error'])."</div>";
					}
					else if(isset($_SESSION['updateAccount_success'])){
						echo "<div class='alert alert-success form-row'>".($_SESSION['updateAccount_success'])."</div>";
					}
					?>
			</form>
		</div>
		<div class="clear"></div>
		<div class="row history-book">
			<img class="row title img-responsive" src="view/img/images/account/title_deal_history.png">
			<div class="row main-history-book">			
				<table class="table-info">
					<tr class="table-info-title">
						<th class="col-1">Mã hóa đơn</th>
						<th class="col-2">Mã vé</th>
						<th class="col-3">Tên nhà xe</th>
						<th class="col-4">Số xe</th>
						<th class="col-5">Tuyến</th>
						<th class="col-6">Số ghế</th>
						<th class="col-7">Thời gian đi</th>
						<th class="col-8">Thời gian đến</th>
						<th class="col-9">Giá vé</th>
					</tr>
					<?php
					for($i=0; $i<count($invoiceID); $i++){
						$tickets = $c->getAccount_BookHistory($invoiceID[$i]->MAHD);
						for($j=0; $j<count($tickets); $j++){
							?>
							<tr class="table-info-row">
								<td class="col-1"><?=$invoiceID[$i]->MAHD?></td>
								<td class="col-2"><?=$tickets[$j]->MAVE?></td>
								<td class="col-3"><?=$tickets[$j]->TEN_NX?></td>
								<td class="col-4"><?=$tickets[$j]->BIENSO?></td>
								<td class="col-5"><?=$tickets[$j]->TENTUYEN?></td>
								<td class="col-6"><?=$tickets[$j]->SOGHE?></td>
								<td class="col-7"><?=$tickets[$j]->THOIGIANDI?></td>
								<td class="col-8"><?=$tickets[$j]->THOIGIANDEN?></td>
								<td class="col-9"><?=$tickets[$j]->GIAVE?></td>
							</tr>
							<?php
						}
					}
					?>		
				</table>
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
<script language="javascript" src="view/js/search.js"></script>
</html>