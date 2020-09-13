<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Body Class Filter 
 * 
 * Allows adding of classes to body tag
 * 
 * WordPress offers filter hooks to allow plugins to modify various types of internal 
 * data at runtime.
 * @param mixed $classes
 * 
 */
add_filter('body_class', __NAMESPACE__ . '\\body_class');

function body_class($classes) {
    
    // Add class if it is sidebar left layout
  if (is_page_template('template-sidebar-left.blade.php')) {

      $classes[] = 'archive';

  } else {
    $classes[] = 'leading-normal tracking-normal text-white gradient';
  }

  return $classes;
}

/**
 * Pass data to page templates or all views
 * 
 * Sage includes a sage/template/{$class}/data filter that can be used to pass data to templates. 
 * The filter is based of body classes and can be used to target specific templates, for example: 
 * sage/template/home/data — Home page or sage/templae/page/data for all page templates
 * 
 * View Composers can also be used for this and any view in general as well. The $class can be used for 
 * loading from view composer and $classes['main'] to load main from Sage data action using share for all views.
 * Also see https://roots.io/working-with-composers-in-sage-10/ 
 * 
 * Example focussed on page templates:
 * 
 * add_filter('sage/template/page/data', function (array $data) { 
 *     $data['main_class'] = 'data';
 *     return $data;
 * });
 * 
 */

/**
 * Sections, Container, Main and Sidebar Classes 
 * 
 * Tailwind utitly classes added to main classes in app layout. The Root Sage share 
 * data function can be used in all views
 * 
 * example: use {{ $classes['main'] }} in view to load classes attached to main
 */
add_action('the_post', function() { 
    // left sidebar with row reverse for sidebar positioning 
    // https://tailwindcss.com/components/flexbox-grids#column-order
    if (is_page_template('template-sidebar-left.blade.php')) {
        \Roots\view()->share('classes', [
        'container' => 'max-w-5xl mx-auto m-8',
        'reverse' => 'md:flex-row-reverse',
        'main' => 'w-full md:w-3/4 p-6 mt-6',
        'sidebar' => 'w-full md:w-1/4 p-6 flex flex-col flex-grow flex-shrink' 
        ]);
        }
    // right sidebar without reverse class
    elseif (is_page_template('template-sidebar-right.blade.php')) {
        \Roots\view()->share('classes', [
        'container' => 'max-w-5xl mx-auto m-8',
        // 'reverse' => '',
        'main' => 'w-full md:w-3/4 p-6 mt-6',
        'sidebar' => 'w-full md:w-1/4 p-6 flex flex-col flex-grow flex-shrink' 
        ]);
        }
    /* more page conditionals to be added */
    // landing page or frontpage
    // blog index
    // blog single
    // regular page without sidebar
    else {
        \Roots\view()->share('classes', [
        'container' => 'max-w-5xl mx-auto m-8',
        // 'reverse' => '',
        'main' => 'w-full p-6 mt-6'
        // 'sidebar' => 'w-full md:w-1/4 p-6 flex flex-col flex-grow flex-shrink' 
        ]);
        };
});

/**
 * ACF Path Filter
 * 
 * Customize Advanced Custome Fields path
 * 
 * @link https://www.advancedcustomfields.com/resources/acf-settings/
 * @param string $path
 * 
 */ 
add_filter('acf/settings/path', __NAMESPACE__. '\my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/acf/';
    
    // return
    return $path;
    
}

/**
 * ACF Directory Filter
 * 
 * Customize Advanced Custome Fields directory
 * 
 * @link https://www.advancedcustomfields.com/resources/acf-settings/
 * @param string $dir
 */ 
add_filter('acf/settings/dir', __NAMESPACE__ . '\my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';
    
    // return
    return $dir;
    
}

// Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');

/**
 * Include ACF Filer
 * 
 * Include Advanced Custom Fields plugin located in our Sage theme
 * 
 */
include_once( get_stylesheet_directory() . '/acf/acf.php' );
