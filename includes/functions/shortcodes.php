<?php

add_action( 'vc_before_init', 'your_name_integrateWithVC' );

function your_name_integrateWithVC() {

    if(function_exists ('vc_map')){


        vc_map(

            array(

                "name" => __("Increase Gallery", "my-text-domain"),
                "base" => "increase_gallery",
                // "as_parent" => array('only' => 'single_img'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
                ///"content_element" => true,
                "show_settings_on_create" => false,
                //"is_container" => true,
	            "params" => array(
		            // add params same as with any other content element
		            array(
			            "type" => "attach_images",
			            "heading" => __("Images","increase"),
			            "param_name" => "images",
			            "description" => __("Select images from media library.", "increase"),
			            //  "value" => get_pages_for_shortcode(),
		            ),
		            array(
			            "type" => "dropdown",
			            "heading" => __("Display type","increase"),
			            "param_name" => "increase_display_type",
			            "value" => array(
				            "Gallery List" => "gallery_list",
				            "Slick Slider" => "slick_slider",
			            ),
		            ),

		            array(
			            "type" => "dropdown",
			            "heading" => __("Image position","increase"),
			            "param_name" => "increase_image_position",
			            "value" => array(
				            "Cover" => "cover",
				            "Contain" => "contain",
			            ),
		            ),

		            array(
			            "type" => "dropdown",
			            "heading" => __("On click action","increase"),
			            "param_name" => "increase_image_click_action",
			            "value" => array(
				            "Link to large image" => "link_image",
				            "Open custom link" => "link_custom",
			            ),
		            ),

		            array(
			            "type" => "exploded_textarea",
			            "heading" => __("Custom links","increase"),
			            "param_name" => "increase_image_click_links",
			            "description" => __("Enter links for each slide (Note: divide links with linebreaks (Enter)).", "increase"),
			            "dependency" => array(
				            "element" => "increase_image_click_action",
				            "value" => "link_custom"
			            )
		            ),

		            array(
			            "type" => "dropdown",
			            "heading" => __("Custom link target","increase"),
			            "param_name" => "increase_image_click_links_target",
			            "value" => array(
				            "Same window" => "target_self",
				            "New window" => "target_blank",
			            ),
			            "dependency" => array(
				            "element" => "increase_image_click_action",
				            "value" => "link_custom"
			            )
		            ),

		            array(
			            "type" => "textfield",
			            "heading" => __("Height","increase"),
			            "param_name" => "increase_gallery_height",
			            "description" => __("percent", "increase"),
			            "value" => '56.25',
			            "dependency" => array(
				            "element" => "increase_display_type",
				            "value" => "slick_slider"
			            )
		            ),

		            array(
			            "type" => "textfield",
			            "heading" => __("Slides to show","increase"),
			            "param_name" => "increase_gallery_slides_show",
			            "value" => '1',
			            "dependency" => array(
				            "element" => "increase_display_type",
				            "value" => "slick_slider"
			            )
		            ),

		            array(
			            "type" => "textfield",
			            "heading" => __("Slides to show (small screen)","increase"),
			            "param_name" => "increase_gallery_slides_show_mobile",
			            "value" => '1',
			            "dependency" => array(
				            "element" => "increase_display_type",
				            "value" => "slick_slider"
			            )
		            ),

		            array(
			            "type" => "textfield",
			            "holder" => "div",
			            "class" => "",
			            "heading" => __( "Extra class name", "increase" ),
			            "param_name" => "increase_class",
			            "description" => __( "Style particular content element differently - add a class name and refer to it in custom CSS.", "increase" )
		            )

	            ),
                //"js_view" => 'VcColumnView'

            ) );


        vc_map(

            array(

                "name" => __("Increase Map", "my-text-domain"),
                "base" => "increase_map",
                "show_settings_on_create" => false,

            )

        );


        $attributes = array(
            'type' => 'checkbox',
            'heading' => "Box shadow",
            'param_name' => 'box_shadow',
          //  'value' => array( "one"),
            'description' => __( "Add box shadow", "my-text-domain" )
        );

        vc_add_param( 'vc_row_inner', $attributes );


        $attributes = array(
            'type' => 'textfield',
            'heading' => "Title",
            'param_name' => 'title',
        );

        vc_add_param( 'vc_icon', $attributes );


        $attributes = array(
            'type' => 'textarea',
            'heading' => "Description",
            'param_name' => 'description',
        );

        vc_add_param( 'vc_icon', $attributes );

    }

    // Link your VC elements's folder
    if( function_exists('vc_set_shortcodes_templates_dir') ){

        vc_set_shortcodes_templates_dir( get_template_directory() . '/includes/shortcodes/vc_shortcodes' );

    }

}


/*
add_filter('vc_shortcodes_css_class', 'change_element_class_name', 10, 2);
function change_element_class_name($class_string, $tag) {
    // modify $class_string variable to your needs. You can use $tag variable to determine what element is currently rendered.

    if ( $tag == 'vc_row' || $tag == 'vc_row_inner' ) {

        $class_string .= ' test3';
    }

    return $class_string;
}*/





add_shortcode( 'increase_gallery', 'increase_gallery_func' );

function increase_gallery_func ($atts) {

    extract($atts);

    ob_start();

    include(locate_template('includes/shortcodes/increase-gallery.php'));

    return ob_get_clean();

}



add_shortcode( 'increase_map', 'increase_map_func' );

function increase_map_func ($atts) {

    extract($atts);

    ob_start();

    include(locate_template('includes/shortcodes/increase-map.php'));

    return ob_get_clean();

}


add_shortcode( 'increase_icon', 'increase_icon' );
function increase_icon ($atts) {
	if(is_array($atts)){
		$xclass = isset($atts['xclass']) ? $atts['xclass'] : '';
		$xid = isset($atts['xid']) ? $atts['xid'] : '';
		$icon = isset($atts['icon']) ? $atts['icon'] : '';
	}

	$html ='';
	$html .='
		<span class="icon-custom increaseicons-'.$icon.' '.$xclass.'" id="'.$xid.'"></span>
	';
	$htmlshortcode = do_shortcode($html);
	return $htmlshortcode;
}



add_shortcode( 'footer_vc', 'footer_vc' );

function footer_vc () {





    include(locate_template('includes/shortcodes/footer_vc.php'));



}



add_shortcode( 'imagemap_vc', 'imagemap_vc' );

function imagemap_vc () {

include(locate_template('template-parts/imagemap/imagemap-building.php'));



}
