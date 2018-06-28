$(document).ready(function(){

	$('#txtSearch').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			var keyword = $('#txtSearch').val();
			$.post("search_info.php",{tukhoa:keyword},function(data){
				$('#datasearch').html(data);
			});
		} 
	});

	$('#btnSearch').click(function(){
		var keyword = $('#txtSearch').val();
			$.post("search_info.php",{tukhoa:keyword},function(data){
				$('#datasearch').html(data);
		});
	});
});
