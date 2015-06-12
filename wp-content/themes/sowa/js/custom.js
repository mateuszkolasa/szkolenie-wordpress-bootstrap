$(function() {
	$('.gallery-photo').parent().touchTouch();
	
	var menuHide = false;
	if($('.left-menu').is(':hidden')) {
		menuHide = true;
		$('.left-menu').hide().removeClass('hidden-xs');
	}
	
	$('.xs-menu-show').click(function() {
		if(menuHide) {
			if($('.left-menu').is(':hidden')) {
				$('.left-menu').slideDown("slow");
				
				$(this).find('.glyphicon').removeClass('glyphicon-menu-down').addClass('glyphicon-menu-up');
			} else {
				$('.left-menu').slideUp("slow");
				$(this).find('.glyphicon').removeClass('glyphicon-menu-up').addClass('glyphicon-menu-down');
			}
		}
	});
});