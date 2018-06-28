<?php
session_start();
include('controller/controller.php');
$c = new controller();

if(isset($_POST['signup'])){
	$user_name = $_POST['user_name'];
	$user_password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$name = $_POST['name'];
	$birthday = $_POST['birthday'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];

	if($user_password == $repassword){
		if(isset($_SESSION['repassword_error'])){
			unset($_SESSION['repassword_error']);
		}
		$user_signup = $c->signupAccount($user_name, md5($user_password), $name, $birthday, $address, $email, $phone_number);
	}else{
		if(isset($_SESSION['repassword_error'])){
			if($user_password!=null){
				$_SESSION['repassword_error']="Mật khẩu nhập lại không đúng!";
			}else{
				$_SESSION['repassword_error']="Chưa nhập mật khẩu";
			}
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng ký - Bến xe miền Đông</title>

	<!--CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/footer-distributed-with-address-and-phones.css">
	<link rel="stylesheet" href="view/css/bootstrap-3.1.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/index.css">
	<link rel="stylesheet" type="text/css" href="view/css/signup.css">

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
		<div class="row signup-content">
			<form method="POST" action="#">
			<div class="signup-left col-md-6">
				<div class="avatar">
					<img src="view/img/images/signup/avatar.png">
				</div>
				<div class="row">
					<p id="signup-tag">Đăng ký</p>
				</div>
				<div class="signup-left-form">
						<div class="form-col">
							<div class="form-row">
								<label>Tài khoản:</label>
								<div class="signup-form-input">
									<i class="fa fa-user-circle-o icon" aria-hidden="true"></i>
									<input type="text" name="user_name" placeholder="Nhập tài khoản người dùng">
								</div>
							</div>
							<div class="form-row">
								<label>Mật khẩu:</label>
								<div class="signup-form-input">
									<i class="fa fa-key icon" aria-hidden="true"></i>
									<input type="password" name="password" placeholder="Nhập mật khẩu người dùng">
								</div>
							</div>
							<div class="form-row">
								<label>Nhập lại mật khẩu:</label>
								<div class="signup-form-input">
									<i class="fa fa-lock icon" aria-hidden="true"></i>
									<input type="password" name="repassword" placeholder="Nhập lại mật khẩu người dùng">
								</div>
							</div>
							<?php
								if(isset($_SESSION['repassword_error'])){
									echo "<div class='alert alert-danger form-row'>".($_SESSION['repassword_error'])."</div>";
								}
							?>
						</div>
				</div>
			</div>
			<div class="signup-right col-md-6">
				<div class="signup-right-form">
					<div class="row">
					<img id="signup-right-title" src="view/img/images/signup/signup_title.png">
					</div>
						<div class="form-col">
							<div class="form-row">
								<label>Tên khách hàng:</label>
								<div class="signup-form-input">
									<i class="fa fa-address-card-o icon" aria-hidden="true"></i>
									<input type="text" name="name" placeholder="Nhập tài khoản người dùng">
								</div>
							</div>
							<div class="form-row">
								<label>Ngày sinh:</label>
								<div class="signup-form-input">
									<i class="fa fa-birthday-cake icon" aria-hidden="true"></i>
									<input type="text" name="birthday" placeholder="Nhập ngày sinh người dùng (dd/mm/yyyy)">
								</div>
							</div>
							<div class="form-row">	
								<label>Địa chỉ:</label>
								<div class="signup-form-input">
									<i class="fa fa-globe icon" aria-hidden="true"></i>
									<input type="text" name="address" placeholder="Nhập địa chỉ người dùng">
								</div>
							</div>
							<div class="form-row">
								<label>Email:</label>
								<div class="signup-form-input">
									<i class="fa fa-envelope icon" aria-hidden="true"></i>
									<input type="text" name="email" placeholder="Nhập email người dùng">
								</div>
							</div>
							<div class="form-row">
								<label>Số điện thoại:</label>
								<div class="signup-form-input">
									<i class="fa fa-phone icon" aria-hidden="true"></i>
									<input type="text" name="phone_number" placeholder="Nhập số điện thoại người dùng">
								</div>
							</div>
						</div>
					<div class="form-row signup-button">
							<input id="signup-submit-button" class="inline" type="submit" name="signup" value="">
							<input id="signup-cancel-button" class="inline" type="button" name="cancel" value="">
					</div>
				</div>
			</div>
			</form>
		</div>
		<div class="clear"></div>
		<?php
			if(isset($_SESSION['signup_error'])){
				echo "<div class='alert alert-danger form-row'>".($_SESSION['signup_error'])."</div>";
			}
			else if(isset($_SESSION['signup_success'])){
				echo "<div class='alert alert-success form-row'>".($_SESSION['signup_success'])."</div>";
			}
		?>
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