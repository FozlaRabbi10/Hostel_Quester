@extends('layouts.profile_layout')
@section('title_first')
    Home
@endsection
@section('title_second')
    Details
@endsection
@section('content')
    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">

                        <h1>{{ $mees -> name }}</h1>

                        <h4 class="title-2">Facilities</h4>
                        <div class="property-detail-feature-list clearfix mb-45">
                            <ul>
                                @foreach(json_decode($mees -> features) as $feature)
                                <li>
                                    <div class="property-detail-feature-list-item">

                                        <div>
                                            <h6>{{ $feature }}</h6>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <h4 class="title-2">Location</h4>
                        <div class="ltn__google-map-locations-area">
                            <div id="gmap"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">
                        <!-- Author Widget -->
                        <div class="widget ltn__author-widget">
                            <div class="ltn__author-widget-inner text-center">
                                <h5>{{ $mees -> owner -> name }}</h5>
                                <small>{{ $mees -> contact_number }}</small>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->
@endsection
@push('js')
    <script>
        $(document).ready(function(){

            var LocsA = [
                {
                    lat: {{ $mees -> latitude }},
                    lon: {{ $mees -> longitude }},
                    title: '{{ $mees -> address }}',
                    html: [ '<div class="ltn__map-product-item">',
                        '<h5 class="ltn__map-product-title"><a href="#">{{ $mees -> name }}</a></h5>',
                        '<p class="ltn__map-product-location"><i class="fa fa-map-pin"></i>{{ $mees -> address }}</span>',
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
    </script>
@endpush
