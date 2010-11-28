$(document).ready(function(){
	$('.hidden').addClass('collapse').css('display','none').removeClass('hidden');
	$('#photo .main').children('ul').each(function(){
		var el = $(this);
		var elParent = $(this).parent();
		$(this).prev().hover(function(){
			if (el.hasClass('collapse'))
			{
				var duration = 200;
				$('#photo .shown').parent().stop().animate({width:'130'},duration);
				$('#photo .shown').removeClass('shown').addClass('collapse').hide();
				el.addClass('shown').removeClass('collapse').show();
				elParent.stop().animate({width:'260'},duration);
			}
		},function(){});
	});
});