<?php
/**
* Header template.
*/

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

	<?php wp_head(); ?>

</head>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap&subset=latin-ext" rel="stylesheet">



<?php if(wp_is_mobile()){$deviceType = 'touch-device';}else{$deviceType = 'not-touch-device';} ?>
<body <?php body_class( $deviceType ); ?>>
	<div class="preloader"></div>
	<script type="text/javascript">
	jQuery(document).ready(function() {

		jQuery(window).on('beforeunload unload', function(){
			jQuery('.preloader').fadeIn('slow');

		});

		jQuery(window).load(function() {
			jQuery('.preloader').fadeOut('slow');
		});


	});
	</script>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'increase' ); ?></a>

	<?php/* if ( has_nav_menu( 'top' ) ) : ?>
	<div class="navigation-top">
	<div class="wrap">
	<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
	</div><!-- .wrap -->
	</div><!-- .navigation-top -->
	<?php endif; */?>

	<?php $navbar_text_color = esc_attr(get_field( 'increase_options_header_text_color' , 'options' )); ?>
	<header class="header fixed-top bg-primary" id="masthead">


		<div class="absolute-logo">
			<a class="navbar-brand" href="<?php echo esc_url(get_bloginfo('url')); ?>">
				<?php $custom_logo_id = esc_attr(get_theme_mod( 'custom_logo' ));
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				if(has_custom_logo()){ ?>
					<img src="<?php echo esc_url( $logo[0] ); ?>" class="d-inline-block" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
					<style>
					.header .navbar-brand img{
						max-height: <?php echo esc_attr(get_field( 'increase_options_header_logo_height' , 'options' )); ?>px
					}

					@media (max-width: 991px) {
						.header .navbar-brand img{
							max-height: <?php echo esc_attr(get_field( 'increase_options_header_logo_height_mobile' , 'options' )); ?>px
						}
					}

					</style>
				<?php }else{ ?>
					<?php echo esc_attr(get_bloginfo('name')); ?>
				<?php } ?>
			</a>
		</div>
		<div class="container p-0 d-flex justify-content-center">



			<nav class="navbar navbar-expand-lg <?php if($navbar_text_color == 'light'){ echo 'navbar-light'; }else{ echo 'navbar-dark'; }; ?>">

				<div class="d-lg-none">
					<?php /*if(!get_field('header_phone_numbers','options')){ ?>
						<button class="btn <?php if($navbar_text_color == 'light'){ echo 'btn-outline-dark'; }else{ echo 'btn-light'; }; ?>" type="button" data-toggle="collapse" data-target="#header-phones" aria-controls="header-phones" aria-expanded="false" aria-label="Phone number">
						<span class="icon-custom increaseicons-phone navbar-custom-icon"></span>
						</button>
						<?php }else{ ?>
						<a href="tel:<?php the_field('header_phone_number_full','options'); ?>" class="btn <?php if($navbar_text_color == 'light'){ echo 'btn-outline-dark'; }else{ echo 'btn-light'; }; ?>" aria-label="Phone number">
						<span class="icon-custom increaseicons-phone navbar-custom-icon"></span>
						</a>
						<?php } */ ?>
						<?php /* if ( has_nav_menu( 'header_menu' ) ) { ?>

							<?php } */ ?>
						</div>
						<div class="collapse navbar-collapse" id="header-menu">
							<?php if ( has_nav_menu( 'header_menu' ) ) {
								wp_nav_menu(
									array(
										'menu' => 'header_menu',
										'theme_location' => 'header_menu',
										'depth' => 2,
										'container' => '',
										'menu_class' => 'nav navbar-nav ml-md-auto',
										'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
										'walker' => new WP_Bootstrap_Navwalker()
									)
								);
							} ?>
						</div>
						<?php if(!get_field('header_phone_numbers','options')){ ?>
							<div class="collapse w-100" id="header-phones">
								<?php
								if( have_rows('sale_agents', 'options') ){ ?>
									<ul id="menu-head-phones" class="nav navbar-nav ml-md-auto">
										<?php $i=1; while ( have_rows('sale_agents', 'options') ) : the_row(); ?>
											<li id="menu-phones-<?php echo $i; ?>" class="menu-item menu-item-type-post_type nav-item">
												<a class="nav-link" href="tel:<?php echo esc_attr(get_sub_field('sale_agent_full_phone', 'options')); ?>"><?php echo esc_attr(get_sub_field('sale_agent_show_phone', 'options')); ?> - <?php echo esc_attr(get_sub_field('sale_agent_name', 'options')); ?></a>
											</li>
											<?php $i++; endwhile; ?>
										</ul>
									<?php }	?>

								</div>
							<?php }	?>
						</nav>

					</div>
					<div style="position:absolute; top:20px; left: 10px;" class="d-lg-none">
						<div  class="nav-icon btn  "data-toggle="collapse" data-target="#header-menu" aria-controls="header-menu" aria-expanded="false" aria-label="Toggle navigation">
							<!-- <span class="icon-custom increaseicons-burger navbar-custom-icon"></span> -->
							<div></div>
						</div>
					</div>

					<div style="position: absolute;
					margin-left: auto;
					margin-right: auto;
					left: 0;
					right: 0;
					top:40px;
					text-align:center;
					z-index:-1;" class="d-md-none h4 font-weight-bold text-light" >
					<?php the_title() ?>
				</div>

				<div style="position:absolute; top:37px; right: 186px;" class=" abs-phone small font-weight-bold" >

					<img src="/wp-content/uploads/2020/01/Telephone.svg" alt="">
					<a class="ml-3 text-light h3" href="tel:<?php the_field('header_phone_number_full','options'); ?>"><?php the_field('header_phone_number_full','options'); ?></a>

				</div>

				<div style="position:absolute; top:37px; right:40px;" class="d-none d-md-block small font-weight-bold" >
					    <a target="_blank" href="<?php the_field( 'instagram_link' , 'options' ); ?>">
					<img  src="/wp-content/uploads/2020/01/instagram.svg" alt="instagram"> </a>
					<a target="_blank" href="<?php the_field( 'instagram_link' , 'options' ); ?>">
					<img class="ml-3" src="/wp-content/uploads/2020/01/facebook-logo.svg" alt="facebook"> </a>
				</div>



			</header>

			<style media="screen">
			.nav-icon {
				width: 60px;

			}

			.nav-icon:after,
			.nav-icon:before,
			.nav-icon div {
				background-color: #fff;
				border-radius: 3px;
				content: '';
				display: block;
				height: 4px;
				margin: 8px 0;
				transition: all .2s ease-in-out;
			}

			.nav-icon[aria-expanded="true"]:before {
				transform: translateY(12px) rotate(135deg);

			}

			.nav-icon[aria-expanded="true"]:after {
				transform: translateY(-12px) rotate(-135deg);

			}

			.nav-icon[aria-expanded="true"] div {
				transform: scale(0);

			}


			.active-border {

				border-bottom: 5px solid white;
				display: block;
				position:absolute;
				bottom:0;
				width:10px;
				margin-left:-5px;

			}

			</style>

			<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('#header-menu > ul > li.active').append("<div class='active-border'></div>");
				$(".active-border").width($("#header-menu > ul > li.active").width()+ 10)

			});

		</script>
		<div id="content">
			<div class="container">
