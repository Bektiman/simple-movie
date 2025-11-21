<?php

namespace App\Views\Composers;

use Illuminate\Support\Facades\View;

class MenuComposers
{

    public function compose($view)
    {
        $menuItem = [
            'Home' => '/home',
            'About' => '/about',
            'Contact' => '/contact'

        ];

        // View::share('menu', $menuItem);
        $authenticated = true;

        if ($authenticated) {
            $menuItem = array_merge($menuItem, [
                'Logout' => '/logout',
                'Profile' => '/profile',
                'Dashbaord' => '/dashboard'
            ]);
        }

        $view->with('menu', $menuItem);
    }
}
