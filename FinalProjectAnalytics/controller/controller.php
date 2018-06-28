<?php
include('model/model.php');

class controller{
	public function getIndex_Info(){
		$m = new model();
		$image_route = $m->getImage_Route();
		$slide = $m->getLink_Slide();
		$carcollector = $m->getCarCollector();

		$arrSaleOff = array();
		for($i=0; $i<count($image_route); $i++){
			$MATUYEN = $image_route[$i]->MATUYEN;

			$value_saleoff=null;
			$value_saleoff = $m->findMaxSaleOff_OfTicket($MATUYEN);
			if($value_saleoff == null){
				$element = new stdClass();
				$element->GIAMGIA = 0;
				$element->MACHITIETKM = null;
				array_push($arrSaleOff,$element);
			}else{
				array_push($arrSaleOff,$value_saleoff[0]);
			}		
		}
		return array('image_route'=>$image_route, 'slide'=>$slide, 'carcollector'=>$carcollector, 'arrSaleOff'=>$arrSaleOff);
	}

	public function deleteTicket_DidntPay_c(){
		$m = new model();
		$m->deleteTicket_DidntPay();
		if(isset($_SESSION['amount_ticket_in_basket'])){
				$_SESSION['amount_ticket_in_basket']="0";
		}
	}

	public function getAdmin_Manager_Info(){
		$m = new model();
		$saleoff = $m->getSaleOff();
		$invoice = $m->getInvoice();
		$statsCustomer = $m->statsCustomer_Info();
		$ticket = $m->getTicket();
		$comment = $m->getComment();
		$account = $m->getAccount();
		$route = $m->getRoute();
		$staff = $m->getStaff();
		$car_ctr = $m->getCarController();
		$customer = $m->getCustomer();
		return array('saleoff'=>$saleoff, 'invoice'=>$invoice, 'statsCustomer'=>$statsCustomer, 'ticket'=>$ticket, 'comment'=>$comment, 'account'=>$account, 'route'=>$route, 'staff'=>$staff, 'car_ctr'=>$car_ctr, 'customer'=>$customer);
	}

	public function getDisCount_Info($LOAI){
		$m = new model();
		$disCount = $m->getDisCount($LOAI);
		return $disCount[0]->CHIETKHAU;
	}

	public function getBasket_Info(){
		$m = new model();
		$detail_ticket = $m->getDetailTicket();
		$account_info=null;
		if(isset($_SESSION['user_id'])){
			$account_info = $m->getCustomer_withAccountID($_SESSION['user_id']);
		}


		$arrSaleOff = array();
		for($i=0; $i<count($detail_ticket); $i++){
			$MATUYEN = $m->getRouteID_WithTicketID($detail_ticket[$i]->MAVE);
			$MATUYEN = $MATUYEN[0]->MATUYEN;
			$value_saleoff=null;
			$value_saleoff = $m->findMaxSaleOff_OfTicket($MATUYEN);
			if($value_saleoff == null){
				$element = new stdClass();
				$element->GIAMGIA = 0;
				$element->MACHITIETKM = null;
				array_push($arrSaleOff,$element);
			}else{
				array_push($arrSaleOff,$value_saleoff[0]);
			}		
		}
		return array('detail_ticket'=>$detail_ticket, 'account_info'=>$account_info, 'arrSaleOff'=>$arrSaleOff);
	}

	public function getTicketBooking_Info(){
		$m = new model();
		$image_route = $m->getImage_Route();
		$car_collector = $m->getNameAndID_CarController();
		return array('image_route'=>$image_route, 'car_collector'=>$car_collector);
	}

	public function getAccount_Info($MATK){
		$m = new model();
		$account_info = $m->getAllCustomerInfo_WithAccountID($MATK);
		$invoiceID = $m->getInvoiceID_WithCustomerID($MATK);
		return array('account_info'=>$account_info, 'invoiceID'=>$invoiceID);
	}

