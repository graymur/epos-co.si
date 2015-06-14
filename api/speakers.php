<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 14.06.2015
 * Time: 14:08
 */

$speakers = [
    [
        'name' => 'Mr. Maynard "Rink" Wheeler',
        'position' => 'Independent Consumer Goods Professional (Michigan, USA).  ',
        'image' => '/files/Wheeler.jpg',
        'content' => '
        <p>Stanford MBA 1957; Former Vice President of Operations for the Food’s Division of the Coca-Cola Company; Business consultant in CIS countries (Poland, Ukraine, Azerbaijan and Kyrgyzstan) with US State Department: 1998-2012.</p>
        <p>Specialties: International operations, organizational structure, business and marketing strategies, budget and cost control, mentoring new start-up businesses.</p>
        '
    ],
    [
        'name' => 'Dr. R. Boyd Johnson',
        'position' => 'Chair of the Doctoral Program in Organizational Leadership at Indiana Wesleyan University (Indiana, USA).',
        'image' => '/files/boyd-johnson.jpg',
        'content' => '<p>PhD in International Studies (Oxford), MA degrees in Anthropology (California State) and Theology (Fuller Seminary) and a BA in Anthropology (UCLA). Focus on international business and social sciences.</p>
        <p>Research project: “Cultural intelligence: case study of Slovenia.”</p>'
    ],
    [
        'name' => 'Dr. Gaye Bammet',
        'position' => 'Lead mediator at Dispute Resolution Center of Seattle / King County (Seattle, USA).',
        'image' => '/files/DrBammet.jpg',
        'content' => '<p>Assistant professor, University of Washington. Ph.D., Speech Communication, Southern Illinois University, (Carbondale, IL); M.A., Speech Communication California State University-Northridge.</p>
        <p>Guest lecture: “Effective communication and dispute resolution: case studies of US businesses.”</p>'
    ],
    [
        'name' => 'Mr. Prokofiev Sergey',
        'position' => 'Business Development Director, CreativePeople (Moscow, Russian Federation)',
        'image' => '/files/Prokofiev.jpg',
        'content' => '<p>Guest lecture: “Tips for start up and management of successful Creative Agency: Case study of Russia.”</p>'
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
    $retval =& $speakers;
}

header('Content-Type: application/json');
echo json_encode($retval);