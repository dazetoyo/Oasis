<?php /* Template Name: Section 2 */ ?>
<?php get_header(); ?>
</div><!-- .container -->
<div class="wrap">

    <div class="" class="<?php
    if(get_field('increase_page_remove_padding_top')){echo ' pt-0 ';}
    if(get_field('increase_page_remove_padding_bottom')){echo ' pb-0 ';}
    ?>">
    <main id="main" class="site-main" role="main">
        <?php if (have_posts()) { ?>
            <div class="post-wrap" id="full-sections">
                <?php
                $post_type = 'page';

                $args = array(
                    'post_type' => $post_type,
                    'post_parent' => get_the_ID(),
                    'post_status' => array('draft','publish'),
                    'posts_per_page' => '-1',
                    'orderby'=>'menu_order',
                    'order'=>'ASC',
                    'suppress_filters'=>false,
                );
                $my_query = new WP_Query( $args );  ?>

                <?php if ( $my_query->have_posts() ){ ?>

                    <?php $i = 1; while ( $my_query->have_posts() ) : $my_query->the_post();
                    //get row/element shortcode css
                    $vc_shortcode_css = get_post_meta( $post->ID, '_wpb_shortcodes_custom_css', true );
                    ?>
                    <div class="section fp-auto-height-responsive" data-anchor="section-<?php echo $i; ?>">
                        <div class="container">
                            <?php get_template_part( 'template-parts/page/content', 'page' ); ?>
                        </div>
                        <style>
                        <?php echo $vc_shortcode_css; ?>
                        </style>
                    </div>
                    <?php $i++; endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                <?php } ?>

            </div>
            <script type="text/javascript">

            function increase_equal_height(){
                setTimeout( function(){

                    jQuery('.increase-equal-height').height('');

                    // Cache the highest
                    var highestBox = 0;

                    // Select and loop the elements you want to equalise
                    jQuery('.increase-equal-height').each(function(){

                        // If this box is higher than the cached highest then store it
                        if(jQuery(this).height() > highestBox) {
                            highestBox = jQuery(this).height();
                        }

                    });

                    // Set the height of all those children to whichever was highest
                    jQuery('.increase-equal-height').height(highestBox);

                }, 100);
            }

            jQuery(document).ready(function($) {
                var fullSections = jQuery('#full-sections').fullpage({
                    // scrollBar: true,
                    // lazyLoading: true,
                    navigation: true,
                    parallax:true,
                    fitToSection: true,
                    responsiveWidth: 767,
                    responsiveHeight: 700,
                    scrollOverflow: true,
                    normalScrollElements: '.gdpr-modal-content'
                    /*afterResize: function(){},
                    afterResponsive: function(isResponsive){},*/

                });




                $('.next-section').on('click', function(){

                    $.fn.fullpage.moveSectionDown();

                });

                increase_equal_height();


            });

            jQuery(window).resize(function(){
                increase_equal_height();
            });

            // RELOADS WEBPAGE WHEN MOBILE ORIENTATION CHANGES
            window.onorientationchange = function() {
                var orientation = window.orientation;
                switch(orientation) {
                    case 0:
                    case 90:
                    case -90: window.location.reload();
                    break; }
                };

                </script>
            <?php }; ?>
        </main>
    </div>

<!-- <div style="position:fixed; left:35px; bottom:100px;" class="text-gray">
    Scroll
</div>
<div style="position:fixed; left:48px; bottom:50px;">
    <img src="/wp-content/uploads/2020/01/Scrolldown.svg" alt="Scroll">
</div> -->
</div>

<style media="screen">

.container{
    max-width:100%;

}
</style>

<div class="container">

    <?php get_footer();
