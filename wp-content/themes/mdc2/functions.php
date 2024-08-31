<?php

function nekonet_setup()
{
    /*
    * Make theme available for translation.
    */
    load_theme_textdomain('nekonet', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * This theme does not use a hard-coded <title> tag in the document head,
     * WordPress will provide it for us.
     */
    add_theme_support('title-tag');

    /**
     * Add post-formats support.
     */
    add_theme_support(
        'post-formats',
        array(
            'link',
            'aside',
            'gallery',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat',
        )
    );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1568, 9999);

    register_nav_menus(
        array(
            'primary' => esc_html__('Header menu', 'nekonet'),
            'footer' => esc_html__('Footer menu', 'nekonet'),
        )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets',
        )
    );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    $logo_width = 300;
    $logo_height = 100;

    add_theme_support(
        'custom-logo',
        array(
            'height' => $logo_height,
            'width' => $logo_width,
            'flex-width' => true,
            'flex-height' => true,
            'unlink-homepage-logo' => true,
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for Block Styles.
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for Woocommerce
    if (class_exists('woocommerce')) {
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }

}

add_action('after_setup_theme', 'nekonet_setup');

function nekonet_widgets_init()
{

    register_sidebar(
        array(
            'name' => esc_html__('Footer', 'nekonet'),
            'id' => 'sidebar-footer',
            'description' => esc_html__('Add widgets here to appear in your footer.', 'nekonet'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name' => esc_html__('Sidebar social', 'nekonet'),
            'id' => 'sidebar-social',
            'description' => esc_html__('Add widgets here to appear in sidebar social.', 'nekonet'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name' => esc_html__('Primary Sidebar', 'nekonet'),
            'id' => 'primary-sidebar',
            'description' => esc_html__('Add widgets here to appear in sidebar on pages.', 'nekonet'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name' => esc_html__('Blog Sidebar', 'nekonet'),
            'id' => 'blog-sidebar',
            'description' => esc_html__('Add widgets here to appear in sidebar on blog pages.', 'nekonet'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name' => esc_html__('Woocommerce Sidebar', 'nekonet'),
            'id' => 'woocommerce-sidebar',
            'description' => esc_html__('Add widgets here to appear in sidebar on Woocommerce pages.', 'nekonet'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );

}

add_action('widgets_init', 'nekonet_widgets_init');

/*
*jQuery init in footer
*/

function include_jQuery()
{
    if (!is_admin()) {
//        wp_enqueue_script('jquery');
//
//        wp_deregister_script('jquery');
//        wp_register_script('jquery', false);

//        wp_scripts()->add_data( 'jquery', 'group', 1 );
//        wp_scripts()->add_data( 'jquery-core', 'group', 1 );
//        wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

        wp_dequeue_script('jquery');
        wp_dequeue_script('jquery-core');
        wp_dequeue_script('jquery-migrate');
        wp_enqueue_script('jquery', false, array(), false, false);
        wp_enqueue_script('jquery-core', false, array(), false, false);
        wp_enqueue_script('jquery-migrate', false, array(), false, false);


    }
}
add_action( 'wp_enqueue_scripts', 'include_jQuery' );
//add_action('init', 'include_jQuery');

/*
*FontAwesome 5.15.2 import
*/

function wpb_load_fa()
{

    wp_enqueue_style('wpb-fa', get_stylesheet_directory_uri() . '/fonts/fontawesome/css/all.css');

}

//add_action('wp_enqueue_scripts', 'wpb_load_fa');

/*
*Fontello import
*/

function fontello_load()
{

    wp_enqueue_style('fontello', get_stylesheet_directory_uri() . '/fonts/fontello/css/fontello.css');

}

//add_action('init', 'fontello_load');
add_action('get_footer', 'fontello_load');

/*
*GSAP init js animation library
*/

function gsap_load()
{

    wp_enqueue_script('gsap', get_stylesheet_directory_uri() . '/inc/gsap-public/minified/gsap.min.js', '', '', true);

}

add_action('wp_enqueue_scripts', 'gsap_load');

/*
 * add custom template scripts
 */

function scriptsLoad() {
    wp_enqueue_script('template-scripts', get_stylesheet_directory_uri() . '/scripts/script.js', '', '', true);
}

add_action('wp_enqueue_scripts', 'scriptsLoad');

/*
*Add sidebar name, as class, on the body
*/

add_filter('body_class', 'init_add_sidebar_classes_to_body');
function init_add_sidebar_classes_to_body($classes = '')
{

    if (class_exists('woocommerce')) {
        if (
            (
                is_active_sidebar('primary-sidebar') && (
                    !is_front_page()
                    && is_page()
                    && !is_woocommerce()
                    && !is_cart()
                    && !is_account_page()
                    && !is_checkout()
                )
            ) ||
            (
                is_active_sidebar('woocommerce-sidebar') && (
                    is_woocommerce()
                    && !is_product()
                )
            ) ||
            (
                is_active_sidebar('blog-sidebar') && (
                    is_archive()
                    && !is_woocommerce()
                    && !is_product()
                    || is_single()
                    && !is_woocommerce()
                    && !is_product()
                )
            )
        ) {
            $classes[] = 'has-sidebar';
        }
        return $classes;
    } else {

        if (
            (
                is_active_sidebar('primary-sidebar') && (
                    !is_front_page()
                    && is_page()
                )
            ) ||
            (
                is_active_sidebar('blog-sidebar') && (
                    is_archive()
                    || is_single()
                )
            )
        ) {
            $classes[] = 'has-sidebar';
        }
        return $classes;
    }


}

/*
 * Remove gutenberg styles
 */


//Remove Gutenberg Block Library CSS from loading on the frontend
function remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
}

add_action('wp_enqueue_scripts', 'remove_wp_block_library_css', 100);

/**
 * BLOG LOOP SHORTCODE
 */

 function blog_loop_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'type' => 'post',
        'perpage' => 3
    ), $atts ) );

    $output = '<div class="blog-loop">';
    $args = array(
        'post_type' => $type,
        'posts_per_page' => $perpage,
        'sort_column'   => 'menu_order'
    );
    $query = new  WP_Query( $args );
    while ( $query->have_posts() ) : $query->the_post();

        $tags = get_the_category();
        $tag_list = '';
        if ($tags) {
            foreach ($tags as $tag) {
                $category_link = get_category_link($tag->term_id);
                $tag_list .= '<div class="tag"><a href="' . esc_url($category_link) . '">#' . $tag->name . '</a></div>';
            }
        }

        $excerpt = get_field('skrocony_opis');

        $output .= '<div class="blog-loop-wrapper">'.
                    get_the_post_thumbnail('','team_thumbnail').
                    '<div class="blog-loop-content">'.
                    '<div class="blog-loop-tags">' . trim($tag_list) . '</div>'.
                    '<p class="blog-loop-date">'.get_the_date('d M Y').'</p>'.
                    //'<h3>' . get_the_title() . '</h3>'.
                    // '<p class="blog-loop-excerpt">'. get_the_excerpt().'</p>'.
                    '<p class="blog-loop-excerpt">'. $excerpt .'</p>'.
                    '<a class="btn outline small icon-right" href="'.
                    get_permalink().
                    '">' . __('Więcej', 'nekonet') . '</a></div>'.
                    '</div>';
    endwhile;
    wp_reset_query();
    $output .= '</div>';
    return $output;
}
add_shortcode('blogloop', 'blog_loop_shortcode');

/**
 * REGISTER TAXONOMY "Team categories"
 */

 function wp_team_tax() {
    $labels_tax = array(
        'name' => _x('Team categories', 'taxonomy general name'),
        'singular_name' => _x('Team category', 'taxonomy singular name'),
        'search_items' => ('Search for a team category'),
        'popular_items' => ('Popular team category'),
        'all_items' => ('All team categories'),
        'parent_item' => null, 
        'parent_item_colon' => null, 
        'edit_item' => ('Edit the team category'),
        'update_item' => ('Update your team category'),
        'add_new_item' => ('Add a new team category' ),
        'new_item_name' => ('The name of the new team category' ),
        'separate_items_with_commas' => ('Separate the team categories with commas'),
        'add_or_remove_items' => ('Add or remove a team category'),
        'choose_from_most_used' => ('Choose from the most frequently used'),
        'menu_name' => _('Team categories'),
        'not_found' => _( 'No team found'),
    );

    register_taxonomy('team-cat',array('teams'),array(
        'hierarchical' => false,
        'labels' => $labels_tax,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'team-cat'),
    ));
}
add_action( 'init', 'wp_team_tax', 0 );

/**
 * REGISTER POST TYPE "Team"
 */

 function create_team_post_type() {
    /*
     * The $labels describes how the post type appears.
     */
    $labels = array(
        'name'          => 'Teams', // Plural name
        'singular_name' => 'Team'   // Singular name
    );

    /*
     * The $supports parameter describes what the post type supports
     */
    $supports = array(
        'title',        // Post title
        'editor',       // Post content
        'excerpt',      // Allows short description
        'author',       // Allows showing and choosing author
        'thumbnail',    // Allows feature images
        'comments',     // Enables comments
        'trackbacks',   // Supports trackbacks
        'revisions',    // Shows autosaved version of the posts
        'custom-fields' // Supports by custom fields
    );

    /*
     * The $args parameter holds important parameters for the custom post type
     */
    $args = array(
        'labels'              => $labels,
        'description'         => 'Post type - Team', // Description
        'supports'            => $supports,
        'taxonomies'          => array( 'team-cat'), // Allowed taxonomies
        'hierarchical'        => false, // Allows hierarchical categorization, if set to false, the Custom Post Type will behave like Post, else it will behave like Page
        'public'              => true,  // Makes the post type public
        'show_ui'             => true,  // Displays an interface for this post type
        'show_in_menu'        => true,  // Displays in the Admin Menu (the left panel)
        'show_in_nav_menus'   => true,  // Displays in Appearance -> Menus
        'show_in_admin_bar'   => true,  // Displays in the black admin bar
        'menu_position'       => 5,     // The position number in the left menu
        'menu_icon'           => 'dashicons-groups',  // The URL for the icon used for this post type
        'can_export'          => true,  // Allows content export using Tools -> Export
        'has_archive'         => true,  // Enables post type archive (by month, date, or year)
        'exclude_from_search' => false, // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
        'publicly_queryable'  => true,  // Allows queries to be performed on the front-end part if set to true
        'capability_type'     => 'post' // Allows read, edit, delete like “Post”
    );

    register_post_type('team', $args); //Create a post type with the slug is team and arguments in $args.
}
add_action('init', 'create_team_post_type');

/**
 * REGISTER TAXONOMY "Warehouse categories"
 */

 function wp_warehouse_tax() {
    $labels_tax = array(
        'name' => _x('Warehouse categories', 'taxonomy general name'),
        'singular_name' => _x('Warehouse category', 'taxonomy singular name'),
        'search_items' => ('Search for a warehouse category'),
        'popular_items' => ('Popular warehouse category'),
        'all_items' => ('All warehouse categories'),
        'parent_item' => null, 
        'parent_item_colon' => null, 
        'edit_item' => ('Edit the warehouse category'),
        'update_item' => ('Update your warehouse category'),
        'add_new_item' => ('Add a new warehouse category' ),
        'new_item_name' => ('The name of the new warehouse category' ),
        'separate_items_with_commas' => ('Separate the warehouse categories with commas'),
        'add_or_remove_items' => ('Add or remove a warehouse category'),
        'choose_from_most_used' => ('Choose from the most frequently used'),
        'menu_name' => _('Warehouse categories'),
        'not_found' => _( 'No warehouse found'),
    );

    register_taxonomy('warehouse-cat', array('warehouses'), array(
        'hierarchical' => false,
        'labels' => $labels_tax,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'warehouse-cat'),
    ));
}
add_action('init', 'wp_warehouse_tax', 0);

