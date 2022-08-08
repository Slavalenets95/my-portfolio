<?php
/**
 * Версия стилей и скриптов
 */
define('VERSION', '1.0.0');

/**
 * Подключение стилей и скриптов
 */

function enqueue()
{
    wp_enqueue_style('style-name', get_template_directory_uri() . '/dist/app.css', array(), VERSION);
    wp_enqueue_script('script-name', get_template_directory_uri() . '/dist/app.js', array(), VERSION, true);
    wp_deregister_script('jquery');
    wp_register_script('jquery', false);
}

add_action('wp_enqueue_scripts', 'enqueue');

/**
 * Возвращает alt или title, из массива изображения acf
 */

function get_img_alt(array $img)
{
    return $img['alt'] ? $img['alt'] : $img['title'];
}

/**
 * Add theme support
 */


/**
 * Регистрация меню
 */
add_action('after_setup_theme', 'my_register_nav_menu');

function my_register_nav_menu()
{
    register_nav_menus(array(
        'header_menu' => 'Header Menu',
    ));
}

/**
 * Добавляет переменную ajaxurl
 */

add_action('wp_head', 'myplugin_ajaxurl');

function myplugin_ajaxurl()
{

    echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}

/**
 * Ajax projects
 */

add_action('wp_ajax_projects', 'ajax_projects');
add_action('wp_ajax_nopriv_projects', 'ajax_projects');

function ajax_projects()
{
    $page = !empty($_POST['page']) ? $_POST['page'] : 1;
    $page++;

    $args = array(
        'paged'          => $page,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'ASC',
        'post_type'      => 'post',
        'posts_per_page' => 5,
    );

    $query = new WP_Query($args);

    while ($query->have_posts()) : $query->the_post();
        get_template_part('templates/ajax_projects');
    endwhile;
    wp_reset_postdata();

    die;

}

/**
 * Отключает стили contact form 7
 */

add_filter( 'wpcf7_load_css', '__return_false' );
define( 'WPCF7_AUTOP', false );
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
});

