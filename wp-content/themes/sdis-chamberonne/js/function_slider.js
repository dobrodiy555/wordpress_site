jQuery(document).ready(function($){
  new Swiper('.big-sl', {
    slidesPerView: 1, 
    fadeEffect: {
			crossFade: true
		},    
		effect: 'fade',
		spaceBetween: 30,
		loop: true,
		autoplay: {
			delay: 15000,
		},
    pagination: {
      el: '.big-sl-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.big-sl-next',
      prevEl: '.big-sl-prev',
    },
  });

});