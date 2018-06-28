$(document).ready(function(){
	var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

	$('.star-icon').hover(function(){
		$(this).attr('src','view/img/star_icon_active.png');
	});

     $('#invoice_export_button').on('click',function(){  
      html2canvas(document.getElementById('invoice_area')).then(function(canvas) {
        var imgData = canvas.toDataURL('image/png');              
        var doc=null;
        if(canvas.width > canvas.height){
          doc = new jsPDF('l', 'mm', [canvas.width, canvas.height]);
        }
        else{
          doc = new jsPDF('p', 'mm', [canvas.height, canvas.width]);
        }
        doc.addImage(imgData, 'PNG', 0, 0,canvas.width, canvas.height);
        doc.save('invoice.pdf');
      });
    });

     $('#ticket_export_button').on('click',function(){  
      var length = document.getElementsByClassName('ticket-content').length;
      for(var i=0; i<length; i++){
        var id = 'ticket_area'+i;
        html2canvas(document.getElementById(id)).then(function(canvas) {
          var imgData = canvas.toDataURL('image/png');              
          var doc=null;
          if(canvas.width > canvas.height){
            doc = new jsPDF('l', 'mm', [canvas.width, canvas.height]);
          }
          else{
            doc = new jsPDF('p', 'mm', [canvas.height, canvas.width]);
          }
          doc.addImage(imgData, 'PNG', 0, 0,canvas.width, canvas.height);
          doc.save('ticket.pdf');
        });
      }
      }); 

 });
