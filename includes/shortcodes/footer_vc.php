
<footer id="site-footer" class="site-footer bg-primary">

    <div style="height: 70vh;

    display: flex;
    flex-direction: column;

    justify-content: center;" class="container bg-primary footer-container-height">
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
        <div  class="row bg-primary">
            <div class="col-4 text-center">
                <img class="w-177" src="/wp-content/uploads/2020/01/Oasis-New-inverted-logo.svg" alt="">
            </div>

            <div class="col-12 col-lg-4">

                <div class="h3 text-light mb-4">
                    Contact
                </div>
                <div class="h1 text-light font-weight-bold">
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
                        <div class="small text-light">
                            Luni - Vineri 10:00 - 18:00 <br/>
                            Sâmbătă 10:00 - 14:00 <br/> <br/>
                            Vizitele se efectuează doar după o <br/>
                            programare prealabilă.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 ">
                <div class="h3 text-light mb-4">
                    Solicită oferta
                </div>
                <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact form 1"]' ) ?>
            </div>
        </div>




    </div>



                            <div style="height: 30vh;
                            min-height:30vh;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;"

                            class="container bg-primary">


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

</footer><!-- #colophon -->
