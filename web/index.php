<?php
/**
 * Created by PhpStorm.
 * User: Tibox
 * Date: 22/11/2014
 * Time: 16:08
 *
 *
 */

// web/index.php
require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

require __DIR__ . '/../app/conf/dev.php';
//require __DIR__.'/../app/app.php';
require __DIR__ . '/../app/routes.php';

// ... definitions
use Silex\Application;

// login


/*$blogPosts = [
    1 => [
        'date'   => '2011-03-29',
        'author' => 'igorw',
        'title'  => 'Using Silex',
        'body'   => '...',
    ],
    2 => [
        'date'   => '2011-03-30',
        'author' => 'manu',
        'title'  => 'testing Silex',
        'body'   => '... blabla',
    ],
];

//static routing
$app->get('/blog', function () use ($blogPosts) {
    $output = '';
    foreach ($blogPosts as $post) {
        $output .= $post['title'];
        $output .= ' - ';
        $output .= $post['date'];
        $output .= '<br />';
    }

    return $output;
});

// dynamic routing
$app->get('/blog/{id}', function (Silex\Application $app, $id) use ($blogPosts) {
    if (!isset($blogPosts[ $id ])) {
        $app->abort(404, "Post $id does not exist.");
    }

    $post = $blogPosts[ $id ];

    return "<h1>{$post['title']}</h1>" .
    "<p>{$post['body']}</p>";
});*/


$app->run();