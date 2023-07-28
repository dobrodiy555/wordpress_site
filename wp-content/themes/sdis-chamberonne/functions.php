<?php
include 'inc/MyOptions.php';
/**
 * sdis-chamberonne functions and definitions
 *
 * @package sdis-chamberonne
 */

if ( ! function_exists( 'sdis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 */
	
	function sdis_setup() {
		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'sdis', get_template_directory() . '/languages' );
		
		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );
		
		//Let WordPress manage the document title.
		add_theme_support('title-tag');
		
		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'sdis' ),
			'secondary' => __( 'Secondary Menu', 'sdis' ),
		) );
		
		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );
		
		/**
		 * Enable support for the following post formats:
		 */
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ) );

    /*
     * Create table wp_sdis_banners for banners upload
     */
    //sdis_create_table_for_banners();

	}
endif;
add_action( 'after_setup_theme', 'sdis_setup' );


/*
 * Register sidebar
 */
function sdis_register_wp_sidebars() {
  /* В боковой колонке - первый сайдбар */
  register_sidebar(
          array(
                  'id' => 'sdis_right_sdbr', // уникальный id
                  'name' => __('SDIS right sidebar', 'sdis'), // название сайдбара
                  'description' => __('Sidebar on the right for statistics widget', 'sdis'), // описание (видно справа сбоку)
                  'before_widget' => '<div>', // по умолчанию виджеты выводятся <li>-списком
                  'after_widget' => '</div>',
                  'before_title' => '<h3>', // по умолчанию заголовки виджетов в <h2>
                  'after_title' => '</h3>'
          )
  );
}
add_action( 'widgets_init', 'sdis_register_wp_sidebars' );

// include widget code (for sidebar)
require get_template_directory() . '/inc/widget-statistics.php';

/*
 * enqueue styles and scripts
 */
function sdis_styles_and_scripts() {
	wp_enqueue_style( 'sdis-style', get_template_directory_uri() . '/css/style.css', array(), 1.0, 'all' );
	wp_enqueue_style( 'sdis-main-style', get_template_directory_uri() . '/style.css', array(), 1.0, 'all' );
	wp_enqueue_style('sdis-swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.css' );
	wp_enqueue_script( 'sdis-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', null, '1.0', true );
	wp_enqueue_script( 'sdis-swiper-js', '//cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.js', null, '4.4.6', true );
	wp_enqueue_script( 'sdis-slider', get_template_directory_uri() . '/js/function_slider.js', array('sdis-jquery'), 1.0, true );
	wp_enqueue_script( 'sdis_main', get_stylesheet_directory_uri() . '/js/main.js', array('sdis-jquery'), 1.0, true );
  wp_enqueue_script('sdis-cat-switcher', get_template_directory_uri() . '/js/cat_switcher.js', array('sdis-jquery'), 1.0, true );
  wp_localize_script( 'sdis-cat-switcher', 'sdis', array('ajaxurl' => admin_url('admin-ajax.php'), 'security' => wp_create_nonce('sdis_nonce_name')) );
  wp_enqueue_script( 'jquery-ui-accordion' );
  wp_enqueue_script( 'custom-accordion', get_stylesheet_directory_uri() . '/js/accordion.js', array('jquery'),1.0, true );
  //add accordion stylesheet
  wp_register_style('jquery-custom-style', get_stylesheet_directory_uri().'/css/jquery-ui-1.13.2.custom/jquery-ui.css', array(), '1', 'screen');
  wp_enqueue_style('jquery-custom-style');
}
add_action( 'wp_enqueue_scripts', 'sdis_styles_and_scripts' );

/*
 * Creating all needed custom post types: alarmes, activites, divers, vehicules, documents
 */
