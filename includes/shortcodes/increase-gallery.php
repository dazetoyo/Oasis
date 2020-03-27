<?php
$images = explode(",", $images);

if($increase_image_click_links){
	$custom_links = explode(",", $increase_image_click_links);
}

$rand = rand(1000,9999);

?>

<?php if($increase_display_type == 'slick_slider'){ ?>
	<div  class="increase-gallery increase-gallery-slick-slider-<?php echo $rand; ?> <?php echo $increase_class; ?>">
		<?php $i = 0; foreach( $images as $image_id ){
			$image = wp_get_attachment_url($image_id); ?>
			<?php if( $custom_links[ $i ] ){ ?>
				<a href="<?php echo esc_url( $custom_links[ $i ] ); ?>" class="increase-gallery-item thumb-bg d-block" style="
						background-image:url(<?php echo $image; ?>);
						background-size: <?php if($increase_image_position == 'contain'){echo 'contain'; }else{echo 'cover'; }?>;
						background-repeat: no-repeat;
						"
					<?php if($increase_image_click_links_target == "target_blank"){?>
						target="_blank"
					<?php } ?>
				>
					<span style="display: block; padding-top: <?php if($increase_gallery_height){echo $increase_gallery_height;}else{echo '56.25';} ?>%"></span>
				</a>
			<?php }else{ ?>
				<div class="increase-gallery-item thumb-bg" style="
						background-image:url(<?php echo $image; ?>);
						background-size: <?php if($increase_image_position == 'contain'){echo 'contain'; }else{echo 'cover'; }?>;
						background-repeat: no-repeat;
						">
					<span style="display: block; padding-top: <?php if($increase_gallery_height){echo $increase_gallery_height;}else{echo '56.25';} ?>%"></span>
				</div>
			<?php } ?>
			<?php $i++; } ?>
	</div>
	<script>
		jQuery(document).ready(function($){

			var slick_slider = jQuery('.increase-gallery-slick-slider-<?php echo $rand; ?>')
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
<?php }else{ ?>
	<div class="row no-gutters">
		<?php $i = 1; foreach( $images as $image_id ){
			$image = wp_get_attachment_url($image_id); ?>
			<div class="<?php if((($i-1) % 8 == 0) || (($i-2) % 8 == 0)){echo 'col-md-6';}else{echo 'col-md-4';}?> col-6 p-1">
				<a class="fancybox thumb-bg thumb-h-wide" href="<?php echo $image; ?>" data-fancybox="page-template-gallery" style="background-image:url(<?php echo $image; ?>)">

				</a>
			</div>
			<?php $i++; } ?>
	</div>
<?php } ?>
