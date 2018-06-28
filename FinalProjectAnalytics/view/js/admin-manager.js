$(document).ready(function(){

	//Chon the li hien thi no dung
	function activeTab(obj){
		$('.sidebar ul li').removeClass('active');
		$('.sidebar ul li a').removeClass('active');
		$(obj).addClass('active');
		$(obj).find('a').addClass('active');
		
		var id = $(obj).find('a').attr('href');
		$('.tab-item').hide();
		$(id).fadeIn('slow');	
	}

	function infoTable(obj){
		var tab =  $(obj).find('a').attr('href');
		var col_number = $(tab+' #row1 td').length - 1;
		var row_number = $(tab+' .table-info-row').length;
		var col_width = 933/col_number;

		for(var i=1; i<=row_number; i++){
			for(var j=1; j<=col_number; j++){		
				var id = tab+' #row'+i+' .col-'+j;
				var text = $(id).html();
				$(id).css('width',col_width);

				if(text.length>50){
					$(id).html(text.substring(0,50)+"...");
				}
			}
		}
	}

	function addButton(tab){
		$(tab+" .add-button").click(function(){
			switch(tab){
				
				//tab1
				case '#tab1':
				var col_number = $(tab+' #row1 td').length - 1;
				for(var j=1; j<=col_number; j++){							
					if(j==1){
						$(tab+' .modal-dialog .col-'+j).prop('disabled', true);
						$(tab+' .modal-dialog .col-'+j).attr('value','KM'+($(tab+' .table-info-row').length+1));
					}
					else{
						$(tab+' .modal-dialog .col-'+j).attr('value','');
					}
				}
				break;

				//tab2
				case '#tab2':
				var col_number = $(tab+' #row1 td').length - 1;
				for(var j=1; j<=col_number; j++){							
					if(j==1){
						$(tab+' .modal-dialog .col-'+j).prop('disabled', true);
						$(tab+' .modal-dialog .col-'+j).attr('value','HD'+($(tab+' .table-info-row').length+1));
					}
					else{
						$(tab+' .modal-dialog .col-'+j).attr('value','');
					}
				}
				break;

				//tab4
				case '#tab4':
				var col_number = $(tab+' #row1 td').length - 1;
				for(var j=1; j<=col_number; j++){							
					if(j==1){
						$(tab+' .modal-dialog .col-'+j).prop('disabled', true);
						$(tab+' .modal-dialog .col-'+j).attr('value','VE'+($(tab+' .table-info-row').length+1));
					}
					else{
						$(tab+' .modal-dialog .col-'+j).attr('value','');
					}
				}
				break;

				//tab5
				case '#tab5':
				var col_number = $(tab+' #row1 td').length - 1;
				for(var j=1; j<=col_number; j++){							
					if(j==1){
						$(tab+' .modal-dialog .col-'+j).prop('disabled', true);
						$(tab+' .modal-dialog .col-'+j).attr('value','GY'+($(tab+' .table-info-row').length+1));
					}
					else{
						$(tab+' .modal-dialog .col-'+j).attr('value','');
					}
				}
				break;

				//tab6
				case '#tab6':
				var col_number = $(tab+' #row1 td').length - 1;
				for(var j=1; j<=col_number; j++){							
					if(j==1){
						$(tab+' .modal-dialog .col-'+j).prop('disabled', true);
						$(tab+' .modal-dialog .col-'+j).attr('value','TK'+($(tab+' .table-info-row').length+1));
					}
					else{
						$(tab+' .modal-dialog .col-'+j).attr('value','');
					}
				}
				break;

				//tab7
				case '#tab7':
				var col_number = $(tab+' #row1 td').length - 1;
				for(var j=1; j<=col_number; j++){							
					if(j==1){
						$(tab+' .modal-dialog .col-'+j).prop('disabled', true);
						$(tab+' .modal-dialog .col-'+j).attr('value','TU'+($(tab+' .table-info-row').length+1));
					}
					else{
						$(tab+' .modal-dialog .col-'+j).attr('value','');
					}
				}
				break;
				

				//tab8
				case '#tab8':
				var col_number = $(tab+' #row1 td').length - 1;
				for(var j=1; j<=col_number; j++){							
					if(j==1){
						$(tab+' .modal-dialog .col-'+j).prop('disabled', true);
						$(tab+' .modal-dialog .col-'+j).attr('value','NV'+($(tab+' .table-info-row').length+1));
					}
					else{
						$(tab+' .modal-dialog .col-'+j).attr('value','');
					}
				}
				break;

				//tab9
				case '#tab9':
				var col_number = $(tab+' #row1 td').length - 1;
				for(var j=1; j<=col_number; j++){							
					if(j==1){
						$(tab+' .modal-dialog .col-'+j).prop('disabled', true);
						$(tab+' .modal-dialog .col-'+j).attr('value','NX'+($(tab+' .table-info-row').length+1));
					}
					else if(j<col_number){
						$(tab+' .modal-dialog .col-'+j).attr('value','');
					}
					else
						$(tab+' .modal-dialog .col-'+j).html('');
				}
				break;

				//tab9
				case '#tab10':
				var col_number = $(tab+' #row1 td').length - 1;
				for(var j=1; j<=col_number; j++){							
					if(j==1){
						$(tab+' .modal-dialog .col-'+j).prop('disabled', true);
						$(tab+' .modal-dialog .col-'+j).attr('value','KH'+($(tab+' .table-info-row').length+1));
					}
					else if(j<col_number){
						$(tab+' .modal-dialog .col-'+j).attr('value','');
					}
					else
						$(tab+' .modal-dialog .col-'+j).html('');
				}
				break;
			}

			$(tab+" .modal-dialog").css('transform','translate(0,-25%)');
			$(tab+" .modal-dialog").css('top',$(document).scrollTop()-35);
			$(tab+" .modal-dialog").fadeIn();
		});
	}

	function clickEditButton(obj){
		var tab = $(obj).find('a').attr('href');
		var row_number = $(tab+' .table-info-row').length;
		
		for(var i=1; i<=row_number; i++){
			var edit_button = tab+' #row'+i+' .edit-button';
			$(edit_button).click(function(){
				$(tab+" .modal-dialog").css('transform','translate(0,-25%)');
				$(tab+" .modal-dialog").css('top',$(document).scrollTop()-35);

				switch(tab){

					//tab9
					case '#tab1': case '#tab2': case '#tab6': case '#tab7': case '#tab8': case'#tab10':
					var row_id = tab +' #'+ $(this).parent().parent().attr('id');
					var col_number = $(tab+' #row1 td').length - 1;
					for(var j=1; j<=col_number; j++){
						var value = $(row_id+' .col-'+j).html();	

						$(tab+' .modal-dialog .col-'+j).attr('value',value);
						if(j==1)
							$(tab+' .modal-dialog .col-'+j).prop('disabled', true);
					}
					break;

					//tab10
					case '#tab4': case '#tab5': case '#tab9':
					var row_id = tab +' #'+ $(this).parent().parent().attr('id');
					var col_number = $(tab+' #row1 td').length - 1;
					for(var j=1; j<=col_number; j++){
						var value = $(row_id+' .col-'+j).html();	

						if(j<col_number){
							$(tab+' .modal-dialog .col-'+j).attr('value',value);
							if(j==1)
								$(tab+' .modal-dialog .col-'+j).prop('disabled', true);
						}
						else
							$(tab+' .modal-dialog .col-'+j).html(value);
					}
					break;
				}
				$(tab+" .modal-dialog").fadeIn();
			});
		}

		addButton(tab);
		
		$(tab+" .cancel-button").click(function(){
			$(tab+" .modal-dialog").fadeOut();
		});
	}

	//Them event click chuot cho the li
	$('.sidebar ul li').click(function(){
		activeTab(this);
		clickEditButton(this);
		infoTable(this);
	});

	function exportPDF(){
		$('#report_export_button').on('click',function(){  
      html2canvas(document.getElementById('data_report')).then(function(canvas) {
        var imgData = canvas.toDataURL('image/png');              
        var doc=null;
        if(canvas.width > canvas.height){
          doc = new jsPDF('l', 'mm', [canvas.width, canvas.height]);
        }
        else{
          doc = new jsPDF('p', 'mm', [canvas.height, canvas.width]);
        }
        doc.addImage(imgData, 'PNG', 0, 0,canvas.width, canvas.height);
        doc.save('report.pdf');
      });
    });
	}

	

	function dateTimeChangeEvent(){
		var keyword = $('#dateTime').val();
		$.post("getreport.php",{tukhoa:keyword},function(data){
			$('#data_report').html(data);

			$('#report_button').click(function(){
				var keyword = $('#dateTime').val();
				$.post("setrevenue.php",{tukhoa:keyword},function(data){
					$('#data_report').html(data);
				});
			});

			$('#update_report_button').click(function(){
				var keyword = $('#dateTime').val();
				$.post("updaterevenue.php",{tukhoa:keyword},function(data){
					$('#data_report').html(data);
				});
			});

			exportPDF();
		});
	}

	$('#dateTime').change(function(){
		dateTimeChangeEvent();
		
	});

	dateTimeChangeEvent();

	/*function changeValue_DateTimeSelect(){
		$.ajax({
			url : "getcar.php",
			type : "post",
			dataType:"text",
			data : {
				number : $('#dateTime').val()
			},        
			success: function(data){
				data = JSON.parse(data);            
				$('#dateTime').html("");
				for(var i=0; i<data.length; i++){
					var option_tag = '<option value="'+data[i].MAXE+'">'+data[i].BIENSO+'</option>';
					html_tag = $('#dateTime').html();   
					$('#dateTime').html(html_tag+option_tag);      
				} 
				getRoute_WithCarID();    
			},
			error: function(){
				alert("Lỗi");       
			}
		});
	} */

	//Mac dinh active cho the li dau tien
	activeTab($('.sidebar ul li:first-child'));
	clickEditButton($('.sidebar ul li:first-child'));
	infoTable($('.sidebar ul li:first-child'));
});