<?php get_header(); ?>

<div class="d-none d-xl-block" style="
position: fixed;
top: 150px;
left: 50px;" >
<p class="text-primary" style="writing-mode: vertical-lr;
text-orientation: mixed;
margin: 20px 0;">Apartamente</p>
<a href="/apartamente/">
	<img src="/wp-content/uploads/2020/01/left-arrow.svg" alt="">
</a>
</div>


<div id="primary" class="content-area">





	<main id="main" class="site-main" role="main">
		<?php if (have_posts()) { ?>
			<div class="post-wrap">
				<?php while ( have_posts() ) :  the_post();	 ?>

					<?php // get_template_part( 'template-parts/page/content', 'page' ); ?>

					<div class="text-center" style="margin-top:100px;">
						<div class="h1 font-weight-bold">
							<?php echo  the_title(); ?>

						</div>
						<div class="h4 text-dark font-weight-normal">
							<?php
							$term_obj_list = get_the_terms( $post->ID, 'increase_buildings' );
							$terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));

							echo $terms_string; ?>
						</div>

						<div class="row mt-5">
							<div class="col-12 col-lg-6 ">
								<div class="border border-primary p-3">




									<?php
									$rooms_taxonomy = 'increase_rooms';
									$rooms_terms = wp_get_post_terms( get_the_ID(), $rooms_taxonomy, array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all') );

									if ( $rooms_terms != null ){
										foreach( $rooms_terms as $rooms_term ) {
											$rooms_images = get_field('galerie_detalii', $rooms_taxonomy.'_'.$rooms_term->term_id);?>
											<div class="increase-gallery-slick-slider">

														<a class="single-fancybox" href="<?php echo the_post_thumbnail_url(); ?>" data-fancybox="gallery-single" data-thumb="<?php echo the_post_thumbnail_url() ?>" >

															<div class="background-image-css" style="background-image:url('<?php echo the_post_thumbnail_url() ?>');
															">
														</div>


												<?php
												foreach( $rooms_images as $rooms_image ):
													?>

													<a class="single-fancybox" href="<?php echo $rooms_image; ?>" data-fancybox="gallery-single" data-thumb="<?php echo $rooms_image; ?>">

														<div class="background-image-css" style="background-image:url('<?php echo $rooms_image; ?>');
													">
													</div>

												</a>


												<?php
											endforeach;?>
										</div>
										<?php

										unset($rooms_term);
									}
								}
								?>




					</div>

					<div class="">
						<div class="h5 text-dark font-weight-normal my-5">
							Amplasare pe etaj
						</div>
						<div class="mb-5">

							<img style="max-width:450px;" src="<?php the_field('amplasare_apartament'); ?>" alt="">
						</div>
					</div>

				</div>
				<div class="col-12 col-lg-6 offset-lg-padding">
					<div class="row text-center text-md-left"  >
						<?php while ( have_rows('increase_apartment_details') ) : the_row(); ?>
							<div class="col-6 col-md-5 mb-3">
								<div class="font-weight-normal text-dark">
									<?php the_sub_field('increase_apartment_details_title'); ?>
								</div>
							</div>
							<div class="col-6 col-md-7">
								<div class="font-weight-light text-dark">
									<?php the_sub_field('increase_apartment_details_description'); ?>
									<?php echo 'mp' ?>

								</div>
							</div>
						<?php endwhile; ?>
					</div>
					<div class="row border-top text-center text-md-left border-bottom border-dark">
						<div class="col-6 col-md-5  py-4">
							<div class="font-weight-normal text-dark">
								<?php the_field('suprafata_utila_totala') ?>
							</div>
						</div>
						<div class="col-6 col-md-7 py-4">
							<div class="font-weight-light text-dark">
								<?php the_field('suprafata_utila_totala_numar') ?>
								<?php echo 'mp' ?>

							</div>
						</div>
					</div>

					<div class="border border-primary  mt-4 row p-2 p-md-4 ml-0 mx-1">
						<div class="col-12 col-lg-7 h4 font-weight-normal text-primary text-center text-md-left mb-0">
							DACĂ SUNTEȚI INTERESAȚI DE ACEST APARTAMENT, NU EZITAȚI SĂ CONTACTAȚI REPREZENTANȚII DE VÂNZĂRI:
						</div>
						<div class="col-12 col-lg-5 h2 mb-0 pt-3 pt-md-0">

								<img style="padding-right: 4px;
								padding-bottom: 5px;" src="http://oasis.goodafternoon.ro/wp-content/uploads/2020/01/tel-green.svg">
								<a href="tel:<?php the_field('header_phone_number_full','options'); ?>">
								<span><?php the_field('header_phone_number_full','options'); ?></span>
							</a>
						</div>
					</div>

					<div class="row">
						<div class="col-12 h4 text-center text-sm-left text-dark my-4 font-weight-normal">
							Sau completați formularul de contact și vom reveni de îndată cu informațiile solicitate:
						</div>
					</div>

					<div class="row ml-0">
						<?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]') ?>
					</div>


					<div class="row ">
						<div class="col-12 h4 text-center text-sm-left text-dark my-4 font-weight-normal">
							Pot apărea diferențe de +/-5% între suprafețele regăsite în schițele comerciale și măsurătorile cadastrale. Suprafața construită nu conține suprafața terasei/ grădinii. Mobilierul este cu titlu de prezentare. Apartamentele se oferă spre vânzare nemobilate.
						</div>
					</div>



				</div>
			</div>
		</div>

	<?php endwhile; ?>
</div>
<?php }; ?>
</main>
</div>

<style media="screen">
div.wpcf7{
	text-align:left;
}

.col-12.col-lg-4.d-none.d-lg-block > div.wpcf7{
	display:none;
}
</style>

<script type="text/javascript">

jQuery(document).ready(function($){

	var slick_slider = jQuery('.increase-gallery-slick-slider')
	.slick({
		dots: false,
		infinite: false,
		speed: 400,
		//fade: true,
		//cssEase: 'linear',
		slidesToShow: 1,
		slidesToScroll: 1,
		accessibility: false,
		arrows: true,
		appendDots: false,
		autoplay: false,
		lazyLoad: 'ondemand',
		pauseOnHover: false,
		pauseOnFocus: false,
		autoplaySpeed: 7000,
		touchMove: true,
		swipe: true,
		swipeToSlide: true,
		responsive: [
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			}
		]
	});

	slick_slider.on('afterChange', function(event, slick, currentSlide, nextSlide, lazyInstance){
		jQuery('.lazy').Lazy();
	});
});

</script>

<style media="screen">
.background-image-css{
	background-size:cover;
	height:600px;
	display:block;
}
@media (max-width: 767px) {
	div.wpcf7{
		width: 97%;
	}
	.background-image-css{
		height:400px;
	}
}
@media (min-width: 1400px) {
.offset-lg-padding{
	padding-left:50px;
}
}
</style>

<?php get_footer();
