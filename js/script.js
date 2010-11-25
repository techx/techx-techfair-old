$(document).ready(function(){
	$('#navlinks ul ul').each(function(){
		var el = $(this);
		$(this).prev().hover(function(){
			if (el.hasClass('collapse'))
			{
				var duration = 200;
				$('#navlinks .shown').stop().removeClass('shown').slideUp(duration,function(){
					$(this).addClass('collapse');
				});
				el.addClass('shown').stop().slideDown(duration).removeClass('collapse');
			}
		},function(){});
	});
});