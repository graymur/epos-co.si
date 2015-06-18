<?php
/**
 * Created by Graymur
 * Date: 19.02.2015
 * Time: 13:00
 */

$pages = [
    'en' => [
        'about' => [
            'title' => 'About us',
            'url' => 'about',
            'menu_id' => 1,
            'content' => file_get_contents('../html/en/about.html')
        ],
        'services' => [
            'title' => 'Services',
            'url' => 'services',
            'menu_id' => 1,
            'content' =>
                '<h3>Research</h3>' .
                file_get_contents('../html/en/services-research.html') .
                '<h3>Business consulting</h3>' .
                file_get_contents('../html/en/services-consulting.html') .
                '<h3>Business trainings/workshops</h3>' .
                file_get_contents('../html/en/services-trainings.html')
        ],
        'partnerships' => [
            'title' => 'Partnerships',
            'url' => 'partnerships',
            'menu_id' => 1,
            'content' => file_get_contents('../html/en/partnerships.html')
        ],
        'contacts' => [
            'title' => 'Contacts',
            'url' => 'contacts',
            'menu_id' => 1,
            'content' => file_get_contents('../html/en/contacts.html')
        ],
        'services/research' => [
            'title' => 'Research',
            'url' => 'services/research',
            'content' => file_get_contents('../html/en/services-research.html')
        ],
        'services/consulting' => [
            'title' => 'Business consulting',
            'url' => 'services/consulting',
            'content' => file_get_contents('../html/en/services-consulting.html')
        ],
        'services/trainings' => [
            'title' => 'Business trainings/workshops',
            'url' => 'about',
            'content' => file_get_contents('../html/en/services-trainings.html')
        ],
        'speakers' => [
            'title' => 'Guest Speakers',
            'url' => 'speakers',
            'menu_id' => 1,
            'content' => file_get_contents('../html/en/speakers.html')
        ],
    ],
    'si' => [
        'about' => [
            'title' => 'About us',
            'url' => 'about',
            'menu_id' => 1,
            'content' => file_get_contents('../html/si/about.html')
        ],
        'services' => [
            'title' => 'Services',
            'url' => 'services',
            'menu_id' => 1,
            'content' =>
                '<h3>Research</h3>' .
                file_get_contents('../html/si/services-research.html') .
                '<h3>Business consulting</h3>' .
                file_get_contents('../html/si/services-consulting.html') .
                '<h3>Business trainings/workshops</h3>' .
                file_get_contents('../html/si/services-trainings.html')
        ],
        'partnerships' => [
            'title' => 'Partnerships',
            'url' => 'partnerships',
            'menu_id' => 1,
            'content' => file_get_contents('../html/si/partnerships.html')
        ],
        'contacts' => [
            'title' => 'Contacts',
            'url' => 'contacts',
            'menu_id' => 1,
            'content' => file_get_contents('../html/si/contacts.html')
        ],
        'services/research' => [
            'title' => 'Research',
            'url' => 'services/research',
            'content' => file_get_contents('../html/si/services-research.html')
        ],
        'services/consulting' => [
            'title' => 'Business consulting',
            'url' => 'services/consulting',
            'content' => file_get_contents('../html/si/services-consulting.html')
        ],
        'services/trainings' => [
            'title' => 'Business trainings/workshops',
            'url' => 'about',
            'content' => file_get_contents('../html/si/services-trainings.html')
        ],
        'speakers' => [
            'title' => 'Guest Speakers',
            'url' => 'speakers',
            'menu_id' => 1,
            'content' => file_get_contents('../html/si/speakers.html')
        ],
    ]
];

$retval = [];

$language = empty($_REQUEST['lang']) ? 'en' : $_REQUEST['lang'];

try
{
    if (!array_key_exists($language, $pages))
    {
//        throw new Exception('Wrong language');
        throw new Exception404('Wrong language');
    }

    if (!empty($_REQUEST['url']))
    {
        $url = preg_replace("#^{$language}/#", '', $_REQUEST['url']);
        $url = @trim($url, '/');

//        echo ($url);

        if (!array_key_exists($url, $pages[$language]))
        {
            throw new Exception404('Page not found');
        }

        $retval = $pages[$language][$url];
    }
    else
    {
        foreach ($pages[$language] as $url => $p)
        {
            if (empty($p['menu_id']) || $p['menu_id'] != 1)
            {
                continue;
            }

            $retval[] = [
                'url' => $p['url'],
                'title' => $p['title']
            ];
        }
    }

    header('Content-Type: application/json');
    echo json_encode($retval);
}
catch (Exception404 $e)
{
    header("HTTP/1.0 404 Not found");
}
catch (Exception $e)
{
    header("HTTP/1.0 500 Internal server error");
}

class Exception404 extends Exception {};