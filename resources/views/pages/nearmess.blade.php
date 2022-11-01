@extends('layouts.profile_layout')
@section('title_first')
    Home
@endsection
@section('title_second')
     Nearest Hostels
@endsection
@section('content')
    <div class="ltn__google-map-locations-area">
        <div id="gmap"></div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){

            var LocsA = [
             @foreach(\App\Mees::all() as $mees)
                {
                    lat: {{ $mees -> latitude }},
                    lon: {{ $mees -> longitude }},
                    title: '',
                    html: [ '<div class="ltn__map-product-item">',
                        '<h5 class="ltn__map-product-title"><a href="#">{{ $mees -> name }}</a></h5>',
                        '</div>'
                    ].join(''),
                    icon: "/img/icons/map-marker-2.png",
                    animation: google.maps.Animation.BOUNCE
                },
             @endforeach
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
    </script>
@endpush
