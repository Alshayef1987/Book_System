<?php


// BASE URL 

function base_url ($path = '') {

 

    //https:// or http://

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== '0ff' )
    || $_SERVER['SERVER_PORT'] == 443 ? "https://" : "http://";


    //edwindiaz.com/

    $host = $_SERVER['HTTP_HOST'];


    // blog

    $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    
    return $protocol . $host . $base  . ltrim($path, '/');
    
}

function redirect ($path = '' , $queryParams=[]){


    $url = base_url($path);

    if(!empty($queryParams)){
        
    $url .= "?" . http_build_query($queryParams);

}
header ("Location: " . $url);
exit();

}



function render($view, $data = [],$layout='layout') {

extract($data);
ob_start();
require views_path($view . '.php');

$content = ob_get_clean();

require views_path($layout.".php");



}



function base_path($path=''){
    return realpath(__DIR__.'/../'.'/'.ltrim($path,'/'));
    
}
function views_path($path=''){
    return base_path('app/views/'.ltrim($path,''));
    
}



//today

function config($key){

    $config=require base_path('config/config.php');
    //var_dump($config);
    $key=explode('.',$key);
    //var_dump($key);
    
    $value=$config;
    
    foreach ($key as $k){
    
    if(!isset($value[$k])){
        throw new Exception("config key '{$k}' not found");
    }
    
    $value=$value[$k];
    
    }
    
    return $value;
    
    }

    function sanitize($value){
        return htmlspecialchars(strip_tags($value));
    }






?>