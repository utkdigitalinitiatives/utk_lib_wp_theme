<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Search extends Controller
{
    public function handleSubmission()
    {

        if (isset($_GET['go']) && isset($_POST['method'])) :
            if ($_POST['method'] === 'libraries') :
                wp_redirect('search?gcs=' . $_POST['value']);
            elseif ($_POST['method'] === 'onesearch') :
                print '<pre>';
                print_r ($_POST);
                print '</pre>';
            endif;
        else :
            return;
        endif;

        return;
    }
}
