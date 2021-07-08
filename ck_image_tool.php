<?php
/*Plugin Name: Image Tool*/

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
else
    $link = "http";
    
$link .= "://";
$link .= $_SERVER['HTTP_HOST'];
$link .= $_SERVER['REQUEST_URI'];
/*if($link == site_url().'/wp-admin/'){
    ob_clean();
    $redirect = site_url().'/wp-admin/admin.php?page=custom_template_manager';
    header("Location: ".$redirect);
    exit;
}*/

if(!function_exists('add_custom_admin_bar_item')):
    add_action( 'admin_bar_menu', 'add_custom_admin_bar_item', 500 );
    function add_custom_admin_bar_item($wp_admin_bar) {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        $wp_admin_bar->add_menu(
            array(
                'id'    => 'menu-4',
                'parent' => null,
                'group'  => null,
                'title' => 'Site Name',
                'href'  => admin_url(),
                'src'   => 'https://secure.gravatar.com/avatar/9ef2d6ed0460a07f87eea5fa06d2b887?s=26&d=mm&r=g',
                'meta' => [
                    'title' => __( 'Site Name', 'textdomain' ), //This title will show on hover
                ]
            )
        );
        $wp_admin_bar->add_menu(
            array(
                'id'    => 'menu-1',
                'parent' => null,
                'group'  => null,
                'title' => 'Template Manager',
                'href'  => admin_url('admin.php?page=custom_all_template'),
                'meta' => [
                    'title' => __( 'Template Manager', 'textdomain' ), //This title will show on hover
                ]
            )
        );
        $wp_admin_bar->add_menu(
            array(
                'id'    => 'menu-2',
                'parent' => null,
                'group'  => null,
                'title' => 'Artwork Image Manager',
                'href'  => admin_url('upload.php?category_name=uncategorized&post_type=attachment'),//category_name=artwork-image-manager&
                'meta' => [
                    'title' => __( 'Artwork Image Manager', 'textdomain' ), //This title will show on hover
                ]
            )
        );
        $wp_admin_bar->add_menu(
            array(
                'id'    => 'menu-3',
                'parent' => null,
                'group'  => null,
                'title' => 'Image Creation Tool',
                'href'  => admin_url('admin.php?page=custom_image_creation_tool'),
                'meta' => [
                    'title' => __( 'Image Creation Tool', 'textdomain' ), //This title will show on hover
                ]
            )
        );
        $wp_admin_bar->add_menu(
            array(
                'id'    => 'menu-5',
                'parent' => null,
                'group'  => null,
                'title' => 'Template Categories',
                'href'  => admin_url('admin.php?page=template_category'),
                'meta' => [
                    'title' => __( 'Template Categories', 'textdomain' ), //This title will show on hover
                ]
            )
        );
        ?>
        <script>
        jQuery(document).ready(function(){
            if(jQuery(".wp-heading-inline").text() == 'Media Library'){
                jQuery(".wp-heading-inline").text('Artwork Image Manager');
            }
        })
        </script>
        <style>
        .toplevel_page_custom_all_template #contextual-help-link, #adminmenuback, .toplevel_page_custom_all_template #adminmenuwrap, .toplevel_page_custom_all_template .media-toolbar.wp-filter, .toplevel_page_custom_all_template #wpfooter, .toplevel_page_custom_all_template #wp-admin-bar-updates, .toplevel_page_custom_all_template #wp-media-grid .page-title-action,
        .toplevel_page_custom_image_creation_tool #contextual-help-link, #adminmenuback, .toplevel_page_custom_image_creation_tool #adminmenuwrap, .toplevel_page_custom_image_creation_tool .media-toolbar.wp-filter, .toplevel_page_custom_image_creation_tool #wpfooter, .toplevel_page_custom_image_creation_tool #wp-admin-bar-updates, .toplevel_page_custom_image_creation_tool #wp-media-grid .page-title-action{
            display: none !important;
        }
        .toplevel_page_custom_all_template #wpcontent, .toplevel_page_custom_all_template #wpfooter,
        .toplevel_page_custom_image_creation_tool #wpcontent, .toplevel_page_custom_image_creation_tool #wpfooter{
            margin-left: 0 !important;
        }
        </style>
        <?php
    }
endif;

add_action( 'admin_bar_menu', 'wp_admin_bar_sidebar_toggle', 1 );

function ck_product_customize_menu_page() {
    add_menu_page(
        __('Template Manager', 'custom_template_manager'),
        __('Template Manager', 'custom_template_manager'),
        'manage_options',
        'custom_template_manager',
        'ck_template_manager',
        'dashicons-cart',
        100
    );
    add_menu_page(
        __('All Template', 'custom_all_template'),
        __('All Template', 'custom_all_template'),
        'manage_options',
        'custom_all_template',
        'ck_all_template',
        'dashicons-cart',
        100
    );
    add_menu_page(
        __('Image Creation Tool', 'custom_image_creation_tool'),
        __('Image Creation Tool', 'custom_image_creation_tool'),
        'manage_options',
        'custom_image_creation_tool',
        'ck_image_creation_tool',
        'dashicons-cart',
        100
    );
    add_menu_page(
        __('Template Categories', 'template_category'),
        __('Template Categories', 'template_category'),
        'manage_options',
        'template_category',
        'ck_template_category',
        'dashicons-cart',
        100
    );
}
add_action( 'admin_menu', 'ck_product_customize_menu_page' );

function ck_template_manager(){
    include(plugin_dir_path( __FILE__ ) . "includes/template_manager.php");
}

function woocommerce_product_type_page(){
    include(plugin_dir_path( __FILE__ ) . "includes/admin/product_type.php");
}

function ck_all_template(){
    include(plugin_dir_path( __FILE__ ) . "includes/custom_all_template.php");
}

function ck_image_creation_tool(){
    include(plugin_dir_path( __FILE__ ) . "includes/image_creation_tool.php");
}

function ck_template_category(){
    include(plugin_dir_path( __FILE__ ) . "includes/template_category.php");
}
wp_enqueue_style( 'cropper', plugin_dir_url(__DIR__).'ck-image-tool/includes/css/cropper.css', false, time(), 'all' );
wp_enqueue_style( 'custom-style', plugin_dir_url(__DIR__).'ck-image-tool/includes/css/custom-style.css', false, time(), 'all' );
wp_enqueue_style( 'bootstrap-min-css', plugin_dir_url(__DIR__).'ck-image-tool/includes/css/bootstrap.min.css', false, time(), 'all' );
wp_enqueue_script( 'compress', plugin_dir_url(__DIR__).'ck-image-tool/includes/js/compress.js', false, time(), true);
wp_enqueue_script( 'script', plugin_dir_url(__DIR__).'ck-image-tool/includes/js/custom.js', array ( 'jquery' ), time(), true);
wp_enqueue_script( 'bs-script', plugin_dir_url(__DIR__).'ck-image-tool/includes/js/bootstrap.min.js', array ( 'jquery' ), time(), true);
wp_enqueue_script( 'cropper-script', 'https://unpkg.com/cropperjs/dist/cropper.js', false, time(), true);
wp_enqueue_script( 'cropper-min-script', plugin_dir_url(__DIR__).'ck-image-tool/includes/js/jquery-cropper.min.js', false, time(), true);
wp_enqueue_script( 'html2canvas', plugin_dir_url(__DIR__).'ck-image-tool/includes/js/html2canvas.min.js', false, time(), true);

include(plugin_dir_path( __FILE__ ) . "includes/functions.php");