	public function getStaffAccount_Info($MATK){
		$m = new model();
		$staffaccount_info = $m->getAllStaffInfo_WithAccountID($MATK);
		return array('staffaccount_info'=>$staffaccount_info);
	}

	public function getAccount_BookHistory($MAHD){
		$m = new model();
		$book_history = $m->getBookHistory_WithInvoiceID($MAHD);
		return $book_history;
	}

	public function getDetail_Info(){
		$MANX = $_GET['MANX'];
		$m = new model();
		$carCollector_FullInfo = $m->getCarCollector_FullInfo($MANX);
		$bestCarCollector = $m->getCarCollector_BestQuality();
		$randCarCollector= $m->getCarCollector_Rand();
		return array('carCollector_FullInfo'=>$carCollector_FullInfo, 'bestCarCollector'=>$bestCarCollector, 'randCarCollector'=>$randCarCollector);
	}

	public function getInvoice_Info(){
		$MAHD = $_GET['MAHD'];
		$m = new model();
		$invoice = $m->getInvoice_WithID($MAHD);
		$detail_ticket = $m->getDetailInvoice_WithID($MAHD);
		
		$arrSaleOff = array();
		for($i=0; $i<count($detail_ticket); $i++){
			$MATUYEN = $m->getRouteID_WithTicketID($detail_ticket[$i]->MAVE);
			$MATUYEN = $MATUYEN[0]->MATUYEN;
			$value_saleoff=null;
			$value_saleoff = $m->findMaxSaleOff_OfTicket($MATUYEN);
			if($value_saleoff == null){
				$element = new stdClass();
				$element->GIAMGIA = 0;
				$element->MACHITIETKM = null;
				array_push($arrSaleOff,$element);
			}else{
				array_push($arrSaleOff,$value_saleoff[0]);
			}		
		}
		return array('invoice'=>$invoice, 'detail_ticket'=>$detail_ticket, 'arrSaleOff'=>$arrSaleOff);
	}

	public function getDateTime(){
		$m = new model();
		$dateTime = $m->getDateTime_Invoice();
		$month = array();
		for($i=0; $i<count($dateTime); $i++){

			if($i>0){
				if(substr($dateTime[$i-1]->NGAYLAPHD,12,7)!=substr($dateTime[$i]->NGAYLAPHD,12,7)){
					$element = new stdClass();
					$element->THANG = substr($dateTime[$i]->NGAYLAPHD,12,7);
					array_push($month,$element);
				}
			}else{
				$element = new stdClass();
				$element->THANG = substr($dateTime[$i]->NGAYLAPHD,12,7);
				array_push($month,$element);
			}
			
		}
		return array('month'=>$month);
	}

	public function getReport($MONTH){
		$m = new model();
		$current_revenue=null;
		$current_detailrevenue=null;
		$current_revenue = $m->getRevenue($MONTH);
		if($current_revenue!=null){
			$MADT = $current_revenue[0]->MADT;
			$current_detailrevenue = $m->getDetailRevenue($MADT);
		}

		return array('current_revenue'=>$current_revenue,'current_detailrevenue'=>$current_detailrevenue);
	}

