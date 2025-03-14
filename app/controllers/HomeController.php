<?php

class HomeController {
 
    public function index(){

$database = Database::getInstance();
$conn = $database->getConnection();
echo base_url('about');
        // echo BASE_URL;
        $data=[
            'title'=>'welcome to the home page',
            'message'=>'If you have any question , feel free to contact us',
       ];
       render('home/index',$data);
     //  render('home/index',$data);
       // render('home/index',$data,'layouts/hero_layout');
     
    }
}

?>


