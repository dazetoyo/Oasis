<?php /* Template Name: Galerie */ ?>
<?php get_header(); ?>





</div><!-- .container -->

<div style="margin-top:150px; margin-bottom:50px;" class="d-flex justify-content-center">


    <a href="#" class="interior primary-active pr-3">Interior</a>

    <a href="#" class="exterior pl-3">Exterior</a>


</div>



<div class="d-block slider-interior" >



    <?php
    $images = get_field('galerie_interior');
    if( $images ): ?>
    <div class="increase-gallery-slick-slider">
        <?php foreach( $images as $image ): ?>

            <a class="fancybox lazy"  data-fancybox="galerie_interior" href="<?php echo esc_url($image['url']); ?> "
                 style="background-image:url('<?php echo esc_url($image['url']); ?>');
                background-size:cover;
                height:65vh;
                display:block;
                background-position:center;"

                >

        </a>

    <?php endforeach; ?>
</div>
<?php endif; ?>

<div class="justify-content-center d-flex mb-5">
    <div class="btn-prev d-inline-flex"><img src="/wp-content/uploads/2020/01/left-arrow.svg" alt=""></div>
    <div class="pagingInfo d-inline-flex py-3"></div>
    <div class="btn-next d-inline-flex "><img src="/wp-content/uploads/2020/01/rright-arrow.svg" alt=""></div>
</div>

</div>

<div class="d-none slider-exterior"  >



    <?php
    $images = get_field('galerie_exterior');
    if( $images ): ?>
    <div class="increase-gallery-slick-slider2">
        <?php foreach( $images as $image ): ?>

            <a  class="fancybox lazy"  data-fancybox="galerie_exterior" href="<?php echo esc_url($image['url']); ?>"

                 style="background-image:url('<?php echo esc_url($image['url']); ?>');
                background-size:cover;
                height:65vh;
                display:block;
                background-position:center;">

        </a>

    <?php endforeach; ?>
</div>
<?php endif; ?>

<div class="justify-content-center d-flex mb-5">
    <div class=" d-inline-flex btn-prev2"><img src="/wp-content/uploads/2020/01/left-arrow.svg" alt=""></div>
    <div class="pagingInfo2 d-inline-flex py-3"></div>
    <div class=" d-inline-flex btn-next2"><img src="/wp-content/uploads/2020/01/rright-arrow.svg" alt=""></div>
</div>

</div>







<script type="text/javascript">
jQuery(document).ready(function($) {


    var $status = $('.pagingInfo');
    var $status2 = $('.pagingInfo2');
    var $slickElement = $('.increase-gallery-slick-slider');
    var $slickElement2 = $('.increase-gallery-slick-slider2');

    $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
        //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
        if(!slick.$dots){
            return;
        }

        var i = (currentSlide ? currentSlide : 0) + 1;
        $status.text(i + '/' + (slick.$dots[0].children.length));
    });

    $slickElement2.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
        //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
        if(!slick.$dots){
            return;
        }

        var i = (currentSlide ? currentSlide : 0) + 1;
        $status2.text(i + '/' + (slick.$dots[0].children.length));
    });

    $slickElement.slick({
        infinite: false,
        slidesToShow: 1,
        autoplay: false,
        dots: true,
        arrows:false,
    });



    // $slickElement2.slick({
    //     infinite: true,
    //     slidesToShow: 1,
    //     autoplay: false,
    //     dots: true,
    //     arrows:false,
    // });


    // $slickElement.on('afterChange', function(event, slick, currentSlide, nextSlide, lazyInstance){
    //     jQuery('.lazy').Lazy();
    // });


    jQuery(".btn-next").click(function(e){
        $slickElement.slick('slickNext');

    });

    jQuery(".btn-prev").click(function(e){
        $slickElement.slick('slickPrev');

    });


    jQuery(".btn-next2").click(function(e){
    $slickElement2.slick('slickNext');

    });

    jQuery(".btn-prev2").click(function(e){
        $slickElement2.slick('slickPrev');

    });





    jQuery(".interior").click(function(){
        jQuery(".interior").addClass("primary-active");
        jQuery(".exterior").removeClass("primary-active");
        jQuery(".slider-interior").addClass("d-block");
        jQuery(".slider-interior").removeClass("d-none");
        jQuery(".slider-exterior").addClass("d-none");
        jQuery(".slider-exterior").removeClass("d-block");


        $slickElement2.slick('unslick');
        $slickElement.slick({
            infinite: false,
            slidesToShow: 1,
            autoplay: false,
            dots: true,
            arrows:false,
        });


    });
    jQuery(".exterior").click(function(){
        jQuery(".exterior").addClass("primary-active");
        jQuery(".interior").removeClass("primary-active");
        jQuery(".slider-exterior").addClass("d-block");
        jQuery(".slider-exterior").removeClass("d-none");
        jQuery(".slider-interior").addClass("d-none");
        jQuery(".slider-interior").removeClass("d-block");
        $slickElement.slick('unslick');
        $slickElement2.slick({
            infinite: false,
            slidesToShow: 1,
            autoplay: false,
            dots: true,
            arrows:false,
        });
    });
});

</script>
<style media="screen">
.slick-list {
    padding: 0 16% 0 0%;
}
.slick-slide{
    margin-left:15px;
}
ul.slick-dots{
    display:none !important;
}
.btn-prev, .btn-next{
    padding:20px;
}

.btn-prev2, .btn-next2{
    padding:20px;
}

.interior,.exterior{
    color:#323233;
}

.primary-active{
    color:#8dbc2b;
}

@media (min-width: 1400px) {

    .increase-gallery-slick-slider,
    .increase-gallery-slick-slider2{
        margin-left:150px;
    }

}


</style>
<?php get_footer();
