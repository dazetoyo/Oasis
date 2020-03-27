<?php
$home_multiple_buildings = esc_attr(get_field('increase_imagemap_multiple_buildings', 'option'));
$home_multiple_buildings_floors = esc_attr(get_field('increase_imagemap_multiple_buildings_floors', 'option'));

$increase_imagemap_hover_fill_color = esc_attr(get_field('increase_imagemap_hover_fill_color', 'option'));
$increase_imagemap_hover_fill_opacity = esc_attr(get_field('increase_imagemap_hover_fill_opacity', 'option'));
$increase_imagemap_hover_stroke_color = esc_attr(get_field('increase_imagemap_hover_stroke_color', 'option'));
$increase_imagemap_hover_stroke_opacity = esc_attr(get_field('increase_imagemap_hover_stroke_opacity', 'option'));
$increase_imagemap_hover_stroke_width = esc_attr(get_field('increase_imagemap_hover_stroke_width', 'option'));
$increase_imagemap_unavailable_color = esc_attr(get_field('increase_imagemap_unavailable_color', 'option'));
$increase_imagemap_unavailable_opacity = esc_attr(get_field('increase_imagemap_unavailable_opacity', 'option'));



$termId = get_queried_object()->term_id;
$termTax = get_queried_object()->taxonomy;
$termName = get_queried_object()->name;

$general_image = esc_sql(get_field('increase_building_floor_image', $termTax.'_'.$termId));
$general_image_width = $general_image['width'];
$general_image_height = $general_image['height'];
$general_image_mapping = $general_image['url'];

?>

