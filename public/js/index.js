total = {};
var controle = 0;
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
			controle = 0;
			$('#sendForm').removeAttr("disabled");
		}else if(total[$eixo] > 10){
			$(".alert").alert('close');
			$('body').append('<div class="alert alert-danger" role="alert">Você já marcou 10 itens para este eixo!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			$('#sendForm').attr("disabled", "disabled");
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
	});

	var viewportWidth = $(window).width();
	if (viewportWidth > 600) {
		$('.slider').append('<a data-flickr-embed="true"  href="https://www.flickr.com/photos/151944326@N03/albums/72157693306974412" title="03/05/2018 - Lançamento do movimento RumoS no Fundação Iberê Camargo"><img src="https://farm1.staticflickr.com/951/40079955470_8cb8bc9d65_z.jpg" width="580" height="300" alt="03/05/2018 - Lançamento do movimento RumoS no Fundação Iberê Camargo"></a><script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>');
	} else {
		$('.slider').append('<a data-flickr-embed="true"  href="https://www.flickr.com/photos/151944326@N03/albums/72157693306974412" title="03/05/2018 - Lançamento do movimento RumoS no Fundação Iberê Camargo"><img src="https://farm1.staticflickr.com/951/40079955470_8cb8bc9d65_z.jpg" width="320" height="240" alt="03/05/2018 - Lançamento do movimento RumoS no Fundação Iberê Camargo"></a><script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>');
	}
})
function test(){
	for (var item in total) {
	    if(total[item]>10){
			 controle++;
		 }
	}
	
	if(controle>0){
		$('body').append('<div class="alert alert-danger" role="alert">Você marcou mais de 10 itens em um mesmo eixo!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		$('#sendForm').attr("disabled","disabled");
	}else{
		$('form[name="store"]').submit();
		$('#sendForm').removeAttr("disabled");
	}
}
