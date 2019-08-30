<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Taxonomy extends Controller
{

    public static function getTaxonomyListing($name = 'default')
    {
        return $name;
    }

}
