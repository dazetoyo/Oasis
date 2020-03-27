<?php /* Template Name: Front Page */ ?>
<?php get_header(); ?>

</div><!-- .container -->

<?php get_template_part( 'template-parts/imagemap/imagemap', 'building' ); ?>

<div class="container">
	<div class="wrap">
		<div id="primary" class="content-area  <?php
		if(get_field('increase_page_remove_padding_top')){echo ' pt-0 ';}
		if(get_field('increase_page_remove_padding_bottom')){echo ' pb-0 ';}
		?>">
			<main id="main" class="site-main" role="main">
				<?php if (have_posts()) { ?>
					<div class="post-wrap">
						<?php while ( have_posts() ) :  the_post();	 ?>

							<?php get_template_part( 'template-parts/page/content', 'page' ); ?>

						<?php endwhile; ?>
					</div>
				<?php }; ?>
			</main>
		</div>
	</div>

		<a class="btn btn-primary btn-lg text-light" href="#">
			<img src="/wp-content/uploads/2020/01/Location.svg" alt="">
			<span class="h4 text-light">Localizare</span>
		</a>

<?php get_footer();