	/*--------------------------------------------------------------INSERT----------------------------------------------------*/
	public function insertRevenue($MONTH){
		$m = new model();

		$MADT = $m->getLastRevenueID();
		if($MADT == null)
			$MADT='DT0000';
		else
			$MADT = $MADT[0]->MADT;
		$MADT = $this->createID($MADT);

		$MANV = $m->getStaffCustomerID_withAccountID($_SESSION['user_id']);
		$MANV = $MANV[0]->MANV;

		$arrCarAndTotalMoney = array();
		$arrCarAndTicket = $m->getCarAndTicket_InMonth($MONTH);

		for($i=0; $i<count($arrCarAndTicket); $i++){
			if($i==0){
				$element = new stdClass();
				$element->MAXE = $arrCarAndTicket[$i]->MAXE;
				$saleoff = $m->getSaleOff_WithTicketID($arrCarAndTicket[$i]->MAVE);
				if($saleoff == null)
					$saleoff = 0;
				else
					$saleoff = $saleoff[0]->GIAMGIA;
				
				$element->TONGTIEN = (int)($arrCarAndTicket[$i]->GIAVE)*(1-(float)($saleoff));				
				array_push($arrCarAndTotalMoney, $element);
			}
			else{
				if($arrCarAndTicket[$i-1]->MAXE!=$arrCarAndTicket[$i]->MAXE){
					$element = new stdClass();
					$element->MAXE = $arrCarAndTicket[$i]->MAXE;
					$saleoff = $m->getSaleOff_WithTicketID($arrCarAndTicket[$i]->MAVE);
					if($saleoff == null)
						$saleoff = 0;
					else
						$saleoff = $saleoff[0]->GIAMGIA;

					$element->TONGTIEN = (int)($arrCarAndTicket[$i]->GIAVE)*(1-(float)($saleoff));
					array_push($arrCarAndTotalMoney, $element);
				}else{
					$arrCarAndTotalMoney[count($arrCarAndTotalMoney)-1]->TONGTIEN += (int)($arrCarAndTicket[$i]->GIAVE)*(1-(float)($saleoff));
				}
			}
		}


		$arrCarCollectorAndTotalMoney = array();
		$carcollector = $m->getCarCollector();

		for($j=0; $j<count($carcollector); $j++){
			$element = new stdClass();
			$element->MANX = $carcollector[$j]->MANX;
			$element->TONGTIEN = '0';
			array_push($arrCarCollectorAndTotalMoney,$element);
		}

		$sumMoney = 0;
		for($i=0; $i<count($arrCarAndTotalMoney); $i++){
			$MANX = $m->getCarCollector_WithCarID($arrCarAndTotalMoney[$i]->MAXE);
			if($MANX!=null){
				$MANX = $MANX[0]->MANX;
				for($j=0; $j<count($carcollector); $j++){
					if($MANX == $carcollector[$j]->MANX){
						$arrCarCollectorAndTotalMoney[$j]->TONGTIEN+=$arrCarAndTotalMoney[$i]->TONGTIEN;
						$sumMoney+=$arrCarAndTotalMoney[$i]->TONGTIEN;
						break;
					}
				}
			}
		}

		$result = $m->setRevenue($MADT, $MANV, $MONTH, $sumMoney);
		if($result){
			for($i=0; $i<count($arrCarCollectorAndTotalMoney); $i++){
				$MACTDT = $m->getLastDetailRevenueID();
				if($MACTDT == null)
					$MACTDT='DC0000';
				else
					$MACTDT = $MACTDT[0]->MACTDT;
				$MACTDT = $this->createID($MACTDT);
				$result1 = $m->setDetailRevenue($MACTDT,$MADT,$arrCarCollectorAndTotalMoney[$i]->MANX, $arrCarCollectorAndTotalMoney[$i]->TONGTIEN);
			}
			
		}
	}

