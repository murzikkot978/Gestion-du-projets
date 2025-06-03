<?php

function TrivialForge_customize_register($wp_customize)
{
    $wp_customize->add_section('TrivialForge_color', array(
        'title'          => 'Theme colors'
    ));

    //adding setting for copyright text
    $wp_customize->add_setting('TrivialForge_primary_color', array(
        'primary'        => '#000000',

    ));
    $wp_customize->add_setting('TrivialForge_secondary_color', array(
        'secondary'        => '#000000',
    ));

    // Add Controls
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'TrivialForge_primary_color', array(
        'label' => 'Primary Color',
        'section' => 'TrivialForge_color',
        'settings' => 'TrivialForge_primary_color'
    )));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'TrivialForge_secondary_color', array(
        'label' => 'Secondary color',
        'section' => 'TrivialForge_color',
        'settings' => 'TrivialForge_secondary_color'
    )));
}
add_action('customize_register', 'TrivialForge_customize_register');
