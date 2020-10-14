<?php
/**
 * Created by PhpStorm.
 * User: Kaga
 * Date: 9/5/2016
 * Time: 4:44 PM
 */
return array(
	'name'     => esc_html__('Clients', 'benaa-framework'),
	'base'     => 'g5plus_clients',
	'icon'     => 'fa fa-exchange',
	'category' => GF_SHORTCODE_CATEGORY,
	'params'   => array_merge(
		array(
			array(
				'type'       => 'param_group',
				'heading'    => esc_html__('Our Clients', 'benaa-framework'),
				'param_name' => 'clients',
				'params'     => array(
					array(
						'type'        => 'attach_image',
						'heading'     => esc_html__('Images', 'benaa-framework'),
						'param_name'  => 'images',
						'value'       => '',
						'description' => esc_html__('Select images from media library.', 'benaa-framework')
					),
					array(
						'type'       => 'vc_link',
						'heading'    => esc_html__('Link (url)', 'benaa-framework'),
						'param_name' => 'link',
						'value'      => '',
					),
				),
			),
			array(
				'type'             => 'number',
				'heading'          => esc_html__('Images opacity', 'benaa-framework'),
				'param_name'       => 'opacity',
				'value'            => '100',
				'min'              => '1',
				'max'              => '100',
				'suffix'           => '%',
				'std' =>'50',
				'description'      => esc_html__('Select opacity for images.', 'benaa-framework'),
				'edit_field_class' => 'vc_col-sm-6 vc_column'
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__('Border Client ?', 'benaa-framework'),
				'param_name'       => 'bordered',
				'std'              => 'false',
				'edit_field_class' => 'vc_col-sm-6 vc_column'
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Display Slider?', 'benaa-framework' ),
				'param_name' => 'is_slider',
				'admin_label' => true,
				'std' => 'true',
				'edit_field_class' => 'vc_col-sm-4 vc_column'
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Show pagination control', 'benaa-framework'),
				'param_name' => 'dots',
				'dependency' => array('element' => 'is_slider', 'value' => 'true'),
				'edit_field_class' => 'vc_col-sm-4 vc_column'
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Show navigation control', 'benaa-framework'),
				'param_name' => 'nav',
				'dependency' => array('element' => 'is_slider', 'value' => 'true'),
				'std' => 'true',
				'edit_field_class' => 'vc_col-sm-4 vc_column'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Navigation Position', 'benaa-framework'),
				'param_name' => 'nav_position',
				'value' => array(
					esc_html__('Center','benaa-framework') => 'center',
					esc_html__('Top Right','benaa-framework') => 'top-right',
				),
				'std' => 'top-right',
				'dependency' => array('element' => 'nav', 'value' => 'true'),
				'edit_field_class' => 'vc_col-sm-4 vc_column'
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Auto play', 'benaa-framework'),
				'param_name' => 'autoplay',
				'dependency' => array('element' => 'is_slider', 'value' => 'true'),
				'std' => 'true',
				'edit_field_class' => 'vc_col-sm-4 vc_column'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Autoplay Timeout', 'benaa-framework'),
				'param_name' => 'autoplaytimeout',
				'description' => esc_html__('Autoplay interval timeout.', 'benaa-framework'),
				'value' => '',
				'std' => 5000,
				'dependency' => array('element' => 'autoplay', 'value' => 'true'),
				'edit_field_class' => 'vc_col-sm-4 vc_column'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Columns Show ?', 'benaa-framework' ),
				'param_name' => 'items',
				'value' => array(
					'1 Columns' => '',
					'2 Columns' => '2',
					'3 Columns' => '3',
					'4 Columns' => '4',
					'5 Columns' => '5',
					'6 Columns' => '6',
				),
				'std' => '4',
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'dependency' => array(
					'element' => 'is_slider',
					'value_not_equal_to' => 'true',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Items Desktop', 'benaa-framework'),
				'param_name' => 'items_lg',
				'description' => esc_html__('Browser Width > 1199', 'benaa-framework'),
				'value' => array(
					'1' => '',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
				'std' => '4',
				'group'=> 'Reponsive',
				'dependency' => array('element' => 'is_slider', 'value' => 'true')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Items Desktop Small', 'benaa-framework'),
				'param_name' => 'items_md',
				'description' => esc_html__('Browser Width < 1199', 'benaa-framework'),
				'value' => array(
					'1' => '',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
				'std' => '4',
				'group'=> 'Reponsive',
				'dependency' => array('element' => 'is_slider', 'value' => 'true')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Items Tablet', 'benaa-framework'),
				'param_name' => 'items_sm',
				'description' => esc_html__('Browser Width < 992', 'benaa-framework'),
				'value' => array(
					'1' => '',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
				'std' => '3',
				'group'=> 'Reponsive',
				'dependency' => array('element' => 'is_slider', 'value' => 'true')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Items Tablet Small', 'benaa-framework'),
				'param_name' => 'items_xs',
				'description' => esc_html__('Browser Width < 768', 'benaa-framework'),
				'value' => array(
					'1' => '',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
				'std' => '2',
				'group'=> 'Reponsive',
				'dependency' => array('element' => 'is_slider', 'value' => 'true')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Items Mobile', 'benaa-framework'),
				'param_name' => 'items_mb',
				'description' => esc_html__('Browser Width < 480', 'benaa-framework'),
				'value' => array(
					'1' => '',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
				'std' => '1',
				'group'=> 'Reponsive',
				'dependency' => array('element' => 'is_slider', 'value' => 'true')
			),
			gf_vc_map_add_extra_class(),
			gf_vc_map_add_css_editor()
		),
		gf_vc_map_animation()
	)
);