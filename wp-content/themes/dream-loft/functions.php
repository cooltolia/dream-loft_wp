<?php



if ( !function_exists( 'dreamloft_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Twenty Fifteen 1.0
     */
    function dreamloft_setup()
    {
        load_theme_textdomain( 'dreamloft' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo', array( 'width' => 157, 'height' => 150, 'flex-height' => true ) );
        add_image_size( 'dreamloft-service-image', 316, 177, TRUE );
        add_image_size( 'dreamloft-license-image', 320, 452, TRUE );
        add_image_size( 'dreamloft-object-thumb', 230, 230, TRUE );
        add_image_size( 'dreamloft-custom-thumb', 300, 300, TRUE );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( [
            'main-menu'    => 'Main menu',
            'mobile-menu'  => 'Mobile menu',
        ] );
    }
endif;
add_action( 'after_setup_theme', 'dreamloft_setup' );



/**
 * Enqueues scripts and styles.
 
 */
function dreamloft_scripts()
{
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/libs/bootstrap.min.css' );
	// wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/libs/slick/slick.css' );
	// wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.css' );
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_script( 'ya-map', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/libs/bootstrap.min.js' );
	// wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/libs/slick/slick.min.js' );
	// wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.js' );
    wp_enqueue_script( 'dreamloft-main', get_template_directory_uri() . '/assets/js/main.js' );
}
add_action( 'wp_enqueue_scripts', 'dreamloft_scripts' );


/** adding class to menu links */
function add_class_to_href( $classes, $item ) {
    if ( in_array('current_page_item', $item->classes) ) {
        $classes['class'] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_href', 10, 2 );

function add_menuclass($ulclass)
{
    return preg_replace('/<a /', '<a class="main-nav__link"', $ulclass);
}
add_filter('wp_nav_menu', 'add_menuclass');


/**
 *
 * The page content surrounding the settings fields. Usually you use this to instruct non-techy people what to do.
 *
 */
function dreamloft_settings_page() {
    wp_enqueue_media();
    ?>
  <div class="wrap">
    <h1>Информация о компании</h1>
    <p>Изменения в форме обновят соответсвующие данные на сайте</p>
    <form method="post" action="options.php">
        <?php
        settings_fields( "section" );
        do_settings_sections( "dreamloft-theme-options" );
        submit_button();
        ?>
    </form>
  </div>

<?php }
/**
 *
 * Next comes the settings fields to display. Use anything from inputs and textareas, to checkboxes multi-selects.
 *
 */
// Phone
function dreamloft_display_company_phone_element() { ?>

  <input type="tel" required name="company_phone" placeholder="<?php _e('Введите номер телефона', 'dreamloft')?>
"
         value="<?php echo get_option( 'company_phone' ); ?>" size="35">

<?php }
// secondary phone
function dreamloft_display_company_secondary_phone_element() { ?>

  <input type="tel" required name="company_secondary_phone" placeholder="<?php _e('Введите номер телефона', 'dreamloft') ?>"
         value="<?php echo get_option( 'company_secondary_phone' ); ?>" size="35">

<?php }
//Название
function dreamloft_display_company_name_element() { ?>

    <input type="text" required name="company_name" placeholder="<?php _e('Введите название компании', 'dreamloft')?>"
           value="<?php echo get_option( 'company_name' ); ?>" size="35">
  
<?php }

// ИНН
function dreamloft_display_company_inn_element() { ?>

    <input type="text" required name="company_inn" placeholder="<?php _e('Введите ИНН компании', 'dreamloft')?>"
           value="<?php echo get_option( 'company_inn' ); ?>" size="35">
  
<?php }
// ОГРН
function dreamloft_display_company_ogrn_element() { ?>

    <input type="text" required name="company_ogrn" placeholder="<?php _e('Введите ОГРН компании', 'dreamloft')?>"
           value="<?php echo get_option( 'company_ogrn' ); ?>" size="35">
  
<?php }
// address
function dreamloft_company_address_element() { 
    wp_editor( get_option( 'company_address' ), "company_address", $settings = [] );
}
// Email
function dreamloft_company_email_element() { ?>

  <input type="email" required name="company_email" placeholder="<?php _e('Введите email', 'dreamloft')?>
"
         value="<?php echo get_option( 'company_email' );
         ?>" size="35">

<?php }

/**
 *
 * Here you tell WP what to enqueue into the <form> area. You need:
 *
 * 1. add_settings_section
 * 2. add_settings_field
 * 3. register_setting
 *
 */

function dreamloft_custom_info_fields() {
    // Добавляем поле секции
    $company_info = __("Информация о компании", 'dreamloft');
    $company_name = __("Название компании", 'dreamloft');
    $main_tel = __("Основной", 'dreamloft');

    add_settings_section( "section", $company_info, NULL, "dreamloft-theme-options" );
    add_settings_field( "company_name", $company_name, "dreamloft_display_company_name_element", "dreamloft-theme-options","section" );
    add_settings_field( "company_phone", $main_tel, "dreamloft_display_company_phone_element", "dreamloft-theme-options","section" );
    add_settings_field( "company_secondary_phone", "Дополнительный", "dreamloft_display_company_secondary_phone_element", "dreamloft-theme-options","section" );
    add_settings_field( "company_inn", "ИНН компании", "dreamloft_display_company_inn_element", "dreamloft-theme-options","section" );
    add_settings_field( "company_ogrn", "ОГРН компании", "dreamloft_display_company_ogrn_element", "dreamloft-theme-options","section" );
    add_settings_field( "company_address", "Адрес компании", "dreamloft_company_address_element", "dreamloft-theme-options", "section" );
    add_settings_field( "company_email", "Email", "dreamloft_company_email_element", "dreamloft-theme-options", "section" );
    // Регистрируем дефаулты
    if ( ! get_option( "company_phone" ) ) {
        update_option( 'company_phone', '+7(495) 955-55-55' );
    }
    if ( ! get_option( "company_secondary_phone" ) ) {
        update_option( 'company_secondary_phone', '+7(926) 204-72-84' );
    }
    if ( ! get_option( "company_name" ) ) {
        update_option( 'company_name', 'Dream Loft' );
    }
    if ( ! get_option( "company_inn" ) ) {
        update_option( 'company_inn', '7811523780' );
    }
    if ( ! get_option( "company_ogrn" ) ) {
        update_option( 'company_ogrn', '1127847312163 193091' );
    }
    if ( ! get_option( "company_address" ) ) {
        update_option( 'company_address', 'город Санкт-петербург, Октябрьская набережная,<br> 
        дом 6, литер В, помещение 11-Н' );
    }
    if ( ! get_option( "company_email" ) ) {
        update_option( 'company_email', 'market@dream-loft.ru' );
    }

    
    // Регистрируем настройки
    register_setting( "section", "company_phone" );
    register_setting( "section", "company_name" );
    register_setting( "section", "company_inn" );
    register_setting( "section", "company_ogrn" );
    register_setting( "section", "company_address" );
    register_setting( "section", "company_email" );
}

add_action( "admin_init", "dreamloft_custom_info_fields" );

/**
 *
 * Tie it all together by adding the settings page to wherever you like. For this example it will appear
 * in Settings > Contact Info
 *
 */
function dreamloft_add_custom_info_menu_item() {
    add_options_page( "Информация о компании", "Информация о компании", "manage_options", "contact-info", "dreamloft_settings_page" );
}

add_action( "admin_menu", "dreamloft_add_custom_info_menu_item" );

function my_pre_get_posts( $query ) {
	
	// do not modify queries in the admin
	if( is_admin() ) {
		
		return $query;
		
	}
	
	
	// only modify queries for 'event' post type
	if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'object' ) {
		
		// allow the url to alter the query
		if( isset($_GET['status']) ) {
			
    		$query->set('meta_key', 'object-active');
			$query->set('meta_value', $_GET['status']);
			
    	} 
		
	}
	
	
	// return
	return $query;

}

add_action('pre_get_posts', 'my_pre_get_posts');