	public function insertTicket($MALT, $VITRI, $SLGHE, $DSGHE, $GHICHU){
		$m = new model();
		$SLGHE = (int)($SLGHE);
		$MAVE = $m->getLastTicketID();
		if($MAVE == null)
			$MAVE='VE0000';
		else
			$MAVE = $MAVE[0]->MAVE;

		if($SLGHE > 0){
			$DSGHE = explode(',',$DSGHE);
			for($i=0; $i<$SLGHE; $i++){
				$MAVE = $this->createID($MAVE);
				$result = $m->setTicketInfo($MAVE, $MALT, $VITRI, $DSGHE[$i], $GHICHU);
				if(!$result)
					break;
			}
		}

		if($result == true){
			$_SESSION['insertTicket_success'] = "Thêm vé thành công";

				//Tao so luong ve da dat trong gioi hang neu khach hang khong dang nhap
			if(!isset($_SESSION['amount_ticket_in_basket'])){
				$_SESSION['amount_ticket_in_basket']="0";
			}
			$amount = $_SESSION['amount_ticket_in_basket'];
			$_SESSION['amount_ticket_in_basket'] = (int)($amount)+$SLGHE;	

			if(isset($_SESSION['insertTicket_error'])){
				unset($_SESSION['insertTicket_error']);
			}
			header('location:ticket_booking.php');
		}else{
			if(isset($_SESSION['insertTicket_success'])){
				unset($_SESSION['insertTicket_success']);
			}
			$_SESSION['insertTicket_error'] = "Thêm vé thất bại";
			header('location:ticket_booking.php');
		}
	}

	public function insertInvoice($user_id, $user_name, $birthday, $email, $phone_number, $address, $type_pay, $sum, $arrSaleOff){
		$m = new model();
		$MAHD=null;
		$MAKH=null;

		if($user_id == null){
			$MAKH = $m->getLastCustomerID();
			if($MAKH == null)
				$MAKH='KH0000';
			else
				$MAKH = $MAKH[0]->MAKH;
			$MAKH = $this->createID($MAKH);
			$result0 = $m->setCustomerInfo($MAKH, $user_name, $birthday, $address, $email, $phone_number);
		}else{
			$MAKH = $m->getCustomerID_withAccountID($user_id);
			$MAKH = $MAKH[0]->MAKH;
			$result0 = true;
		}

		if($result0){
			$MAHD = $m->getLastInvoiceID();
			if($MAHD == null)
				$MAHD='HD0000';
			else
				$MAHD = $MAHD[0]->MAHD;
			$MAHD = $this->createID($MAHD);

			$result1 = $m->setInvoiceInfo($MAHD, $MAKH, $sum, $type_pay);
			$result4 = $m->updateAccount_SumMoney($user_id, $sum);
			if($result1){
				$arrTicket = $m->getTicket_DidntPay();
				for($i=0; $i<count($arrTicket); $i++){
					$result2 = $m->setDetailInvoice($MAHD, $arrTicket[$i]->MAVE, $MACHITIETKM = $arrSaleOff[$i]->MACHITIETKM);
					$result3 = $m->updateTicketState($arrTicket[$i]->MAVE);
					if(!$result2||!$result3)
						break;
				}
			}
		}

		if($result2&&$result3){
			$_SESSION['insertInvoice_success'] = "Thanh toán thành công";
			$_SESSION['amount_ticket_in_basket'] = "0";
			$_SESSION['invoiceID']=$MAHD;

			if(isset($_SESSION['insertInvoice_error'])){
				unset($_SESSION['insertInvoice_error']);
			}
			header('location:basket.php');
		}else{
			if(isset($_SESSION['insertInvoice_success'])){
				unset($_SESSION['insertInvoice_success']);
			}
			$_SESSION['insertInvoice_error'] = "Thanh toán thất bại";
			header('location:basket.php');
		}
	}

