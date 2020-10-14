<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post;
$min_suffix_js = ere_get_option('enable_min_js', 0) == 1 ? '.min' : '';
wp_enqueue_script(ERE_PLUGIN_PREFIX . 'single-property', ERE_PLUGIN_URL . 'public/assets/js/property/ere-single-property' . $min_suffix_js . '.js', array('jquery'), ERE_PLUGIN_VER, true);

$min_suffix = ere_get_option('enable_min_css', 0) == 1 ? '.min' : '';
wp_print_styles( ERE_PLUGIN_PREFIX . 'single-property');
?>

<div id="property-<?php the_ID(); ?>" <?php post_class('ere-property-wrap single-property-area content-single-property'); ?>>



    <?php
	/**
	 * ere_single_property_before_summary hook.
	 */
	do_action( 'ere_single_property_before_summary' );
	?>
	<?php
	/**
	* ere_single_property_summary hook.
	*
	* @hooked single_property_header - 5
	* @hooked single_property_gallery - 10
	* @hooked single_property_description - 15
	* @hooked single_property_location - 20
	* @hooked single_property_features - 25
	* @hooked single_property_floors - 30
	* @hooked single_property_attachments - 35
	* @hooked single_property_map_directions - 40
	* @hooked single_property_nearby_places - 45
	* @hooked single_property_walk_score - 50
	* @hooked single_property_contact_agent - 55
	* @hooked single_property_footer - 90
	* @hooked comments_template - 95
	* @hooked single_property_rating - 95
	*/
	//do_action( 'ere_single_property_summary' ); ?>
    <div class="row sPlanPills">
      <!---->
      <div class="sPlanPills__col col-md-3 col-sm-6 col-xs-12">
        <div class="sPlanPills__icon">
          <img src="/wp-content/themes/benaa-child/img/1/1.png">
        </div>
        <div class="sPlanPills__txt">
          <span class="sPlanPills__headline">Площадь участков:</span>
          <span class="sPlanPills__value"><?php the_field('площадь_участков'); ?></span>
        </div>
      </div>
      <div class="sPlanPills__col col-md-3 col-sm-6 col-xs-12">
        <div class="sPlanPills__icon">
          <img src="/wp-content/themes/benaa-child/img/1/2.png">
        </div>
        <div class="sPlanPills__txt">
          <span class="sPlanPills__headline">Стоимость участков:</span>
          <span class="sPlanPills__value"><?php the_field('стоимость_участков'); ?></span>
        </div>
      </div>

      <div class="sPlanPills__col col-md-3 col-sm-6 col-xs-12">
        <div class="sPlanPills__icon">
          <img src="/wp-content/themes/benaa-child/img/1/3.png">
        </div>
        <div class="sPlanPills__txt">
          <span class="sPlanPills__headline">Площадь домов:</span>
          <span class="sPlanPills__value"><?php the_field('площадь_домов'); ?></span>
        </div>
      </div>

      <div class="sPlanPills__col col-md-3 col-sm-6 col-xs-12">
        <div class="sPlanPills__icon">
          <img src="/wp-content/themes/benaa-child/img/1/4.png">
        </div>
        <div class="sPlanPills__txt">
          <span class="sPlanPills__headline">Стоимость домов:</span>
          <span class="sPlanPills__value"><?php the_field('стоимость_домов'); ?></span>
        </div>
      </div>

    </div>

  <div class="row sPlanBaner">
    <div class="sPlanBaner__title col-md-12">
      <h2 class=" text-center"><?php the_field('h2_plan'); ?></h2>
    </div>

    <div class="col-md-12">
      <div class="sPlanBaner__cont">
        <?php
          $photo_plan = get_field('photo_plan');
          if ($photo_plan) {
          ?>
            <div class="sPlanBaner__img">
              <img src="<?php echo $photo_plan['url'] ?>" class="img-responsive" alt="<?php echo $photo_plan['alt'] ?>">
            </div>
          <?php
          }
        $plan_items = get_field('plan_items');
        if ($plan_items) {
          ?>
          <div class="sPlanBaner__pills">
            <?php foreach ($plan_items as $item): ?>
              <div class="sPlanBaner__pill">
                <div class="sPlanBaner__pill-val"><?php echo $item['value']; ?></div>
                <div class="sPlanBaner__pill-name"><?php echo $item['title']; ?></div>
              </div>
            <?php endforeach; ?>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
    <div class="col-sm-12 sPlanBaner__learn-more text-center">
      <div class="sPlanBaner__lm-title">
        <h2>
          Получите больше информации
        </h2>
        <p>
          Ваш персональный менеджер свяжется с Вами в течение 5-ти минут!
        </p>
      </div>
      <a href="#" class="sPlanBaner__consult-btn btn">
        Получить консультацию
      </a>
    </div>
  </div>

    <?php
      the_content();    ?>
	<?php
	/**
	 * ere_single_property_after_summary hook.
	 *
	 * * @hooked comments_template - 90
	 */
	do_action( 'ere_single_property_after_summary' );
	?>
</div>