function sdis_alarmes_custom_post_type() {
  $labels = array(
          'name'                => __( 'alarmes', 'sdis' ),
          'singular_name'       => __( 'Alarme', 'sdis' ),
          'menu_name'           => __( 'Alarmes', 'sdis' ),
          'parent_item_colon'   => __( 'Parent Alarme', 'sdis' ),
          'all_items'           => __( 'All Alarmes', 'sdis' ),
          'view_item'           => __( 'View Alarme', 'sdis' ),
          'add_new_item'        => __( 'Add New Alarme', 'sdis' ),
          'add_new'             => __( 'Add New', 'sdis' ),
          'edit_item'           => __( 'Edit Alarme', 'sdis' ),
          'update_item'         => __( 'Update Alarme', 'sdis' ),
          'search_items'        => __( 'Search Alarme', 'sdis' ),
          'not_found'           => __( 'Not Found', 'sdis' ),
          'not_found_in_trash'  => __( 'Not found in Trash', 'sdis' ),
  );
// Set other options for Custom Post Type
  $args = array(
          'label'               => __( 'alarmes', 'sdis' ),
          'description'         => __( 'Alarme custom post type', 'sdis' ),
          'labels'              => $labels,
          'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
    // You can associate this CPT with a taxonomy or custom taxonomy.
          'taxonomies'          => array( 'commune', 'type' ),
    /* A hierarchical CPT is like Pages and can have
	* Parent and child items. A non-hierarchical CPT
	* is like Posts.
	*/
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'can_export'          => true,
          'has_archive'         => true, // default false
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'post',
          'show_in_rest' => true,
          // next parameters regulate URLs, don't include them if you need default behavior
          //'query_var' => 'alarmes', // defaults to post type key url/?{query_var}={post_slug}, if false - won't work
          //'has_archive' => true, // url/alarmes will work as archive page, you can say choose any other name eg. 'has_archive' => 'alarme-archive'
          //'rewrite' => array('slug' => 'alarm'), // defaults to true, using $post_type as slug in url. if you need to specify - use array with such par-s: slug - to change slug, eg. url/{slug}/alarme1; with_front - default true, allows prepend something before slug eg. url/{blog}/alarmes/alarme1, if false - won't work; pages - default true, allows pagination
  );
  // Registering your Custom Post Type
  register_post_type( 'alarmes', $args );
}
add_action( 'init', 'sdis_alarmes_custom_post_type', 0 );

// create activites CPT
function sdis_activites_custom_post_type() {
  $labels = array(
          'name'                => _x( 'Activites', 'Post Type General Name', 'sdis' ),
          'singular_name'       => _x( 'Activite', 'Post Type Singular Name', 'sdis' ),
          'menu_name'           => __( 'Activites', 'sdis' ),
          'parent_item_colon'   => __( 'Parent Activite', 'sdis' ),
          'all_items'           => __( 'All Activites', 'sdis' ),
          'view_item'           => __( 'View Activite', 'sdis' ),
          'add_new_item'        => __( 'Add New Activite', 'sdis' ),
          'add_new'             => __( 'Add New', 'sdis' ),
          'edit_item'           => __( 'Edit Activite', 'sdis' ),
          'update_item'         => __( 'Update Activite', 'sdis' ),
          'search_items'        => __( 'Search Activite', 'sdis' ),
          'not_found'           => __( 'Not Found', 'sdis' ),
          'not_found_in_trash'  => __( 'Not found in Trash', 'sdis' ),
  );
// Set other options for Custom Post Type
  $args = array(
          'label'               => __( 'activites', 'sdis' ),
          'description'         => __( 'Activite custom post type', 'sdis' ),
          'labels'              => $labels,
          'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',  'page-attributes', 'trackbacks', 'post-formats' ),
          'taxonomies'          => array( 'commune', 'type' ),
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'post',
          'show_in_rest' => true,
  );
  // Registering your Custom Post Type
  register_post_type( 'activites', $args );
}
add_action( 'init', 'sdis_activites_custom_post_type', 0 );

// create divers CPT
function sdis_divers_custom_post_type() {
  $labels = array(
          'name'                => _x( 'Divers', 'Post Type General Name', 'sdis' ),
          'singular_name'       => _x( 'Divers', 'Post Type Singular Name', 'sdis' ),
          'menu_name'           => __( 'Divers', 'sdis' ),
          'parent_item_colon'   => __( 'Parent Divers', 'sdis' ),
          'all_items'           => __( 'All Divers', 'sdis' ),
          'view_item'           => __( 'View Divers', 'sdis' ),
          'add_new_item'        => __( 'Add New Divers', 'sdis' ),
          'add_new'             => __( 'Add New', 'sdis' ),
          'edit_item'           => __( 'Edit Divers', 'sdis' ),
          'update_item'         => __( 'Update Divers', 'sdis' ),
          'search_items'        => __( 'Search Divers', 'sdis' ),
          'not_found'           => __( 'Not Found', 'sdis' ),
          'not_found_in_trash'  => __( 'Not found in Trash', 'sdis' ),
  );
// Set other options for Custom Post Type
  $args = array(
          'label'               => __( 'divers', 'sdis' ),
          'description'         => __( 'Divers custom post type', 'sdis' ),
          'labels'              => $labels,
          'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',  'page-attributes', 'trackbacks', 'post-formats' ),
          'taxonomies'          => array( 'commune', 'type' ),
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'post',
          'show_in_rest' => true,
  );
  register_post_type( 'divers', $args );
}
add_action( 'init', 'sdis_divers_custom_post_type', 0 );

