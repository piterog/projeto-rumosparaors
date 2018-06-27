total = 0;
$(document).ready(function(){

	$('.custom-control-label').on('click', ()=>{
		if($('#' + $(this).attr('for')).is(":checked")){
			total=total-1;
		}else{
			total=total+1;
		}

		if(total==10){
			$('body').append('<div class="alert alert-success" role="alert">Muito Bem, você marcou 10 itens!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}else if(total > 10){
			$('body').append('<div class="alert alert-danger" role="alert">Você já marcou 10 itens!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
	});

	$('a.nav-item').on('click', () =>{
    	console.log($(this).attr('href').replace('#',''));
    	$('html, body').animate({scrollTop:$('.'+ $(this).attr('href').replace('#','')).offset().top},1000);
  	});

  	$('.menu-sandwich').on("click", () => {
        $('.menu-header').toggleClass('menu-header--open');
    });
})