<?php
/**
 * EWA Plugin Upgrader
 * @package WordPress
**/

	if( !defined('ABSPATH') ) exit;

class EWA_Theme_Upgrader
{
	protected 
		$api_url,	
		$theme_id,
		$theme_slug, 
		$theme_version,
		$theme_status;

	function __construct( $api_url, $theme_id )
	{
		$template = get_template();
		$theme = wp_get_theme();

		$this->api_url 			= $api_url;
		$this->theme_id 		= $theme_id;
		$this->theme_slug		= $template;
		$this->theme_status		= 'active';
		$this->theme_version 	= $theme->get('Version');

		// filter transient option to push our theme updates
		add_filter( 'pre_set_site_transient_update_themes', array($this, 'pre_set_transient') );

		add_action( 'after_switch_theme', array( $this, 'after_switch_theme') );
		add_action( 'switch_theme', array( $this, 'switch_theme') );
		add_action( 'upgrader_process_complete', array( $this, 'upgrader_process_complete'), 20, 2 );
	}


	/*
	 * Check if our theme has a new release, and store the data to update_themes transient
	*/

	public function pre_set_transient( $transient )
	{
		if( ! is_object( $transient ) )
		{
			$transient = new stdClass();
			$transient->response = array();
		}

		$api_request = self::api_request('theme_update');

		if( ! is_wp_error($api_request) && isset($api_request->status) && 'ok' == $api_request->status )
		{
			$api_data = $api_request->html;
			if( isset($api_data->new_version) && version_compare($api_data->new_version, $this->theme_version, '>') ){
				$transient->response[$this->theme_slug] = get_object_vars( $api_data );
			}
			else{
				$transient->checked[$this->theme_slug] = $this->theme_version;
			}
		}

		return $transient;
	}


	/*
	 * Once theme is updated, ping to api server. Always clear theme cache to get new data
	*/

	public function upgrader_process_complete( $upgrader, $args )
	{
		if( isset($args) && isset($args['type']) && $args['type'] == 'theme' && $args['action'] == 'update' ){
			$theme = wp_get_theme();
			$theme->cache_delete();

			$this->theme_version = $theme->get('Version');
			self::api_request('ping');

			delete_site_transient('update_themes');
		}
	}


	/*
	 * Once our theme is activated, ping to api server
	*/

	public function after_switch_theme()
	{
		// clean theme updates cache
		delete_site_transient('update_themes');
		// ping to api server
		self::api_request('ping');
	}


	/*
	 * Once our theme is deactivated, ping to api server
	*/

	public function switch_theme()
	{
		// set theme status to inactive
		$this->theme_status	= 'inactive';
		// ping to api server
		self::api_request('ping');
	}


	/*
	 * Send API request to remote server
	*/

	function api_request( $method, $timeout = 30 )
	{
		$args = array( 
			'method' 			=> $method,
			'theme_id' 			=> $this->theme_id,
			'theme_version'		=> $this->theme_version,
			'theme_status'		=> $this->theme_status,
			'wp_url' 			=> site_url(),
			'wp_locale' 		=> get_locale(),
			'wp_version'		=> get_bloginfo('version', 'display')
		);

		$request_url = add_query_arg($args, $this->api_url);

		// while just pinging, use a minumum timeout
		if( 'ping' == $method ){
			$timeout = 2;
		}

		$request = wp_remote_request( $request_url, array('timeout' => $timeout) );
		$body = wp_remote_retrieve_body( $request );

		// decode output content if wp error not occured while getting remote content
		if( ! is_wp_error($body) ){
			$body = json_decode($body);
		}

		return $body;
	}
}
// class exists
?>