// create vehicules CPT
function sdis_vehicules_custom_post_type() {
  $labels = array(
          'name'                => _x( 'Vehicules', 'Post Type General Name', 'sdis' ),
          'singular_name'       => _x( 'Vehicule', 'Post Type Singular Name', 'sdis' ),
          'menu_name'           => __( 'Vehicules', 'sdis' ),
          'parent_item_colon'   => __( 'Parent Vehicules', 'sdis' ),
          'all_items'           => __( 'All Vehicules', 'sdis' ),
          'view_item'           => __( 'View Vehicules', 'sdis' ),
          'add_new_item'        => __( 'Add New Vehicules', 'sdis' ),
          'add_new'             => __( 'Add New', 'sdis' ),
          'edit_item'           => __( 'Edit Vehicules', 'sdis' ),
          'update_item'         => __( 'Update Vehicules', 'sdis' ),
          'search_items'        => __( 'Search Vehicules', 'sdis' ),
          'not_found'           => __( 'Not Found', 'sdis' ),
          'not_found_in_trash'  => __( 'Not found in Trash', 'sdis' ),
  );
// Set other options for Custom Post Type
  $args = array(
          'label'               => __( 'vehicules', 'sdis' ),
          'description'         => __( 'Vehicules custom post type', 'sdis' ),
          'labels'              => $labels,
          'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',  'page-attributes', 'trackbacks', 'post-formats' ),
          'taxonomies'          => array( 'category' ),
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'post',
          'show_in_rest' => true,
  );
  register_post_type( 'vehicules', $args );
}
add_action( 'init', 'sdis_vehicules_custom_post_type', 0 );

// create documents CPT
function sdis_create_document_post_type() {
  register_post_type( 'documents',  // post type slug
          array(
                  'labels' => array(
                          'name' => __( 'Documents' ), // how is seen in admin
                          'singular_name' => __( 'Document' )
                  ),
                  'public' => true,
                  'menu_icon' => 'dashicons-media-document',
                  'has_archive' => true,
            //'rewrite' => array('slug' => 'document'), // если вводишь document трансформируется в documents но сначала обнови пермалинки
                  'show_in_rest' => true,  // show in API requests + Supports Gutenberg
                  'show_ui' => true,
                  'show_in_nav_menus' => true,
                  'hierarchical' => false,
                  'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),   // add needed features for custom post type, default is title and editor
                  'taxonomies' => array( 'doctype' ),
                  'delete_with_user' => false,
          )
  );
}
add_action( 'init', 'sdis_create_document_post_type');

/*
*  creating taxonomy 'commune' for alarmes, activ-s, divers CPTs
*/
//hook into the init action
add_action( 'init', 'sdis_commune_taxonomy', 0 );
function sdis_commune_taxonomy() {
// Labels part for the GUI
  $labels = array(
          'name' => _x( 'Commune', 'taxonomy general name', 'sdis' ),
          'singular_name' => _x( 'Commune', 'taxonomy singular name', 'sdis' ),
          'menu_name' => __( 'Commune', 'sdis' ),
          'search_items' =>  __( 'Search Commune', 'sdis' ),
          'popular_items' => __( 'Popular Communes', 'sdis' ),
          'all_items' => __( 'All Communes', 'sdis' ),
          'parent_item' => null, // if hierarchical is false
          'parent_item_colon' => null, // if hierarchical is false
          //'parent_item' => __( 'Parent Subject' ), // if hierarchical is true
          //'parent_item_colon' => __( 'Parent Subject:' ), // if hierarchical is true
          'edit_item' => __( 'Edit Commune', 'sdis' ),
          'update_item' => __( 'Update Commune', 'sdis' ),
          'add_new_item' => __( 'Add New Commune', 'sdis' ),
          'new_item_name' => __( 'New Commune Name', 'sdis' ),
          'separate_items_with_commas' => __( 'Separate Communes with commas', 'sdis' ),
          'add_or_remove_items' => __( 'Add or remove Commune', 'sdis' ),
          'choose_from_most_used' => __( 'Choose from the most used Communes', 'sdis' ),
          'not found' => __( 'Communes not found', 'sdis' ),
          'back_to_items' => __('Back to Communes', 'sdis' ),
  );
// Now register taxonomy
  register_taxonomy('commune', array('alarmes', 'activites', 'divers'), array(
          'public' => true, // becomes visible, affects show_in_nav_menu param
          'hierarchical' => false, // default false (behaves like tags, no parent-child), if true - behaves like categories
          'labels' => $labels,
          'show_ui' => true, // display in admin menu, also affects some other params (eg. show_in_menu)
          'show_in_rest' => true,
          'show_admin_column' => true,
          'update_count_callback' => '_update_post_term_count',
          'query_var' => true,
          'rewrite' => array( 'slug' => 'communes' ), // URL will be '/communes', other params are the same as in CPT
  ));
}
/*
*  creating taxonomy 'type' (hierarchical)
*/
add_action( 'init', 'sdis_type_taxonomy', 0 );
function sdis_type_taxonomy() {
// Labels part for the GUI
  $labels = array(
          'name' => _x( 'Sdis Type', 'taxonomy general name', 'sdis' ),
          'singular_name' => _x( 'Sdis Type', 'taxonomy singular name', 'sdis' ),
          'menu_name' => __( 'Sdis Type', 'sdis' ),
          'search_items' =>  __( 'Search Sdis Type', 'sdis' ),
          'popular_items' => __( 'Popular Sdis Types', 'sdis' ),
          'all_items' => __( 'All Sdis Types', 'sdis' ),
          'parent_item' => __( 'Parent Subject' ), // if hierarchical is true
          'parent_item_colon' => __( 'Parent Subject:' ), // if hierarchical is true
          'edit_item' => __( 'Edit Sdis Type', 'sdis' ),
          'update_item' => __( 'Update Sdis Type', 'sdis' ),
          'add_new_item' => __( 'Add New Sdis Type', 'sdis' ),
          'new_item_name' => __( 'New Sdis Type Name', 'sdis' ),
          'separate_items_with_commas' => __( 'Separate Types with commas', 'sdis' ),
          'add_or_remove_items' => __( 'Add or remove Sdis  Type', 'sdis' ),
          'choose_from_most_used' => __( 'Choose from the most used Sdis Types', 'sdis' ),
  );
// Now register taxonomy
  register_taxonomy('sdis_type', array('alarmes', 'activites', 'divers'), array(
          'public' => true, // becomes visible, affects show_in_nav_menu param
          'hierarchical' => true,
          'labels' => $labels,
          'show_ui' => true,
          'show_in_rest' => true,
          'show_admin_column' => true,
          'update_count_callback' => '_update_post_term_count',
          'query_var' => true,
          //'show_in_quick_edit' => true, // the same as show_ui
  ));
}

