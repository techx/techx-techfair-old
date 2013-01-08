$(document).ready(function(){
    /*
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
    */
    if ($('.info-nav').length != 0) {
        $('.info-nav').sticky({ topSpacing: 0 });
        var idOffsets = new Array();
        $('.info-nav a').each(function() {
            var href = $(this).attr('href');
            idOffsets.push({
                top: $(href).offset().top,
                nav_el: $(this).parent()
            });
        });
        var nav_el;
        var updateNav = function() {
            var scrollTop = $(window).scrollTop();
            $.each(idOffsets, function(i, v) {
                if (v.top < scrollTop + 300) {
                    new_nav_el = v.nav_el;
                }
            });
            if (new_nav_el != nav_el) {
                $(nav_el).removeClass('active');
                $(new_nav_el).addClass('active');
                nav_el = new_nav_el;
            }
        }
        $(window).scroll(function() {
            updateNav();
        });
    }
});