/**
 * REGISTER POST TYPE "Warehouse"
 */

function create_warehouse_post_type() {
    /*
     * The $labels describes how the post type appears.
     */
    $labels = array(
        'name'          => 'Warehouses', // Plural name
        'singular_name' => 'Warehouse'   // Singular name
    );

    /*
     * The $supports parameter describes what the post type supports
     */
    $supports = array(
        'title',        // Post title
        'editor',       // Post content
        'excerpt',      // Allows short description
        'author',       // Allows showing and choosing author
        'thumbnail',    // Allows feature images
        'comments',     // Enables comments
        'trackbacks',   // Supports trackbacks
        'revisions',    // Shows autosaved version of the posts
        'custom-fields' // Supports by custom fields
    );

    /*
     * The $args parameter holds important parameters for the custom post type
     */
    $args = array(
        'labels'              => $labels,
        'description'         => 'Post type - Warehouse', // Description
        'supports'            => $supports,
        'taxonomies'          => array('warehouse-cat'), // Allowed taxonomies
        'hierarchical'        => false, // Allows hierarchical categorization, if set to false, the Custom Post Type will behave like Post, else it will behave like Page
        'public'              => true,  // Makes the post type public
        'show_ui'             => true,  // Displays an interface for this post type
        'show_in_menu'        => true,  // Displays in the Admin Menu (the left panel)
        'show_in_nav_menus'   => true,  // Displays in Appearance -> Menus
        'show_in_admin_bar'   => true,  // Displays in the black admin bar
        'menu_position'       => 5,     // The position number in the left menu
        'menu_icon'           => 'dashicons-store', // The URL for the icon used for this post type
        'can_export'          => true,  // Allows content export using Tools -> Export
        'has_archive'         => true,  // Enables post type archive (by month, date, or year)
        'exclude_from_search' => false, // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
        'publicly_queryable'  => true,  // Allows queries to be performed on the front-end part if set to true
        'capability_type'     => 'post' // Allows read, edit, delete like “Post”
    );

    register_post_type('warehouse', $args); // Create a post type with the slug 'warehouse' and arguments in $args.
}
add_action('init', 'create_warehouse_post_type');