/*
*  creating taxonomy 'doctype' for CPT documents
*/
function sdis_register_taxonomy() {
  $args = array(
          'labels' => array(
                  'name' => 'doctype',
                  'singular_name' => 'document type',
                  'menu_name' => 'Document type' // name in admin menu
          ),
          'public' => true, // will be visible with minimum parameters
          'show_in_quick_edit' => true,
  );
  register_taxonomy( 'doctype', 'documents', $args );
}
add_action( 'init', 'sdis_register_taxonomy' );

/*
* creating custom field metabox 'numero' for alarmes, activ-s, divers CPTs
*/
add_action( 'admin_menu', 'sdis_add_numero_metabox' );
function sdis_add_numero_metabox() {
  add_meta_box(
          'sdis_numero_metabox', // ID нашего метабокса
          'Post metabox', // заголовок
          'sdis_numero_metabox_callback', // функция, которая будет выводить поля в мета боксе
          array('alarmes', 'divers', 'activites'),  // типы постов, для которых его подключим, default 'null',
          'advanced', // default is 'advanced, also 'side', 'normal'
          'default'  // also can be 'high', 'core', 'default', or 'low'
  );
}
function sdis_numero_metabox_callback($post) {
  $numero = get_post_meta($post->ID, 'sdis_numero', true);
  wp_nonce_field('sdis_security_check', '_sdisnonce');
  ?>
  <table class="form-table">
    <tbody>
      <tr>
        <th><label for="sdis_numero"><?php _e("Numero d'alarme:", 'sdis');?></label></th>
        <td><input type="text" id="sdis_numero" name="sdis_numero" value="<?php echo $numero; ?>" class="regular-text"></td>
      </tr>
    <!--add other fields here if necessary-->
    </tbody>
  </table>
  <?php
}
add_action( 'save_post', 'sdis_save_numero_meta', 10, 2 );
function sdis_save_numero_meta( $post_id, $post ) {
  // check nonce (but it may not be necessary)
  if ( !isset($_POST['_sdisnonce']) || !wp_verify_nonce($_POST['_sdisnonce'], 'sdis_security_check') ) {
    return $post_id;
  }
  // проверяем, может ли текущий юзер редактировать пост
  $post_type = get_post_type_object( $post->post_type );
  if ( !current_user_can($post_type->cap->edit_post, $post_id) ) {
    return $post_id;
  }
  // ничего не делаем для автосохранений
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    return $post_id;
  }
  // if all is good
  if( isset($_POST['sdis_numero']) ) { // по тегу "name"
    $int = absint($_POST['sdis_numero']); // we need integer
    if ($int != 0) { // if input was integer
      update_post_meta( $post_id, 'sdis_numero', $_POST['sdis_numero'] );
    }
  } else {
    delete_post_meta( $post_id, 'sdis_numero' );
  }
  return $post_id;
}

