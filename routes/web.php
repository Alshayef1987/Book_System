<?php

$routes = [

    'GET' => [

    '/' => 'HomeController@index',
    '/about'=>'HomeController@about',
    '/contact'=>'HomeController@contact',
    '/register'=>'UserController@showRegisterForm',
    '/login'=>'UserController@showlogin',
    '/admin'=>'AdminController@dashboard',
    '/admin/users/profile'=>'UserController@showProfile',
   


    ],

    'POST' => [

    '/register' => 'UserController@register', 
    '/loginUser' => 'UserController@loginUser',
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

