(function ($) {

    /*
     *  render_map
     *
     *  This function will render a Google Map onto the selected jQuery element
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$el (jQuery element)
     *  @return	n/a
     */

    function render_map($el) {

        // var

        var $markers = $el.find('.marker');

        // Custom map styles

        var styles = [{
                "featureType": "all",
                "elementType": "labels.text.fill",
                "stylers": [{
                        "saturation": 36
                    },
                    {
                        "color": "#333333"
                    },
                    {
                        "lightness": 40
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers": [{
                        "visibility": "on"
                    },
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 16
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{
                        "color": "#fefefe"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{
                        "color": "#fefefe"
                    },
                    {
                        "lightness": 17
                    },
                    {
                        "weight": 1.2
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#eae9e9"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#f5f5f5"
                    },
                    {
                        "lightness": 21
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#dedede"
                    },
                    {
                        "lightness": 21
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 17
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 29
                    },
                    {
                        "weight": 0.2
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 18
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 16
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#f2f2f2"
                    },
                    {
                        "lightness": 19
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [{
                        "saturation": "-48"
                    },
                    {
                        "lightness": "-100"
                    },
                    {
                        "gamma": "0.00"
                    },
                    {
                        "weight": "7.65"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#ffffff"
                    },
                    {
                        "lightness": "100"
                    },
                    {
                        "gamma": "6.40"
                    }
                ]
            }
        ];

        var styledMap = new google.maps.StyledMapType(styles, {
            name: "Styled Map"
        });

        var args = {
            zoom: 16,
            disableDefaultUI: true,
            center: new google.maps.LatLng(0, 0),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
            }
        };

        var map = new google.maps.Map($el[0], args);

        map.mapTypes.set('map_style', styledMap);
        map.setMapTypeId('map_style');

        // add a markers reference
        map.markers = [];

        // add markers
        $markers.each(function () {
            add_marker($(this), map);
        });

        // center map
        center_map(map);
        markers_list(map);

        new MarkerClusterer(map, map.markers, {
            imagePath:
              "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
          });

    }



    // create info window outside of each - then tell that singular infowindow to swap content based on click
    var infowindow = new google.maps.InfoWindow({
        content: ''
    });



    /*
     *  add_marker
     *
     *  This function will add a marker to the selected Google Map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$marker (jQuery element)
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function add_marker($marker, map) {

        // var
        var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

        // create marker
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: '/mdc2/wp-content/uploads/2024/07/map-marker.png',
            content: $marker.html(),
            id: $marker.attr('id')
        });

        // add to array
        map.markers.push(marker);

        // if marker contains HTML, add it to an infoWindow
        if ($marker.html()) {
            // show info window when marker is clicked & close other markers
            google.maps.event.addListener(marker, 'click', function () {
                //swap content of that singular infowindow
                infowindow.setContent($marker.html());
                infowindow.open(map, marker);
            });

            // close info window when map is clicked
            google.maps.event.addListener(map, 'click', function (event) {
                if (infowindow) {
                    infowindow.close();
                }
            });
        }

    }

    /*
     *  center_map
     *
     *  This function will center the map, showing all markers attached to this map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function center_map(map) {

        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each(map.markers, function (i, marker) {

            var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());


            bounds.extend(latlng);

        });

        // only 1 marker?
        if (map.markers.length == 1) {
            // set center of map
            map.setCenter(bounds.getCenter());
            map.setZoom(16);
        } else if ($(window).width() < 960) {
            map.setZoom(2);
        } else {
            // fit to bounds
            map.fitBounds(bounds);
            map.setZoom(2);
        }

    }

    /*
     *   Create list of all markers
     */

    function markers_list(map) {
        var current_marker;
        var i;
        var l = map.markers.length
            // Read the bounds of the map being displayed.


            // Iterate through all of the markers that are displayed on the *entire* map.
            for (i = 0; i < l; i++) {

                current_marker = map.markers[i];

                /* If the current marker is visible within the bounds of the current map,
                 * let's add it as a list item to #nearby-results that's located above
                 * this script.
                 */


                    /* Only add a list item if it doesn't already exist. This is so that				  				 
                     * if the browser is resized or the tablet or phone is rotated, we don't
                     * have multiple results.
                     */


                        $('#results-list').append(
                            $('<li />')
                            //.attr('id', 'map-marker-' + i)
                            .attr('id', current_marker.id)
                            .attr('class', 'depot-result')
                            .html(current_marker.content)
                        );

                        console.log(current_marker.id);




            }

            $('#results-list li').click(function() {
                console.log('no elo');
                let marker_id = $(this).attr('id');

                //function find marker by id

                let current_marker = map.markers.find( ({ id }) => id === marker_id );

                //set content to markers
                infowindow.setContent(current_marker.content);
                infowindow.open(map, current_marker);

                //center marker
                var latlng = new google.maps.LatLng(current_marker.position.lat(), current_marker.position.lng());
                map.setCenter(latlng);
                map.setZoom(16);
                


                
                //let wtf = infowindow.open(map, );

                //console.log(wtf);
                
                console.log(marker_id);

                console.log(map.markers)

            });

    }

    /**
     * Map Init
     */

    $(document).ready(function () {

        setTimeout(function() {
            if ($('#acf-map').length > 0) {
                render_map($('#acf-map'));
            }
        },100);



    });

})(jQuery);