	public function loginAccount($login_name, $md5_user_password){
		$m = new model();
		$user = $m->getAccountInfo($login_name, $md5_user_password);
		if($user == true){
			$_SESSION['user_id'] = $user->MATK;
			$_SESSION['user_name'] = $user->TENKH;
			$_SESSION['type_user'] = $user->LOAI;
			$_SESSION['avatar'] = $user->ANHDD;
			$_SESSION['type_account']="KH";
			header('location:index.php');
			if(isset($_SESSION['login_error'])){
				unset($_SESSION['login_error']);
			}
			if(isset($_SESSION['not_login_yet'])){
				unset($_SESSION['not_login_yet']);
			}				
		}else{
			$user_staff =  $m->getAccountInfo_Staff($login_name, $md5_user_password);
			if($user_staff == true){
				$_SESSION['user_id'] = $user_staff->MATK;
				$_SESSION['user_name'] = $user_staff->TENNV;
				$_SESSION['type_user'] = $user_staff->CHUCVU;
				$_SESSION['avatar'] = $user_staff->ANHDD;
				$_SESSION['type_account']="NV";
				header('location:index.php');
				if(isset($_SESSION['login_error'])){
					unset($_SESSION['login_error']);
				}
				if(isset($_SESSION['not_login_yet'])){
					unset($_SESSION['not_login_yet']);
				}				
			}else{
				$_SESSION['login_error'] = "Đăng nhập không thành công!<br/>Quý khách vui lòng kiểm tra lại tài khoản và mật khẩu - Xin cám ơn!";
				header('Location:'.$_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function logoutAccount(){
		session_destroy();
		header('location:index.php');
	}

	public function signupAccount($user_name, $user_password, $name, $birthday, $address, $email, $phone_number){
		$m = new model();

		if(!$this->checkUserName_Exist($user_name))
		{
			$_SESSION['signup_error'] = "Tên đăng nhập (tài khoản) đã được sử dụng";
			header('location:signup.php');
			return;
		} 
		$MATK = $m->getLastAccountID();
		$MAKH = $m->getLastCustomerID();

		if($MATK == null)
			$MATK='TK0000';
		else
			$MATK = $MATK[0]->MATK;

		if($MAKH == null)
			$MAKH='KH0000';
		else
			$MAKH = $MAKH[0]->MAKH;

		$MATK = $this->createID($MATK);
		$MAKH = $this->createID($MAKH);

		$result1 = $m->setCustomerInfo($MAKH, $name, $birthday, $address, $email, $phone_number);
		$result2 = $m->setAccountInfo($MATK, $MAKH, $user_name, $user_password, 'Thường', '0', null);

		if($result1!=0&&$result2!=0){
			$_SESSION['signup_success'] = "Đăng kí thành công";	
			if(isset($_SESSION['signup_error'])){
				unset($_SESSION['signup_error']);
			}
			header('location:signup.php');
		}else{
			$_SESSION['signup_error'] = "Đăng kí thất bại";
			header('location:signup.php');
		}
	}

	public function createID($str){
		$number=substr($str, 2);
		$count=(int)($number)+1;
		$string=substr($str, 0, 2);

		if($count<10)
			$string_of_count = '000'.$count;
		else if($count<100)
			$string_of_count = '00'.$count;
		else if($count<1000)
			$string_of_count = '0'.$count;
		else
			$string_of_count = ''.$count;

		$id=$string.$string_of_count.'';
		return $id;
	}

	/*-----------------------------------------UPDATE--------------------------------------------*/
	public function updateAccount_Info($account_id, $user_name, $user_password, $name, $birthday, $address, $email, $phone_number){
		$m = new model();
		$MAKH = $m->getCustomerID_withAccountID($account_id);
		$MAKH = $MAKH[0]->MAKH;
		$result0 = $m->updateCustomer($MAKH, $name, $birthday, $address, $email, $phone_number);
		$result1 = $m->updateAccount($account_id, $user_name, $user_password);
		if($result0!=0||$result1!=0){
			$_SESSION['updateAccount_success'] = "Cập nhật thông tin tài khoản thành công";	
			if(isset($_SESSION['updateAccount_error'])){
				unset($_SESSION['updateAccount_error']);
			}
			header('location:account.php');
		}else{
			$_SESSION['updateAccount_error'] = "Cập nhật thông tin tài khoản thất bại";
			header('location:account.php');
		}
	}

	public function updateStaffAccount_Info($account_id, $user_name, $user_password, $name, $birthday, $address, $email, $phone_number){
		$m = new model();
		$MANV = $m->getStaffCustomerID_withAccountID($account_id);
		$MANV = $MANV[0]->MANV;
		$result0 = $m->updateStaffCustomer($MANV, $name, $birthday, $address, $email, $phone_number);
		$result1 = $m->updateAccount($account_id, $user_name, $user_password);
		if($result0!=0||$result1!=0){
			$_SESSION['updateStaffAccount_success'] = "Cập nhật thông tin tài khoản thành công";	
			if(isset($_SESSION['updateStaffAccount_error'])){
				unset($_SESSION['updateStaffAccount_error']);
			}
			header('location:staff_account.php');
		}else{
			$_SESSION['updateStaffAccount_error'] = "Cập nhật thông tin tài khoản thất bại";
			header('location:staff_account.php');
		}
	}

	/*-----------------------------------------AJAX----------------------------------------------*/

	public function getCar_Info($MANX){
		$m = new model();	
		$car_info = $m->getName_Car($MANX);
		return array('car_info'=>$car_info);
	}

	public function getRoute_Info($MAXE){
		$m = new model();	
		$route_info = $m->getRoute_WithCarID($MAXE);
		return array('route_info'=>$route_info);
	}

	public function getSchedule_Info($MATUYEN){
		$m = new model();	
		$schedule_info = $m->getTime_WithRouteID($MATUYEN);
		return array('schedule_info'=>$schedule_info);
	}

	public function getCharList_Info($MALT){
		$m = new model();	
		$charlist_info = $m->getCharList_WithScheduleID($MALT);
		return array('charlist_info'=>$charlist_info);
	}

	/*------------------------------------------------DELETE-----------------------------------------------------*/
	public function deleteTicket_Info($MAVE){
		$m = new model();
		$cost = null;
		if($MAVE=='all'){
			$result = $m->removeAllTicket();
			$_SESSION['amount_ticket_in_basket']='0';
		}else{
			$cost = $m->getCostTicket_WithTicketID($MAVE);
			$result = $m->removeTicket($MAVE);
			$_SESSION['amount_ticket_in_basket'] = (int)($_SESSION['amount_ticket_in_basket'])-1;
		}
		if($cost == null)
			return 0;
		else
			return $cost[0]->GIAVE;		
	}

	public function deleteRevenue_Info($MONTH){
		$m = new model();
		$MADT = $m->getRevenueID_WithMonth($MONTH);
		$MADT = $MADT[0]->MADT;
		$m->deleteDetailRevenue($MADT);
		$m->deleteRevenue($MADT);
	}

	/*----------------------------------------------OTHER------------------------------------------------------*/
	public function checkTypeAccount($MATK){
		$m = new model();
		$type_account = $m->getTypeAccount_Condition();
		$current_account = $m->getAccount_SumMoney($MATK);
		$summoney = $current_account[0]->TONGTIEN;
		$type=$type_account[0]->TENLOAITK;
		$min = $summoney - $type_account[0]->DKTONGTIEN;
		for($i = 0; $i<count($type_account); $i++){
			$sub = $summoney - $type_account[$i]->DKTONGTIEN;
			if($min>$sub){
				$min = $sub;
				$type = $type_account[$i]->TENLOAITK;
			}
		}
		if($current_account[0]->LOAI != $type){
			$result = $m->updateTypeAccount($MATK, $type);
			return $type;
		}
		return 0;
	}

	public function checkUserName_Exist($TAIKHOAN){
		$m = new model();
		$all_accountname = $m->getAccount_AllName();
		for($i = 0; $i<count($all_accountname); $i++){
			if($all_accountname[$i]->TAIKHOAN == $TAIKHOAN)
				return 0;
		}
		return 1;
	}

	public function search($key){
		$m = new model();
		$route = $m->searchRoute($key);
		$carcollector = $m->searchCarCollector($key);
		return array('route'=>$route, 'carcollector'=>$carcollector);
	}

}

	/*$c = new controller();	
	$c->insertInvoice(null, 'abc', 'abc', 'abc', 'abc', 'abc', 0, null);*/
?>