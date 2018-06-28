<?php
include('database.php');
class model extends database{
	/*-----------------------------------------------------------SELECT WITHOUT CONDITION---------------------------------------*/

	function getImage_Route(){
		$sql = "SELECT ANH, MATUYEN FROM tuyen";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getLink_Slide(){
		$sql = "SELECT LINK FROM slide";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getCarController(){
		$sql = "SELECT * FROM nhaxe";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getNameAndID_CarController(){
		$sql = "SELECT MANX, TEN_NX FROM nhaxe";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getCarCollector(){
		$sql = "SELECT * FROM nhaxe";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getStaff(){
		$sql = "SELECT * FROM nhanvien";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		for($i=0; $i<count($arr); $i++){
			$arr[$i]->NGAYSINH_NV=$this->formatDateOut($arr[$i]->NGAYSINH_NV);
		}
		return $arr;
	}

	function getRoute(){
		$sql = "SELECT * FROM tuyen";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getAccount(){
		$sql = "SELECT * FROM taikhoan";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getComment(){
		$sql = "SELECT * FROM gopy";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getTicket(){
		$sql = "SELECT MAVE, SOGHE, THOIGIANDI, GIAVE, VITRI, THOIGIANDEN, THOIGIANDI FROM vexe, lichtrinh WHERE vexe.MALT = lichtrinh.MALT";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getDetailTicket(){
		$sql = "SELECT MAVE, TEN_NX, BIENSO, TENTUYEN, THOIGIANDI, THOIGIANDEN, GIAVE FROM lichtrinh, xe, tuyen, nhaxe, vexe WHERE lichtrinh.MATUYEN = tuyen.MATUYEN AND lichtrinh.MAXE = xe.MAXE AND xe.MANX = nhaxe.MANX AND vexe.MALT = lichtrinh.MALT AND TINHTRANG=0";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		for($i=0; $i<count($arr); $i++){
			$arr[$i]->THOIGIANDI=$this->formatDateTimeOut($arr[$i]->THOIGIANDI);
			$arr[$i]->THOIGIANDEN=$this->formatDateTimeOut($arr[$i]->THOIGIANDEN);
		}
		return $arr;
	}

	function getInvoice(){
		$sql = "SELECT MAHD, TENKH, NGAYLAPHD, THANHTIEN, HINHTHUC FROM hoadon, khachhang WHERE hoadon.MAKH = khachhang.MAKH";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		for($i=0; $i<count($arr); $i++){
			$arr[$i]->NGAYLAPHD=$this->formatDateTimeOut($arr[$i]->NGAYLAPHD);
		}
		return $arr;
	}

	function getSaleOff(){
		$sql = "SELECT khuyenmai.MAKM, NGAYBD, NGAYKT, TENKM, TENTUYEN, GIAMGIA FROM khuyenmai, chitietkhuyenmai, tuyen WHERE khuyenmai.MAKM = chitietkhuyenmai.MAKM AND chitietkhuyenmai.MATUYEN = tuyen.MATUYEN";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		for($i=0; $i<count($arr); $i++){
			$arr[$i]->NGAYBD=$this->formatDateOut($arr[$i]->NGAYBD);
			$arr[$i]->NGAYKT=$this->formatDateOut($arr[$i]->NGAYKT);
		}
		return $arr;
	}

	function getTicket_DidntPay(){
		$sql = "SELECT MAVE FROM vexe WHERE TINHTRANG = 0";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getCarCollector_BestQuality(){
		$sql = "SELECT MANX, TEN_NX, ANH FROM nhaxe ORDER BY DANHGIA DESC limit 4";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getCarCollector_Rand(){
		$sql = "SELECT MANX, TEN_NX, ANH FROM nhaxe ORDER BY RAND() limit 4";
		$this->setQuery($sql);
		return $this->loadAllRows();	
	}

	function getTypeAccount_Condition(){
		$sql = "SELECT * FROM quydinhloaitk";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getAccount_AllName(){
		$sql = "SELECT TAIKHOAN FROM taikhoan";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getCustomer(){
		$sql = "SELECT * FROM khachhang";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		for($i=0; $i<count($arr); $i++){
			$arr[$i]->NGAYSINH_KH=$this->formatDateOut($arr[$i]->NGAYSINH_KH);
		}
		return $arr;
	}

	function getDateTime_Invoice(){
		$sql = "SELECT DISTINCT NGAYLAPHD FROM hoadon";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		for($i=0; $i<count($arr); $i++){
			$arr[$i]->NGAYLAPHD=$this->formatDateTimeOut($arr[$i]->NGAYLAPHD);
		}
		return $arr;
	}

	/*-----------------------------------------------------------SELECT WITH CONDITION---------------------------------------*/

	function getAccount_SumMoney($MATK){
		$sql = "SELECT TONGTIEN, LOAI FROM taikhoan WHERE MATK = '$MATK'";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getDisCount($LOAI){
		$sql = "SELECT CHIETKHAU FROM quydinhloaitk WHERE TENLOAITK = '$LOAI'";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getCarCollector_FullInfo($MANX){
		$sql = "SELECT * FROM nhaxe WHERE MANX = '$MANX'";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getCarCollector_WithCarID($MAXE){
		$sql = "SELECT nhaxe.MANX FROM nhaxe, xe WHERE xe.MANX = nhaxe.MANX AND MAXE = '$MAXE'";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getCustomer_withAccountID($MATK){
		$sql = "SELECT TENKH, NGAYSINH_KH, EMAIL_KH, SDT_KH, DIACHI_KH FROM khachhang, taikhoan WHERE khachhang.MAKH = taikhoan.MAKH AND taikhoan.MATK = '$MATK'";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		$arr[0]->NGAYSINH_KH = $this->formatDateOut($arr[0]->NGAYSINH_KH);
		return $arr;
	}

	function getAllCustomerInfo_WithAccountID($MATK){
		$sql = "SELECT TAIKHOAN, MATKHAU, TENKH, NGAYSINH_KH, EMAIL_KH, SDT_KH, DIACHI_KH, NGAYLAP, LOAI, TONGTIEN, ANHDD, CHIETKHAU FROM khachhang, taikhoan, quydinhloaitk WHERE LOAI = TENLOAITK AND khachhang.MAKH = taikhoan.MAKH AND taikhoan.MATK = '$MATK'";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		$arr[0]->NGAYLAP = $this->formatDateTimeOut($arr[0]->NGAYLAP);
		$arr[0]->NGAYSINH_KH = $this->formatDateOut($arr[0]->NGAYSINH_KH);
		return $arr;
	}

	function getAllStaffInfo_WithAccountID($MATK){
		$sql = "SELECT TAIKHOAN, MATKHAU, TENNV, NGAYSINH_NV, EMAIL_NV, SDT_NV, DIACHI_NV, NGAYLAP, CHUCVU, ANHDD FROM nhanvien, taikhoan WHERE nhanvien.MANV = taikhoan.MANV AND taikhoan.MATK = '$MATK'";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		$arr[0]->NGAYLAP = $this->formatDateTimeOut($arr[0]->NGAYLAP);
		$arr[0]->NGAYSINH_NV = $this->formatDateOut($arr[0]->NGAYSINH_NV);
		return $arr;
	}

	function getInvoiceID_WithCustomerID($MATK){
		$sql = "SELECT MAHD FROM hoadon WHERE MAKH = (SELECT MAKH FROM taikhoan WHERE MATK='$MATK')";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getBookHistory_WithInvoiceID($MAHD){
		$sql = "SELECT vexe.MAVE, SOGHE, THOIGIANDI, THOIGIANDEN, TENTUYEN, TEN_NX, BIENSO, GIAVE FROM chitiethoadon, vexe, lichtrinh, tuyen, xe, nhaxe WHERE chitiethoadon.MAVE = vexe.MAVE AND vexe.MALT = lichtrinh.MALT AND tuyen.MATUYEN = lichtrinh.MATUYEN AND lichtrinh.MAXE = xe.MAXE AND xe.MANX = nhaxe.MANX AND MAHD=('$MAHD')";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		for($i=0; $i<count($arr); $i++){
			$arr[$i]->THOIGIANDI=$this->formatDateTimeOut($arr[$i]->THOIGIANDI);
			$arr[$i]->THOIGIANDEN=$this->formatDateTimeOut($arr[$i]->THOIGIANDEN);
		}
		return $arr;
	}

	function getCustomerID_withAccountID($MATK){
		$sql = "SELECT MAKH FROM taikhoan WHERE taikhoan.MATK = '$MATK'";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getStaffCustomerID_withAccountID($MATK){
		$sql = "SELECT MANV FROM taikhoan WHERE taikhoan.MATK = '$MATK'";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}


	function getName_Car($MANX){
		$sql = "SELECT MAXE, BIENSO FROM xe, nhaxe WHERE nhaxe.MANX = xe.MANX AND nhaxe.MANX='$MANX'";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getRoute_WithCarID($MAXE){
		$sql = "SELECT DISTINCT lichtrinh.MATUYEN, TENTUYEN FROM tuyen, lichtrinh WHERE lichtrinh.MATUYEN = tuyen.MATUYEN AND MAXE='$MAXE' AND THOIGIANDI>NOW()";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getTime_WithRouteID($MATUYEN){
		$sql = "SELECT DISTINCT MALT, THOIGIANDI, THOIGIANDEN, GIAVE FROM lichtrinh WHERE MATUYEN='$MATUYEN' AND THOIGIANDI>NOW()";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		for($i=0; $i<count($arr); $i++){
			$arr[$i]->THOIGIANDI=$this->formatDateTimeOut($arr[$i]->THOIGIANDI);
			$arr[$i]->THOIGIANDEN=$this->formatDateTimeOut($arr[$i]->THOIGIANDEN);
		}
		return $arr;
	}

	function getCharList_WithScheduleID($MALT){
		$sql = "SELECT SOGHE FROM vexe WHERE MALT='$MALT'";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getAccountInfo($login_name, $md5_user_password){
		$sql = "SELECT MATK, TENKH, LOAI, ANHDD FROM taikhoan, khachhang WHERE taikhoan.MAKH = khachhang.MAKH AND TAIKHOAN = '$login_name' and MATKHAU = '$md5_user_password'";
		$this->setQuery($sql);
		return $this->loadRow(array($Email,$md5_Password));
	}

	function getAccountInfo_Staff($login_name, $md5_user_password){
		$sql = "SELECT MATK, TENNV, CHUCVU, ANHDD FROM taikhoan, nhanvien WHERE taikhoan.MANV = nhanvien.MANV AND TAIKHOAN = '$login_name' and MATKHAU = '$md5_user_password'";
		$this->setQuery($sql);
		return $this->loadRow(array($Email,$md5_Password));
	}

	function getCostTicket_WithTicketID($MAVE){
		$sql = "SELECT GIAVE FROM vexe, lichtrinh WHERE vexe.MALT = lichtrinh.MALT AND MAVE='$MAVE'";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getRouteID_WithTicketID($MAVE){
		$sql = "SELECT MATUYEN FROM vexe, lichtrinh WHERE vexe.MALT = lichtrinh.MALT AND MAVE='$MAVE'";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getInvoice_WithID($MAHD){
		$sql = "SELECT hoadon.MAHD, TENKH, NGAYSINH_KH, DIACHI_KH, EMAIL_KH, SDT_KH, NGAYLAPHD, THANHTIEN, HINHTHUC FROM khachhang, hoadon WHERE hoadon.MAKH = khachhang.MAKH AND MAHD = '$MAHD'";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		for($i=0; $i<count($arr); $i++){
			$arr[$i]->NGAYSINH_KH=$this->formatDateOut($arr[$i]->NGAYSINH_KH);
			$arr[$i]->NGAYLAPHD=$this->formatDateTimeOut($arr[$i]->NGAYLAPHD);
		}
		return $arr;
	}

	function getDetailInvoice_WithID($MAHD){
		$sql = "SELECT DISTINCT cthd.MAVE, VITRI, SOGHE, TENTUYEN, THOIGIANDI, TEN_NX, BIENSO, GIAVE FROM chitiethoadon cthd, chitietkhuyenmai ctkm, vexe vx, lichtrinh lt, tuyen t, nhaxe nx, xe x WHERE cthd.MAVE = vx.MAVE AND vx.MALT = lt.MALT AND t.MATUYEN = lt.MATUYEN AND lt.MAXE = x.MAXE AND nx.MANX = x.MANX AND MAHD = '$MAHD'";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		for($i=0; $i<count($arr); $i++){
			$arr[$i]->THOIGIANDI=$this->formatDateTimeOut($arr[$i]->THOIGIANDI);
		}
		return $arr;
	}

	function getCurrentStaff($MATK){
		$sql = "SELECT TENNV, NGAYSINH_NV, DIACHI_NV, EMAIL_NV, SDT_NV, CHUCVU FROM nhanvien, taikhoan WHERE nhanvien.MANV = taikhoan.MANV AND MATK='$MATK'";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		for($i=0; $i<count($arr); $i++){
			$arr[$i]->NGAYSINH_NV=$this->formatDateOut($arr[$i]->NGAYSINH_NV);
		}
		return $arr;
	}

	public function getDetailRevenue($MADT){
		$sql = "SELECT nx.MANX, TONGDT, TEN_NX, DIACHI_NX, SDT_NX, EMAIL_NX FROM nhaxe nx, chitietdoanhthu ctdt WHERE ctdt.MANX = nx.MANX AND MADT='$MADT'";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	public function getRevenue($MONTH){
		$sql = "SELECT MADT, TONGCONG, THOIGIAN, NGAYLAP, TENNV, NGAYSINH_NV, DIACHI_NV, EMAIL_NV, SDT_NV, CHUCVU FROM doanhthu dt, nhanvien nv WHERE dt.MANV = nv.MANV AND THOIGIAN='$MONTH'";
		$this->setQuery($sql);
		$arr = $this->loadAllRows();
		for($i=0; $i<count($arr); $i++){
			$arr[$i]->NGAYLAP=$this->formatDateTimeOut($arr[$i]->NGAYLAP);
		}
		return $arr;
	}

	public function getRevenueID_WithMonth($MONTH){
		$sql = "SELECT MADT FROM doanhthu WHERE THOIGIAN='$MONTH'";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	public function getCarAndTicket_InMonth($MONTH){
		$begin = $this->getFirstInMonth($MONTH);
		$end = $this->getFirstInNextMonth($MONTH);
		$sql = "SELECT x.MAXE, vx.MAVE, GIAVE FROM vexe vx, lichtrinh lt, hoadon hd, chitiethoadon cthd, xe x WHERE lt.MALT = vx.MALT AND cthd.MAVE = vx.MAVE AND hd.MAHD = cthd.MAHD AND lt.MAXE = x.MAXE  AND NGAYLAPHD>'$begin' AND NGAYLAPHD<'$end' ORDER BY x.MAXE ASC";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	public function getSaleOff_WithTicketID($MAVE){
		$sql = "SELECT GIAMGIA FROM chitietkhuyenmai ctkm, chitiethoadon cthd WHERE ctkm.MACHITIETKM = cthd.MACHITIETKM AND MAVE='$MAVE'";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	/*----------------------------------------GET LAST ID-----------------------------------------------------------------*/
	function getLastAccountID(){
		$sql = "SELECT MATK FROM taikhoan ORDER BY MATK DESC LIMIT 1";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getLastCustomerID(){
		$sql = "SELECT MAKH FROM khachhang ORDER BY MAKH DESC LIMIT 1";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getLastTicketID(){
		$sql = "SELECT MAVE FROM vexe ORDER BY MAVE DESC LIMIT 1";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	
	function getLastScheduleID(){
		$sql = "SELECT MALT FROM lichtrinh ORDER BY MALT DESC LIMIT 1";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getLastInvoiceID(){
		$sql = "SELECT MAHD FROM hoadon ORDER BY MAHD DESC LIMIT 1";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getLastRevenueID(){
		$sql = "SELECT MADT FROM doanhthu ORDER BY MADT DESC LIMIT 1";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function getLastDetailRevenueID(){
		$sql = "SELECT MACTDT FROM chitietdoanhthu ORDER BY MADT DESC LIMIT 1";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	/*-------------------------------------------INSERT------------------------------------------------------------------*/
	function setRevenue($MADT, $MANV, $MONTH, $TONGCONG){
		if($MADT==null || $MANV==null || $MONTH==null || $TONGCONG==null)
			return 0;
		$sql="INSERT INTO doanhthu(MADT, MANV, THOIGIAN, TONGCONG) VALUES(?,?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($MADT, $MANV, $MONTH, $TONGCONG));
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	function setDetailRevenue($MACTDT, $MADT, $MANX, $TONGDT){
		if($MACTDT==null || $MADT==null || $MANX==null || $TONGDT==null)
			return 0;
		$sql="INSERT INTO chitietdoanhthu(MACTDT, MADT, MANX, TONGDT) VALUES(?,?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($MACTDT, $MADT, $MANX, $TONGDT));
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	function setScheduleInfo($MALT, $MATUYEN, $MAXE, $THOIGIANDI, $THOIGIANDEN){
		if($MALT==null || $MATUYEN==null || $MAXE==null || $THOIGIANDI==null || $THOIGIANDEN==null)
			return 0;
		$THOIGIANDI = $this->formatDateTimeIn($THOIGIANDI);
		$THOIGIANDEN = $this->formatDateTimeIn($THOIGIANDEN);
		$sql="INSERT INTO lichtrinh(MALT, MATUYEN, MAXE, THOIGIANDI, THOIGIANDEN) VALUES(?,?,?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($MALT, $MATUYEN, $MAXE, $THOIGIANDI, $THOIGIANDEN));
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	function setTicketInfo($MAVE, $MALT, $VITRI, $SOGHE, $GHICHU){
		if($MAVE==null || $MALT==null || $VITRI==null || $SOGHE==null)
			return 0;
		$sql="INSERT INTO vexe(MAVE, MALT, VITRI, SOGHE, GHICHU) VALUES(?,?,?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($MAVE, $MALT, $VITRI, $SOGHE, $GHICHU));
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	function setAccountInfo($MATK, $MAKH, $TAIKHOAN, $MATKHAU, $LOAI, $TONGTIEN, $ANHDD){
		if($MATK==null || $MAKH==null || $TAIKHOAN==null || $MATKHAU==null || $LOAI==null || $TONGTIEN==null){
			return 0;
		}
		$sql = "INSERT INTO taikhoan(MATK, MAKH, TAIKHOAN, MATKHAU, LOAI, TONGTIEN, ANHDD) VALUES(?,?,?,?,?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($MATK, $MAKH, $TAIKHOAN, $MATKHAU, $LOAI, $TONGTIEN, $ANHDD));
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	function setCustomerInfo($MAKH, $TENKH, $NGAYSINH_KH, $DIACHI_KH, $EMAIL_KH, $SDT_KH){	
		if($MAKH==null || $TENKH==null || $DIACHI_KH==null || $EMAIL_KH==null || $SDT_KH==null){
			return 0;
		}
		if($NGAYSINH_KH!=null){
			$NGAYSINH_KH = $this->formatDateIn($NGAYSINH_KH);
		}
		$sql = "INSERT INTO khachhang(MAKH, TENKH, NGAYSINH_KH, DIACHI_KH, EMAIL_KH, SDT_KH) VALUES(?,?,?,?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($MAKH, $TENKH, $NGAYSINH_KH, $DIACHI_KH, $EMAIL_KH, $SDT_KH));
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	function setInvoiceInfo($MAHD, $MAKH, $THANHTIEN, $HINHTHUC){
		if($MAHD==null || $MAKH==null || $THANHTIEN==null || $HINHTHUC == null){
			return 0;
		}
		$sql = "INSERT INTO hoadon(MAHD, MAKH, THANHTIEN, HINHTHUC) VALUES(?,?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($MAHD, $MAKH, $THANHTIEN, $HINHTHUC));
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	function setDetailInvoice($MAHD, $MAVE, $MACHITIETKM){
		if($MAHD==null || $MAVE==null){
			return 0;
		}
		$sql = "INSERT INTO chitiethoadon(MAHD, MAVE, MACHITIETKM) VALUES(?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($MAHD, $MAVE, $MACHITIETKM));
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	/*-----------------------------------------------------------UPDATE---------------------------------------------------------------*/
	function updateTicketState($MAVE){
		$sql="UPDATE vexe SET TINHTRANG = 1 WHERE MAVE=?";
		$this->setQuery($sql);
		return $this->execute(array($MAVE));
	}

	function updateCustomer($MAKH, $TENKH, $NGAYSINH_KH, $DIACHI_KH, $EMAIL_KH, $SDT_KH){	
		if($MAKH==null || $TENKH==null || $NGAYSINH_KH==null || $DIACHI_KH==null || $EMAIL_KH==null || $SDT_KH==null){
			return 0;
		}
		$NGAYSINH_KH = $this->formatDateIn($NGAYSINH_KH);
		$sql = "UPDATE khachhang SET TENKH = '$TENKH', NGAYSINH_KH = '$NGAYSINH_KH', DIACHI_KH = '$DIACHI_KH', EMAIL_KH = '$EMAIL_KH', SDT_KH = '$SDT_KH' WHERE MAKH='$MAKH'";
		$this->setQuery($sql);
		$result = $this->execute();
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	function updateStaffCustomer($MANV, $TENNV, $NGAYSINH_NV, $DIACHI_NV, $EMAIL_NV, $SDT_NV){	
		if($MANV==null || $TENNV==null || $NGAYSINH_NV==null || $DIACHI_NV==null || $EMAIL_NV==null || $SDT_NV==null){
			return 0;
		}
		$NGAYSINH_NV = $this->formatDateIn($NGAYSINH_NV);
		$sql = "UPDATE khachhang SET TENNV = '$TENNV', NGAYSINH_NV = '$NGAYSINH_NV', DIACHI_NV = '$DIACHI_NV', EMAIL_NV = '$EMAIL_NV', SDT_NV = '$SDT_NV' WHERE MAKH='$MANV'";
		$this->setQuery($sql);
		$result = $this->execute();
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	function updateAccount($MATK, $TAIKHOAN, $MATKHAU){
		if($MATK==null || $TAIKHOAN==null || $MATKHAU==null){
			return 0;
		}
		$sql = "UPDATE taikhoan SET TAIKHOAN = '$TAIKHOAN', MATKHAU = '$MATKHAU' WHERE MATK='$MATK'";
		$this->setQuery($sql);
		$result = $this->execute();
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	function updateAccount_SumMoney($MATK, $TONGTIEN){
		if($MATK==null || $TONGTIEN==null){
			return 0;
		}
		$sql = "UPDATE taikhoan SET TONGTIEN = TONGTIEN + $TONGTIEN WHERE MATK='$MATK'";
		$this->setQuery($sql);
		$result = $this->execute();
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	function updateTypeAccount($MATK, $LOAI){
		if($MATK==null || $LOAI==null){
			return 0;
		}
		$sql = "UPDATE taikhoan SET LOAI = '$LOAI' WHERE MATK='$MATK'";
		$this->setQuery($sql);
		$result = $this->execute();
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	/*----------------------------------------------------------DELETE----------------------------------------------------------------*/
	function removeAllTicket(){
		$sql="DELETE FROM vexe";
		$this->setQuery($sql);
		return $this->execute();
	}

	function removeTicket($MAVE){
		$sql="DELETE FROM vexe WHERE MAVE=?";
		$this->setQuery($sql);
		return $this->execute(array($MAVE));
	}

	function deleteTicket_DidntPay(){
		$sql="DELETE FROM vexe WHERE TINHTRANG=0";
		$this->setQuery($sql);
		return $this->execute();
	}

	function deleteDetailRevenue($MADT){
		$sql="DELETE FROM chitietdoanhthu WHERE MADT=?";
		$this->setQuery($sql);
		return $this->execute(array($MADT));
	}

	function deleteRevenue($MADT){
		$sql="DELETE FROM doanhthu WHERE MADT=?";
		$this->setQuery($sql);
		return $this->execute(array($MADT));
	}

	/*---------------------------------------------------------OTHER-----------------------------------------------------------------*/

	function findMaxSaleOff_OfTicket($MATUYEN){
		$sql="SELECT GIAMGIA, MACHITIETKM FROM chitietkhuyenmai, khuyenmai WHERE chitietkhuyenmai.MAKM = khuyenmai.MAKM AND MATUYEN = '$MATUYEN' AND NGAYBD<NOW() AND NOW()<NGAYKT ORDER BY GIAMGIA DESC LIMIT 1";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function searchRoute($key){
		$sql="SELECT * FROM tuyen WHERE (TENTUYEN like '%$key%' OR DIEMDAU like '%$key%' OR DIEMCUOI like '%$key%')";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	function searchCarCollector($key){
		$sql="SELECT * FROM nhaxe WHERE (TEN_NX like '%$key%' OR DIACHI_NX like '%$key%' OR SDT_NX like '%$key%' OR EMAIL_NX like '%$key%' OR TOMTAT like '%$key%')";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	/*function statsRoute_Info($date_begin, $date_in_month){
		$date_begin = $this->formatDateIn($date_begin);
		$date_end = date_modify($date_begin,"+"+$date_in_month);
		$sql = 
	}*/

	function statsCustomer_Info(){
		$sql = "SELECT TENKH, DIACHI_KH, EMAIL_KH, SDT_KH, SUM(THANHTIEN) AS TONGTIEN FROM hoadon, khachhang WHERE hoadon.MAKH = khachhang.MAKH GROUP BY hoadon.MAKH";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	/*-----------------------------------------------------------FUNCTION-CONVERT------------------------------------------------------*/
	function formatDateIn($date){
		$arr=explode('/',$date);
		return date('Y-m-d',mktime(0,0,0,$arr[1],$arr[0],$arr[2]));
	}

	function formatDateTimeIn($datetime){
		$arr = explode(' ',$datetime);
		$time = $arr[0];
		$date = $arr[1];
		$arr1 = explode(':',$time);
		$arr2 = explode('/',$date);
		return date('Y-m-d H:i:s',mktime($arr1[0],$arr1[1],$arr1[2],$arr2[1],$arr2[0],$arr2[2]));
	}

	function formatDateTimeOut($datetime){
		$arr = explode(' ',$datetime);
		$time = $arr[1];
		$date = $arr[0];
		$arr1 = explode(':',$time);
		$arr2 = explode('-',$date);
		return date('H:i:s d/m/Y',mktime($arr1[0],$arr1[1],$arr1[2],$arr2[1],$arr2[2],$arr2[0]));
	}

	function formatDateOut($date){
		$arr = explode('-',$date);
		return date('d/m/Y',mktime(0,0,0,$arr[1],$arr[2],$arr[0]));
	}

	function getFirstInMonth($date){
		$arr = explode('/',$date);
		return date('Y-m-d H:i:s',mktime(0,0,0,$arr[0],1,$arr[1]));
	}

	function getFirstInNextMonth($date){
		$arr = explode('/',$date);
		return date('Y-m-d H:i:s',mktime(0,0,0,(int)($arr[0])+1,1,$arr[1]));
	} 
}

/*$m = new model();
$m->setTicketInfo();*/
?>