/*
* creating custom field metabox with five inputs (text type) for vehicules CPT
*/
add_action( 'admin_menu', 'sdis_add_vehicules_metabox' );
function sdis_add_vehicules_metabox() {
  add_meta_box(
          'sdis_vehicules_metabox',
          'Vehicules details',
          'sdis_vehicules_metabox_callback',
          'vehicules',
          'advanced',
          'default'
  );
}
function sdis_vehicules_metabox_callback($post) {
  $participants = get_post_meta( $post->ID, 'participants', true );
  $directeur_de_exercice = get_post_meta( $post->ID, 'directeur_de_exercice', true );
  $commentaires =  get_post_meta( $post->ID, 'commentaires', true );
  $designation =  get_post_meta( $post->ID, 'designation', true );
  wp_nonce_field('sdis_security_check', '_sdisnonce');
  ?>
  <table class="form-table">
    <tbody>
    <tr>
      <th><label for="participants"><?php _e("Participants:", 'sdis');?></label></th>
      <td><input type="text" id="participants" name="participants" value="<?php echo $participants; ?>" class="regular-text"></td>
    </tr>
    <tr>
      <th><label for="directeur_de_exercice"><?php _e("Directeur d’exercice:", 'sdis');?></label></th>
      <td><input type="text" id="directeur_de_exercice" name="directeur_de_exercice" value="<?php echo $directeur_de_exercice; ?>" class="regular-text"></td>
    </tr>
    <tr>
      <th><label for="commentaires"><?php _e("Commentaires:", 'sdis');?></label></th>
      <td><input type="text" id="commentaires" name="commentaires" value="<?php echo $commentaires; ?>" class="regular-text"></td>
    </tr>
    <tr>
      <th><label for="designation"><?php _e("Désignation:", 'sdis');?></label></th>
      <td><input type="text" id="designation" name="designation" value="<?php echo $designation; ?>" class="regular-text"></td>
    </tr>
    </tbody>
  </table>
  <?php
}
add_action( 'save_post', 'sdis_save_vehicules_meta', 10, 2 );
function sdis_save_vehicules_meta( $post_id, $post ) {
  // check nonce (but it may not be necessary)
  if ( !isset($_POST['_sdisnonce']) || !wp_verify_nonce($_POST['_sdisnonce'], 'sdis_security_check') ) {
    return $post_id;
  }
  // проверяем, может ли текущий юзер редактировать пост
  $post_type = get_post_type_object( $post->post_type );
  if ( !current_user_can($post_type->cap->edit_post, $post_id) ) {
    return $post_id;
  }
  // ничего не делаем для автосохранений
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    return $post_id;
  }
  // можно также проверить тип записи
  if( 'vehicules' !== $post->post_type ) {
    return $post_id;
  }
  // if all is good, save meta values
  $fields = array('participants','directeur_de_exercice', 'commentaires', 'designation');
  foreach ($fields as $field) {
    if ( isset($_POST[$field]) ) {
      update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field]) );
    } else {
      delete_post_meta( $post_id, $field );
    }
  }
  return $post_id;
}

/*
* creating custom fields metabox for custom post type 'documents'
*/
add_action( 'admin_menu', 'sdis_add_metabox' );
function sdis_add_metabox() {
  add_meta_box(
          'sdis_doc_metabox', // ID нашего метабокса
          'Document details', // заголовок
          'sdis_doc_metabox_callback', // функция, которая будет выводить поля в мета боксе
          'documents',  // типы постов, для которых его подключим, default 'null',
          'advanced', // default is 'advanced, also 'side', 'normal'
          'default',  // also can be 'high', 'core', 'default', or 'low'
          null // null is default, callback args as array eg. array('foo' => $var1, 'bar' => $var2), will be set as $args property, then in a callback f-n pass second param (eg. $metabox) and you can retrieve these params in the f-n eg: echo $metabox['args']['foo']; echo $metabox['args']['bar'];
  );
}
function sdis_doc_metabox_callback( $post ) { // don't forget to pass second arg if you had callback_args !
  $expired_date = get_post_meta( $post->ID, 'expired_date', true );
  $commune = get_post_meta( $post->ID, 'commune1', true );
  ?>
  <table class="form-table">
    <tbody>
    <tr>
      <th><label for="expired_date"><?php _e('Expired date','sdis'); ?></label></th>
      <td><input type="date" id="expired_date" name="expired_date" value="<?php echo $expired_date; ?>" class="regular-text"></td>
    </tr>
    <tr>
      <th><label for="commune1"> <?php _e("Commune", 'sdis'); ?> </label></th>
      <td>
        <select id="commune1" name="commune1">
          <option value="Ecublens" <?php echo selected( 'Ecublens',  $commune, false ); ?>>Ecublens</option>
          <option value="Chavanne" <?php echo selected('Chavanne', $commune, false ) ?> >Chavanne</option>
        </select>
      </td>
    </tr>
    </tbody>
  </table>
  <?php
}
add_action( 'save_post', 'sdis_save_meta', 10, 2 );
function sdis_save_meta( $post_id, $post ) {
  // check current user permissions
  $post_type = get_post_type_object( $post->post_type );
  if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
    return $post_id;
  }
  // Do not save the data if autosave
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    return $post_id;
  }
  if( !empty( $_POST[ 'expired_date' ] ) ) {
    update_post_meta( $post_id, 'expired_date',  $_POST[ 'expired_date' ] );
  } else {
    delete_post_meta( $post_id, 'expired_date' );
  }
  if( !empty( $_POST[ 'commune1' ] ) ) {
    update_post_meta( $post_id, 'commune1', $_POST[ 'commune1' ] );
  } else {
    delete_post_meta( $post_id, 'commune1' );
  }
  return $post_id;
}
/*
/ * register metadata in wp_postmeta
 */
