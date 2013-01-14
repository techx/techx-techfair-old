var map = null;
$(document).ready(function() {

var mapOptions = {
    center: new google.maps.LatLng(42.36181,-71.090212),
    zoom: 16,
    disableDefaultUI: true,
    disableDoubleClickZoom: true,
    scrollwheel: false,
    draggable: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};
map = new google.maps.Map(document.getElementById("schedule-map"), mapOptions);
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
