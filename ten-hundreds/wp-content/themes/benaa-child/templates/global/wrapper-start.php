<?php
/**
 * The template used for displaying wrapper start
 *
 * @package WordPress
 * @subpackage Theme_Name
 * @since Theme_Version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$preset_id = g5plus_get_current_preset();
if (!$preset_id && is_404()) {
	return;
}

$page_layouts = &g5plus_get_page_layout_settings();
$layout_wrap_class = array();
$layout_inner_class = array();

if (is_active_sidebar($page_layouts['sidebar']) && ($page_layouts['sidebar_layout'] != 'none')) {
	$sidebar_col = 3;
	if ($page_layouts['sidebar_width'] == 'large') {
		$sidebar_col = 4;
	}
	$layout_inner_class[] = 'col-md-'. (12 - $sidebar_col);
	if ($page_layouts['sidebar_layout'] == 'left') {
		$layout_inner_class[] = 'col-md-push-' . $sidebar_col;
	}
}

if (!$page_layouts['remove_content_padding']) {
	if (isset($page_layouts['padding']['top']) && ($page_layouts['padding']['top'] != '') && ($page_layouts['padding']['top'] != 'px') ) {
		$layout_wrap_class[] = 'pd-top-' . str_replace('px','',$page_layouts['padding']['top']);
	}
	if (isset($page_layouts['padding']['bottom']) && ($page_layouts['padding']['bottom'] != '')  && ($page_layouts['padding']['bottom'] != 'px')) {
		$layout_wrap_class[] = 'pd-bottom-' . str_replace('px','',$page_layouts['padding']['bottom']);
	}

	if (isset($page_layouts['padding_mobile']['top']) && ($page_layouts['padding_mobile']['top'] != '') && ($page_layouts['padding_mobile']['top'] != 'px') ) {
		$layout_wrap_class[] = 'sm-pd-top-' . str_replace('px','',$page_layouts['padding_mobile']['top']);
	}
	if (isset($page_layouts['padding_mobile']['bottom']) && ($page_layouts['padding_mobile']['bottom'] != '')  && ($page_layouts['padding_mobile']['bottom'] != 'px')) {
		$layout_wrap_class[] = 'sm-pd-bottom-' . str_replace('px','',$page_layouts['padding_mobile']['bottom']);
	}
}

$layout_wrap_class = apply_filters('g5plus_filter_layout_wrap_class',$layout_wrap_class);
$layout_inner_class = apply_filters('g5plus_filter_layout_inner_class',$layout_inner_class);
/**
 * @hooked - g5plus_page_title - 5
 **/
do_action('g5plus_before_main_content');
?>
<?php

$post_type = get_post_type( $post_id );
if($post_type=="property"&&!is_archive()){
    ?>
<div id="primary-content" class="pd-top-100 sm-pd-top-50 ">
    <div class="<?php echo esc_attr($page_layouts['layout']) ?> clearfix">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <?php ere_get_template('single-property/header.php'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-12">
                <?php    ere_get_template('single-property/gallery.php');   ?>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 sProdCard__right-sidebar">
                <?php
                dynamic_sidebar('PropertyMyNew');
                ?>
            </div>
        </div>
        <div class="row">
            <div class=" col-md-12 single-property-inner">
    <?php
}else{
    ?>
<div id="primary-content" class="<?php echo esc_attr(join(' ',$layout_wrap_class));?>">
    <?php if ($page_layouts['layout'] != 'full'): ?>
    <div class="<?php echo esc_attr($page_layouts['layout']) ?> clearfix">
        <?php endif;?>
        <?php if (($page_layouts['has_sidebar']) && ($page_layouts['layout'] != 'full')): ?>
        <div class="row">
            <?php endif; ?>
            <div class="<?php echo esc_attr(join(' ',$layout_inner_class)); ?>">
    <?php
}
?>

