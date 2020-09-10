<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        if (is_page_template('template-sidebar-left.blade.php') || is_page_template('template-sidebar-right.blade.php')) {
            return [
                'siteName' => $this->siteName(),
                'class' => 'heroes die sooner',
            ];    
        }
        elseif (is_page_template('template-full-width.php')) {
            return [
                'siteName' => $this->siteName(),
                'class' => 'full',
            ];    
        }
        else return [
            'siteName' => $this->siteName(),
            'class' => 'stuff',
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }
}
