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

/*$args_tax_mobile = $args_tax = array(
	'hide_empty' => 0,
	'orderby'=>'menu_order',
	'order'=>'ASC'
);*/

if(!is_tax('increase_buildings')){
	
	//Theme options single building select
	$increase_imagemap_home_building = get_field('increase_imagemap_home_building', 'option');
	$termTax = 'increase_buildings';
	$termId = $increase_imagemap_home_building;
	
	if($home_multiple_buildings && !$home_multiple_buildings_floors){
		$general_image = esc_sql(get_field('increase_imagemap_main_image', 'option'));
		$general_image_width = $general_image['width'];
		$general_image_height = $general_image['height'];
		$general_image_mapping = $general_image['url'];
		$args_tax['parent'] = 0;
		$args_tax['hide_empty'] = false;
		//$args_tax_mobile['parent'] = 0;
	}elseif($home_multiple_buildings && $home_multiple_buildings_floors){
		$general_image = esc_sql(get_field('increase_imagemap_main_image', 'option'));
		$general_image_width = $general_image['width'];
		$general_image_height = $general_image['height'];
		$general_image_mapping = $general_image['url'];
		$args_tax['childless'] = true;
		//$args_tax_mobile['parent'] = 0;
	}else{
		$general_image = esc_sql(get_field('increase_building_floor_image', 'increase_buildings_'.$increase_imagemap_home_building));
		$general_image_width = $general_image['width'];
		$general_image_height = $general_image['height'];
		$general_image_mapping = $general_image['url'];
		$args_tax['parent'] = $increase_imagemap_home_building;
		//$args_tax_mobile['include'] = $increase_imagemap_home_building;
	}
	
}else{
	
	$termId = get_queried_object()->term_id;
	$termTax = get_queried_object()->taxonomy;
	$termName = get_queried_object()->name;
	
	$general_image = esc_sql(get_field('increase_building_floor_image', $termTax.'_'.$termId));
	$general_image_width = $general_image['width'];
	$general_image_height = $general_image['height'];
	$general_image_mapping = $general_image['url'];
	$args_tax['child_of'] = $termId;
	$args_tax['hide_empty'] = false;
}

$mapping_query = get_terms( 'increase_buildings', $args_tax );

?>

