<?php
//Child Theme Functions File
add_action("wp_enqueue_scripts", "enqueue_wp_child_theme");
function enqueue_wp_child_theme()
{
    if ((esc_attr(get_option("childthemewpdotcom_setting_x")) != "Yes")) {
        //This is your parent stylesheet you can choose to include or exclude this by going to your Child Theme Settings under the "Settings" in your WP Dashboard
        wp_enqueue_style("parent-css", get_template_directory_uri() . "/style.css");
    }

    //This is your child theme stylesheet = style.css
    wp_enqueue_style("child-css", get_stylesheet_uri());

    wp_enqueue_style("child-css-benaa", '/wp-content/themes/benaa-child/css/benaa.css');
    wp_enqueue_style("child-css-main", '/wp-content/themes/benaa-child/css/main.css');

    //This is your child theme js file = js/script.js
    //wp_enqueue_script("child-js", get_stylesheet_directory_uri() . "/js/script.js", array( "jquery" ), "1.0", true );
    wp_enqueue_script("child-js", get_stylesheet_directory_uri() . "/js/script.js", array("jquery"), "1.0", true);
    //
}


// ChildThemWP.com Settings 
function childthemewpdotcom_register_settings()
{
    register_setting("childthemewpdotcom_theme_options_group", "childthemewpdotcom_setting_x", "ctwp_callback");
}

add_action("admin_init", "childthemewpdotcom_register_settings");

//ChildThemeWP.com Options Page
function childthemewpdotcom_register_options_page()
{
    add_options_page("Child Theme Settings", "My Child Theme", "manage_options", "childthemewpdotcom", "childthemewpdotcom_theme_options_page");
}

add_action("admin_menu", "childthemewpdotcom_register_options_page");

//ChildThemeWP.com Options Form
function childthemewpdotcom_theme_options_page()
{
    ?>
    <div>
        <style>
            table.childthemewpdotcom {
                table-layout: fixed;
                width: 100%;
                vertical-align: top;
            }

            table.childthemewpdotcom td {
                width: 50%;
                vertical-align: top;
                padding: 0px 20px;
            }

            #childthemewpdotcom_settings {
                padding: 0px 20px;
            }
        </style>
        <div id="childthemewpdotcom_settings">
            <h1>Child Theme Options</h1>
        </div>
        <table class="childthemewpdotcom">
            <tr>
                <td>
                    <form method="post" action="options.php">
                        <h2>Parent Theme Stylesheet Include or Exclude</h2>
                        <?php settings_fields("childthemewpdotcom_theme_options_group"); ?>
                        <p><label><input size="76" type="checkbox" name="childthemewpdotcom_setting_x"
                                         id="childthemewpdotcom_setting_x"
                                    <?php if ((esc_attr(get_option("childthemewpdotcom_setting_x")) == "Yes")) {
                                        echo " checked='checked' ";
                                    } ?>
                                         value="Yes">
                                TICK To DISABLE The Parent Stylesheet style.css In Your Site HTML<br><br>
                                ONLY TICK This Box If When You Inspect Your Source Code It Contains Your Parent
                                Stylesheet style.css Two Times. Ticking This Box Will Only Include It Once.</label></p>
                        <?php submit_button(); ?>
                    </form>
                </td>
                <td>
                    <h2>More From The Author</h2>
                    <p><b>Would you like your website speed to be faster?</b> I used WP Engine to build one of the
                        fastest WordPress websites in the World <a
                                href="https://shareasale.com/r.cfm?b=779590&u=1897845&m=41388&urllink=&afftrack=">WP
                            Engine - Get 3 months free on annual plans</a> [affiliate link]</p>
                    <p><b>Find out about how I built one fo the fastest WordPress websites in the World</b> <a
                                href="https://www.wpspeedupoptimisation.com?ref=ChildThemeWP" target="_blank">I followed
                            these steps</a></p>
                </td>
            </tr>
        </table>
    </div>
    <?php
}

// убираем мусор из шапки
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');

// убираем с сайта эти идиотские emoje
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// карта
add_shortcode('mapobject', 'map_func');
function map_func()
{
  global $post;
  $property_meta_data = get_post_custom(get_the_ID());
  $property_address = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_address']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_address'][0] : '';
  ob_start();
  ?>
  <div class="MapObjectWrap sMap__wrap">
    <?php
    $google_map = '[ere_property_map map_style="property" property_id="' . get_the_ID() . '" map_height="600px"]';
    echo do_shortcode($google_map);
    ?>
    <div class="sMap__map-info">
      <div class="sMap__inner">
        <?php
        if (!empty($property_address)) {
          ?>
          <div class="sMap__item">
            <strong><?php echo $property_address; ?></strong>
          </div>
          <?php
        }
        ?>

        <?php
        $item1 = get_field('ближайший_населенный_пункт');
        if (!empty($item1)) {
          ?>
          <div class="sMap__item">
            <span>Ближайший населенный пункт:</span>
            <strong><?php echo $item1; ?></strong>
          </div>
          <?php
        }
        ?>

        <?php
        $item2 = get_field('ближайший_город');
        if (!empty($item2)) {
          ?>
          <div class="sMap__item">
            <span>Ближайший город:</span>
            <strong><?php echo $item2; ?></strong>
          </div>
          <?php
        }
        ?>

        <?php
        $item3 = get_field('ближайшая_жд_станция');
        if (!empty($item3)) {
          ?>
          <div class="sMap__item">
            <span>Ближайшая ж/д станция:</span>
            <strong><?php echo $item3; ?></strong>
          </div>
          <?php
        }
        ?>

        <?php
        $item4 = get_field('координаты_поселка');
        if (!empty($item4)) {
          ?>
          <div class="sMap__item">
            <span>Координаты поселка:</span>
            <strong><?php echo $item4; ?></strong>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
  <div class="sMap__row">
    <?php
    $awto = get_field('на_автомобиле:');
    if (!empty($awto)) {
      ?>
      <div class="sMap__col">
        <div class="sMap__p-item">
          <div class="sMap__p-item-img">
            <img src="/wp-content/themes/benaa-child/img/4/1.png">
          </div>
          <div class="sMap__p-item-txt">
            <span>На автомобиле:</span>
            <strong><?php echo $awto; ?></strong>
          </div>
        </div>
      </div>
      <?php
    }
    ?>

    <?php
    $el = get_field('на_электричке:');
    if (!empty($awto)) {
      ?>
      <div class="sMap__col">
        <div class="sMap__p-item">
          <div class="sMap__p-item-img">
            <img src="/wp-content/themes/benaa-child/img/4/2.png">
          </div>
          <div class="sMap__p-item-txt">
            <span>На электричке:</span>
            <strong><?php echo $el; ?></strong>
          </div>
        </div>
      </div>
      <?php
    }
    ?>

    <?php
    $bus = get_field('на_автобусе:');
    if (!empty($bus)) {
      ?>
      <div class="sMap__col">
        <div class="sMap__p-item">
          <div class="sMap__p-item-img">
            <img src="/wp-content/themes/benaa-child/img/4/3.png">
          </div>
          <div class="sMap__p-item-txt">
            <span>На автобусе:</span>
            <strong><?php echo $bus; ?></strong>
          </div>
        </div>
      </div>
      <?php
    }
    ?>

  </div>
  <?php
  return ob_get_clean();
}

add_shortcode('rating_comment','rating_func');
function rating_func(){
    ob_start();
//    comments_template();
    ere_get_template('single-property/review.php');
    return ob_get_clean();
}