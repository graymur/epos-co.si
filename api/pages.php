<?php
/**
 * Created by Graymur
 * Date: 19.02.2015
 * Time: 13:00
 */

$pages = [
    'about' => [
        'title' => 'About us',
        'url' => '/about',
        'menu_id' => 1,
        'content' => file_get_contents('../html/about.html')
    ],
    'services' => [
        'title' => 'Services',
        'url' => '/services',
        'menu_id' => 1,
        'content' =>
            '<h3>Research</h3>' .
            file_get_contents('../html/services-research.html') .
            '<h3>Business consulting</h3>' .
            file_get_contents('../html/services-consulting.html') .
            '<h3>Business trainings/workshops</h3>' .
            file_get_contents('../html/services-trainings.html')
    ],
    'partnerships' => [
        'title' => 'Partnerships',
        'url' => '/partnerships',
        'menu_id' => 1,
        'content' => file_get_contents('../html/partnerships.html')
    ],
    'contacts' => [
        'title' => 'Contacts',
        'url' => '/contacts',
        'menu_id' => 1,
        'content' => file_get_contents('../html/contacts.html')
    ],
    'services/research' => [
        'title' => 'Research',
        'url' => '/services/research',
        'content' => file_get_contents('../html/services-research.html')
    ],
    'services/consulting' => [
        'title' => 'Business consulting',
        'url' => '/services/consulting',
        'content' => file_get_contents('../html/services-consulting.html')
    ],
    'services/trainings' => [
        'title' => 'Business trainings/workshops',
        'url' => '/about',
        'content' => file_get_contents('../html/services-trainings.html')
    ],
    'speakers' => [
        'title' => 'Guest Speakers',
        'url' => '/speakers',
        'menu_id' => 1,
        'content' => file_get_contents('../html/speakers.html')
    ],
];

$retval = [];

if (!empty($_REQUEST['url']))
{
    $url = @trim($_REQUEST['url'], '/');

    if (!array_key_exists($url, $pages))
    {
        throw new Exception;
    }

    $retval = $pages[$url];
}
else
{
    foreach ($pages as $url => $p)
    {
        if (empty($p['menu_id']) || $p['menu_id'] != 1) continue;

        $retval[] = [
            'url' => $p['url'],
            'title' => $p['title']
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($retval);