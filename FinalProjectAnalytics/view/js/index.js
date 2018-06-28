$(document).ready(function(){
	var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
 });

	$('.star-icon').hover(function(){
		$(this).attr('src','view/img/star_icon_active.png');
	});
		
});