register_meta( 'documents', 'expired_date', [
        'object_subtype' => 'documents',
        'type' => 'string',
        'description' => __('expired date of the document'),
        'single' => false, // can be many fields with such name
        'show_in_rest' => true, // show data in REST requests
] );
register_meta( 'documents', 'commune1', [
        'object_subtype' => 'documents',
        'type' => 'string',
        'description' => __('city of document'),
        'single' => false,
        'show_in_rest' => true,
] );

// f-n to get posts by month based on ACF date field
function sdis_get_posts_current_year_each_month($post_type) {
  $current_year = date('Y');
  $args = array(
          'post_type' => $post_type,
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'date_query' => array(
                  array(
                         'year' => $current_year,
                  )
          )
  );
  $qur = new WP_Query($args);
  for ($m = 1; $m <= 12; $m++) {
    $month = date('F', mktime(0,0,0,$m, 1, date('Y'))); ?>
    <div class="title"><h2><?php echo $month; ?></h2></div>
    <div class="block-list cart-tabs__item cart-tabs__item--active" id="cart-tabs_01">
    <?php
    if ( $qur->have_posts() ) :
      while ( $qur->have_posts() ) : $qur->the_post();
        $post_year = get_the_date('Y');
        $cur_year = date('Y');
        $post_month = get_the_date('F');
        $post_month_short = get_the_date('M');
        $post_day = get_the_date('l');
        $post_date = get_the_date('d.m');
        $post_time = get_the_date('H:i');
        if ($post_year == $cur_year) {
          if ($month == $post_month) { ?>
            <a href="<?php the_permalink();?>" class="row">
              <span class="number"><?php echo get_post_meta( get_the_ID(), 'sdis_numero', true ); ?></span>
              <span class="month"><?php echo $post_month_short; ?></span>
              <span class="desc"><?php the_content(); ?></span>
              <span class="country">
                        <?php $categories = get_the_terms( get_the_ID(), 'commune' );
                        if ( is_array($categories) ) {
                          foreach ( $categories as $category ) {
                            echo $category->name;
                          }
                        } ?>
                      </span>
              <span class="city"><?php echo $post_day; ?></span>
              <span class="date"><?php echo $post_date; ?></span>
              <span class="time"><?php echo $post_time; ?></span>
              <?php if (has_post_thumbnail()) { ?>
                <i class="icon icon-picture"></i>
              <?php } ?>
            </a>
          <?php }
        }
      endwhile;
    endif;
    wp_reset_postdata(); ?>
    </div>
    <?php
  }
}

// ajax f-n for Activ-divers post types
add_action( 'wp_ajax_switch', 'sdis_switch_between_post_types');
add_action( 'wp_ajax_nopriv_switch', 'sdis_switch_between_post_types');
function sdis_switch_between_post_types() {
  $post_type = $_POST['type'];
  check_ajax_referer('sdis_nonce_name', 'security' );
  sdis_get_posts_current_year_each_month($post_type);
  wp_die();
}

// ajax f-n for Vehicules cat-s
add_action( 'wp_ajax_switch1', 'sdis_switch_categories');
add_action( 'wp_ajax_nopriv_switch1', 'sdis_switch_categories');
function sdis_switch_categories() {
  $cat = $_POST['cat'];
  check_ajax_referer('sdis_nonce_name', 'security' );
  sdis_get_vehicules_by_category($cat);
  wp_die();
}

// f-n to get vehicules by category (add ajax here)
function sdis_get_vehicules_by_category($cat) {
  if ($cat === 'All') {
    $cat = 'caserne1,caserne2';
  }
  $args = array(
          'post_type' => 'vehicules',
          'category_name' => $cat,
          'posts_per_page' => -1,
  );
  $qur = new WP_Query($args);
  if ($qur->have_posts() ) :
    while ( $qur->have_posts() ) : $qur->the_post(); ?>
      <a href="<?php the_permalink(); ?>" class="item-posts">
        <?php if (has_post_thumbnail()) : ?>
          <div class="img" style="background-image: url(<?php the_post_thumbnail_url(); ?>"></div>
        <?php endif; ?>
        <span class="title-post"><?php the_title(); ?></span>
        <?php $content = get_the_content();
        $stripped = strip_tags($content); ?>
        <span class="desc"><?php echo $stripped; ?></span>
      </a>
    <?php endwhile;
  endif;
  wp_reset_postdata(); ?>
<?php
}

