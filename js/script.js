$(document).ready(function(){
	$('.hidden').addClass('collapse').css('display','none').removeClass('hidden');
	$('#navbar .main').children('ul').each(function(){
		var el = $(this);
		var elParent = $(this).parent();
		$(this).prev().hover(function(){
			if (el.hasClass('collapse'))
			{
				var duration = 200;
				$('#navbar .shown').parent().stop().animate({width:'150'},duration);
				$('#navbar .shown').removeClass('shown').addClass('collapse').hide();
				el.addClass('shown').removeClass('collapse').show();
				elParent.stop().animate({width:'290'},duration);
			}
		},function(){});
	});
});