/**
 * GET WAREHOUSE
 */

 function get_warehouses($data = null) {
    $params = [
        'post_type' => 'warehouse',
        'meta_key' => 'options1',
        'posts_per_page' => -1
    ];

    if(!empty($data['location'])) {
        $params['tax_query'] = [
            [
                'taxonomy' => 'warehouse-cat',
                'field' => 'term_id',
                'terms' => $data['location']
            ]
        ];
    }

    if(!empty($data['size'])) {
        $params['meta_query'] = [
            [
                'key' => 'options1',
            ],
            [
                'key' => 'options1',
                'value' => $data['size'],
                'compare' => '>=',
                'type' => 'NUMERIC'
            ]
        ];
    }

    $warehouse = get_posts(
        $params
    );

    if(!$warehouse) {
        return null;
    }

    foreach($warehouse as $estate) {
        $terms = wp_get_post_terms($estate->ID, 'warehouse-cat');
        if(!empty($terms)) {
            $estate->location_term = $terms[0];
        }
    }

    return $warehouse;
}

/**
 * ADD CUSTOM SIZES
 */

 function custom_image_sizes() {
    // Add new image sizes
    add_image_size('team_thumbnail', 320, 320, true); // Crop to 320x320px
    add_image_size('warehouse_thumbnail', 430, 430, true); // Crop to 430x430px
}

