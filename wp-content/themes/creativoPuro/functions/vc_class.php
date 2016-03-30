<?php
function getCSSAnimation( $css_animation ) {
	$output = '';
	if ( $css_animation != '' ) {
		wp_enqueue_script( 'waypoints' );
			$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation;
		}

	return $output;
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	/*
	//add Section id to Row Element
	$attributes = array (
		array(
			'type' => 'textfield',
			'heading' => "Section ID",
			'param_name' => 'section_id',
			'value' => '',
			'description' => __( "Add a section id. Use this with the One Page Navigation template.", "js_composer" ),
		),
			array(
			'type' => 'checkbox',
			'heading' => __( 'Force Fullscreen', 'js_composer' ),
			'param_name' => 'fullscreen',
			'value' => array( __( 'Yes, please', 'js_composer' ) => 'yes' ),
			'description' => __( 'Check this option to force the entire row expand to the entire height of your browser window.', 'js_composer' ),
			'group' => __( 'Parallax', 'js_composer' )
		),
	);
	
	vc_add_params( 'vc_row', $attributes ); 
	*/
			
    class WPBakeryShortCode_VC_product_feature extends WPBakeryShortCode {
		public function singleParamHtmlHolder($param, $value) {
			$param_name = isset( $param['param_name'] ) ? $param['param_name'] : '';
			$type = isset( $param['type'] ) ? $param['type'] : '';
			$class = isset( $param['class'] ) ? $param['class'] : '';
	
			if ( isset( $param['holder'] ) == false || $param['holder'] == 'hidden' ) {
				$output .= '<input type="hidden" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '" />';
				if ( ( $param['type'] ) == 'attach_image' ) {
					$element_icon = $this->settings('icon');
					$img = wpb_getImageBySize( array( 'attach_id' => (int)preg_replace( '/[^\d]/', '', $value ), 'thumb_size' => 'thumbnail' ) );
					$this->setSettings('logo', ( $img ? $img['thumbnail'] : '<img width="150" height="150" src="' . vc_asset_url( 'vc/blank.gif' ) . '" class="attachment-thumbnail small"  data-name="' . $param_name . '" alt="" title="" style="display: none;" />' ) );
					$output .= $this->settings('logo');
					
				}
			}
			else {
				$output .= '<' . $param['holder'] . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">' . $value . '</' . $param['holder'] . '>';
			}
			return $output;
		}
    }
	
	class WPBakeryShortCode_vc_service_box extends WPBakeryShortCode {
		public function singleParamHtmlHolder($param, $value) {
			$param_name = isset( $param['param_name'] ) ? $param['param_name'] : '';
			$type = isset( $param['type'] ) ? $param['type'] : '';
			$class = isset( $param['class'] ) ? $param['class'] : '';
	
			if ( isset( $param['holder'] ) == false || $param['holder'] == 'hidden' ) {
				$output .= '<input type="hidden" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '" />';
				if ( ( $param['type'] ) == 'attach_image' ) {
					$element_icon = $this->settings('icon');
					$img = wpb_getImageBySize( array( 'attach_id' => (int)preg_replace( '/[^\d]/', '', $value ), 'thumb_size' => 'thumbnail' ) );
					$this->setSettings('logo', ( $img ? $img['thumbnail'] : '<img width="150" height="150" src="' . vc_asset_url( 'vc/blank.gif' ) . '" class="attachment-thumbnail small"  data-name="' . $param_name . '" alt="" title="" style="display: none;" />' ) );
					$output .= $this->settings('logo');
					
				}
			}
			else {
				$output .= '<' . $param['holder'] . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">' . $value . '</' . $param['holder'] . '>';
			}
			return $output;
		}
    }
	
}
