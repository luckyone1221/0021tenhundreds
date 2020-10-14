<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>

<?php
global $post;
$property_meta_data = get_post_custom(get_the_ID());

$property_rooms = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_rooms']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_rooms'][0] : '';

$property_world = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_world']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_world'][0] : '';
$property_gaz = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_gaz']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_gaz'][0] : '';
$property_water = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_water']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_water'][0] : '';
$property_road = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_road']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_road'][0] : '';


$property_identity = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_identity']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_identity'][0] : '';
$property_size = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_size']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_size'][0] : '';
$property_bedrooms = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_bedrooms']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_bedrooms'][0] : '0';
$property_bathrooms = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_bathrooms']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_bathrooms'][0] : '0';

$property_title = get_the_title();
$property_address = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_address']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_address'][0] : '';
$property_status = get_the_terms(get_the_ID(), 'property-status');
$property_price = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price'][0] : '';
$property_price_short = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_short']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_short'][0] : '';
$property_price_unit = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_unit']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_unit'][0] : '';

$property_price_prefix = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_prefix']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_prefix'][0] : '';
$property_price_postfix = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_price_postfix']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_price_postfix'][0] : '';

?>
<div class="sProdCard property-info-header property-info-action">
	<div class="property-main-info">
    <div class="sProdCard__row row">
      <!--left col-->
      <div class="sProdCard__left-col col-sm-8 col-xl-9">

        <div class="sProdCard__top-line">
          <?php
          $property_status = get_the_terms(get_the_ID(), 'property-status');
          if ($property_status) : ?>
            <div class="sProdCard__status">
              <?php foreach ($property_status as $status) : ?>

                <?php echo esc_attr($status->name); ?>

              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <?php
          if (!empty($property_address)):
            $property_location = get_post_meta(get_the_ID(), ERE_METABOX_PREFIX . 'property_location', true);
            if ($property_location) {
              $google_map_address_url = "http://maps.google.com/?q=" . $property_location['address'];
            } else {
              $google_map_address_url = "http://maps.google.com/?q=" . $property_address;
            }
            ?>
            <a class="sProdCard__location" target="_blank" href="<?php echo esc_url($google_map_address_url); ?>" title="<?php echo esc_attr($property_address) ?>">
              <span>
                <?php echo esc_attr($property_address) ?>
              </span>
            </a>
          <?php endif;
          ?>
        </div>
        <div class="sProdCard__title">
          <?php if (!empty($property_title)): ?>
            <h4><?php the_title(); ?></h4>
          <?php endif; ?>
        </div>
      </div>
      <!--right col-->
      <div class="sProdCard__right-col col-sm-4 col-xl-3">
        <!-- price -->
        <?php if (!empty($property_price)): ?>
          <div class="sProdCard__price">
            <?php if (!empty($property_price_prefix)) {
              echo '<div class="sProdCard__price-prefix">' . $property_price_prefix . ' </div>';
            }?>
            <div class="sProdCard__price-txt">
              <?php echo ere_get_format_money($property_price_short, $property_price_unit); ?>
            </div>
            <?php if (!empty($property_price_postfix)) {
              echo '<div class="property-price-postfix"> / ' . $property_price_postfix . '</div>';
            } ?>
          </div>
        <?php elseif (ere_get_option('empty_price_text', '') != ''): ?>
          <div class="sProdCard__price">
            <?php echo ere_get_option('empty_price_text', '') ?>
          </div>
        <?php endif; ?>
        <!--
          <a href="#FormRecord" class="ScrollLink PropertyScroll">Записаться на прием</a>
        -->
        <div class="property-action">
          <div class="property-action-inner clearfix">
            <?php
            if (ere_get_option('enable_social_share', '1') == '1') {
              ere_get_template('global/social-share.php');
            }
            if (ere_get_option('enable_favorite_property', '1') == '1') {
              ere_get_template('property/favorite.php');
            }
            if (ere_get_option('enable_compare_properties', '1') == '1'):?>
              <a class="compare-property" href="javascript:void(0)"
                 data-property-id="<?php the_ID() ?>" data-toggle="tooltip"
                 title="<?php esc_html_e('Compare', 'benaa') ?>">
                <i class="fa fa-plus"></i>
              </a>
            <?php endif;
            if (ere_get_option('enable_print_property', '1') == '1'):?>
              <a href="javascript:void(0)" id="property-print"
                 data-ajax-url="<?php echo ERE_AJAX_URL; ?>" data-toggle="tooltip"
                 data-original-title="<?php esc_html_e('Print', 'benaa'); ?>"
                 data-property-id="<?php echo esc_attr(get_the_ID()); ?>"><i class="fa fa-print"></i></a>
            <?php endif; ?>
          </div>
        </div>
        <!-- end price -->
      </div>
    </div>
	</div>
  <!-- pills -->
	<div class="sProdCard__pills">
    <?php
    if (!empty($property_world)): ?>
      <div class="sProdCard__pill">
        <div class="sProdCard__pill-img">
          <img src="/wp-content/themes/benaa-child/img/lamp.png">
        </div>
        <div class="sProdCard__pill-txt">
          <p class="sProdCard__pill-title">
            Свет
          </p>
          <p class="sProdCard__pill-val">
            <?php echo $property_world; ?>
          </p>
        </div>
      </div>
    <?php endif; ?>
    <?php
    if (!empty($property_gaz)): ?>
      <div class="sProdCard__pill">
          <div class="sProdCard__pill-img">
            <img src="/wp-content/themes/benaa-child/img/gaz.png">
          </div>
        <div class="sProdCard__pill-txt">
          <p class="sProdCard__pill-title">
            Газ
          </p>
          <p class="sProdCard__pill-val">
            <?php echo $property_gaz; ?>
          </p>
        </div>
      </div>
    <?php endif; ?>

    <?php if (!empty($property_water)): ?>
      <div class="sProdCard__pill">
        <div class="sProdCard__pill-img">
          <img src="/wp-content/themes/benaa-child/img/water.png">
        </div>
        <div class="sProdCard__pill-txt">
          <p class="sProdCard__pill-title">
            Вода
          </p>
          <p class="sProdCard__pill-val">
            <?php echo $property_water; ?>
          </p>
        </div>
      </div>
    <?php endif; ?>

    <?php if (!empty($property_road)): ?>
      <div class="sProdCard__pill">
        <div class="sProdCard__pill-img">
          <img src="/wp-content/themes/benaa-child/img/road.png">
        </div>
        <div class="sProdCard__pill-txt">
          <p class="sProdCard__pill-title">
            Дороги
          </p>
          <p class="sProdCard__pill-val">
            <?php echo $property_road; ?>
          </p>
        </div>
      </div>
    <?php endif; ?>
	</div>
</div>