<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Search extends Controller
{
    public function handleSubmission()
    {

        if (isset($_GET['go']) && isset($_POST['method'])) :
            if ($_POST['method'] === 'libraries') :
                $path = 'search?gcs=' . urlencode(stripslashes($_POST['value']));
                wp_redirect($path);
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

        if (isset($_POST['primo'])) :
            switch ($_POST['primo']) :
                case 'onesearch':
                    $scope = 'MyInst_and_CI';
                    $tab = 'Everything';
                    break;
                case 'ut-collections':
                    $scope = 'MyInstitution';
                    $tab = 'LibraryCatalog';
                    break;
                case 'course-reserves':
                    $scope = 'CourseReserves';
                    $tab = 'CourseReserves';
                    break;
            endswitch;
        else :
            $scope = 'MyInst_and_CI';
            $tab = 'Everything';
        endif;

        // base url for primo
        $url="https://utk.primo.exlibrisgroup.com/discovery";
        $url.="/search?vid=01UTN_KNOXVILLE:01UTK&institution=01UTK";
        $url.="&facet=rtype,exclude,reviews&facet=rtype,exclude,reference_entrys";
        $url.="&search_scope=" . $scope . '&tab=' . $tab;
        $url.="&onCampus=false&group=GUEST";

        // sanitize before passing to primo
        if (isset($_POST['value'])) {
            $value = urlencode(stripslashes($_POST['value']));
            $box = trim($value);
            $box = htmlentities($box);
            $box = stripslashes($box);
            $val = $box;
        }

        $url .= "&query=any,contains,$val";

        header("Location: $url");
        exit();
    }
}
