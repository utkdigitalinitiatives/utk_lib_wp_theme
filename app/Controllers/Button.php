<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Button extends Controller
{
    public function buildButton($linkFields, $containerStyle)
    {

        /*
         * build url
         */

        if ($linkFields['link_type'] === 'page') {
            $url = $linkFields['link_page'];
        } elseif ($linkFields['link_type'] === 'url') {
            $url = $linkFields['link_url'];
        }

        /*
         * build base button classes with consideration to container
         */

        $classes = [
            'btn'
        ];

        if ($containerStyle === 'default') {
            array_push($classes, 'btn-default');
        } elseif ($containerStyle === 'smokey') {
            array_push($classes, 'btn-secondary btn-inverse');
        } elseif ($containerStyle === 'globe') {
            array_push($classes, 'btn-default btn-inverse');
        }

        /*
         * append additional classes for non-standard buttons
         */

        if ($linkFields['link_button_style'] === 'solid_icon') {
            array_push($classes, 'btn-with-icon');
            $button['has_icon'] = true;
        } elseif ($linkFields['link_button_style'] === 'bordered') {
            array_push($classes, 'btn-outline');
        }

        /*
         * put it all together
         */

        $button['type'] = $linkFields['link_type'];
        $button['url'] = $url;
        $button['text'] = $linkFields['link_button_text'];
        $button['classes'] = implode(' ', $classes);

        /*
         * ship it
         */

        return $button;
    }
}
