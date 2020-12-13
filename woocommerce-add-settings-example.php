<?php
/**
 * Plugin Name:     WooCommerce Add Settings Example
 * Plugin URI:      https://github.com/ko31/woocommerce-add-settings-example
 * Description:     This plugin adds settings of example for WooCommerce.
 * Author:          ko31
 * Author URI:      https://go-sign.info
 * Text Domain:     woocommerce-add-settings-example
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         WooCommerce_Add_Settings_Example
 */

namespace GS\WooCommerce_Add_Settings_Example;

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class WooCommerceAddSettingsExample
 */
class WooCommerceAddSettingsExample {

	/**
	 * constructor.
	 */
	public function __construct() {
		add_filter( 'woocommerce_get_sections_advanced', [ $this, 'woocommerce_get_sections_advanced' ] );
		add_filter( 'woocommerce_get_settings_advanced', [ $this, 'woocommerce_get_settings_advanced' ], 10, 2 );
	}

	/**
	 * Fires when WooCommerce advanced section tab runs.
	 */
	public function woocommerce_get_sections_advanced( $sections ) {
		$sections['wcse'] = __( 'WooCommerce add settings example', 'woocommerce-add-settings-example' );

		return $sections;
	}

	/**
	 * Fires when WooCommerce advanced setting runs.
	 */
	public function woocommerce_get_settings_advanced( $settings, $current_section ) {
		if ( $current_section !== 'wcse' ) {
			return $settings;
		}

		$new_settings = [];

		// Add a title to the settings
		$new_settings[] = [
			'name' => __( 'WooCommerce setting example', '' ),
			'type' => 'title',
			'desc' => __( "These are example settings. Don't worry, there is no effect on the site when you set this up.", 'woocommerce-add-settings-example' ),
			'id'   => 'wcse'
		];

		// Add a checkbox option
		$new_settings[] = [
			'name'     => __( 'Check', 'woocommerce-add-settings-example' ),
			'desc_tip' => __( 'Some tips can be added here.', 'woocommerce-add-settings-example' ),
			'id'       => 'wcse_check',
			'type'     => 'checkbox',
			'desc'     => __( 'Check this to choose it.', 'woocommerce-add-settings-example' ),
		];

		// Add a radio button option
		$new_settings[] = [
			'name'     => __( 'Radio', 'woocommerce-add-settings-example' ),
			'desc_tip' => __( 'Some tips can be added here.', 'woocommerce-add-settings-example' ),
			'id'       => 'wcse_radio',
			'type'     => 'radio',
			'options'  => [
				'yes' => __( 'Yes, I do.', 'woocommerce-add-settings-example' ),
				'no'  => __( "No, I don't", 'woocommerce-add-settings-example' ),
			],
		];

		// Add a text field option
		$new_settings[] = [
			'name'     => __( 'Text', 'woocommerce-add-settings-example' ),
			'desc_tip' => __( 'Some tips can be added here.', 'woocommerce-add-settings-example' ),
			'id'       => 'wcse_text',
			'type'     => 'text',
			'desc'     => __( 'Input something in it.', 'woocommerce-add-settings-example' ),
		];

		// Add a textarea field option
		$new_settings[] = [
			'name'        => __( 'Textarea', 'woocommerce-add-settings-example' ),
			'desc_tip'    => __( 'Some tips can be added here.', 'woocommerce-add-settings-example' ),
			'id'          => 'wcse_textarea',
			'type'        => 'textarea',
			'placeholder' => __( 'Input something in it.', 'woocommerce-add-settings-example' ),
			'css'         => 'min-width: 50%; height: 75px;',
		];

		// Add a number field option
		$new_settings[] = [
			'name'     => __( 'Number', 'woocommerce-add-settings-example' ),
			'desc_tip' => __( 'Some tips can be added here.', 'woocommerce-add-settings-example' ),
			'id'       => 'wcse_number',
			'type'     => 'number',
			'desc'     => __( 'Input something in it.', 'woocommerce-add-settings-example' ),
			'css'      => 'width: 50px;',
		];

		// Add a date field option
		$new_settings[] = [
			'name'     => __( 'Date', 'woocommerce-add-settings-example' ),
			'desc_tip' => __( 'Some tips can be added here.', 'woocommerce-add-settings-example' ),
			'id'       => 'wcse_date',
			'type'     => 'date',
			'desc'     => __( 'Input something in it.', 'woocommerce-add-settings-example' ),
		];

		$new_settings[] = [ 'type' => 'sectionend', 'id' => 'wcse' ];

		return $new_settings;
	}
}

$wcse = new WooCommerceAddSettingsExample();
