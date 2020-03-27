<?php get_header(); ?>
<?php
$increase_sidebar_position = get_field('increase_options_sidebar_position','options');
?>
	<div class="wrap <?php if($increase_sidebar_position != 'disabled'){echo 'row';} ?>">
		<?php if($increase_sidebar_position != 'disabled'){ ?>
			<div class="col-md-8 col-lg-9">
		<?php } ?>
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php if (have_posts()) { ?>
						<div class="post-wrap">
							<?php while ( have_posts() ) :  the_post();	 ?>
									
									<?php
									
									get_template_part( 'template-parts/post/content' );
									
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
									
									the_post_navigation( array(
										'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'increase' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'increase' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper"> </span>%title</span>',
										'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'increase' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'increase' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper"> </span></span>',
									) );
									
									?>
							
							<?php endwhile; ?>
						</div>
					<?php }; ?>
				</main>
			</div>
		<?php if($increase_sidebar_position != 'disabled'){ ?>
			</div>
			<div class="col-md-4 col-lg-3 <?php if($increase_sidebar_position == 'left'){echo 'order-md-first';} ?>">
				<?php get_sidebar(); ?>
			</div>
		<?php } ?>
	</div>
<?php get_footer();