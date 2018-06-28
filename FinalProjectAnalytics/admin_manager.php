<?php
session_start();
include('controller/controller.php');
$c = new controller();
$content = $c->getAdmin_Manager_Info();

$saleoff = $content['saleoff'];
$invoice = $content['invoice'];
$statsCustomer = $content['statsCustomer'];
$ticket = $content['ticket'];
$comment = $content['comment'];
$account = $content['account'];
$route = $content['route'];
$staff = $content['staff'];
$car_ctr = $content['car_ctr'];
$customer = $content['customer'];

$dateTime = $c->getDateTime();
$month = $dateTime['month'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lí quản trị viên - Bến xe miền Đông</title>

	<!--CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/footer-distributed-with-address-and-phones.css">
	<link rel="stylesheet" href="view/css/bootstrap-3.1.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/index.css">
	<link rel="stylesheet" type="text/css" href="view/css/admin-manager.css">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

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
			<sidebar class="sidebar col-md-3">
				<ul>
					<li class="active">
						<i class="fa fa-cart-arrow-down icon" aria-hidden="true"></i>
						<a href="#tab1" class="active">Quản lí khuyến mãi</a>
					</li>
					<li>
						<i class="fa fa-credit-card icon" aria-hidden="true"></i>
						<a href="#tab2">Quản lí hóa đơn</a>
					</li>
					<li>
						<i class="fa fa-line-chart icon" aria-hidden="true"></i>
						<a href="#tab3">Báo cáo doanh thu</a>
					</li>
					<li>
						<i class="fa fa-ticket icon" aria-hidden="true"></i>
						<a href="#tab4">Quản lí vé xe</a>
					</li>
					<li>
						<i class="fa fa-commenting-o icon" aria-hidden="true"></i>
						<a href="#tab5">Quản lí góp ý</a>
					</li>
					<li>
						<i class="fa fa-address-book-o icon" aria-hidden="true"></i>
						<a href="#tab6">Quản lí tài khoản</a>
					</li>
					<li>
						<i class="fa fa-arrows-h icon" aria-hidden="true"></i>
						<a href="#tab7">Quản lí lịch trình</a>
					</li>
					<?php
					if(isset($_SESSION['user_id']) && $_SESSION['user_id']=='TK0000'){
						?>
						<li>
							<i class="fa fa-users icon" aria-hidden="true"></i>
							<a href="#tab8">Quản lí nhân viên</a>
						</li>
						<?php
					}
					?>
					<li>
						<i class="fa fa-car icon" aria-hidden="true"></i>
						<a href="#tab9">Quản lí nhà xe</a>
					</li>
					<li>
						<i class="fa fa-handshake-o icon" aria-hidden="true"></i>
						<a href="#tab10">Quản lí khách hàng</a>
					</li>
				</ul>
			</sidebar>
			<div class="main-content col-md-9">
				<!--BEGIN-TAB-->
				<div id="tab1" class="tab-item">
					<table class="table-info">
						<tr class="table-info-title">
							<th class="col-1">Mã</th>
							<th class="col-2">Ngày bắt đầu</th>
							<th class="col-3">Ngày kết thúc</th>
							<th class="col-4">Tên khuyến mãi</th>
							<th class="col-5">Tuyến</th>
							<th class="col-6">Giảm giá</th>
							<th class="col-button">
								<img class="add-button line" src="view/img/add_icon_button.png"/>
							</th>
						</tr>
						<?php
						for($i=0; $i<count($saleoff); $i++){
							?>
							<tr class="table-info-row" id="row<?=$i+1?>">
								<td class="col-1"><?=$saleoff[$i]->MAKM?></td>
								<td class="col-2"><?=$saleoff[$i]->NGAYBD?></td>
								<td class="col-3"><?=$saleoff[$i]->NGAYKT?></td>
								<td class="col-4"><?=$saleoff[$i]->TENKM?></td>
								<td class="col-5"><?=$saleoff[$i]->TENTUYEN?></td>
								<td class="col-6"><?=(string)($saleoff[$i]->GIAMGIA*100).'%'?></td>
								<td class="col-button">
									<img class="edit-button line" src="view/img/edit_icon_button.png"/>
									<img class="delete-button line" src="view/img/cancel_icon_red.png"/>
								</td>
							</tr>
							<?php	
						}
						?>
					</table>
					<div class="modal-dialog col-md-5 col-sm-6 col-xs-12">
						<div class="row modal-content">
							<form>
								<div class="form-row">
									<label>Mã khuyến mãi:</label>
									<input class="col-1" type="text" name="" placeholer="Nhập mã khuyến mãi" disabled="true">
								</div>
								<div class="form-row">
									<label>Ngày bắt đầu:</label>
									<input class="col-2" type="text" name="" placeholder="Nhập ngày bắt đầu khuyến mãi">
								</div>
								<div class="form-row">
									<label>Ngày kết thúc:</label>
									<input class="col-3" type="text" name="" placeholder="Nhập ngày kết thúc khuyến mãi">
								</div>
								<div class="form-row">
									<label>Tên đợt khuyến mãi:</label>
									<input class="col-4" type="text" name="" placeholder="Nhập tên đợt khuyến mãi">
								</div>
								<div class="form-row">
									<label>Tên tuyến được khuyến mãi:</label>
									<input class="col-5" type="text" name="" placeholder="Nhập tên tuyến khuyến mãi">
								</div>
								<div class="form-row">
									<label>Giảm giá:</label>
									<input class="col-6" type="text" name="" placeholder="Nhập giá khuyến mãi (phần trăm giảm)">
								</div>
								<div class="button-group">
									<input type="submit" class="save-button" name="save-button" value="">
									<input type="button" class="cancel-button" name="cancel-button" value="">
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--END-TAB-->
				<!--BEGIN-TAB-->
				<div id="tab2" class="tab-item">
					<table class="table-info">
						<tr class="table-info-title">
							<th class="col-1">Mã</th>
							<th class="col-2">Tên khách hàng</th>
							<th class="col-3">Ngày lập</th>
							<th class="col-4">Thành tiền</th>
							<th class="col-5">Hình thức thanh toán</th>
							<th class="col-button">
								<img class="add-button line" src="view/img/add_icon_button.png"/>
							</th>
						</tr>
						<?php
						for($i=0; $i<count($invoice); $i++){
							?>
							<tr class="table-info-row" id="row<?=$i+1?>">
								<td class="col-1"><?=$invoice[$i]->MAHD?></td>
								<td class="col-2"><?=$invoice[$i]->TENKH?></td>
								<td class="col-3"><?=$invoice[$i]->NGAYLAPHD?></td>
								<td class="col-4"><?=$invoice[$i]->THANHTIEN?></td>
								<td class="col-5"><?=$invoice[$i]->HINHTHUC?></td>
								<td class="col-button">
									<img class="edit-button line" src="view/img/edit_icon_button.png"/>
									<img class="delete-button line" src="view/img/cancel_icon_red.png"/>
								</td>
							</tr>
							<?php	
						}
						?>
					</table>
					<div class="modal-dialog col-md-5 col-sm-6 col-xs-12">
						<div class="row modal-content">
							<form>
								<div class="form-row">
									<label>Mã hóa đơn:</label>
									<input class="col-1" type="text" name="" disabled="true">
								</div>
								<div class="form-row">
									<label>Tên khách hàng:</label>
									<input class="col-2" type="text" name="" placeholder="Nhập tên khách hàng">
								</div>
								<div class="form-row">
									<label>Ngày lập hóa đơn:</label>
									<input class="col-3" type="text" name="" placeholder="Nhập ngày lập hóa đơn">
								</div>
								<div class="form-row">
									<label>Thành tiền:</label>
									<input class="col-4" type="text" name="" placeholder="Nhập thành tiền hóa đơn">
								</div>
								<div class="form-row">
									<label>Hình thức thanh toán:</label>
									<input class="col-5" type="text" name="" placeholder="Nhập hình thức thanh toán hóa đơn">
								</div>
								<div class="button-group">
									<input type="submit" class="save-button" name="save-button" value="">
									<input type="button" class="cancel-button" name="cancel-button" value="">
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--END-TAB-->
				<!--BEGIN-TAB-->
				<div id="tab3" class="tab-item">
					<select name="dateTime" id="dateTime">
						<?php
							for($i=0; $i<count($month); $i++){
								?>
									<option value="<?=$month[$i]->THANG?>"><?=$month[$i]->THANG?></option>
								<?php
							}
						?>
					</select>
					<div class="report-content" id="data_report">
					</div>
				</div>
				<!--END-TAB-->
				<!--BEGIN-TAB-->
				<div id="tab4" class="tab-item">
					<table class="table-info">
						<tr class="table-info-title">
							<th class="col-1">Mã</th>
							<th class="col-2">Số ghế</th>
							<th class="col-3">Giá vé</th>
							<th class="col-4">Vị trí</th>
							<th class="col-5">Thời gian đi</th>
							<th class="col-6">Thời gian đến</th>
							<th class="col-button">
								<img class="add-button line" src="view/img/add_icon_button.png"/>
							</th>
						</tr>
						<?php
						for($i=0; $i<count($ticket); $i++){
							?>
							<tr class="table-info-row" id="row<?=$i+1?>">
								<td class="col-1"><?=$ticket[$i]->MAVE?></td>
								<td class="col-2"><?=$ticket[$i]->SOGHE?></td>
								<td class="col-3"><?=$ticket[$i]->GIAVE?></td>
								<td class="col-4"><?=$ticket[$i]->VITRI?></td>
								<td class="col-5"><?=$ticket[$i]->THOIGIANDI?></td>
								<td class="col-6"><?=$ticket[$i]->THOIGIANDEN?></td>	
								<td class="col-button">
									<img class="edit-button line" src="view/img/edit_icon_button.png"/>
									<img class="delete-button line" src="view/img/cancel_icon_red.png"/>
								</td>
							</tr>
							<?php	
						}
						?>
					</table>
					<div class="modal-dialog col-md-5 col-sm-6 col-xs-12">
						<div class="row modal-content">
							<form>
								<div class="form-col col-md-6">
									<div class="form-row">
										<label>Mã vé xe:</label>
										<input class="col-1" type="text" name="" disabled="true">
									</div>
									<div class="form-row">
										<label>Số ghế:</label>
										<input class="col-2" type="text" name="" placeholder="Nhập số ghế">
									</div>
									<div class="form-row">
										<label>Giá vé:</label>
										<input class="col-3" type="text" name="" placeholder="Nhập giá vé">
									</div>
									<div class="form-row">
										<label>Vị trí:</label>
										<input class="col-4" type="text" name="" placeholder="Nhập vị trí chờ">
									</div>
									<div class="form-row">
										<label>Thời gian đi:</label>
										<input class="col-5" type="text" name="" placeholder="Nhập thời gian đi">
									</div>
								</div>
								<div class="form-col col-md-6">
									<div class="form-row">
										<label>Thời gian đến:</label>
										<input class="col-6" type="text" name="" placeholder="Nhập thời gian đến">
									</div>
									<div class="button-group">
										<input type="submit" class="save-button" name="save-button" value="">
										<input type="button" class="cancel-button" name="cancel-button" value="">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--END-TAB-->
				<!--BEGIN-TAB-->
				<div id="tab5" class="tab-item">
					<table class="table-info">
						<tr class="table-info-title">
							<th class="col-1">Mã</th>
							<th class="col-2">Ngày gửi</th>
							<th class="col-3">Tên người gửi</th>
							<th class="col-4">Email</th>
							<th class="col-5">Số điện thoại</th>
							<th class="col-6">Tiêu đề</th>
							<th class="col-7">Nội dung</th>
							<th class="col-button">
								<img class="add-button line" src="view/img/add_icon_button.png"/>
							</th>
						</tr>
						<?php
						for($i=0; $i<count($comment); $i++){
							?>
							<tr class="table-info-row" id="row<?=$i+1?>">
								<td class="col-1"><?=$comment[$i]->MAGOPY?></td>
								<td class="col-2"><?=$comment[$i]->NGAYGUI?></td>
								<td class="col-3"><?=$comment[$i]->TENNGUOIGUI?></td>
								<td class="col-4"><?=$comment[$i]->EMAIL_NG?></td>
								<td class="col-5"><?=$comment[$i]->SDT_NG?></td>
								<td class="col-6"><?=$comment[$i]->TIEUDE?></td>
								<td class="col-7"><?=$comment[$i]->NOIDUNG?></td>	
								<td class="col-button">
									<img class="edit-button line" src="view/img/edit_icon_button.png"/>
									<img class="delete-button line" src="view/img/cancel_icon_red.png"/>
								</td>
							</tr>
							<?php	
						}
						?>
					</table>
					<div class="modal-dialog col-md-5 col-sm-6 col-xs-12">
						<div class="row modal-content">
							<form>
								<div class="form-col col-md-6">
									<div class="form-row">
										<label>Mã góp ý:</label>
										<input class="col-1" type="text" name="" disabled="true">
									</div>
									<div class="form-row">
										<label>Ngày gửi:</label>
										<input class="col-2" type="text" name="" placeholder="Nhập ngày gửi góp ý">
									</div>
									<div class="form-row">
										<label>Tên người gửi:</label>
										<input class="col-3" type="text" name="" placeholder="Nhập tên người gửi">
									</div>
									<div class="form-row">
										<label>Email:</label>
										<input class="col-4" type="text" name="" placeholder="Nhập email người gửi">
									</div>
									<div class="form-row">
										<label>Số điện thoại:</label>
										<input class="col-5" type="text" name="" placeholder="Nhập số điện thoại người gửi">
									</div>
								</div>
								<div class="form-col col-md-6">
									<div class="form-row">
										<label>Tiêu đề:</label>
										<input class="col-6" type="text" name="" placeholder="Nhập tiêu đề góp ý">
									</div>
									<div class="form-row">
										<label>Nội dung:</label>
										<textarea class="col-7"></textarea>
									</div>
									<div class="button-group">
										<input type="submit" class="save-button" name="save-button" value="">
										<input type="button" class="cancel-button" name="cancel-button" value="">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--END-TAB-->
				<!--BEGIN-TAB-->
				<div id="tab6" class="tab-item">
					<table class="table-info">
						<tr class="table-info-title">
							<th class="col-1">Mã</th>
							<th class="col-2">Tài khoản</th>
							<th class="col-3">Mật khẩu</th>
							<th class="col-4">Ngày lập</th>
							<th class="col-5">Loại</th>
							<th class="col-button">
								<img class="add-button line" src="view/img/add_icon_button.png"/>
							</th>
						</tr>
						<?php
						for($i=0; $i<count($account); $i++){
							?>
							<tr class="table-info-row" id="row<?=$i+1?>">
								<td class="col-1"><?=$account[$i]->MATK?></td>
								<td class="col-2"><?=$account[$i]->TAIKHOAN?></td>
								<td class="col-3"><?=$account[$i]->MATKHAU?></td>
								<td class="col-4"><?=$account[$i]->NGAYLAP?></td>
								<td class="col-5"><?=$account[$i]->LOAI?></td>
								<td class="col-button">
									<img class="edit-button line" src="view/img/edit_icon_button.png"/>
									<img class="delete-button line" src="view/img/cancel_icon_red.png"/>
								</td>
							</tr>
							<?php	
						}
						?>
					</table>
					<div class="modal-dialog col-md-5 col-sm-6 col-xs-12">
						<div class="row modal-content">
							<form>
								<div class="form-row">
									<label>Mã tài khoản:</label>
									<input class="col-1" type="text" name="" disabled="true">
								</div>
								<div class="form-row">
									<label>Tên tài khoản:</label>
									<input class="col-2" type="text" name="" placeholder="Nhập tên tài khoản">
								</div>
								<div class="form-row">
									<label>Mật khẩu:</label>
									<input class="col-3" type="text" name="" placeholder="Nhập mật khẩu">
								</div>
								<div class="form-row">
									<label>Ngày lập:</label>
									<input class="col-4" type="text" name="" placeholder="Nhập ngày lập">
								</div>
								<div class="form-row">
									<label>Loại tài khoản:</label>
									<input class="col-5" type="text" name="" placeholder="Nhập loại tài khoản">
								</div>
								<div class="button-group">
									<input type="submit" class="save-button" name="save-button" value="">
									<input type="button" class="cancel-button" name="cancel-button" value="">
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--END-TAB-->
				<!--BEGIN-TAB-->
				<div id="tab7" class="tab-item">
					<table class="table-info">
						<tr class="table-info-title">
							<th class="col-1">Mã</th>
							<th class="col-2">Tên</th>
							<th class="col-3">Điểm đầu</th>
							<th class="col-4">Điểm cuối</th>
							<th class="col-5">Khoảng cách</th>
							<th class="col-6">Ảnh</th>
							<th class="col-button">
								<img class="add-button line" src="view/img/add_icon_button.png"/>
							</th>
						</tr>
						<?php
						for($i=0; $i<count($route); $i++){
							?>
							<tr class="table-info-row" id="row<?=$i+1?>">
								<td class="col-1"><?=$route[$i]->MATUYEN?></td>
								<td class="col-2"><?=$route[$i]->TENTUYEN?></td>
								<td class="col-3"><?=$route[$i]->DIEMDAU?></td>
								<td class="col-4"><?=$route[$i]->DIEMCUOI?></td>
								<td class="col-5"><?=$route[$i]->KHOANGCACH?></td>
								<td class="col-6"><?=$route[$i]->ANH?></td>
								<td class="col-button">
									<img class="edit-button line" src="view/img/edit_icon_button.png"/>
									<img class="delete-button line" src="view/img/cancel_icon_red.png"/>
								</td>
							</tr>
							<?php	
						}
						?>
					</table>
					<div class="modal-dialog col-md-5 col-sm-6 col-xs-12">
						<div class="row modal-content">
							<form>
								<div class="form-row">
									<label>Mã tuyến:</label>
									<input class="col-1" type="text" name="" disabled="true">
								</div>
								<div class="form-row">
									<label>Tên tuyến:</label>
									<input class="col-2" type="text" name="" placeholder="Nhập tên tuyến">
								</div>
								<div class="form-row">
									<label>Điểm đầu:</label>
									<input class="col-3" type="text" name="" placeholder="Nhập điểm đầu của tuyến">
								</div>
								<div class="form-row">
									<label>Điểm cuối:</label>
									<input class="col-4" type="text" name="" placeholder="Nhập điểm cuối của tuyến">
								</div>
								<div class="form-row">
									<label>Khoảng cách:</label>
									<input class="col-5" type="text" name="" placeholder="Nhập khoảng cách tuyến">
								</div>
								<div class="form-row">
									<label>Ảnh:</label>
									<input class="col-6" type="text" name="" placeholder="Nhập link file ảnh">
								</div>
								<div class="button-group">
									<input type="submit" class="save-button" name="save-button" value="">
									<input type="button" class="cancel-button" name="cancel-button" value="">
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--END-TAB-->
				<!--BEGIN-TAB-->
				<div id="tab8" class="tab-item">
					<table class="table-info">
						<tr class="table-info-title">
							<th class="col-1">Mã</th>
							<th class="col-2">Tên</th>
							<th class="col-3">Ngày sinh</th>
							<th class="col-4">Địa chỉ</th>
							<th class="col-5">Email</th>
							<th class="col-6">Số điện thoại</th>
							<th class="col-7">Chức vụ</th>
							<th class="col-button">
								<img class="add-button line" src="view/img/add_icon_button.png"/>
							</th>
						</tr>
						<?php
						for($i=0; $i<count($staff); $i++){
							?>
							<tr class="table-info-row" id="row<?=$i+1?>">
								<td class="col-1"><?=$staff[$i]->MANV?></td>
								<td class="col-2"><?=$staff[$i]->TENNV?></td>
								<td class="col-3"><?=$staff[$i]->NGAYSINH_NV?></td>
								<td class="col-4"><?=$staff[$i]->DIACHI_NV?></td>
								<td class="col-5"><?=$staff[$i]->EMAIL_NV?></td>
								<td class="col-6"><?=$staff[$i]->SDT_NV?></td>
								<td class="col-7"><?=$staff[$i]->CHUCVU?></td>
								<td class="col-button">
									<img class="edit-button line" src="view/img/edit_icon_button.png"/>
									<img class="delete-button line" src="view/img/cancel_icon_red.png"/>
								</td>
							</tr>
							<?php	
						}
						?>
					</table>
					<div class="modal-dialog col-md-5 col-sm-6 col-xs-12">
						<div class="row modal-content">
							<form>
								<div class="form-row">
									<label>Mã nhân viên:</label>
									<input class="col-1" type="text" name="" disabled="true">
								</div>
								<div class="form-row">
									<label>Tên nhân viên:</label>
									<input class="col-2" type="text" name="" placeholder="Nhập tên nhân viên">
								</div>
								<div class="form-row">
									<label>Ngày sinh:</label>
									<input class="col-3" type="text" name="" placeholder="Nhập ngày sinh nhân viên">
								</div>
								<div class="form-row">
									<label>Địa chỉ:</label>
									<input class="col-4" type="text" name="" placeholder="Nhập địa chỉ nhân viên">
								</div>
								<div class="form-row">
									<label>Email:</label>
									<input class="col-5" type="text" name="" placeholder="Nhập email nhân viên">
								</div>
								<div class="form-row">
									<label>Số điện thoại:</label>
									<input class="col-6" type="text" name="" placeholder="Nhập số điện thoại nhân viên">
								</div>
								<div class="form-row">
									<label>Chức vụ:</label>
									<input class="col-7" type="text" name="" placeholder="Nhập chức vụ nhân viên">
								</div>
								<div class="button-group">
									<input type="submit" class="save-button" name="save-button" value="">
									<input type="button" class="cancel-button" name="cancel-button" value="">
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--END-TAB-->
				<!--BEGIN-TAB-->
				<div id="tab9" class="tab-item">
					<table class="table-info">
						<tr class="table-info-title">
							<th class="col-1">Mã</th>
							<th class="col-2">Tên</th>
							<th class="col-3">Địa chỉ</th>
							<th class="col-4">Số điện thoại</th>
							<th class="col-5">Email</th>
							<th class="col-6">Số lượng xe</th>
							<th class="col-7">Tóm tắt</th>
							<th class="col-button">
								<img class="add-button line" src="view/img/add_icon_button.png"/>
							</th>
						</tr>
						<?php
						for($i=0; $i<count($car_ctr); $i++){
							?>
							<tr class="table-info-row" id="row<?=$i+1?>">
								<td class="col-1"><?=$car_ctr[$i]->MANX?></td>
								<td class="col-2"><?=$car_ctr[$i]->TEN_NX?></td>
								<td class="col-3"><?=$car_ctr[$i]->DIACHI_NX?></td>
								<td class="col-4"><?=$car_ctr[$i]->SDT_NX?></td>
								<td class="col-5"><?=$car_ctr[$i]->EMAIL_NX?></td>
								<td class="col-6"><?=$car_ctr[$i]->SOXE?></td>
								<td class="col-7"><?=$car_ctr[$i]->TOMTAT?></td>
								<td class="col-button">
									<img class="edit-button line" src="view/img/edit_icon_button.png"/>
									<img class="delete-button line" src="view/img/cancel_icon_red.png"/>
								</td>
							</tr>
							<?php	
						}
						?>
					</table>
					<div class="modal-dialog col-md-5 col-sm-6 col-xs-12">
						<div class="row modal-content">
							<form>
								<div class="form-col col-md-6">
									<div class="form-row">
										<label>Mã nhà xe:</label>
										<input class="col-1" type="text" name="" disabled="true">
									</div>
									<div class="form-row">
										<label>Tên nhà xe:</label>
										<input class="col-2" type="text" name="" placeholder="Nhập tên nhà xe">
									</div>
									<div class="form-row">
										<label>Địa chỉ:</label>
										<input class="col-3" type="text" name="" placeholder="Nhập địa chỉ nhà xe">
									</div>
									<div class="form-row">
										<label>Số điện thoại:</label>
										<input class="col-4" type="text" name="" placeholder="Nhập số điện thoại nhà xe">
									</div>
									<div class="form-row">
										<label>Email:</label>
										<input class="col-5" type="text" name="" placeholder="Nhập email nhà xe">
									</div>
								</div>
								<div class="form-col col-md-6">
									<div class="form-row">
										<label>Số lượng xe:</label>
										<input class="col-6" type="text" name="" placeholder="Nhập số lượng xe của nhà xe">
									</div>
									<div class="form-row">
										<label>Giới thiệu:</label>
										<textarea name="report_content" id="report_content" rows="50" cols="150"></textarea>
										<script>
											CKEDITOR.replace('report_content');
										</script>
									</div>	
									<div class="button-group">
										<input type="submit" class="save-button" name="save-button" value="">
										<input type="button" class="cancel-button" name="cancel-button" value="">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--END-TAB-->
				<!--BEGIN-TAB-->
				<div id="tab10" class="tab-item">
					<table class="table-info">
						<tr class="table-info-title">
							<th class="col-1">Mã</th>
							<th class="col-2">Tên</th>
							<th class="col-3">Ngày sinh</th>
							<th class="col-4">Địa chỉ</th>
							<th class="col-5">Email</th>
							<th class="col-6">Số điện thoại</th>
							<th class="col-button">
								<img class="add-button line" src="view/img/add_icon_button.png"/>
							</th>
						</tr>
						<?php
						for($i=0; $i<count($customer); $i++){
							?>
							<tr class="table-info-row" id="row<?=$i+1?>">
								<td class="col-1"><?=$customer[$i]->MAKH?></td>
								<td class="col-2"><?=$customer[$i]->TENKH?></td>
								<td class="col-3"><?=$customer[$i]->NGAYSINH_KH?></td>
								<td class="col-4"><?=$customer[$i]->DIACHI_KH?></td>
								<td class="col-5"><?=$customer[$i]->EMAIL_KH?></td>
								<td class="col-6"><?=$customer[$i]->SDT_KH?></td>
								<td class="col-button">
									<img class="edit-button line" src="view/img/edit_icon_button.png"/>
									<img class="delete-button line" src="view/img/cancel_icon_red.png"/>
								</td>
							</tr>
							<?php	
						}
						?>
					</table>
					<div class="modal-dialog col-md-5 col-sm-6 col-xs-12">
						<div class="row modal-content">
							<form>
								<div class="form-row">
									<label>Mã khách hàng:</label>
									<input class="col-1" type="text" name="" disabled="true">
								</div>
								<div class="form-row">
									<label>Tên khách hàng:</label>
									<input class="col-2" type="text" name="" placeholder="Nhập tên khách hàng">
								</div>
								<div class="form-row">
									<label>Ngày sinh:</label>
									<input class="col-3" type="text" name="" placeholder="Nhập ngày sinh của khách hàng">
								</div>
								<div class="form-row">
									<label>Địa chỉ:</label>
									<input class="col-4" type="text" name="" placeholder="Nhập địa chỉ khách hàng">
								</div>
								<div class="form-row">
									<label>Email:</label>
									<input class="col-5" type="text" name="" placeholder="Nhập email khách hàng">
								</div>
								<div class="form-row">
									<label>Số điện thoại:</label>
									<input class="col-6" type="text" name="" placeholder="Nhập số điện thoại">
								</div>
								<div class="button-group">
									<input type="submit" class="save-button" name="save-button" value="">
									<input type="button" class="cancel-button" name="cancel-button" value="">
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--END-TAB-->
				<div class="clear"></div>
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
	<script language="javascript" src="view/js/jsPDF-master/dist/jspdf.min.js"></script>	
	<script src="view/js/html2canvas.js"></script>
	<script src="view/js/admin-manager.js"></script>
	</html>