<?php

$routes = [

    'GET' => [

    '/' => 'HomeController@index',
    '/about'=>'HomeController@about',
    '/contact'=>'HomeController@contact',
    '/register'=>'UserController@showRegisterForm',
    '/logout'=>'UserController@logout',
    '/login'=>'UserController@showlogin',
    '/admin'=>'AdminController@dashboard',
    '/challenge'=>'ChallengeController@showchallenge',
    '/admin/users/profile'=>'UserController@showProfile',
    '/mychallenge'=>'ChallengeController@showmychallenge',
   


    ],

    'POST' => [

    '/register' => 'UserController@register', 
    '/loginUser' => 'UserController@loginUser',
    '/challenge' => 'ChallengeController@challenge',
    '/filter' => 'BookController@filter',

    ]

];


//These codes This code acts like a map, telling the system which function to call when a specific URL is visited. It's a simple way to handle navigation in an MVC web app
// $routes = [

//     '' => 'HomeController@index',
//     'about'=>'HomeController@about',
//     'contact'=>'HomeController@contact',
//     'register'=>'UserController@register',
//     'login'=>'UserController@login',
//     'admin'=>'UserController@admin',
// ];


?>

