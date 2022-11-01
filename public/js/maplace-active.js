$(function() {

    var LocsA = [
        {
            lat: 40.740178,
            lon: -74.190194,
            title: 'Location 1',
            html: [ '<div class="ltn__map-product-item">',
                '<h5 class="ltn__map-product-title"><a href="#">House in Upper East Side</a></h5>',
                '<p class="ltn__map-product-location"><i class="fa fa-map-pin"></i>Boston, New York</span>',
                '</div>'
            ].join(''),
            icon: "/img/icons/map-marker-2.png",
            animation: google.maps.Animation.BOUNCE
        },
    ];
    new Maplace({
        locations: LocsA,
        controls_on_map: true,
        map_options: {
            zoom: 13,
            scrollwheel: false,
            stopover: true
        },
        stroke_options: {
            strokeColor: '#f10',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#f10',
            fillOpacity: 0.4
        }
    }).Load();

});