// Register the new image sizes
add_action('after_setup_theme', 'custom_image_sizes');

// Optionally: Add new image sizes to the list available in the admin panel
function custom_sizes($sizes) {
    return array_merge($sizes, array(
        'team_thumbnail' => __('Team Thumbnail'),
        'warehouse_thumbnail' => __('Warehouse Thumbnail'),
    ));
}
add_filter('image_size_names_choose', 'custom_sizes');

/**
 * PAGINATION BAR
 */


 function pagination_bar() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => '<i class="icon-angle-left"></i>',
            'next_text'    => '<i class="icon-angle-right"></i>'
            // 'prev_text'    => '<i class="icon-arrow-long"></i>',
            // 'next_text'    => '<i class="icon-arrow-long rotate180"></i>'
        ));
    }
}

// Function to set the custom excerpt length to 100 characters
function custom_excerpt($content, $length = 100) {
    if (strlen($content) <= $length) {
        return $content;
    } else {
        return substr($content, 0, $length) . '...';
    }
}

// Filter to replace the default excerpt trimming function
function custom_wp_trim_excerpt($text) {
    global $post;
    if ( '' == $text ) {
        $text = get_the_content('');
        $text = strip_shortcodes( $text );
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]&gt;', $text);
        $text = wp_trim_words($text, 55, ''); // Default trimming to 55 words
        $text = custom_excerpt($text, 100); // Trim to 100 characters
    }
    return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');

