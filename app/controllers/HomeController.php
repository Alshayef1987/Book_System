<?php

class HomeController {
    public function index(){
//echo  $_SESSION['id'];
if(!isset( $_SESSION['id'])){
  redirect("login");
}
$database = Database::getInstance();
$conn = $database->getConnection();
        // echo BASE_URL;
        $data=[
            'title'=>'Welcome to Toki Online Library',
            'message'=>'Unlock new worlds, expand your mind, and take on the challenge—one book at a time! 📚✨ Join the reading challenge and discover the magic hidden in every page. Are you ready to turn the next chapter?"',
       ];
       render('home/index',$data);
     //  render('home/index',$data);
       // render('home/index',$data,'layouts/hero_layout');
     
    }
}

?>


