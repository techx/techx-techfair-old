$(document).ready(function(){
	$('#navlinks ul ul').each(function(){
		var el = $(this);
		$(this).prev().hover(function(){
			if (el.hasClass('collapse'))
			{
				var duration = 200;
				$('#navlinks .shown').removeClass('shown').slideUp(duration,function(){
					$(this).addClass('collapse');
				});
				el.addClass('shown').slideDown(duration).removeClass('collapse');
			}
		},function(){});
	});
});