// Function to set the custom excerpt length in words (default functionality)
function custom_excerpt_length( $length ) {
    return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Function to change the default excerpt more string
function custom_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

/**
 * DOWNLOAD DOC AFTER CONTACT FORM SUBMIT
 */

//  function redirect_to_pdf_after_form_submission($contact_form) {
//     // Check if the submitted form ID matches the desired form ID (1647)
//     if ($contact_form->id == 1647) { //Formularz mini
//         // Get the PDF file URL from the ACF field named 'plik_pdf'
//         global $post;
//         $pdf_url = get_field( "plik_pdf", $post->ID );

//         // If the PDF URL is set, redirect the user to that URL
//         if ($pdf_url) {
//             echo "<script type='text/javascript'>
//                     window.location.href = '{$pdf_url}';
//                   </script>";
//         }
//     }
// }

// // Hook the function to 'wpcf7_mail_sent' to trigger after the form is submitted
// add_action('wpcf7_mail_sent', 'redirect_to_pdf_after_form_submission');

/**
 * CUSTOM POST TYPES MENU CLASS
 */

 function modify_menu_classes_for_custom_post_types( $classes, $item ) {
    // Check if we are on a custom post type 'warehouse' or 'team'
    if ( is_singular( 'warehouse' ) || is_singular( 'team' ) ) {
        // Remove 'current_page_parent' class from all menu items
        $classes = array_diff( $classes, array( 'current_page_parent' ) );

        // Define parent page ID for each custom post type
        $parent_page_id = 0;

        if ( is_singular( 'warehouse' ) ) {
            $parent_page_id = 16; // 'Magazyny do wynajęcia' page ID
        } elseif ( is_singular( 'team' ) ) {
            $parent_page_id = 20; // 'Zespół' page ID
        }

        // Add 'current-menu-item' class only to the correct parent item
        if ( $item->object_id == $parent_page_id ) {
            $classes[] = 'current-menu-item';
        } else {
            // Remove 'current-menu-item' class from other items
            $classes = array_diff( $classes, array( 'current-menu-item' ) );
        }
    }

    return $classes;
}

// Apply the filter to modify the CSS classes of menu items
add_filter('nav_menu_css_class', 'modify_menu_classes_for_custom_post_types', 100, 2);
add_filter('page_css_class', 'modify_menu_classes_for_custom_post_types', 100, 2);


/**
 * MODIFY ARCHIVE TITLE
 */

 function modify_archive_title($title) {
    // Check if we are on a category archive page
    if (is_category()) {
        // Remove 'Kategoria: ' prefix from the archive title
        $title = single_cat_title('', false);
    }

    return $title;
}

// Apply the filter to modify the archive title
add_filter('get_the_archive_title', 'modify_archive_title');
