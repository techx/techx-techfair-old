var get_athena = function() {
    var athena = "";
    $('#cool-textbox').children().not('.match').each(function(i, el) {
        athena += $(el).html();
    });
    return athena;
}

var update_matches = function(c, match) {
    var athena = get_athena();
    match.html('');
    if (athena.length < 2) {
      return;
    }
    var list = athenas[athena[0]];
    var html = "";
    var matches = 0;
    for (var i = 0; i < list.length; i++) {
        var v = list[i];
        if (v.indexOf(athena) === 0) {
            if (matches == 0) {
                html += '<span class="first-line">' + v.substr(athena.length) + '</span>';
            } else {
                html += v.substr(athena.length);
            }
            html += "<br />";
            matches++;
            if (matches == 4) {
                break;
            }
        }
    }
    match.html(html);
}

var submitting = false;

var submit = function() {
    submitting = true;
    var athena = get_athena() + $('.first-line').html();
    $('#loading').removeClass('hide');
    $('.match').addClass('disabled');
    $.post('', { email: athena }, function(res) {
        $('#loading').addClass('hide');
        $('.match').removeClass('disabled');
        submitting = false;
    })
    .error(function(res) {
        $('#loading').addClass('hide');
        $('.match').removeClass('disabled');
        submitting = false;
    });
}

var setup_textbox = function() {
    $('#athena').css('display', 'none');
    var c = $('<div id="cool-textbox">');
    var match = $('<span class="match visible">');
    c.append(match);
    $('body').on('keypress', function(e) {
        if (submitting) {
            return;
        }
        if (e.which == 13) {
            submit();
            return;
        }
        if (e.which == 32) {
            $(c).children().not('.match').remove();
            $('.match').html('');
            return;
        }
        var el = $('<span class="letter">').html(String.fromCharCode(e.which));
        var starting_left = (Math.random() * 50) - 50;
        var starting_top = (Math.random() * 50) - 50;
        el.css('left', starting_left);
        el.css('top', starting_top);
        match.before(el);
        setTimeout(function() {
            el.css('left', 0);
            el.css('top', 0);
            el.addClass('visible');
            update_matches(c, match);
        }, 50);
    });
    $('body').on('keydown', function(e) {
        // 8: BACKSPACE
        if (e.which != 8) {
            return;
        }
        var r = match.prev();
        r.removeClass('visible');
        setTimeout(function() {
            r.remove();
            update_matches(c, match);
        }, 200);
    });
    $('body').append(c);
}

$(document).ready(function() {
    setup_textbox();
//     $(document).click(function() {
//         document.body.webkitRequestFullScreen();
//     });
});
