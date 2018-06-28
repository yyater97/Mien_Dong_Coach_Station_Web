<?php
session_start();
include('controller/controller.php');
$c = new controller();

$content = $c->getBasket_Info();
$detail_ticket = $content['detail_ticket'];
$account_info = $content['account_info'];
$arrSaleOff = $content['arrSaleOff'];

$sum = 0;
for($i=0; $i<count($detail_ticket); $i++){
	$sum = $sum + (int)($detail_ticket[$i]->GIAVE*(1-$arrSaleOff[$i]->GIAMGIA));
}

$user_id = null;
$user_name=null;
$birthday=null;
$email=null;
$phone_number=null;
$address=null;
$discount=null;

if($account_info!=null){
	$user_id = $_SESSION['user_id'];
	$user_name=$account_info[0]->TENKH;
	$birthday = $account_info[0]->NGAYSINH_KH;
	$email=$account_info[0]->EMAIL_KH;
	$phone_number=$account_info[0]->SDT_KH;
	$address=$account_info[0]->DIACHI_KH;
	$discount=$c->getDisCount_Info($_SESSION['type_user']);
}

if(isset($_POST['pay'])&&($detail_ticket!=null)){
	$content = $c->getBasket_Info();
	$detail_ticket = $content['detail_ticket'];

	$sum = 0;
	for($i=0; $i<count($detail_ticket); $i++){
		$sum = $sum + (int)($detail_ticket[$i]->GIAVE*(1-$arrSaleOff[$i]->GIAMGIA));
	}

	if($account_info==null){
		$user_name=$_POST['user_name'];
		$birthday=$_POST['birthday'];
		$email=$_POST['email'];
		$phone_number=$_POST['phone_number'];
		$address=$_POST['address'];
	}
	if(!empty($_POST['type_pays'])){
		foreach ($_POST['type_pays'] as $check) {
			$type_pay = $check;
		}
	}

	if($discount!=null){
		$sum = $sum*(1-(float)($discount));
	}

	$invoice = $c->insertInvoice($user_id, $user_name, $birthday, $email, $phone_number, $address, $type_pay, $sum, $arrSaleOff);
	if(user_id!=null){
		$upLevel = $c->checkTypeAccount($user_id);
		$_SESSION['old_type_user']=$_SESSION['type_user'];
		if(isset($_SESSION['type_user'])&&upLevel!=0){
			$_SESSION['type_user']=$upLevel;
		}
	}
}
if(isset($_POST['pay'])&&($detail_ticket==null)){

	$_SESSION['insertInvoice_error']="Không có hàng trong giỏ!";
	if(isset($_SESSION['insertInvoice_success'])){
		unset($_SESSION['insertInvoice_success']);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Giỏ hàng - Bến xe miền Đông</title>

	<!--CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/footer-distributed-with-address-and-phones.css">
	<link rel="stylesheet" href="view/css/bootstrap-3.1.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/index.css">
	<link rel="stylesheet" type="text/css" href="view/css/basket.css">

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

		<article class="content container-fuild" id="datasearch">
			<p class="row notification">Giỏ hàng có <span id="amount"><?=$_SESSION['amount_ticket_in_basket']?></span> vé đặt chỗ</p>
			<div class="row basket-content">
				<table class="table-info col-md-9">
					<tr class="table-info-title">
						<th class="ticket-code">Số vé</th>
						<th class="name-carcollector">Nhà xe</th>
						<th class="license-plate">Số xe</th>
						<th class="route">Tuyến</th>
						<th class="time-begin">Thời gian đi</th>
						<th class="saleoff">Khuyến mãi</th>
					</tr>
					<?php
					for($i=0; $i<count($detail_ticket); $i++){
						?>
						<tr class="table-info-row" id="row_i<?=$i?>">
							<td class="ticket-code"><?=$detail_ticket[$i]->MAVE?></td>
							<td class="name-arcollector"><?=$detail_ticket[$i]->TEN_NX?></td>
							<td class="license-plate"><?=$detail_ticket[$i]->BIENSO?></td>
							<td class="route"><?=$detail_ticket[$i]->TENTUYEN?></td>
							<td class="time-begin"><?=$detail_ticket[$i]->THOIGIANDI?></td>
							<td class="saleoff"><?=(string)($arrSaleOff[$i]->GIAMGIA*100).'%'?></td>
						</tr>
						<?php
					}
					?>
				</table>
				<table class="table-pay col-md-3">
					<tr class="table-pay-title">
						<th class="cost">Giá vé</th>
						<th class="cancel"><img class="cancel-icon" id="all" src="view/img/cancel_icon_white.png"/></th>
					</tr>
					<?php
					for($i=0; $i<count($detail_ticket); $i++){
						?>
						<tr class="table-pay-row" id="row_p<?=$i?>">
							<td class="sum-money"><?=$detail_ticket[$i]->GIAVE*(1-$arrSaleOff[$i]->GIAMGIA)?></td>
							<td class="cancel"><img class="cancel-icon" id="<?=$detail_ticket[$i]->MAVE?>" src="view/img/cancel_icon_red.png"/></td>
						</tr>
						<?php
					}
					?>
					<tr class="table-pay-row" id="total-money-row">
						<td>Tổng tiền: <br/><p id="total-money"><?=$sum?></p></td>
						<td></td>
					</tr>
				</table>
			</div>
			<div class="row invoice-info">
				<img class="title row img-responsive" src="view/img/images/basket/title_type_invoice.png">
				<form method="POST" action="#">
					<div class="row contact-us-form invoice-info-content">
						<div class="user-info-form col-md-6">
							<div class="form-col">
								<label class="form-row form-title">1.Thông tin khách hàng</label>
							</div>
							<div class="form-col">
								<label class="form-row">Tên khách hàng:</label>
								<input class="form-row" type="text" name="user_name" placeholder="Nhập tên khách hàng" value="<?=$user_name?>">
							</div>
							<div class="form-col">
								<label class="form-row">Ngày tháng năm sinh:</label>
								<input class="form-row" type="text" name="birthday" placeholder="Nhập ngày sinh khách hàng" value="<?=$birthday?>">
							</div>        
							<div class="form-col">
								<label class="form-row">Địa chỉ email:</label>
								<input class="form-row" type="email" name="email" placeholder="Nhập địa chỉ email" value="<?=$email?>">
							</div>
							<div class="form-col">
								<label class="form-row">Số điện thoại:</label>
								<input class="form-row" type="text" name="phone_number" placeholder="Nhập số điện thoại" value="<?=$phone_number?>">
							</div>
							<div class="form-col">
								<label class="form-row">Địa chỉ:</label>
								<input class="form-row" type="text" name="address" placeholder="Nhập dịa chỉ thường trú" value="<?=$address?>">
							</div>
						</div>
						<div class="type-invoice-form col-md-6">	
							<div class="form-col">
								<label class="form-row form-title">2.Hình thức thanh toán</label>
							</div>
							<div class="radio-group">
								<div class="form-col">
									<label class="radio-custom">Thanh toán bằng thẻ quốc tế Visa, Master, JCB
										<input type="radio" checked="checked" name="type_pays[]" value="Thanh toán bằng thẻ quốc tế Visa, Master, JCB">
										<span class="checkmark"></span>
									</label>
								</div>          
								<div class="form-col">
									<label class="radio-custom">Thẻ ATM nội địa/Internet Banking (Miễn phí thanh toán)
										<input type="radio" checked="checked" name="type_pays[]" value="Thẻ ATM nội địa/Internet Banking (Miễn phí thanh toán)">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="form-col">
									<label class="radio-custom">Thanh toán bằng MoMo
										<input type="radio" checked="checked" name="type_pays[]" value="Thanh toán bằng MoMo">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="form-row">
									<label class="radio-custom">Thanh toán khi lên xe (Ngày khởi hành)
										<input type="radio" checked="checked" name="type_pays[]" value="Thanh toán khi lên xe (Ngày khởi hành)">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<blockquote>Mọi chi tiết, thắc mắc về hình thức thanh toán hay tìm hiểu thông tin liên quan xin liên hệ tổng đài <span id="hotline">18001080</span>.</blockquote>
						</div>
						<div class="form-col col-md-12">
							<input id="pay-submit-button" class="form-col" type="submit" name="pay" value="Tiến hành thanh toán">
							<?php
							if(isset($_SESSION['invoiceID'])){
								if($_SESSION['invoiceID']!=null){
									if(isset($_SESSION['insertInvoice_success'])){
									?>									
									<a id="invoice-submit-button" href="invoice.php?MAHD=<?=$_SESSION['invoiceID']?>">Xem hóa đơn>></a>
									<?php
								}
								}
							}
							?>
							<blockquote>Xin chân thành cám ơn quý khách sử dụng dịch vụ.</blockquote>
						</div>
					</div>
				</form>
			</div>
			<?php
			if(isset($_SESSION['insertInvoice_error'])){
				echo "<div class='alert alert-danger'>".($_SESSION['insertInvoice_error'])."</div>";
			}
			else if(isset($_SESSION['insertInvoice_success'])){
				echo "<div class='alert alert-success'>".($_SESSION['insertInvoice_success'])."</div>";
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
	<script src="view/js/basket.js"></script>
	</html>