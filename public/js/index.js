total = {};
$(document).ready(function(){
	if(window.location.href.indexOf("#") > -1) {
		$('html, body').animate({scrollTop:$('.'+ window.location.hash.replace('#','')).offset().top},1000);
	}
	$('.custom-control-label').on('click', function(){
		$eixo = $(this).attr('data-target');
		if($('#' + $(this).attr('for')).is(":checked")){
			total[$eixo] = (total[$eixo] == undefined) ? 0 : total[$eixo]-1;
		}else{
			total[$eixo] = (total[$eixo] == undefined) ? 1 : total[$eixo]+1;
		}

		if(total[$eixo]==10){
			$('body').append('<div class="alert alert-success" role="alert">Muito Bem, você marcou 10 itens para este eixo!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}else if(total[$eixo] > 10){
			$(".alert").alert('close')
			$('body').append('<div class="alert alert-danger" role="alert">Você já marcou 10 itens para este eixo!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
	});

	$('a.nav-item').on('click', function(){
    	$('html, body').animate({scrollTop:$('.' + $(this).attr('href').replace('#','')).offset().top},1000);
  	});

  	$('.menu-sandwich').on("click", () => {
        $('.menu-header').toggleClass('menu-header--open');
    });
    function backToTop(){
  		var scrollTrigger = 300; // px
        var scrollTop = $(window).scrollTop();
        if (scrollTop > scrollTrigger) {
            $('#back-to-top').addClass('show');
        } else {
            $('#back-to-top').removeClass('show');
        }
    };
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
    mySwiper = new Swiper ('.swiper-container', {
			loop: false,
			pagination : {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
		},		    
	})
})