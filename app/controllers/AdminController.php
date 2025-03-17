<?php

class AdminController {

    public function __construct(){
       
    }
public function dashboard() {
    $data=[
        'title'=>'dashboard',
        'message'=>'Welcome to dashboard',
    ];
   render('admin/admin_home',$data,'/layout/admin_layout');

}

}



?>