<?php if($general_image_mapping){ ?>
	
	<?php if( have_rows('increase_imagemap_floor_legend', 'options') ){ ?>
		<div class="increase-imagemap-legend bg-light p-3">
			<h5><?php _e('Legenda:','increase'); ?></h5>
			<?php $i=1; while ( have_rows('increase_imagemap_floor_legend', 'options') ) : the_row(); ?>
				<span>
					<span style="background-color: <?php the_sub_field('increase_imagemap_floor_legend_color', 'options'); ?>;"></span> <?php the_sub_field('increase_imagemap_floor_legend_title', 'options'); ?>
				</span>
				<?php $i++; endwhile; ?>
		</div>
	<?php }	?>
	
	<div class="increase-imagemap">
		
		<div class="increase-imagemap-shape-container">
			<svg  class="incrase-hs-poly-svg" viewBox="0 0 <?php echo $general_image_width.' '.$general_image_height; ?>" preserveAspectRatio="none">
				
				<?php
				$args = array(
					'hide_empty' => 0,
					'orderby'=>'menu_order',
					'order'=>'ASC',
					'post_type' => 'increase_apartments',
					'posts_per_page'=> -1,
					'post_status'=> array('publish'),
					'paged' => false,
					'tax_query' => array(
						array(
							'taxonomy' => $termTax,
							'field'    => 'ID',
							'terms'    => $termId,
						),
					),
				);
				
				$query_apartments = new WP_Query( $args );
				
				if ( $query_apartments->have_posts() ){
					
					
					/*function increse_polygon_apartment($i, $get_the_id, $coords_area){
						<<<EOD
						<a xlink:href="<?php the_permalink(); ?>">
							<polygon
								class="increase-imagemap-shape increase-imagemap-shape-poly increase-imagemap-tooltip $area_class ?>"
								title=" $area_tooltip "
								data-shape-title="<?php echo $area_tooltip "
								style="
									opacity: 0;
									fill: $increase_imagemap_hover_fill_color ;
									fill-opacity: $increase_imagemap_hover_fill_opacity ;
									stroke: $increase_imagemap_hover_stroke_color ;
									stroke-width: $increase_imagemap_hover_stroke_width ;
									stroke-opacity: $increase_imagemap_hover_stroke_opacity ;
									stroke-linecap: round;
									stroke-location: outside"
								data-index="0"
								id="shape-$i-$get_the_id"
								points="$coords_area"
									
									>
							
							</polygon>
						</a>
						EOD;
					}*/
					
					
					while ( $query_apartments->have_posts() ) : $query_apartments->the_post();
						
						$i = 1;
						if( have_rows('increase_apartment_variations') ){
							while( have_rows('increase_apartment_variations') ): the_row();
								//duplex
								$duplex_floor = '';
								$current_floor = '';
								if(get_sub_field('increase_apartment_variations_duplex')) {
									
									if(get_sub_field('increase_apartment_variations_duplex_position') === 'lower'){
										$duplex_second_floor_position = -1;
										$duplex_second_floor_position_text = __('inferior','increase');
									}else{
										$duplex_second_floor_position = 1;
										$duplex_second_floor_position_text = __('superior','increase');
									}
									
									$current_floor = get_field('increase_building_floor_level', 'increase_buildings_'.$termId);
									$duplex_main_floor = get_field('increase_building_floor_level', 'increase_buildings_'.get_sub_field('increase_apartment_variations_floor'));
									
									$duplex_floor = $duplex_main_floor + $duplex_second_floor_position;
									
								}
								
								if(($termId == get_sub_field('increase_apartment_variations_floor') || (($duplex_floor !== '') && ($current_floor !== '') && $duplex_floor == $current_floor))){
									if(get_field('increase_apartment_sold_out') || get_sub_field('increase_apartment_variations_sold')){
										$area_class = 'sold';
									}else{
										$area_class = 'available';
									}
									
									if(get_sub_field('increase_apartment_variations_entrance') && !in_array('site_ap_hide_entrance', get_field('increase_options_apartment_hide_columns', 'options'))){
										$area_tooltip_entrance = __('Scara: ','increase').get_sub_field('increase_apartment_variations_entrance');
									}
									
									if(get_sub_field('increase_apartment_variations_nr') && !in_array('site_ap_hide_nr', get_field('increase_options_apartment_hide_columns', 'options'))){
										$area_tooltip_nr = __('Ap: ','increase').get_sub_field('increase_apartment_variations_nr');
									}
									
									if($area_tooltip_entrance && $area_tooltip_nr){
										$area_tooltip_separator = ', ';
									}
									
									$area_tooltip = '';
									
									$area_tooltip .= $area_tooltip_entrance.$area_tooltip_separator.$area_tooltip_nr;
									
									if($area_tooltip == ''){
										$area_tooltip = get_the_title();
									}
									
									if(($duplex_floor !== '') && ($current_floor !== '') && ($duplex_floor == $current_floor)){
										$area_tooltip .= '<br/>(intrare de la '.get_term(get_sub_field('increase_apartment_variations_floor'))->name.')';
									}elseif(isset($duplex_floor) && isset($current_floor) && ($duplex_floor != $current_floor)){
										$area_tooltip .= '<br/>(continuare etaj '.$duplex_second_floor_position_text.')';
									}
									
									if($area_class == 'sold'){
										$area_tooltip = __('Indisponibil','increase').': '.$area_tooltip;
									}
									
									if(have_rows('increase_apartment_variations_duplex_coordinates') && ($duplex_floor !== '') && ($current_floor !== '') && ($duplex_floor == $current_floor)) {
										while( have_rows('increase_apartment_variations_duplex_coordinates') ){ the_row(); ?>
											<a xlink:href="<?php the_permalink(); ?>">
												<polygon
													class="increase-imagemap-shape increase-imagemap-shape-poly increase-imagemap-tooltip <?php echo $area_class; ?>"
													title="<?php echo $area_tooltip; ?>"
													data-shape-title="<?php echo $area_tooltip; ?>"
													style="
														opacity: 0;
														fill: <?php echo $increase_imagemap_hover_fill_color; ?>;
														fill-opacity: <?php echo $increase_imagemap_hover_fill_opacity; ?>;
														stroke: <?php echo $increase_imagemap_hover_stroke_color; ?>;
														stroke-width: <?php echo $increase_imagemap_hover_stroke_width; ?>;
														stroke-opacity: <?php echo $increase_imagemap_hover_stroke_opacity; ?>;
														stroke-linecap: round;
														stroke-location: outside"
													data-index="0"
													data-id="shape-<?php echo $i; ?>-<?php the_ID(); ?>"
													points="<?php the_sub_field('increase_apartment_variations_duplex_coordinates_piece'); ?>"
												
												>
												
												</polygon>
											</a>
										<?php }
									}else{
										if(have_rows('increase_apartment_variations_duplex_coordinates')){
											reset_rows();
										}
										if (have_rows('increase_apartment_variations_coordinates')) {
											while (have_rows('increase_apartment_variations_coordinates')){ the_row(); ?>
												<a xlink:href="<?php the_permalink(); ?>">
													<polygon
														class="increase-imagemap-shape increase-imagemap-shape-poly increase-imagemap-tooltip <?php echo $area_class; ?>"
														title="<?php echo $area_tooltip; ?>"
														data-shape-title="<?php echo $area_tooltip; ?>"
														style="
															opacity: 0;
														<?php if($area_class == 'sold'){ ?>
															fill: <?php echo $increase_imagemap_unavailable_color; ?>;
																fill-opacity: <?php echo $increase_imagemap_unavailable_opacity; ?>;
																stroke: <?php echo $increase_imagemap_unavailable_color; ?>;
															<?php }else{ ?>
															fill: <?php echo $increase_imagemap_hover_fill_color; ?>;
																fill-opacity: <?php echo $increase_imagemap_hover_fill_opacity; ?>;
																stroke: <?php echo $increase_imagemap_hover_stroke_color; ?>;
															<?php } ?>
															stroke-width: <?php echo $increase_imagemap_hover_stroke_width; ?>;
															stroke-opacity: <?php echo $increase_imagemap_hover_stroke_opacity; ?>;
															stroke-linecap: round;
															stroke-location: outside"
														data-index="0"
														data-id="shape-<?php echo $i; ?>-<?php the_ID(); ?>"
														points="<?php the_sub_field('increase_apartment_variations_coordinates_piece'); ?>"
													
													>
													
													</polygon>
												</a>
											<?php }
										}else{
											if (have_rows('increase_apartment_coordinates')) {
												while (have_rows('increase_apartment_coordinates')){ the_row(); ?>
													<a xlink:href="<?php the_permalink(); ?>">
														<polygon
															class="increase-imagemap-shape increase-imagemap-shape-poly increase-imagemap-tooltip <?php echo $area_class; ?>"
															title="<?php echo $area_tooltip; ?>"
															data-shape-title="<?php echo $area_tooltip; ?>"
															style="
																opacity: 0;
															<?php if($area_class == 'sold'){ ?>
																fill: <?php echo $increase_imagemap_unavailable_color; ?>;
																	fill-opacity: <?php echo $increase_imagemap_unavailable_opacity; ?>;
																	stroke: <?php echo $increase_imagemap_unavailable_color; ?>;
																<?php }else{ ?>
																fill: <?php echo $increase_imagemap_hover_fill_color; ?>;
																	fill-opacity: <?php echo $increase_imagemap_hover_fill_opacity; ?>;
																	stroke: <?php echo $increase_imagemap_hover_stroke_color; ?>;
																<?php } ?>
																stroke-width: <?php echo $increase_imagemap_hover_stroke_width; ?>;
																stroke-opacity: <?php echo $increase_imagemap_hover_stroke_opacity; ?>;
																stroke-linecap: round;
																stroke-location: outside"
															data-index="0"
															data-id="shape-<?php the_ID(); ?>"
															points="<?php the_sub_field('increase_apartment_coordinates_piece'); ?>"
														
														>
														
														</polygon>
													</a>
												<?php }
											}
										}
									}
								}
								$i++;
							endwhile;
						}elseif(have_rows('increase_apartment_coordinates')){
							if(get_field('increase_apartment_sold_out') || get_sub_field('increase_apartment_variations_sold')){
								$area_class = 'sold';
							}else{
								$area_class = 'available';
							}
							
							$area_tooltip = get_the_title();
							
							if($area_class == 'sold'){
								$area_tooltip = __('Indisponibil','increase').': '.$area_tooltip;
							}
							
							while (have_rows('increase_apartment_coordinates')){ the_row(); ?>
								<a xlink:href="<?php the_permalink(); ?>">
									<polygon
										class="increase-imagemap-shape increase-imagemap-shape-poly increase-imagemap-tooltip <?php echo $area_class; ?>"
										title="<?php echo $area_tooltip; ?>"
										data-shape-title="<?php echo $area_tooltip; ?>"
										style="
											opacity: 0;
										<?php if($area_class == 'sold'){ ?>
											fill: <?php echo $increase_imagemap_unavailable_color; ?>;
															fill-opacity: <?php echo $increase_imagemap_unavailable_opacity; ?>;
															stroke: <?php echo $increase_imagemap_unavailable_color; ?>;
														<?php }else{ ?>
											fill: <?php echo $increase_imagemap_hover_fill_color; ?>;
															fill-opacity: <?php echo $increase_imagemap_hover_fill_opacity; ?>;
															stroke: <?php echo $increase_imagemap_hover_stroke_color; ?>;
														<?php } ?>
											stroke-width: <?php echo $increase_imagemap_hover_stroke_width; ?>;
											stroke-opacity: <?php echo $increase_imagemap_hover_stroke_opacity; ?>;
											stroke-linecap: round;
											stroke-location: outside"
										data-index="0"
										data-id="shape-<?php the_ID(); ?>"
										points="<?php the_sub_field('increase_apartment_coordinates_piece'); ?>"
									
									>
									
									</polygon>
								</a>
							<?php }
						}
					endwhile;
					wp_reset_postdata();
				}  ?>
			</svg>
		</div>
		<img src="<?php echo $general_image_mapping; ?>" class="increase-imagemap-image" id="increase-imagemap-image">
	
	</div>
	
	<script>
		jQuery(document).ready(function(){
			tippy('.increase-imagemap-tooltip',
				{
					followCursor: true,
					arrow: false,
				}
			);
		});
	</script>
<?php } ?>