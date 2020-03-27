
</div><!-- .container -->

</div><!-- #content -->


<footer id="site-footer" class="site-footer bg-primary">

    <div style="height: 70vh;

    display: flex;
    flex-direction: column;

    justify-content: center;" class="container bg-primary footer-container-height fix-vh-ios-70">
        <?php /*
        <?php if(is_active_sidebar( 'sidebar-footer' )){ ?>

        <aside class="widget-area" aria-label="<?php esc_attr_e( 'Footer', 'increase' ); ?>">
        <div class="row pt-3">
        <?php dynamic_sidebar('sidebar-footer'); ?>
        </div>
        </aside><!-- .widget-area -->

        <?php } ?>
        <div class="copyright text-center py-3">
        <?php echo date('Y'); ?> © <?php echo get_bloginfo('name'); ?>. <?php _e('All rights reserved', 'increase'); ?>.
        </div> */ ?>
        <div  class="row bg-primary pt-5 justify-content-center">
            <div class="col-12 col-md-4 text-center">
                <img class="w-177" src="/wp-content/uploads/2020/01/Oasis-New-inverted-logo.svg" alt="">
            </div>
            <!-- mobile tab -->
            <div class="d-block d-lg-none col-12">
                <div class="h2 text-light font-weight-bold text-center mt-4">
                    Echipa noastră de vânzări îți stă la dispoziție:
                </div>

                <ul class="nav nav-tabs d-flex justify-content-center my-4 border-0" id="myTab" role="tablist">


                    <li class="nav-item">
                        <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="formular-tab" data-toggle="tab" href="#formular" role="tab" aria-controls="formular" aria-selected="false">

                            <?php if (is_single()){     ?>
                                Solicită broșura


                            <?php }  else { ?>
                                    Solicită oferta
                         <?php    } ?>
                         </a>

                    </li>

                </ul>



                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row">

                        </div>
                        <div class="row text-center">
                            <div class="col-6 mb-3">
                                <div class="h3 text-dark mb-3">
                                    Telefon mobil
                                </div>
                                <div class="h4 text-light">
                                    <a class="text-light" href="tel:<?php the_field('header_phone_number_full','options'); ?>"><?php the_field('header_phone_number_full','options'); ?></a>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="h3 text-dark mb-3">
                                    E-mail
                                </div>
                                <div class="h4 text-light">
                                    <a class="text-light" href="mailto:sales@oasis-apartments.ro">sales@oasis-apartments.ro</a>
                                </div>
                            </div>
                        </div>


                        <div class="row text-center">
                            <div class="col-6 mb-3">
                                <div class="h3 text-dark mb-3">
                                    Adresa
                                </div>
                                <div class="h4 text-light">
                                    Strada Dem Teodorescu 29
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="h3 text-dark mb-3">
                                    Program orar
                                </div>
                                <div class="h4 text-light">
                                    Luni - Vineri 10:00 - 18:00 <br/>
                                    Sâmbătă 10:00 - 14:00 <br/> <br/>
                                    <span class="text-dark">Vizitele se efectuează doar după o
                                        programare prealabilă.</span>

                                    </div>
                                </div>
                            </div>


                            <div class="row border-top border-light py-2 ">
                                <div class="col-12 d-flex justify-content-center">

                                    <div class="mr-3">
                                        Suntem prezenți și în <br/>
                                        social media
                                    </div>


                                    <div  class="small font-weight-bold">




                                        <a target="_blank" href="<?php the_field( 'instagram_link' , 'options' ); ?>">
                                            <img src="/wp-content/uploads/2020/01/instagram.svg" alt="instagram"></a>
                                            <a target="_blank" href="<?php the_field( 'facebook_link' , 'options' ); ?>">
                                                <img class="ml-3" src="/wp-content/uploads/2020/01/facebook-logo.svg" alt=""></a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row border-top border-light py-2">
                                        <div class="col-12  d-flex justify-content-center">

                                            <div class="text-light text-left ">
                                                <?php echo date('Y'); ?> © <?php echo get_bloginfo('name'); ?>. <?php _e('All rights reserved', 'increase'); ?>.
                                                <a class="text-dark" href="#">Termeni și condiții GDPR</a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="tab-pane fade" id="formular" role="tabpanel" aria-labelledby="formular-tab">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">

                                            <?php  if (is_single()) { ?>

                                                <?php /*
                                                <div class="text-center">
                                                    <a class="text-light" target="_blank" href="<?php echo the_field('brosura_url', 'options'); ?>">
                                                        <img style="width:250px;" src="http://oasis.goodafternoon.ro/wp-content/uploads/2020/01/brosura.png" alt="brosura">
                                                        <div class="text-center">
                                                            Descarcati aici Brosura
                                                        </div>
                                                    </a>
                                                </div> */ ?>

                                                            <div class="text-center">

                                                                            <img src="http://oasis.goodafternoon.ro/wp-content/uploads/2020/01/brosura.png" alt="brosura">

                                                                                <?php echo do_shortcode( '[contact-form-7 id="607" title="Solicită broșura"]' ) ?>


                                                                <?php /*<a class="text-light" target="_blank" href="<?php echo the_field('brosura_url', 'options'); ?>">

                                                                </a> */ ?>
                                                            </div>

                                            <?php    } else { ?>

                                                <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact form 1"]' ) ?>
                                            <?php }?>



                                        </div>





                                    </div>


                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-lg-4 d-none d-lg-block">

                            <div class="d-none d-lg-block h3 text-light mb-4">
                                Contact
                            </div>
                            <div class="h1 text-light font-weight-bold ">
                            Pentru mai </br> multe informații,
                            </div>
                            <div class="h3 text-light mb-5">
                            echipa noastră de vânzări îți stă la dispoziție!
                            </div>

                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="h3 text-dark mb-3">
                                        Telefon mobil
                                    </div>
                                    <div class="h4 text-light">
                                        <a class="text-light" href="tel:<?php the_field('header_phone_number_full','options'); ?>"><?php the_field('header_phone_number_full','options'); ?></a>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="h3 text-dark mb-3">
                                        E-mail
                                    </div>
                                    <div class="h4 text-light">
                                        <a class="text-light" href="mailto:sales@oasis-apartments.ro">sales@oasis-apartments.ro</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="h3 text-dark mb-3">
                                        Adresa
                                    </div>
                                    <div class="h4 text-light">
                                        Strada Dem Teodorescu 29
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="h3 text-dark mb-3">
                                        Program orar
                                    </div>
                                    <div class="h4 text-light">
                                        Luni - Vineri 10:00 - 18:00 <br/>
                                        Sâmbătă 10:00 - 14:00 <br/> <br/>
                                        Vizitele se efectuează doar după o <br/>
                                        programare prealabilă.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 d-none d-lg-block">
                            <?php if (is_single()) { ?>


                                <div class="text-left">
                                                <div class="text-light mb-4 h3">
                                                    Solicită broșura
                                                </div>
                                                <img src="http://oasis.goodafternoon.ro/wp-content/uploads/2020/01/brosura.png" alt="brosura">

                                                    <?php echo do_shortcode( '[contact-form-7 id="607" title="Solicită broșura"]' ) ?>


                                    <?php /*<a class="text-light" target="_blank" href="<?php echo the_field('brosura_url', 'options'); ?>">

                                    </a> */ ?>
                                </div>

                            <?php    } else { ?>
                                <div class="text-light mb-4 h3">

                                        Solicită oferta


                                </div>
                                <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact form 1"]' ) ?>
                            <?php }?>


                        </div>


                    </div>




                        </div>


                            <div style="height: 30vh;
                            min-height:30vh;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;"

                            class="container bg-primary fix-vh-ios-30">


    <div class="position-flex">


    <div  class="row pb-3 bg-primary d-none d-lg-block ">
        <div class="col-12 col-lg-4">

        </div>
        <div class="col-12 col-lg-8 offset-4 ">
            <hr class="bg-light mb-5">

            <div class="text-light h3 mb-4">
                Suntem prezenți și în social media
            </div>





            <div  style="    filter: invert(1);" class="small font-weight-bold">
                <a target="_blank" href="<?php the_field( 'instagram_link' , 'options' ); ?>">
                    <img src="/wp-content/uploads/2020/01/instagram.svg" alt="instagram"></a>
                    <a target="_blank" href="<?php the_field( 'facebook_link' , 'options' ); ?>">
                        <img class="ml-3" src="/wp-content/uploads/2020/01/facebook-logo.svg" alt="facebook"></a>
                    </div>

                </div>
            </div>

            <div class="row bg-primary d-none d-lg-block">
                <div class="col-12">
                    <hr class="bg-light">
                    <div class="text-light text-left py-4">
                        <?php echo date('Y'); ?> © <?php echo get_bloginfo('name'); ?>. <?php _e('All rights reserved', 'increase'); ?>.
                        <a class="text-dark" href="#">Termeni și condiții GDPR</a>
                    </div>
                </div>
            </div>

            </div>

                        </div>

                    <script type="text/javascript">
                        jQuery(window).scroll(function() {
                        if(jQuery(window).scrollTop() + jQuery(window).height() == jQuery(document).height()) {

                        jQuery("#masthead").addClass("hide-top-menu");
                    } else {
                        jQuery("#masthead").removeClass("hide-top-menu");
                    }
                        });

                        jQuery(document).ready(function() {
                                            if ( jQuery( 'html' ).hasClass( 'fp-enabled' ) ) {


                                                        jQuery('.move-to-last').on('click', function(){


                                                            var count = jQuery("#full-sections .section").length;

                                                            jQuery.fn.fullpage.moveTo(count);


                                                        });



                                            } else {
                                                    jQuery( ".move-to-last" ).click(function() {
                                                           jQuery("html, body").animate({ scrollTop: jQuery(document).height() }, "slow");
                                                          return false;
                                                    });
                                            }

                        });




                        //
                        // jQuery( ".move-to-last" ).on( "click",  function() {
                        //   jQuery("html, body").animate({ scrollTop: $(document).height() }, "slow");
                        //   return false;
                        //   alert("test");
                        // });

                    </script>
                    <style media="screen">
                        .hide-top-menu{
                            opacity: 0;
                            visibility: hidden;
                            transition: 0.3s;
                        }
                        /* .position-flex{
                            margin-top:5%;
                        } */
                    </style>
                    </footer><!-- #colophon -->
                    <?php wp_footer(); ?>
                </body>
                </html>
