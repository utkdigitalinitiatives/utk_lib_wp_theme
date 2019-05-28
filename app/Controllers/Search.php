<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Search extends Controller
{
    public function handleSubmission()
    {

        if (isset($_GET['go'])) {
            print_r ($_POST);
        }

        return;
    }
}
