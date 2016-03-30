<?php

/**
 * Class Radium_Theme_Importer
 *
 * This class provides the capability to import demo content as well as import widgets and WordPress menus
 *
 * @since 0.0.2
 *
 * @category RadiumFramework
 * @package  NewsCore WP
 * @author   Franklin M Gitonga
 * @link	 http://radiumthemes.com/
 *
 */

 // Exit if accessed directly
 if ( !defined( 'ABSPATH' ) ) exit;

 // Don't duplicate me!
 if ( !class_exists( 'Radium_Theme_Importer' ) ) {

	class Radium_Theme_Importer {

		public $download_content_attachments = true;
		public $theme_option_name;
		public $contents_file;
		public $theme_options_file;
		public $widgets_file;
		public $revsliders_file;
		public $layersliders_file;

		private static $instance;

		public function init()
		{
			$this->demo_files_path 		= apply_filters('radium_theme_importer_demo_files_path', 		$this->demo_files_path);

			$this->contents_file 		= apply_filters('radium_theme_importer_contents_file_file', 	$this->demo_files_path . $this->contents_file_name);
			$this->theme_options_file 	= apply_filters('radium_theme_importer_theme_options_file', 	$this->demo_files_path . $this->theme_options_file_name);
			$this->widgets_file 		= apply_filters('radium_theme_importer_widgets_file', 			$this->demo_files_path . $this->widgets_file_name);
			$this->revsliders_file 		= apply_filters('radium_theme_importer_contents_file_file', 	$this->demo_files_path . $this->revsliders_file_name);
			$this->layersliders_file 	= apply_filters('radium_theme_importer_contents_file_file', 	$this->demo_files_path . $this->layersliders_file_name);
		}

		/**
		 * Process all imports
		 * @params $modules (array)
		 *
		 * @since 0.0.3
		 *
		 * @return null
		 */

		public function process_imports( $imports = array() )
		{
			if( in_array('revsliders', $imports) ){
				$this->import_revsliders( $this->revsliders_file );
			}

			if( in_array('layersliders', $imports) ){
				$this->import_layersliders( $this->layersliders_file );
			}

			if( in_array('contents', $imports) ){
				$this->import_contents( $this->contents_file );
			}

			if ( in_array('options', $imports) ){
				$this->import_theme_options( $this->theme_options_file, $this->theme_option_name );
			}

			if( in_array('widgets', $imports) ){
				$this->import_widgets( $this->widgets_file );
			}

			do_action( 'radium_import_end');
		}


		public function import_revsliders( $file )
		{
			if( ! file_exists( $file ) ){
				return 'Revolution Slider file not found';
				return;
			}

			if( class_exists('RevSlider') )
			{
				ob_start();
				$rev = new RevSlider;
				$response = $rev->importSliderFromPost( false, false, $file );
				ob_end_clean();

				return 'Revolution Slider imported';
			}
		}

		public function import_layersliders( $file )
		{
			if( ! file_exists( $file ) ){
				return 'Layer Slider file not found';
				return;
			}

			if( defined('LS_ROOT_PATH') && ! class_exists('LS_ImportUtil') ){
				include_once( LS_ROOT_PATH.'/classes/class.ls.importutil.php' );
			}

			if( class_exists('LS_ImportUtil') )
			{
				ob_start();
				$response = new LS_ImportUtil( $file );
				ob_end_clean();

				return 'Layer Slider imported';
			}
		}


		public function import_contents( $file )
		{
			if( ! file_exists( $file ) ){
				return 'Content file not found';
			}

			set_time_limit(0);

			$load_importer = $this->load_content_importer();

			if( ! $load_importer )
			{
				return 'Could not import Content';
			}
			else
			{
				// logically, this wont happen, but yet keep the code
				if( !is_file($file) ){
					echo 'The XML file containing the dummy content is not available or could not be read .. 
					You might want to try to set the file permission to chmod 755.
					<br/>If this doesn\'t work, please use the Wordpress importer and import the file <code>'. $file .'</code> manually';
				}
				else
				{
					// stop generating image sizes
					add_filter('intermediate_image_sizes_advanced', '__return_empty_array');

					ob_start();
				   	$wp_import = new WP_Import();
				   	$wp_import->fetch_attachments = true;
				   	$wp_import->import( $file );
					ob_end_clean();

					remove_filter('intermediate_image_sizes_advanced', '__return_empty_array');

					do_action( 'radium_after_content_import');


					return 'Contents imported';
			 	}
			}
		}


		/**
		 * Keep running is method till a true is returned 
		*/

		public function import_contents_alternate( $file, $attachments_limit = 10 )
		{
			// stop generating image sizes
			add_filter('intermediate_image_sizes_advanced', '__return_empty_array');

			$load_importer = $this->load_content_importer();

			$return = true;
			if( $this->download_content_attachments ){
				$return = $this->wpImportAttachments( $file, $attachments_limit );
			}

			// true is returned after all attachment import is done
			if( true === $return ){
				$return = $this->wpImportContents( $file );
			}

			remove_filter('intermediate_image_sizes_advanced', '__return_empty_array');

			return $return;
		}


		public function wpImportContents( $file )
		{
		   	$wp_import = new WP_Import();
		   	$wp_import->fetch_attachments = false; // doesn matter


			// load data from saved option
			$wp_import->post_orphans 	= get_option('_cri_post_orphans', 		array());
			$wp_import->processed_posts = get_option('_cri_processed_posts', 	array());
			$wp_import->url_remap 		= get_option('_cri_url_remap', 			array());


			// the odd filter
			add_filter( 'import_post_meta_key', array( $wp_import, 'is_valid_meta_key' ) );
			add_filter( 'http_request_timeout', array( &$wp_import, 'bump_request_timeout' ) );


			// start buffer
			ob_start();

			// parse file and gather data
			$wp_import->import_start( $file );
			// map author
			$wp_import->get_author_mapping();


			wp_suspend_cache_invalidation( true );
			$wp_import->process_categories();
			$wp_import->process_tags();
			$wp_import->process_terms();
			$wp_import->process_posts();
			wp_suspend_cache_invalidation( false );


			// update incorrect/missing information in the DB
			$wp_import->backfill_parents();
			$wp_import->backfill_attachment_urls();
			$wp_import->remap_featured_images();

			// end has output, so buffer it out
			$wp_import->import_end();

			// ignore the output, call in buffer
			do_action( 'radium_after_content_import');

			ob_end_clean();

			// delete all attachment related stats
			foreach(array('_cri_post_orphans', '_cri_processed_posts', '_cri_url_remap') as $op){
				delete_option($op);
			}

			return true;
		}


		/* Only Import given number of attachments from WP export file */

		public function wpImportAttachments( $file, $import_limit = 10 )
		{
		   	$wp_import = new WP_Import();
		   	$wp_import->fetch_attachments = true;


			// load data from saved option
			$wp_import->post_orphans 	= get_option('_cri_post_orphans', array());
			$wp_import->processed_posts = get_option('_cri_processed_posts', array());
			$wp_import->url_remap 		= get_option('_cri_url_remap', array());


			add_filter( 'import_post_meta_key', array( $wp_import, 'is_valid_meta_key' ) );
			add_filter( 'http_request_timeout', array( &$wp_import, 'bump_request_timeout' ) );


			// start buffer
			ob_start();

			// parse file and gather data
			$wp_import->import_start( $file );
			// map author
			$wp_import->get_author_mapping();

			// attachment to be imported
			$attachments = array();

			foreach( $wp_import->posts as $post ){
				// only import attachment
				if( $post['post_type'] == 'attachment' ){
					// if attachment has been imported already
					if ( isset( $wp_import->processed_posts[$post['post_id']] ) && ! empty( $post['post_id'] ) ){
						continue;
					}

					// if limit exceed, kill the loop
					if( $import_limit < 1 ){
						break;
					} else {
						$import_limit--;
					}

					$attachments[] = $post;
				}
			}


			// if attachments reach to zero, we are done
			if( empty($attachments) ){
				return true;
			}

			// set importable posts to attachments
			$wp_import->posts = $attachments;

			// this process the attachments, turn off/on cache
			wp_suspend_cache_invalidation( true );
			$wp_import->process_posts();
			wp_suspend_cache_invalidation( false );

			// end has output, so buffer it out
			$wp_import->import_end();
			ob_end_clean();

			// save all post_orphans, processed_posts & url_remap to be used on the next run. also this will run on post import
			update_option( '_cri_post_orphans', $wp_import->post_orphans );
			update_option( '_cri_processed_posts', $wp_import->processed_posts );
			update_option( '_cri_url_remap', $wp_import->url_remap );

			// false means we are going to continue
			return false;
		}

		public function wpAttachmentsImportGetStats()
		{
			$return = array();
			foreach(array('_cri_post_orphans', '_cri_processed_posts', '_cri_url_remap') as $op){
				$return[$op] = get_option($op);
			}
			return $return;
		}
		# === Ends Content Import


		public function import_theme_options( $file, $option_name )
		{
			if( ! file_exists( $file ) ){
				return 'Theme option file not found';
				return;
			}

			$import_data = file_get_contents($file);
			$import_data_unserilized = unserialize(base64_decode($import_data));

			if( !empty($import_data_unserilized) )
			{
				update_option($option_name, $import_data_unserilized);
				return 'Theme options imported';
				return true;
			}
		}


		/**
		 * Process import file
		 *
		 * This parses a file and triggers importation of its widgets.
		 *
		 * @since 0.0.2
		 *
		 * @param string $file Path to .wie file uploaded
		 * @global string $widget_import_results
		 */


		public function import_widgets( $file )
		{
			if( ! file_exists( $file ) ){
				return 'Widget file not found';
				return;
			}

			// Get file contents and decode
			$data = file_get_contents( $file );
			$data = json_decode( $data );

			// Import the widget data
			// Make results available for display on import/export page
			# $this->widget_import_results = $this->import_widgets( $data );


			global $wp_registered_sidebars;

			// Have valid data?
			// If no data or could not decode
			if ( empty( $data ) || ! is_object( $data ) ) {
				return;
			}

			// Hook before import
			$data = apply_filters( 'radium_theme_import_widget_data', $data );

			// Get all available widgets site supports
			$available_widgets = $this->available_widgets();

			// Get all existing widget instances
			$widget_instances = array();
			foreach ( $available_widgets as $widget_data ) {
				$widget_instances[$widget_data['id_base']] = get_option( 'widget_' . $widget_data['id_base'] );
			}

			// Begin results
			$results = array();

			// Loop import data's sidebars
			foreach ( $data as $sidebar_id => $widgets ) {

				// Skip inactive widgets
				// (should not be in export file)
				if ( 'wp_inactive_widgets' == $sidebar_id ) {
					continue;
				}

				// Check if sidebar is available on this site
				// Otherwise add widgets to inactive, and say so
				if ( isset( $wp_registered_sidebars[$sidebar_id] ) ) {
					$sidebar_available = true;
					$use_sidebar_id = $sidebar_id;
					$sidebar_message_type = 'success';
					$sidebar_message = '';
				} else {
					$sidebar_available = false;
					$use_sidebar_id = 'wp_inactive_widgets'; // add to inactive if sidebar does not exist in theme
					$sidebar_message_type = 'error';
					$sidebar_message = __( 'Sidebar does not exist in theme (using Inactive)', 'radium' );
				}

				// Result for sidebar
				$results[$sidebar_id]['name'] = ! empty( $wp_registered_sidebars[$sidebar_id]['name'] ) ? $wp_registered_sidebars[$sidebar_id]['name'] : $sidebar_id; // sidebar name if theme supports it; otherwise ID
				$results[$sidebar_id]['message_type'] = $sidebar_message_type;
				$results[$sidebar_id]['message'] = $sidebar_message;
				$results[$sidebar_id]['widgets'] = array();

				// Loop widgets
				foreach ( $widgets as $widget_instance_id => $widget ) {

					$fail = false;

					// Get id_base (remove -# from end) and instance ID number
					$id_base = preg_replace( '/-[0-9]+$/', '', $widget_instance_id );
					$instance_id_number = str_replace( $id_base . '-', '', $widget_instance_id );

					// Does site support this widget?
					if ( ! $fail && ! isset( $available_widgets[$id_base] ) ) {
						$fail = true;
						$widget_message_type = 'error';
						$widget_message = __( 'Site does not support widget', 'radium' ); // explain why widget not imported
					}

					// Filter to modify settings before import
					// Do before identical check because changes may make it identical to end result (such as URL replacements)
					$widget = apply_filters( 'radium_theme_import_widget_settings', $widget );

					// Does widget with identical settings already exist in same sidebar?
					if ( ! $fail && isset( $widget_instances[$id_base] ) ) {

						// Get existing widgets in this sidebar
						$sidebars_widgets = get_option( 'sidebars_widgets' );
						$sidebar_widgets = isset( $sidebars_widgets[$use_sidebar_id] ) ? $sidebars_widgets[$use_sidebar_id] : array(); // check Inactive if that's where will go

						// Loop widgets with ID base
						$single_widget_instances = ! empty( $widget_instances[$id_base] ) ? $widget_instances[$id_base] : array();
						foreach ( $single_widget_instances as $check_id => $check_widget ) {

							// Is widget in same sidebar and has identical settings?
							if ( in_array( "$id_base-$check_id", $sidebar_widgets ) && (array) $widget == $check_widget ) {

								$fail = true;
								$widget_message_type = 'warning';
								$widget_message = __( 'Widget already exists', 'radium' ); // explain why widget not imported

								break;

							}

						}

					}

					// No failure
					if ( ! $fail ) {

						// Add widget instance
						$single_widget_instances = get_option( 'widget_' . $id_base ); // all instances for that widget ID base, get fresh every time
						$single_widget_instances = ! empty( $single_widget_instances ) ? $single_widget_instances : array( '_multiwidget' => 1 ); // start fresh if have to
						$single_widget_instances[] = (array) $widget; // add it

						// Get the key it was given
						end( $single_widget_instances );
						$new_instance_id_number = key( $single_widget_instances );

						// If key is 0, make it 1
						// When 0, an issue can occur where adding a widget causes data from other widget to load, and the widget doesn't stick (reload wipes it)
						if ( '0' === strval( $new_instance_id_number ) ) {
							$new_instance_id_number = 1;
							$single_widget_instances[$new_instance_id_number] = $single_widget_instances[0];
							unset( $single_widget_instances[0] );
						}

						// Move _multiwidget to end of array for uniformity
						if ( isset( $single_widget_instances['_multiwidget'] ) ) {
							$multiwidget = $single_widget_instances['_multiwidget'];
							unset( $single_widget_instances['_multiwidget'] );
							$single_widget_instances['_multiwidget'] = $multiwidget;
						}

						// Update option with new widget
						update_option( 'widget_' . $id_base, $single_widget_instances );

						// Assign widget instance to sidebar
						$sidebars_widgets = get_option( 'sidebars_widgets' ); // which sidebars have which widgets, get fresh every time
						$new_instance_id = $id_base . '-' . $new_instance_id_number; // use ID number from new widget instance
						$sidebars_widgets[$use_sidebar_id][] = $new_instance_id; // add new instance to sidebar
						update_option( 'sidebars_widgets', $sidebars_widgets ); // save the amended data

						// Success message
						if ( $sidebar_available ) {
							$widget_message_type = 'success';
							$widget_message = __( 'Imported', 'radium' );
						} else {
							$widget_message_type = 'warning';
							$widget_message = __( 'Imported to Inactive', 'radium' );
						}
					}

					// Result for widget instance
					$results[$sidebar_id]['widgets'][$widget_instance_id]['name'] = isset( $available_widgets[$id_base]['name'] ) ? $available_widgets[$id_base]['name'] : $id_base; // widget name or ID if name not available (not supported by site)
					$results[$sidebar_id]['widgets'][$widget_instance_id]['title'] = !empty($widget->title) ? $widget->title : __( 'No Title', 'radium' ); // show "No Title" if widget instance is untitled
					$results[$sidebar_id]['widgets'][$widget_instance_id]['message_type'] = $widget_message_type;
					$results[$sidebar_id]['widgets'][$widget_instance_id]['message'] = $widget_message;

				}
			}

			// Hook after import
			do_action( 'radium_theme_import_widget_after_import' );


			return 'Widgets imported';

			// Return results
			# return apply_filters( 'radium_theme_import_widget_results', $results );
		}



		/**
		 * add_widget_to_sidebar Import sidebars
		 * @param  string $sidebar_slug	Sidebar slug to add widget
		 * @param  string $widget_slug	 Widget slug
		 * @param  string $count_mod	   position in sidebar
		 * @param  array  $widget_settings widget settings
		 *
		 * @since 0.0.2
		 *
		 * @return null
		 */
		public function add_widget_to_sidebar($sidebar_slug, $widget_slug, $count_mod, $widget_settings = array()){

			$sidebars_widgets = get_option('sidebars_widgets');

			if(!isset($sidebars_widgets[$sidebar_slug]))
			   $sidebars_widgets[$sidebar_slug] = array('_multiwidget' => 1);

			$newWidget = get_option('widget_'.$widget_slug);

			if(!is_array($newWidget))
				$newWidget = array();

			$count = count($newWidget)+1+$count_mod;
			$sidebars_widgets[$sidebar_slug][] = $widget_slug.'-'.$count;

			$newWidget[$count] = $widget_settings;

			update_option('sidebars_widgets', $sidebars_widgets);
			update_option('widget_'.$widget_slug, $newWidget);

		}
		/**
		 * Available widgets
		 *
		 * Gather site's widgets into array with ID base, name, etc.
		 * Used by export and import functions.
		 *
		 * @since 0.0.2
		 *
		 * @global array $wp_registered_widget_updates
		 * @return array Widget information
		 */
		function available_widgets() {

			global $wp_registered_widget_controls;

			$widget_controls = $wp_registered_widget_controls;

			$available_widgets = array();

			foreach ( $widget_controls as $widget ) {

				if ( ! empty( $widget['id_base'] ) && ! isset( $available_widgets[$widget['id_base']] ) ) { // no dupes

					$available_widgets[$widget['id_base']]['id_base'] = $widget['id_base'];
					$available_widgets[$widget['id_base']]['name'] = $widget['name'];

				}
			}

			return apply_filters( 'radium_theme_import_widget_available_widgets', $available_widgets );
		}



		/**
		 * Helper function to return option tree decoded strings
		 *
		 * @return	string
		 *
		 * @access	public
		 * @since	 0.0.3
		 */
		public function optiontree_decode( $value ) {

			$func = 'base64' . '_decode';
			return $func( $value );

		}


		public function get_importable_attachments( $file )
		{
			$load_importer = $this->load_content_importer();
			if( ! $load_importer ){
				return false;
			}


			$wp_import = new WP_Import();
			// this parse the file info
			$wp_import->import_start($file);

			$attachments = array();
			foreach($wp_import->posts as $post ){
				if( $post['post_type'] == 'attachment' ){
					$attachments[] = $post;
				}
			}
			
			return $attachments;
		}


		public function load_content_importer()
		{
			if ( !defined('WP_LOAD_IMPORTERS') ){
				define('WP_LOAD_IMPORTERS', true);
			}

			require_once ABSPATH . 'wp-admin/includes/import.php';

			$importer_error = false;

			if ( !class_exists( 'WP_Importer' ) ) {
				$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
				if ( file_exists( $class_wp_importer ) ){
					require_once($class_wp_importer);
				} else {
					$importer_error = true;
				}
			}

			if ( !class_exists( 'WP_Import' ) ) {
				$class_wp_import = dirname( __FILE__ ) .'/wordpress-importer.php';
				if ( file_exists( $class_wp_import ) )
					require_once($class_wp_import);
				else
					$importer_error = true;
			}

			return ! $importer_error;
		}
	}//class

}//function_exists
?>
