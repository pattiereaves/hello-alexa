<?php
/**
 * Plugin Name: Hello Alexa
 * Description: A hello-world example of how to use VoiceWP and Alexa.
 * Plugin URI: https://github.com/pattiereaves/hello-alexa/tree/master/plugins/hello-alexa
 * Author: pattiereaves
 * Author URI: http://twitter.com/pazzypunk
 * Version: 1.0.0
 * Text Domain: hello-alexa
 * License: MIT
 */

namespace Hello_Alexa;

/**
 * Alex endpoint.
 */
class Hello_Alexa {
	/**
	 * Constructor. Registers action hooks.
	 */
	public function __construct() {

		// Add settings.
		add_action( 'fm_submenu_hello_alexa_settings', [ $this, 'settings' ] );

		// Register settings page.
		if ( function_exists( '\fm_register_submenu_page' ) ) {
			\fm_register_submenu_page(
				'hello_alexa_settings',
				'tools.php',
				__( 'Hello Alexa Settings', 'hello-alexa' ),
				__( 'Hello Alexa Settings', 'hello-alexa' ),
				'manage_options',
				'hello_alexa_settings'
			);
		}

		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
	}

	/**
	 * Register the routes for the objects of the controller.
	 */
	public function register_routes() {
		register_rest_route(
			'voicewp/v1',
			'/alexa',
			[
				'callback' => [ $this, 'skill' ],
				'methods'  => [ 'POST' ],
			]
		);
	}

	/**
	 * Callback for skill endpoint.
	 *
	 * @param  \WP_REST_Request $request REST API request.
	 *
	 * @return \WP_REST_Response         WP_REST_Response.
	 */
	public function skill( \WP_REST_Request $request ) {
		$settings = get_option( 'hello_alexa_settings' );
		$app_id   = $settings['skill_ID'];

		if ( ! $app_id ) {
			return new \WP_Rest_Response( __( 'Could not find the skill ID. Check your settings.', 'hello-alexa' ) );
		}

		// Allows us to leverage the core plugin to handle the grunt work.
		$voicewp_instance = \Voicewp::get_instance();

		// Validates that the request is coming from Alexa.
		// Gets the Alexa Request and Response objects for us to use in our skill.
		list( $request, $response ) = $voicewp_instance->voicewp_get_request_response_objects( $request, $app_id );

		// This is the main functionality of your skill,
		// it formats the response that will be sent.
		$this->request_response( $request, $response );

		// Send the result to the user.
		return new \WP_REST_Response( $response->render() );
	}

	/**
	 * Figures out what kind of intent we're dealing with from the request
	 * Handles grabbing the needed data and delivering the response
	 *
	 * @param  \WP_REST_Request  $request REST API request.
	 * @param  \WP_REST_Response $response REST API response.
	 *
	 * @return  <void>
	 */
	public function request_response( $request, $response ) {
		if ( $request instanceof \Alexa\Request\LaunchRequest ) {
			$response
				// Alexa will read this out.
				->respond( "Hello, WordCamp Phoenix 2019!" );
			return;
		}

		if ( $request instanceof \Alexa\Request\SessionEndedRequest ) {
			$response
				->respond( "Goodbye, WordCamp Phoenix 2019!" )
				->end_session();
			return;
		}
	}

	/**
	 * Text and or URL settings for messages within the alexa skill.
	 */
	public function settings() {
		$children = [
			'skill_ID' => new \Fieldmanager_TextField(
				[
					'label' => __( 'ID of your Alexa skill', 'hello-alexa' ),
				]
			),
		];

		$fm = new \Fieldmanager_Group(
			[
				'name'     => 'hello_alexa_settings',
				'children' => $children,
			]
		);

		$fm->activate_submenu_page();
	}
}

add_action('plugins_loaded', 'Hello_Alexa\run_plugin' );
function run_plugin() {
	new Hello_Alexa();
}
