<?php

class AdminController {
public $userModel;
    public function __construct(){
       $this->userModel=new User();
    }
public function dashboard() {
    $data=[
        'title'=>'dashboard',
        'message'=>'Welcome to dashboard',
    ];
   render('admin/admin_home',$data,'/layout/admin_layout');

}

function alluser() {
   

$result_set=$this->userModel->getAllusers();

foreach($result_set as $result){
    echo <<<DELIMITER
    <tr>
    <td>{$result['username']}</td>
    <td>{$result['user_type']}</td>
    <td>{$result['email']}</td>
    <td><a href="#"><button class="btn btn-danger">Delete</button></a></td>
    
  </tr>




DELIMITER;

}


}


}



?>

