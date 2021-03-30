jQuery(document).ready(function(){
    var lato;
    var longo;
    var img;
    var zoomo;
    var titlo;
    jQuery("#map").each(function () {
        if (jQuery(this).attr("data-map-lat")) {
            lato = jQuery(this).attr("data-map-lat");
        }
        if (jQuery(this).attr("data-map-lng")) {
            longo = jQuery(this).attr("data-map-lng");
        }
        if (jQuery(this).attr("data-map-marker")) {
            img = jQuery(this).attr("data-map-marker");
        }
        if (jQuery(this).attr("data-map-zoom")) {
            zoomo = parseInt(jQuery(this).attr("data-map-zoom"));
        }
        if (jQuery(this).attr("data-map-title")) {
            titlo = jQuery(this).attr("data-map-title");
        }
    });
    var map;
    function initialize_map() {
        if (jQuery('#map').length) {
            var myLatLng = new google.maps.LatLng(lato, longo);
            var mapOptions = {
                zoom: zoomo,
                center: myLatLng,
                scrollwheel: false,
                panControl: false,
                zoomControl: true,
                scaleControl: false,
                mapTypeControl: false,
                streetViewControl: false
            };
            map = new google.maps.Map(document.getElementById('map'), mapOptions);
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                tittle: titlo,
                icon: img
            });
        } else {
            return false;
        }}
    google.maps.event.addDomListener(window, 'load', initialize_map);
});
