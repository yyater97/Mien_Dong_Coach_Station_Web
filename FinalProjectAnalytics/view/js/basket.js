$(document).ready(function(){
	
	$('.cancel-icon').click(function(){
		var object = $(this);
		var value = object.html();
		if(confirm("Bạn muốn xóa vé "+object.attr('id'))==true){
			changeValue_CarCollectorSelect(object, value);
		}
	});

	function changeValue_CarCollectorSelect(cancel_button, value){
		$.ajax({
			url : "deleteticket.php",
			type : "post",
			dataType:"text",
			data : {
				number : cancel_button.attr('id')
			},        
			success: function(data){
				if(data != 0){
					var row_pay = cancel_button.parent().parent();
					var row_id = row_pay.attr('id'); 
					row_id = row_id.substring(5, row_id.length);
					var row_info = $('#row_i'+row_id);
					row_pay.fadeOut();
					row_info.fadeOut();
					row_pay.remove();
					row_info.remove();

					var total_money = $('#total-money').html();
					$('#total-money').html(Number(total_money)-Number(value));
					var amount_ticket = $('#amount').html();
					amount_ticket = Number(amount_ticket)-1;
					$('#amount').html(amount_ticket);
					$('#amount-in-basket').html(amount_ticket);
				}
				else{
					alert('vai');
					$('.table-info-row').remove();
					$('.table-pay-row').remove();
					$('#total-money').html('0');
					$('#amount').html('0');
					$('#amount-in-basket').html('0');
				}
			},
			error: function(){
				alert("Lỗi");       
			}
		});
	}
});