/*
 * Upload images for banners
 */
// Add a new submenu under the "Appearance" menu
function sdis_custom_options_page() {
  add_submenu_page(
          'themes.php', // Parent menu slug
          'SDIS banners', // Page title
          'SDIS banners', // Menu title
          'manage_options', // Required capability to access
          'sdis-banners', // Page slug
          'sdis_banners_callback' // Callback function to display the page
  );
}
add_action('admin_menu', 'sdis_custom_options_page');

// upload image from form (Appearence->Sdis banners) into Gallery (without JS)
function sdis_banners_callback() {
  ?>
        <h2>SDIS banners</h2>
        <div class="wrap">
         <br>
         <label for="sdis-upper-banner">Upper banner:</label>
         <?php
         $image_id_upper = get_option('sdis_upper_banner');
         $image_id_lower = get_option('sdis_lower_banner');
         if ($upper_banner = wp_get_attachment_image_url($image_id_upper, 'medium')) { ?>
           <a href="#" id="sdis-upper-banner">
             <img src="<?php echo esc_url( $upper_banner ); ?>" />
           </a> <?php
         }
         ?>
         &nbsp;&nbsp;&nbsp;
         <label for="sdis-lower-banner-title">Lower banner:</label>
         <?php
         if ($lower_banner = wp_get_attachment_image_url($image_id_lower, 'medium')) { ?>
           <a href="#" id="sdis-lower-banner-title">
             <img src="<?php echo esc_url( $lower_banner ); ?>" />
           </a> <?php
         }
         ?>
       <form method="post" enctype="multipart/form-data">
         <table class="form-table">
           <tr>
             <th scope="row"><label for="upper_banner">Upload image for upper banner:</label></th>
             <td><input type="file" name="upper_banner" accept="image/*"></td>
           </tr>
           <tr>
             <th scope="row"><label for="lower_banner">Upload image for lower banner:</label></th>
             <td><input type="file" name="lower_banner" accept="image/*"></td>
           </tr>
         </table>
         <p class="submit"><input type="submit" name="submit" class="button button-primary" value="Save Changes"></p>
         </form>
       </div>
  <?php
  // it allows us to use wp_handle_upload() function
  require_once( ABSPATH . 'wp-admin/includes/file.php' );
  if (isset($_POST['submit'])) {
    if ( empty( $_FILES['upper_banner'] ) ) {
      echo '<div class="notice notice-error"><p>Upper banner not selected!</p></div>';
      return false;
    }
    if ( empty( $_FILES['lower_banner'] ) ) {
      echo '<div class="notice notice-error"><p>Lower banner not selected!</p></div>';
      return false;
    }
    // upload images
    $attachment_id_upper = sdis_handle_banner_upload( $_FILES['upper_banner'] );
    if ( $attachment_id_upper ) {
      $res = update_option( 'sdis_upper_banner', $attachment_id_upper );
    }
    $attachment_id_lower = sdis_handle_banner_upload( $_FILES['lower_banner'] );
    if ( $attachment_id_lower ) {
      $res1 = update_option( 'sdis_lower_banner', $attachment_id_lower );
    }
    if ( $res && $res1 ) {
      echo '<div class="notice notice-success"><p>Images uploaded successfully!</p></div>';
      echo '<script>jQuery(".wrap").hide();</script>'; // hide form
    } else {
      echo '<div class="notice notice-error"><p>Some error occurred, try again!</p></div>';
    }
  }
}

// f-n to adoid repetition in prev f-n
function sdis_handle_banner_upload($file) {
  $upload = wp_handle_upload( $file, array('test_form' => false) ); // returns array with filename, url, type
  if ( !empty($upload['error']) ) {
    wp_die($upload['error']);
  }
  $attachment_id = wp_insert_attachment(
          array(
                  'guid'           => $upload['url'],
                  'post_mime_type' => $upload['type'],
                  'post_title'     => basename( $upload['file'] ),
                  'post_content'   => '',
                  'post_status'    => 'inherit',
          ),
          $upload['file']
  );
  if ( is_wp_error($attachment_id) || !$attachment_id ) {
    wp_die( 'Upload error.' );
  } else {
    // update medatata, regenerate image sizes
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    wp_update_attachment_metadata( $attachment_id, wp_generate_attachment_metadata($attachment_id, $upload['file']) );
    return $attachment_id;
  }
}

// allow uploading SVG files into Media Library
function sdis_add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_filter('upload_mimes', 'sdis_add_file_types_to_uploads');

