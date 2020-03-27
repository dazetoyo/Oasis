<?php /* Template Name: Location template Map */ ?>
<?php get_header(); ?>
</div>
<div class="wrap">




    <div class="wpb_raw_code wpb_content_element wpb_raw_html vc_custom_1581345641723">
        <div class="wpb_wrapper">
            <div class="d-flex justify-content-center">
                <div class="border-top border-dark pt-3">
                    <img class="pb-3" src="/wp-content/uploads/2020/02/parcare-felicity-2.svg" width="36" height="28" alt=""><span style="font-size:36px; color:#E25F5F;" class="ml-3 great-vibes">2 locuri de parcare cadou</span>
                </div>

            </div>
        </div>
    </div>


    <div id="primary" >
        <main id="main" class="site-main" role="main">
            <?php if (have_posts()) { ?>
                <div class="post-wrap">
                    <?php while ( have_posts() ) :  the_post();	 ?>


                        <div class="row">
                            <div class="col-12 pt-5 py-md-5 text-center">
                                Situat pe strada Dem Teodorescu 29, în apropiere de emblematica Piața Alba Iulia, te afli aproape de toate punctele de interes. În Oasis vei găsi pe lângă apartamente moderne cu 2 și 3 camere, dar și garsoniere, o locație ce reprezintă punctual stilul tău de viață, indiferent de activitatea desfășurată. Școala și grădinița celor mici, biroul, magazinele din zonă, centrele medicale și nu în ultimul rând, trasarea unui contur al vieții tale sociale, odată cu restaurantele și cafenelele recunoscute din centrul Bucureștiului.
                            </div>
                        </div>

                        <div id="location-map-wrap" class="row no-gutters increase-full-right">
                            <div class="col-md-3">
                                <div class="location-map-filters p-head d-flex align-items-center h-100">
                                    <div class="px-large h-100 w-100 pt-5 pt-md-0">
                                        <div class="h-100 w-100 position-relative">
                                            <div class="d-flex h-100 align-items-center">
                                                <div class="custom-scrollbar p-5 p-md-0" data-mcs-theme="light">


                                                    <div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
                                                        <div class="wpb_text_column h2">
                                                            <div class="wpb_wrapper">

                                                                <p>Click pentru detalii:</p>



                                                            </div>
                                                        </div>
                                                    </div></div></div></div>



                                                        <?php // get_template_part( 'template-parts/page/content', 'page' ); ?>
                                                        <div id="location-map-filters-push"></div>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-9">
                                    <div id="location-map" style="width: 100%; height: 100vh;">

                                    </div>
                                </div>
                            </div>
                            <script>
                            (function($) {
                                $(window).load(function (){
                                    var places={
                                        walking:{
                                            label:'Grădinițe',
                                            scaledSize: new google.maps.Size("35px", "35px"), // size
                                            //checked:true,
                                            icon: {
                                                url: '/wp-content/uploads/2020/01/gradinita.svg',
                                                scaledSize: new google.maps.Size(96, 96)
                                            },
                                            items: [
                                                ['Gradinita', 44.430094, 26.128222],
                                                ['Gradinita', 44.429315, 26.127274],
                                            ],
                                            polylines: [
                                                [
                                                    // {lat: 44.428980, lng: 26.129364},
                                                    {lat: 44.428716, lng: 26.128831},
                                                    {lat: 44.429059, lng: 26.128705},
                                                    {lat: 44.430039, lng: 26.128636},
                                                    {lat: 44.430094, lng: 26.128222},
                                                    // {lat: 44.446969, lng: 26.096679}
                                                ],
                                                [
                                                    // {lat: 44.428980, lng: 26.129364},
                                                    {lat: 44.428716, lng: 26.128831},
                                                    {lat: 44.429059, lng: 26.128705},
                                                    {lat: 44.430039, lng: 26.128636},
                                                    {lat: 44.430868, lng: 26.128507},
                                                    {lat: 44.430684, lng: 26.126982},
                                                    {lat: 44.429297, lng: 26.127251},



                                                ]
                                            ]
                                        },
                                        transport:{
                                            label:'Restaurante',
                                            //checked:true,

                                            icon: {
                                                url: '/wp-content/uploads/2020/01/restaurant.svg' ,
                                                scaledSize: new google.maps.Size(96, 96)
                                            },


                                            items: [

                                                ['Restaurant', 44.428659, 26.133394],
                                                ['Restaurant', 44.427414, 26.131299],
                                                ['Restaurant', 44.429585, 26.126228],


                                            ],
                                            polylines: [
                                                [
                                                    // {lat: 44.428980, lng: 26.129364},
                                                    {lat: 44.428716, lng: 26.128831},
                                                    {lat: 44.429059, lng: 26.128705},
                                                    {lat: 44.430039, lng: 26.128636},
                                                    {lat: 44.430875, lng: 26.128503},
                                                    {lat: 44.430585, lng: 26.126086},
                                                    {lat: 44.429553, lng: 26.126336},
                                                    {lat: 44.429585, lng: 26.126228},

                                                ],

                                            ]
                                        },

                                        cafenea:{
                                            label:'Cafenele',


                                            icon: {
                                                url: '/wp-content/uploads/2020/01/cafenea.svg' ,
                                                scaledSize: new google.maps.Size(96, 96)
                                            },


                                            items: [
                                                ['Cafenea', 44.429964, 26.134661],
                                            ],
                                            // polylines: [
                                            //     [
                                            //         // {lat: 44.428980, lng: 26.129364},
                                            //         {lat: 44.428716, lng: 26.128831},
                                            //         {lat: 44.429059, lng: 26.128705},
                                            //         {lat: 44.430039, lng: 26.128636},
                                            //         {lat: 44.430875, lng: 26.128503},
                                            //         {lat: 44.430585, lng: 26.126086},
                                            //         {lat: 44.429553, lng: 26.126336},
                                            //         {lat: 44.429585, lng: 26.126228},
                                            //
                                            //     ],
                                            //
                                            // ]
                                        },

                                        cafenea:{
                                            label:'Farmacii',


                                            icon: {
                                                url: '/wp-content/uploads/2020/01/farmacii.svg' ,
                                                scaledSize: new google.maps.Size(96, 96)
                                            },


                                            items: [
                                                ['Farmacie', 44.428797, 26.138294],

                                            ],
                                            // polylines: [
                                            //     [
                                            //         // {lat: 44.428980, lng: 26.129364},
                                            //         {lat: 44.428716, lng: 26.128831},
                                            //         {lat: 44.429059, lng: 26.128705},
                                            //         {lat: 44.430039, lng: 26.128636},
                                            //         {lat: 44.430875, lng: 26.128503},
                                            //         {lat: 44.430585, lng: 26.126086},
                                            //         {lat: 44.429553, lng: 26.126336},
                                            //         {lat: 44.429585, lng: 26.126228},
                                            //
                                            //     ],
                                            //
                                            // ]
                                        },

                                        BucurestiMall:{
                                            label:'București Mall',


                                            icon: {
                                                url: '/wp-content/uploads/2020/01/mall.svg',
                                                scaledSize: new google.maps.Size(96, 96)
                                            },


                                            items: [
                                                ['București Mall', 44.420884, 26.126768],

                                            ],
                                            // polylines: [
                                            //     [
                                            //         // {lat: 44.428980, lng: 26.129364},
                                            //         {lat: 44.428716, lng: 26.128831},
                                            //         {lat: 44.429059, lng: 26.128705},
                                            //         {lat: 44.430039, lng: 26.128636},
                                            //         {lat: 44.430875, lng: 26.128503},
                                            //         {lat: 44.430585, lng: 26.126086},
                                            //         {lat: 44.429553, lng: 26.126336},
                                            //         {lat: 44.429585, lng: 26.126228},
                                            //
                                            //     ],
                                            //
                                            // ]
                                        },


                                        Spital:{
                                            label:'Spitale',


                                            icon: {
                                                url: '/wp-content/uploads/2020/01/farmacii.svg',
                                                scaledSize: new google.maps.Size(96, 96)
                                            },


                                            items: [
                                                ['Spital Clinic de copii Doctor Victor Gomoiu', 44.433076, 26.142205],
                                                ['Spitalul Constantin Angelescu', 44.428313, 26.113281],
                                                ['Spitalul Victor Babes', 44.427844, 26.139632],

                                            ],
                                            // polylines: [
                                            //     [
                                            //         // {lat: 44.428980, lng: 26.129364},
                                            //         {lat: 44.428716, lng: 26.128831},
                                            //         {lat: 44.429059, lng: 26.128705},
                                            //         {lat: 44.430039, lng: 26.128636},
                                            //         {lat: 44.430875, lng: 26.128503},
                                            //         {lat: 44.430585, lng: 26.126086},
                                            //         {lat: 44.429553, lng: 26.126336},
                                            //         {lat: 44.429585, lng: 26.126228},
                                            //
                                            //     ],
                                            //
                                            // ]
                                        },

                                        Cafenele:{
                                            label:'Cafenele',


                                            icon: {
                                                url: '/wp-content/uploads/2020/01/cafenea.svg',
                                                scaledSize: new google.maps.Size(96, 96)
                                            },


                                            items: [
                                                ['Cafenea', 44.429964, 26.134661],


                                            ],

                                        },

                                        Universitate:{
                                            label:'Universități',


                                            icon: {
                                                url: '/wp-content/uploads/2020/01/universitate.svg',
                                                scaledSize: new google.maps.Size(96, 96)
                                            },


                                            items: [
                                                ['Universitatea Națională de Artă Teatrală și Cinematografică IL Caragiale', 44.437696, 26.130026],
                                                ['Universitatea Hyperion', 44.432802, 26.125392],


                                            ],

                                        },


                                        PiataAlba:{
                                            label:'Piața Alba Iulia',


                                            icon: {
                                                url: '/wp-content/uploads/2020/01/piete.svg',
                                                scaledSize: new google.maps.Size(96, 96)
                                            },


                                            items: [
                                                ['Piata Alba Iulia', 44.426154, 26.129661],



                                            ],

                                        },
                                        Metrou:{
                                            label:'Metrou Piața Muncii',


                                            icon: {
                                                url: '/wp-content/uploads/2020/01/metrou.svg',
                                                scaledSize: new google.maps.Size(96, 96)
                                            },


                                            items: [
                                                ['Metrou Piața Muncii', 44.432545, 26.138216],



                                            ],

                                        },



                                    },

                                    //center = {lat: 44.444348, lng: 26.092027},
                                    center = {lat: 44.428984, lng: 26.129386},

                                    centerMobile = {lat: 44.428984, lng: 26.129386},

                                    map = new google.maps.Map(
                                        document.getElementById('location-map'),
                                        {
                                            zoom: 17,
                                            //center: new google.maps.LatLng(44.444348, 26.092027),
                                            center: center,
                                            mapTypeControl: false,
                                            scaleControl: false,
                                            streetViewControl: false,
                                            fullscreenControl: false,
                                            //draggable: false,
                                            styles:
                                            [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

                                        }
                                    ),
                                    infowindow = new google.maps.InfoWindow(),

                                    // a  div where we will place the buttons
                                    ctrl=$('<div/>').addClass(''),

                                    mainMarker = new google.maps.Marker({

                                        position: {lat: 44.428984, lng: 26.129386},
                                        title: 'Oasis',
                                        map: map,
                                        icon: {
                                            url: '/wp-content/uploads/2020/02/Main-Oasis-2.svg',
                                            scaledSize: new google.maps.Size(96, 96)
                                        }
                                        // icon: 'http://oasis.goodafternoon.ro/wp-content/uploads/2020/02/Main-Oasis-2.svg'




                                    });



                                    //now loop over the categories
                                    $.each(places,function(c,category){
                                        //a radio fo the category
                                        var cat=$('<input>',{type:'checkbox', name:'location-map-filters', value: c, id: c}).change(function(){
                                            $(this).data('goo').set('map',(this.checked)?map:null);
                                        })
                                        //create a data-property with a google.maps.MVCObject
                                        //this MVC-object will do all the show/hide for the category
                                        .data('goo',new google.maps.MVCObject)
                                        .prop('checked',!!category.checked)

                                        //this will initialize the map-property of the MVCObject
                                        .trigger('change')

                                        //label for the checkbox
                                        .appendTo($('<div/>').css({textAlign:'left'}).appendTo(ctrl))
                                        .after('<label for='+c+'>'+category.label+'</label>');

                                        //loop over the items(markers)
                                        $.each(category.items,function(m,item){
                                            if(item[3]){
                                                var icon = item[3];
                                            }else{
                                                var icon = category.icon;
                                            }
                                            var marker=new google.maps.Marker({
                                                position:new google.maps.LatLng(item[1],item[2]),
                                                title:item[0],
                                                icon:icon,
                                                scaledSize: new google.maps.Size(50, 50), // scaled size
                                            });

                                            //bind the map-property of the marker to the map-property
                                            //of the MVCObject that has been stored as checkbox-data
                                            marker.bindTo('map',cat.data('goo'),'map');
                                            google.maps.event.addListener(marker,'click',function(){
                                                infowindow.setContent(item[0]);
                                                infowindow.open(map,this);
                                            });

                                        });

                                        //loop over the polylines
                                        $.each(category.polylines,function(m,item){

                                            var polyline = new google.maps.Polyline({
                                                path: item,
                                                geodesic: true,
                                                strokeColor: '#8dbc2b',
                                                strokeOpacity: 4.0,
                                                strokeWeight: 4
                                            });
                                            polyline.bindTo('map',cat.data('goo'),'map');

                                        });

                                    });

                                    //use the buttons-div as map-control
                                    //map.controls[google.maps.ControlPosition.TOP_RIGHT].push(ctrl[0]);
                                    $('#location-map-wrap #location-map-filters-push').append(ctrl[0]);


                                    google.maps.event.addListener(infowindow, 'map', function() {

                                        // Reference to the DIV that wraps the bottom of infowindow
                                        var iwOuter = $('.increase-infowindow');


                                    });


                                    google.maps.event.addDomListener(window, 'resize', function() {
                                        if ($(window).width() < 950) {
                                            map.setCenter(centerMobile);
                                        }
                                        else {
                                            map.setCenter(center);
                                        }
                                    });



                                    var flightPlanCoordinates = [
                                        {lat: 44.428774, lng: 26.128919},
                                        {lat:  44.428688, lng: 26.128953},
                                        {lat: 44.428893 , lng: 26.129693 },
                                        {lat: 44.429284 , lng: 26.129513},
                                        {lat: 44.429251, lng: 26.129357 },
                                        {lat: 44.429150, lng: 26.129387 },
                                        {lat:  44.429074,  lng: 26.129073 },
                                        {lat:44.428863, lng: 26.129181 },
                                        {lat: 44.428782, lng: 26.128928 },

                                    ];
                                    var flightPath = new google.maps.Polyline({
                                        path: flightPlanCoordinates,
                                        geodesic: true,
                                        strokeColor: '#8dbc2b',
                                        strokeOpacity: 4.0,
                                        strokeWeight: 4
                                    });

                                    flightPath.setMap(map);

                                });



                            })(jQuery);




                            </script>

                            <script async defer
                            src="//maps.googleapis.com/maps/api/js?key=<?php the_field('increase_google_maps_api_key','options'); ?>&callback=initMap">
                            </script>



                        <?php endwhile; ?>
                    </div>
                <?php }; ?>
            </main>
        </div>
    </div>
    <style media="screen">
    #location-map-filters-push input[type="checkbox"] + label::before {
        content: "";
        background: transparent;
        display: block;
        position: absolute;
        left: 0;
        top: 8px;
        width: 15px;
        height: 15px;
        border: 1px solid #8dbc2b;
        border-radius: 4px;
    }
    #location-map-filters-push input[type="checkbox"] + label {
        display: table;
        padding: 3px 0 3px 24px;
        cursor: pointer;
        position: relative;
        font-weight: 400;
        margin: 0;
    }

    #location-map-filters-push input[type="checkbox"] {
        display: none;
    }

    #location-map-filters-push input[type="checkbox"]:checked + label::before {
        background-color: #8dbc2b;
        border-color: #8dbc2b;
    }

</style>

<?php get_footer();
