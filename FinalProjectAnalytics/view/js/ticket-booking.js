$(document).ready(function(){
	var swiper = new Swiper('.swiper-container', {
		slidesPerView: 3,
		spaceBetween: 30,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
	});

	$('.seat-row p').click(function(){
		if($(this).css('opacity')>0){
			var amount_char = $('#amount_char').attr('value');
			var	char_name = $('#char_name').attr('value');
			var name = $(this).html();

			if(char_name==""){
				$('#char_name').attr('value',name);
			}else{
				$('#char_name').attr('value',char_name+','+name);
			}
			$('#amount_char').attr('value',Number(amount_char)+1);
			$(this).css('opacity','0');
		}
	});

	function changeValue_CarCollectorSelect(){
		$.ajax({
			url : "getcar.php",
			type : "post",
			dataType:"text",
			data : {
				number : $('#car_collector').val()
			},        
			success: function(data){
				data = JSON.parse(data);            
				$('#car_code').html("");
				for(var i=0; i<data.length; i++){
					var option_tag = '<option value="'+data[i].MAXE+'">'+data[i].BIENSO+'</option>';
					html_tag = $('#car_code').html();   
					$('#car_code').html(html_tag+option_tag);      
				} 
				getRoute_WithCarID();    
			},
			error: function(){
				alert("Lỗi");       
			}
		});
	}

	function getRoute_WithCarID(){
		$.ajax({
			url : "getroute.php",
			type : "post",
			dataType:"text",
			data : {
				number : $('#car_code').val()
			},        
			success: function(data){				
				data = JSON.parse(data);
				$('#route').html("");            
				for(var i=0; i<data.length; i++){
					var option_tag_route = '<option value="'+data[i].MATUYEN+'">'+data[i].TENTUYEN+'</option>';
					var html_tag_route = $('#route').html();         
					$('#route').html(html_tag_route+option_tag_route);       
				}
				getTime_WithRouteID();   
			},
			error: function(){
				alert("Lỗi");       
			}
		});
	}

	function getTime_WithRouteID(){
		$.ajax({
			url : "gettime.php",
			type : "post",
			dataType:"text",
			data : {
				number : $('#route').val()
			},        
			success: function(data){
				data = JSON.parse(data);            
				$('#time_begin').html("");
				$('#time_end').html("");
				$('#cost').html("");
				for(var i=0; i<data.length; i++){
					var option_tag_time_begin = '<option value="'+data[i].MALT+'">'+data[i].THOIGIANDI+'</option>';
					var option_tag_time_end = '<option value="'+data[i].MALT+'">'+data[i].THOIGIANDEN+'</option>';
					var option_tag_cost = '<option value="'+data[i].MALT+'">'+data[i].GIAVE+'</option>';
					var	html_tag_time_begin = $('#time_begin').html();
					var	html_tag_time_end = $('#time_end').html();
					var html_tag_cost = $('#cost').html();          
					$('#time_begin').html(html_tag_time_begin+option_tag_time_begin);
					$('#time_end').html(html_tag_time_end+option_tag_time_end);
					$('#cost').html(html_tag_cost+option_tag_cost);      
				}
				getCharList_WithScheduleID();    
			},
			error: function(){
				alert("Lỗi");
			}
		});
	}

	function getCharList_WithScheduleID(){
		$.ajax({
			url : "getcharname.php",
			type : "post",
			dataType:"text",
			data : {
				number : $('#time_begin').val()
			},        
			success: function(data){
				data = JSON.parse(data);            
				for(var i=1; i<=23; i++){
					var id_char_1 = '.seat-row #A'+i;
					$(id_char_1).addClass('seat');
					$(id_char_1).removeClass('no-seat');
					var id_char_2 = '.seat-row #B'+i;
					$(id_char_2).addClass('seat');
					$(id_char_2).removeClass('no-seat');
				}
				for(var i=0; i<data.length; i++){
					var id_char = '.seat-row #'+data[i].SOGHE;
					$(id_char).removeClass('seat');
					$(id_char).addClass('no-seat');      
				}     
			},
			error: function(){
				alert("Lỗi");       
			}
		});
	}

	$('#car_collector').change(function(){
		changeValue_CarCollectorSelect();
	});

	$('#car_code').change(function(){
		getRoute_WithCarID();
	});

	$('#route').change(function(){
		getTime_WithRouteID();
	});

	$('#time_begin').change(function(){
		$('#time_end').val($(this).val());
		$('#cost').val($(this).val());
		getCharList_WithScheduleID();
	});

	$('#time_end').change(function(){
		$('#time_begin').val($(this).val());
		$('#cost').val($(this).val());
		getCharList_WithScheduleID();
	});

	$('#cost').change(function(){
		$('#time_end').val($(this).val());
		$('#time_begin').val($(this).val());
		getCharList_WithScheduleID();
	});

	changeValue_CarCollectorSelect();
});
