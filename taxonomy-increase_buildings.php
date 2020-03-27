<?php
/**
* Template Name: Apartments loop

*/
get_header();
?>

<!-- or -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<div style="margin:200px 0 30px 0;" class="d-block text-center">



    <h2 class="font-weight-light text-secondary">FILTREAZĂ APARTAMENTELE DISPONIBILE DUPĂ</h2>
    <div class="filters d-flex justify-content-center mb-5 mt-4">

        <div class="ui-group">

            <select class="filter-select" value-group="camere">
                <option value="">Toate camerele</option>
                <?php
                if( $terms = get_terms(array('taxonomy' => 'increase_rooms','orderby' => 'name',
                'hide_empty' => false ))){

                    foreach ( $terms as $term ) {
                        echo '<option value=".';
                        echo $term->slug;
                        echo '">';
                        echo $term->name;
                        echo '</option>';

                    }
                }
                ?>
            </select>
        </div>

        <div class="ui-group">

            <select class="ml-3 filter-select" value-group="etaj">
                <option value="">Toate etajele</option>
                <?php
                if( $terms = get_terms(array('taxonomy' => 'increase_buildings','orderby' => 'name',
                'hide_empty' => false ))){

                    foreach ( $terms as $term ) {
                        echo '<option value=".';
                        echo $term->slug;
                        echo '">';
                        echo $term->name;
                        echo '</option>';

                    }
                }
                ?>
            </select>
        </div>


    </div>



    <div class="grid">

        <?php

        $custom_query_args = array(
            'post_type' => 'increase_apartments',
            'post_status' => 'publish',
            //'category_name' => 'custom-cat',
            'order' => 'DESC', // 'ASC'
            'orderby' => 'date' // modified | title | name | ID | rand
        );
        $custom_query = new WP_Query( $custom_query_args );

        if ( $custom_query->have_posts() ) :
            while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

            <div class="color-shape small round <?php
            $terms = get_the_terms( $post->ID, 'increase_rooms' );
            if ($terms) {
                foreach($terms as $term) {
                    echo $term->slug;
                    echo ' ';
                }
            }

            $terms = get_the_terms( $post->ID, 'increase_buildings' );
            if ($terms) {
                foreach($terms as $term) {
                    echo $term->slug;
                    echo ' ';
                }
            }
            ?>
            ">

            <div class="h3 text-dark text-left pl-4 pt-1 font-weight-normal"><a style="text-decoration:none;" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </div>
            <div class="h4 text-dark text-left pl-4 pt-1 font-weight-normal">
                <?php
                $terms = get_the_terms( $post->ID, 'increase_buildings' );
                if ($terms) {
                    foreach($terms as $term) {
                        echo $term->name;
                        echo ' ';
                    }
                }
                ?>
            </div>
            <div style="background-image:url('<?php echo get_the_post_thumbnail_url() ?>');
            background-size:cover;
            width:100%;
            height:250px;
            display:block;" >
        </div>

        <div class="h4 text-left pl-4 pt-5 pb-4 text-dark font-weight-normal">
            <div class="d-inline-flex">


                <?php the_field('suprafata_utila_totala') ?>
            </div>
            <div class="d-inline-flex pl-5 ml-5">
                <?php the_field('suprafata_utila_totala_numar') ?>
                <?php echo 'mp' ?>
            </div>

        </div>

        <div class=" text-left border-position">
            <a class="btn btn-primary btn-lg btn-padding" href="#">

                <span class="small text-light font-weight-bold">VEZI DETALII</span>
            </a>
        </div>
    </a>
    <?php



    ?>

</div>

<?php
endwhile;
?>



<?php
wp_reset_postdata(); // reset the query

endif;
?>



</div>




</div>

<script type="text/javascript">

// init Isotope
jQuery(document).ready(function($) {


    // external js: isotope.pkgd.js

    // init Isotope
    var $grid = $('.grid').isotope({
        itemSelector: '.color-shape'
    });

    // store filter for each group
    var filters = {};

    $('.filters').on( 'change', function( event ) {
        var $select = $( event.target );
        // get group key
        var filterGroup = $select.attr('value-group');
        // set filter for group
        filters[ filterGroup ] = event.target.value;
        // combine filters
        var filterValue = concatValues( filters );
        // set filter for Isotope
        $grid.isotope({ filter: filterValue });
    });

    // flatten object by concatting values
    function concatValues( obj ) {
        var value = '';
        for ( var prop in obj ) {
            value += obj[ prop ];
        }
        return value;
    }




});



</script>
<style media="screen">


.btn-padding{
    padding: 4px 24px 12px 24px;
}

.color-shape{
    width:380px;
    max-width:380px;
    height:424px;
    margin-bottom:100px;
    margin-right:15px;

}

.color-shape:after {
    content: '';
    position:absolute;
    top:0;
    left:0;
    display: block;
    width: 0;
    height: 1px;
    background: #000;
    transition: width .3s;
}



.color-shape:hover:after{
    width: 100%;
}


.color-shape:before {
    content: '';
    position:absolute;
    top:0;
    right:0;
    display: block;
    width: 1px;
    height: 0;
    background: #000;
    transition: height .3s;
}



.color-shape:hover:before{
    height: 100%;
}


.border-position{
    position:relative;
}

.border-position:after{
    content: '';
    position: absolute;
    left: 0;
    top: -100px;
    height: 103px;
    background: #111111;
    width: 1px;
}

.border-position:before{
    content: '';
    position: absolute;
    left: 120px;
    bottom: 0;
    height: 1px;
    background: #111111;
    width: 103px;
}

.h3.text-dark.text-left.pl-4.pt-1.font-weight-normal{
    position:relative;

}
.h3.text-dark.text-left.pl-4.pt-1.font-weight-normal:after{
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 103px;
    background: #111111;
    width: 1px;
}
</style>

<?php get_footer();
