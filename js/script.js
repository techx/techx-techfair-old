$(document).ready(function(){

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

  var mapOptions = {
      center: new google.maps.LatLng(42.36181,-71.090212),
      zoom: 16,
      disableDefaultUI: true,
      disableDoubleClickZoom: true,
      scrollwheel: false,
      draggable: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("schedule-map"), mapOptions);
  $('.map-location').each(function() {
      var name = $(this).data('name');
      var lat = new Number($(this).data('lat'));
      var lng = new Number($(this).data('lng'));
      var options = {
          position: new google.maps.LatLng(lat, lng),
          title: name,
          map: map
      };
      var marker = new google.maps.Marker(options);
      $(this).hover(function() {
          marker.setAnimation(google.maps.Animation.BOUNCE);
      }, function() {
          marker.setAnimation(null);
      });
  });
  
  $('.schedule-wrapper').hover(function() {
      setTimeout(function() {
      google.maps.event.trigger(map, 'resize');
      map.setCenter(new google.maps.LatLng(42.36181,-71.090212));
      }, 300);
  });

});
