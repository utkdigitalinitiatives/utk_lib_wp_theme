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
                self::handleOneSearch();
            endif;
        else :
            return;
        endif;

        return;
    }

    public function handleOneSearch()
    {
        // base url for primo
        $url="https://utk-almaprimo.hosted.exlibrisgroup.com/primo-explore";
        $url.="/search?vid=01UTK&institution=01UTK";
        $url.="&facet=rtype,exclude,reviews&facet=rtype,exclude,reference_entrys";
        $url.="&search_scope=OneSearch&tab=default_tab&onCampus=false&group=GUEST";

        // sanitize before passing to primo
        if (isset($_POST['value'])) {
            $box=urlencode($_POST['value']);
            $box=trim($box);
            $box=htmlentities($box);
            $box=stripslashes($box);
            $bx=$box;
        }

        $url .= "&query=any,contains,$bx";
        header("Location: $url");
        exit();
    }
}
