$(document).ready(function(){
	var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
 });

	$('.star-icon').hover(function(){
		$(this).attr('src','view/img/star_icon_active.png');
	});
		
});

