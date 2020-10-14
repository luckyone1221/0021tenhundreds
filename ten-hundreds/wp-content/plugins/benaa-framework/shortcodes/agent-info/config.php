<?php
/**
 * Created by PhpStorm.
 * User: Kaga
 * Date: 15/9/2016
 * Time: 10:52 AM
 */
return array(
	'name' => esc_html__( 'Agent Info', 'benaa-framework' ),
	'base' => 'g5plus_agent_info',
	'icon' => 'fa fa-id-card',
	'category' => GF_SHORTCODE_CATEGORY,
	'params' =>array_merge(
		array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Name', 'benaa-framework'),
				'param_name' => 'name',
				'value' => ''
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Position', 'benaa-framework'),
				'param_name' => 'position',
				'value' => ''
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Phone', 'benaa-framework'),
				'param_name' => 'phone',
				'value' => ''
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Mobile', 'benaa-framework'),
				'param_name' => 'mobile',
				'value' => ''
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Fax', 'benaa-framework'),
				'param_name' => 'fax',
				'value' => ''
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Website', 'benaa-framework'),
				'param_name' => 'website',
				'value' => ''
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Email', 'benaa-framework'),
				'param_name' => 'email',
				'value' => ''
			),
			gf_vc_map_add_extra_class(),
			gf_vc_map_add_css_editor()
		),
		gf_vc_map_animation()
	)
);
