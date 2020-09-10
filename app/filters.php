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
 * Pass data to page templates or all views
 * 
 * Sage includes a sage/template/{$class}/data filter that can be used to pass data to templates. 
 * This is the most simple way to pass data. The filter is based of body classes and can be used to target 
 * specific templates, for example: sage/template/home/data — Home page or sage/templae/page/data for all page templates
 * 
 * NB View Composer can be used for this and any view in general as well. The $class can be used for loading from view composer and 
 * $classes['main'] to load main from Sage data action using share for all views. Both are possible. 
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
 * Sage Share data in all views
 * 
 * Using view share to make the sharing cross views possible
 * Won't work currently with another variable preceding it
 * Used here for adding classes to main layout.
 * 
 * use {{ $classes['main'] }}
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