$(document).ready(function(){
	$('#navlinks ul ul').each(function(){
		var el = $(this);
		$(this).prev().hover(function(){
			if (el.hasClass('collapse'))
			{
				$('#navlinks .shown').stop().addClass('collapse').removeClass('shown').slideUp();
				el.addClass('shown').stop().slideDown().removeClass('collapse');
			}
		},function(){});
	});
});