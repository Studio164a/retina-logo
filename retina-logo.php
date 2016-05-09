<?php
/**
 * Plugin Name:         Retina Logo
 * Plugin URI:          http://164a.com
 * Description:         Extends WordPress' inbuilt custom logo feature to add support for uploading retina logos.
 * Version:             0.1.0
 * Author:              Studio 164a
 * Author URI:          https://164a.com
 * Requires at least:   4.5
 * Tested up to:        4.5.2
 *
 * Text Domain:         retina-logo
 * Domain Path:         /languages/
 *
 * @package             Retina Logo
 * @author              Eric Daams
 * @copyright           Copyright (c) 2015, Studio 164a
 * @license             http://opensource.org/licenses/gpl-2.0.php GNU Public License  
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * Filter the attributes of the custom logo image, including
 * srcset & sizes attributes for the retina version, if 
 * available.
 *
 * @param   array $attr
 * @param   WP_Post $attachment
 * @param   string|array $size
 * @return  array $attr
 */
function retlogo_custom_logo_image_attributes( $attr, $attachment, $size ) {
    // echo '<pre>'; var_dump( $attr ); echo '</pre>';

    echo '<pre>'; var_dump( get_theme_support( 'custom-logo' ) ); echo '</pre>';

    return $attr;
}

// add_filter( 'wp_get_attachment_image_attributes', 'retlogo_custom_logo_image_attributes', 10, 3 );


/**
 * Customize the Custom Logo control to include a prompt about whether 
 * the logo is a retina version.
 *
 * @param   WP_Customize_Manager $wp_customize
 * @return  void
 */
function retlogo_custom_logo_customizer_control( WP_Customize_Manager $wp_customize ) {
    if ( ! is_a( $wp_customize->get_control( 'custom_logo' ), 'WP_Customize_Control' ) ) {
        return;
    }

    $control = $wp_customize->get_control( 'custom_logo' );

    $wp_customize->add_control( 'custom_logo_is_retina', array(
        'settings' => 'custom_logo_is_retina', 
        'label' => __( 'Is this image retina-ready?', 'retina-logo' ),
        'section' => $control->section,
        'priority' => $control->priority + 0.1,
        'type' => 'checkbox'
    ) );
}

// add_action( 'customize_register', 'retlogo_custom_logo_customizer_control', 20 );