<?php if($general_image_mapping){ ?>
	
	<div class="increase-imagemap">
		<div class="increase-imagemap-shape-container">
			<svg  class="incrase-hs-poly-svg" viewBox="0 0 <?php echo $general_image_width.' '.$general_image_height; ?>" preserveAspectRatio="none">
				<?php foreach ($mapping_query as $term){
					$id = $term->term_id;
					$tax = $term->taxonomy;
					$name = $term->name;
					$slug = $term->slug;
					
					$increase_imagemap_shape_coords_default =  esc_attr(get_field('increase_building_floor_coordinates', $tax.'_'.$id));
					/*$increase_imagemap_shape_coords_explode = explode(",",$increase_imagemap_shape_coords_default);
					$increase_imagemap_shape_coords_length = count($increase_imagemap_shape_coords_explode);
					
					$increase_imagemap_shape_coords = '';
					$i = 1;
					foreach ($increase_imagemap_shape_coords_explode as $key => $value){
						$increase_imagemap_shape_coords .= $value;
						
						if($i != $increase_imagemap_shape_coords_length){
							if($i % 2 == 0) {
								$increase_imagemap_shape_coords .= ',';
							}else{
								$increase_imagemap_shape_coords .= ' ';
							}
						}
						$i++;
					}*/
					?>
					
					<?php if(get_field('increase_building_condition', $tax.'_'.$id) != 'hidden'){  ?>
						<?php
						$increase_imagemap_infobox = get_field('increase_building_infobox', $tax.'_'.$id);
						if($increase_imagemap_infobox['increase_building_infobox_text']){
							$increase_imagemap_infobox_id = $increase_imagemap_infobox['increase_building_infobox_position_x'] .'-'. $increase_imagemap_infobox['increase_building_infobox_position_y'];
							?>
							<rect
									id="rect-<?php echo $increase_imagemap_infobox_id; ?>"
									x="<?php echo $increase_imagemap_infobox['increase_building_infobox_position_x']; ?>"
									y="<?php echo $increase_imagemap_infobox['increase_building_infobox_position_y']; ?>"
									style="
											fill: <?php echo ($increase_imagemap_infobox['increase_building_infobox_bg_color'] ? $increase_imagemap_infobox['increase_building_infobox_bg_color'] : 'transparent'); ?>
											"></rect>
							<text
									id="text-<?php echo $increase_imagemap_infobox_id; ?>"
									class="increase-imagemap-infobox"
									x="<?php echo $increase_imagemap_infobox['increase_building_infobox_position_x']; ?>"
									y="<?php echo $increase_imagemap_infobox['increase_building_infobox_position_y']; ?>"
									text-anchor="<?php echo $increase_imagemap_infobox['increase_building_infobox_alignment']; ?>"
									fill="<?php echo $increase_imagemap_infobox['increase_building_infobox_text_color']; ?>"
									font-size="<?php echo $increase_imagemap_infobox['increase_building_infobox_font_size']; ?>"
									data-font="<?php echo $increase_imagemap_infobox['increase_building_infobox_font_size']; ?>">
								<?php echo $increase_imagemap_infobox['increase_building_infobox_text']; ?>
							</text>
						
						<?php } ?>
						<?php if(get_field('increase_building_condition', $tax.'_'.$id) != 'visible'){  ?>
							<a xlink:href="<?php echo get_term_link($id); ?>">
						<?php } ?>
						<polygon
								class="increase-imagemap-shape increase-imagemap-shape-poly increase-imagemap-tooltip"
								title="<?php echo get_term($id)->name; ?>"
								data-shape-title="<?php echo get_term($id)->name; ?>"
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
								id="shape-<?php echo $id; ?>"
								points="<?php echo $increase_imagemap_shape_coords_default; ?>"
						
						>
						
						</polygon>
						<?php if(get_field('increase_building_condition', $tax.'_'.$id) != 'visible'){  ?>
							</a>
						<?php } ?>
					<?php } ?>
				<?php } ?>
				
				<?php if( have_rows('increase_building_other_buildings', $termTax.'_'.$termId) ){
					if(!$home_multiple_buildings || !is_front_page() ) {
						while (have_rows('increase_building_other_buildings', $termTax . '_' . $termId)): the_row();
							
							$increase_building_other_buildings_term = get_sub_field('increase_building_other_buildings_tax');
							
							$increase_building_other_buildings_coordinates = esc_attr(get_sub_field('increase_building_other_buildings_coordinates'));
							
							?>
							<?php if (!get_field('increase_building_sold_out', $termTax . '_' . $increase_building_other_buildings_term)) { ?>
								<a xlink:href="<?php echo get_term_link($increase_building_other_buildings_term); ?>">
									<polygon
											class="increase-imagemap-shape increase-imagemap-shape-poly increase-imagemap-tooltip"
											title="<?php echo get_term($increase_building_other_buildings_term)->name; ?>"
											data-shape-title="<?php echo get_term($increase_building_other_buildings_term)->name; ?>"
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
											id="shape-term-<?php echo $increase_building_other_buildings_term; ?>"
											points="<?php echo $increase_building_other_buildings_coordinates; ?>"
									
									>
									
									</polygon>
								</a>
							<?php } ?>
						<?php endwhile;
					}
				} ?>
			</svg>
		</div>
		<img src="<?php echo $general_image_mapping; ?>" class="increase-imagemap-image" id="increase-imagemap-image">
	</div>
	
	<script>
		
		(function($) {
			
			function increaseBuildingTextBG(){
				
				$('svg').find('.increase-imagemap-infobox').each(function(){
					
					var window_width = $("body").prop("clientWidth");
					
					if(window_width >= 600){
						var font_size = $(this).data('font');
						
					}else{
						var font_size = $(this).data('font')*2;
					}
					
					$(this).attr('font-size',font_size);
					
					var rect_id = 'rect-'+$(this).attr('x') + '-'+ $(this).attr('y');
					var rect_x = $(this).attr('x');
					var rect_y = $(this).attr('y');
					var rect_final_x;
					var rect_final_y;
					
					var rect_height_initial = this.getBBox().height;
					var line_height = (rect_height_initial - font_size);
					var line_height_x2 = line_height*2;
					
					var rect_height = rect_height_initial + line_height_x2;
					var rect_width = this.getBBox().width + (line_height_x2*2);
					
					
					var rect_anchor = $(this).attr('text-anchor');
					
					if(rect_anchor == 'end'){
						rect_final_x = rect_x - rect_width + line_height_x2;
						rect_final_y = rect_y - rect_height + line_height_x2;
					}else if(rect_anchor == 'middle'){
						rect_final_x = rect_x - (rect_width/2);
						rect_final_y = rect_y - rect_height + line_height_x2;
					}else{
						rect_final_x = rect_x - line_height_x2;
						rect_final_y = rect_y - rect_height + line_height_x2;
					}
					
					$('svg').find('#'+rect_id)
						.attr('width', rect_width+'px')
						.attr('height', rect_height+'px')
						.attr('x', rect_final_x)
						.attr('y', rect_final_y);
					
					
					
				});
			}
			
			
			jQuery(document).ready(function(){
				
				tippy('.increase-imagemap-tooltip',
					{
						followCursor: true,
						arrow: false,
					}
				);
				
				increaseBuildingTextBG();
			});
			
			
			
			jQuery(window).resize(function(){
				increaseBuildingTextBG();
			});
			
		})(jQuery);
	</script>
<?php }else{ ?>
	<div class="container py-5">
		<p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'increase'); ?></p>
		<?php
		//get_search_form(); ?>
	</div>
<?php } ?>