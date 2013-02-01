var get_athena = function() {
    var athena = "";
    $('#cool-textbox').children().not('.match').each(function(i, el) {
        athena += $(el).html();
    });
    return athena;
}

var print_func = function() {
    alert('this is when we print the nametag');
}

var confirm_attendee = function() {
    var email = $('body').data('email');
    // Use form value if they changed it.
    var name = $('#form-name').val();
    $.post('submit.php', {
        email: email,
        name: name
    }, print_func);
};

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

var reset = function() {
    $('.blinker').show();
    $('#cool-textbox').children().not('.match, .blinker').remove();
    $('.match').html('');
    $('form').addClass('fade-out');
}

var submit = function() {
    submitting = true;
    var athena = get_athena() + $('.first-line').html();
    $('#loading').removeClass('hide');
    $('.match').addClass('disabled');
    $.post('', { email: athena }, function(res) {
        $('#loading').addClass('hide');
        $('.match').removeClass('disabled');
        reset();
        var student = JSON.parse(res);
        console.log(student);

        $('#form-name').val(student.name);
        var years = {
            "1": "FRESHMAN",
            "2": "SOPHOMORE",
            "3": "JUNIOR",
            "4": "SENIOR"
        };
        $('body').data('email', athena);
        if (student.year in years) {
            $('#form-year').val(years[student.year]);
        } else {
            $('#form-year').val("year " + student.year);
        }
        $('#form-course').val(student.course);
        $('form').removeClass('fade-out');
        $('#form-name').focus();
    })
    .error(function(res) {
        $('#loading').addClass('hide');
        $('.match').removeClass('disabled');

        var error = $('<div class="submit-result error fade-out">invalid athena</div>');
        $('body').append(error);
        setTimeout(function() {
            error.removeClass('fade-out');
        }, 10);
        setTimeout(function() {
            var b = $('.submit-result');
            b.addClass('fade-out');
            setTimeout(function() {
                b.remove();
            }, 500);
        }, 2000);

        submitting = false;
    });
}

var setup_textbox = function() {
    var c = $('#cool-textbox');
    var match = $('<span class="match visible">');
    c.append(match);
    var blinker = $('<div class="blinker">');
    c.append(blinker);
    $(document).on('keypress', function(e) {
        console.log(e.which);
        if (e.which == 13) {
            if (submitting) {
                confirm_attendee();
                $('form').addClass('fade-out');
                submitting = false;
            } else {
                submit();
            }
            return;
        }
        if (e.which == 8) {
            return;
        }
        if (submitting) {
            return;
        }
        if (e.which == 32) {
            reset();
            return;
        }
        $('.blinker').hide();
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
    $(document).on('keydown', function(e) {
        // 27: ESC
        if (e.which == 27) {
            submitting = false;
            reset();
            return;
        }
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
        return (e.target.id.substring(0,5) === 'form-');
    });
}

var setup_printer = function(xml) {
    var label = dymo.label.framework.openLabelXml(xml);

    var printers = dymo.label.framework.getPrinters();
    if (printers.length == 0) {
        alert("No DYMO printers are installed.");
        return;
    }

    var printerName = printers[0].name;

    print_func = function() {
        label.setObjectText("name_ref", $("#form-name").val());
        label.setObjectText("major_ref", $("#form-course").val());
        label.setObjectText("year_ref", $("#form-year").val());
        label.print(printerName); 
    };
}

$(document).ready(function() {
    setup_textbox();
    $.ajax({
        url: "/checkin/nametag.label",
        dataType: "text",
        success: function(xml) {
            setup_printer(xml);
        }
    });
});
