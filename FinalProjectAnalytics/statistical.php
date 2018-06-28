<?php
include('controller/controller.php');
$c = new controller();

if(isset($_POST['tukhoa'])){
	$key = $_POST['tukhoa'];
	$content = $c->statis($key);
	$statsCustomer = $content['statsCustomer'];
}
?>
<div id="dataStatistical">
	<table class="table-info col-md-6">
		<tr class="table-info-title">
			<th class="col-1">Tên khách hàng</th>
			<th class="col-2">Địa chỉ</th>
			<th class="col-3">Email</th>
			<th class="col-4">Số điện thoại</th>
			<th class="col-5">Tổng tiền</th>
			<th class="col-button">
				<img class="add-button line" src="view/img/add_icon_button.png"/>
			</th>
		</tr>
		<?php
		for($i=0; $i<count($statsCustomer); $i++){
			?>
			<tr class="table-info-row" id="row<?=$i+1?>">
				<td class="col-1"><?=$statsCustomer[$i]->TENKH?></td>
				<td class="col-2"><?=$statsCustomer[$i]->DIACHI_KH?></td>
				<td class="col-3"><?=$statsCustomer[$i]->EMAIL_KH?></td>
				<td class="col-4"><?=$statsCustomer[$i]->SDT_KH?></td>
				<td class="col-5"><?=$statsCustomer[$i]->TONGTIEN?></td>
				<td class="col-button">
					<img class="edit-button line" src="view/img/edit_icon_button.png"/>
					<img class="delete-button line" src="view/img/cancel_icon_red.png"/>
				</td>
			</tr>
			<?php	
		}
		?>
	</table>
</div>