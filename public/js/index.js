$(document).ready(function(){

	$('nav a').click(() =>{
    	$('html, body').animate({scrollTop:$('.'+ $(this).attr('href').replace('#','')).offset().top},1000);
  	});

  	$('.menu-sandwich').on("click", () => {
        $('.menu-header').toggleClass('menu-header--open');
    });
})