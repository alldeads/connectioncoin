@extends('layouts.app')

@section('css')
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
            width: 100%;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 100%;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="pac-card">
                <div>
                    <div id="title">
                        Autocomplete search
                    </div>
                    <div id="type-selector" class="pac-controls">
                        <input type="radio" name="type" id="changetype-all" checked="checked">
                        <label for="changetype-all">All</label>
                    </div>
                </div>
                <div id="pac-container">
                    <input id="pac-input" type="text"
                           placeholder="Enter a location">
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div id="connection_icon" data-icon="{{ asset('images/40x40.png') }}"></div>
            <div id="map" style="width: 100%; height: 600px;"></div>
            <div id="infowindow-content">
                <img src="" width="16" height="16" id="place-icon">
                <span id="place-name"  class="title"></span><br>
                <span id="place-address"></span>
            </div>
        </div>
    </div>
    
    
@endsection

@section('js')
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script>
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

            function initMap() {

                $('#pac-container input').hide();
                $('#pac-container').append('<b>Loading map... Please wait...</b>');

                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 39.381266, lng: -97.922211},
                    zoom: 5
                });
                var card = document.getElementById('pac-card');
                var input = document.getElementById('pac-input');
                var types = document.getElementById('type-selector');
                var strictBounds = document.getElementById('strict-bounds-selector');

                var iconBase = $("#connection_icon").data('icon');

                map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

                var autocomplete = new google.maps.places.Autocomplete(input);

                var locations = [];

                $.getJSON('/api/stories', function (data) {

                    $('#pac-container b').remove();
                    $('#pac-container input').show();

                    for (var i = 0; i < data.length; i++) {
                        var title = data[i].title;
                        var id = data[i].id;
                        var lat = data[i].lat;
                        var lng = data[i].lng;

                        locations.push([title, lat, lng, id]);
                    }


                    var infowindow = new google.maps.InfoWindow;

                    var marker, i;

                    for (i = 0; i < locations.length; i++) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                            icon: iconBase,
                            map: map
                        });

                        google.maps.event.addListener(marker, 'click', (function (marker, i) {
                            return function () {
                                infowindow.setContent('<a href="/stories/' + locations[i][3] + '">' + locations[i][0] + '</a>');
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                    }

                    // Bind the map's bounds (viewport) property to the autocomplete object,
                    // so that the autocomplete requests use the current map bounds for the
                    // bounds option in the request.
                    autocomplete.bindTo('bounds', map);

                    // Set the data fields to return when the user selects a place.
                    autocomplete.setFields(
                        ['address_components', 'geometry', 'icon', 'name']);

                    var infowindow = new google.maps.InfoWindow();
                    var infowindowContent = document.getElementById('infowindow-content');
                    infowindow.setContent(infowindowContent);
                    var marker = new google.maps.Marker({
                        map: map,
                        anchorPoint: new google.maps.Point(0, -29)
                    });

                    autocomplete.addListener('place_changed', function () {
                        infowindow.close();
                        marker.setVisible(false);
                        var place = autocomplete.getPlace();
                        if (!place.geometry) {
                            // User entered the name of a Place that was not suggested and
                            // pressed the Enter key, or the Place Details request failed.
                            window.alert("No details available for input: '" + place.name + "'");
                            return;
                        }

                        // If the place has a geometry, then present it on a map.
                        if (place.geometry.viewport) {
                            map.fitBounds(place.geometry.viewport);
                        } else {
                            map.setCenter(place.geometry.location);
                            map.setZoom(17);  // Why 17? Because it looks good.
                        }
                        marker.setPosition(place.geometry.location);
                        marker.setVisible(false);

                        var address = '';
                        if (place.address_components) {
                            address = [
                                (place.address_components[0] && place.address_components[0].short_name || ''),
                                (place.address_components[1] && place.address_components[1].short_name || ''),
                                (place.address_components[2] && place.address_components[2].short_name || '')
                            ].join(' ');
                        }

                        // infowindowContent.children['place-icon'].src = place.icon;
                        // infowindowContent.children['place-name'].textContent = place.name;
                        // infowindowContent.children['place-address'].textContent = address;
                        infowindow.open(map);
                    });

                    // Sets a listener on a radio button to change the filter type on Places
                    // Autocomplete.
                    function setupClickListener(id, types) {
                        var radioButton = document.getElementById(id);
                        radioButton.addEventListener('click', function () {
                            autocomplete.setTypes(types);
                        });
                    }

                    setupClickListener('changetype-all', []);
                    setupClickListener('changetype-address', ['address']);
                    setupClickListener('changetype-establishment', ['establishment']);
                    setupClickListener('changetype-geocode', ['geocode']);

                    document.getElementById('use-strict-bounds')
                        .addEventListener('click', function () {
                            console.log('Checkbox clicked! New state=' + this.checked);
                            autocomplete.setOptions({strictBounds: this.checked});
                        });
                });
            }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtlMpCUG3d_9DRX9ANhv753HRnTHHaX9g&libraries=places&callback=initMap"
            async defer></script>
@endsection