// alternative solution for sidebar
function sdis_get_data_for_sidebar($post_type) {
  $current_date = date('Y-m-d');
  $start_year = date('Y-01-01');
  $days = floor(( strtotime($current_date) - strtotime($start_year) ) / (60 * 60 * 24) ) + 1;
  $current_year = date('Y');
  $args = array(
          'post_type'      => $post_type,
          'posts_per_page' => -1,
          'date_query'     => array(
                  array(
                          'year'  => $current_year,
                  ),
          ),
  );
  $query = new WP_Query( $args );
  $total = $query->found_posts;
  $frequency = number_format($days / $total, 1, ',');
?>

<aside class="aside">
  <div class="cont">
    <div class="info">
      <div class="title">
        <h4><?php echo $post_type; echo " "; echo date('Y'); ?></h4>
      </div>
      <div class="info-alarms">
        <div class="atten-info">
          <p><?php _e('Nombre de jours: ', 'sdis'); echo $days; ?></p>
          <p><?php _e('Moyenne annuelle: ', 'sdis'); echo $total; ?></p>
          <p><?php printf( __('Une alarme tous les %s jours', 'sdis'), $frequency ); ?></p>
        </div>

        <!--список кат-рий таксономии sdis_type с кол-вом аларм в каждой из них-->
        <?php
        // Get all categories
        $categories = get_categories( array(
                'taxonomy' => 'sdis_type'
        ) );
        // Loop through the categories and display the name and how many posts in it
        foreach ($categories as $category) {
          $query = new WP_Query(array(
                  'post_type' => $post_type,
                  'tax_query' => array(
                          array(
                                  'taxonomy' => 'sdis_type',
                                  'field' => 'slug',
                                  'terms' => $category->slug,
                          ),
                  ),
                  'posts_per_page' => -1,
          ));
          echo "<div class='row'><span>" . $category->name . "</span><span>&nbsp;" . $query->found_posts . "</span></div>";
          wp_reset_postdata();
        }
        ?>

      </div>
    </div>
  </div>

  <!--ARCHIVES - там должны быть ссылки на скачивание статистики за предыдущие годы, но пока вместо этого просто выведи предыдущие годы, по которым вообще есть посты-->
  <?php if ( is_post_type_archive('alarmes') ):
    ?>
    <div class="block-archives">
      <div class="title">
        <h4>Archives</h4>
      </div>
      <ul>
        <?php
        $current_year = date('Y');
        $posts = get_posts( array(
                        'post_type' => 'alarmes',
                        'order' => 'DESC',
                        'date_query' => array(
                                array(
                                        'year'   => $current_year,
                                        'compare' => '<',
                                )
                        )
                )
        );
        $years = array();
        if ($posts) {
          foreach($posts as $post) {
            $post_date = get_post_field('post_date', $post->ID);
            $post_year = date('Y', strtotime($post_date) );
            $years[] = $post_year;
          }
        }
        $years = array_unique($years); // remove duplicates
        foreach ( $years as $year ) {
          echo "<li><a href=''>Alarmes $year</a></li>";
        } ?>
      </ul>
    </div>
  <?php endif; ?>

</aside>
<?php
}

// add my custom query var for url: url/?myyear=2022
function sdis_query_vars( $qvars ) {
  $qvars[] = 'myyear';
  return $qvars;
}
add_filter( 'query_vars', 'sdis_query_vars' );

// to exclude current year
add_filter( 'getarchives_where', function ( $where, $parsed_args ) {
  if ( !empty( $parsed_args['not_year'] ) ) {
    $not_year = absint( $parsed_args['not_year'] );
    $where .= " AND NOT YEAR(post_date) = $not_year";
  }
  return $where;
}, 10, 2 );

add_shortcode( 'past_alarms', 'sdis_show_past_alarms' );
function sdis_show_past_alarms($atts) {
  global $post; // here was the problem !!!
  $today = current_time( 'Y-m-d' );
  $posts = get_posts( array(
          'post_type' => 'alarmes',
          'post_status' => 'publish',
          'order' => 'DESC',
          'orderby' => 'date',
          //'numberposts' => 5, // as default
          'date_query' => array(
                  array(
                          'before' => $today,
                          'inclusive' => true,
                  )
          )
  ) );
  ob_start();
  ?>
    <div class="title">
      <h4><?php _e('Dernières alarmes', 'sdis');; ?></h4>
    </div>
    <div class="list-alarms">
      <?php
      if ($posts) :
        foreach ($posts as $post) :
          $alarm_date = get_the_date('d.m.Y' ); ?>
          <div class="row">
            <?php if ( has_post_thumbnail() ) { ?>
              <i class="icon icon-picture"></i>
            <?php } ?>
            <span class="date"><?php echo $alarm_date;?></span>
            <a href="<?php the_permalink(); ?>"><span class="text"><?php the_title(); ?></span></a>
          </div>
        <?php endforeach; ?>
      <?php endif;
      wp_reset_postdata(); ?>
    </div>

    <div class="block-btn">
      <a href="<?php echo get_post_type_archive_link('alarmes'); ?>" class="btn"><?php _e('Toutes les alarmes', 'sdis'); ?></a>
    </div>


    <?php
    return ob_get_clean();
}
