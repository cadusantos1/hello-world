$(function(){
	//Aqui vai todo o código de JavaScript.
	$('nav.mobile').click(function(){
		//O que vai acontecer ao clicar na nav.mobile
		var listaMenu = $('nav.mobile ul');
		//Abrir através do fadeIn
		/*
		if(listaMenu.is(':hidden') == true){
		listaMenu.fadeIn();
		}
		else{
			listaMenu.fadeOut();
		} 
		*/
		if(listaMenu.is(':hidden') == true){
			// var icone = $('.botao-menu-mobile i');
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-bars');
			icone.addClass('fa-times');
			listaMenu.slideToggle();			
		}
		else{
			//alert('Vamos Fechar'); TESTE
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-times');
			icone.addClass('fa-bars');
			listaMenu.slideToggle();
		}
	});

	if($('target').length > 0){
		//O elemento existe, portanto precisamos dar o scroll em algum elemento.
		var elemento = '#'+$('target').attr('target');

		var divScroll = $(elemento).offset().top;
		
		$('html,body').animate({'scrollTop':divScroll},1500);
	}
})

