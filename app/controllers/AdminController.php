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



//////////////////////////////////user////////
public function adduser(){

    $user= new User();
    $user-> username = $_POST['username'];
    $user-> email = $_POST['email'];
    $user-> password = $_POST['password'];


    if($user->store()){

        redirect(path: 'admin');

    }else{
        echo "There was an error";
    }

}

public function showuser(){
    $data=[
        'title'=>'Add User',
        'message'=>'',
   ];
    render('admin/add_user',$data,'layout/login_layout' );

}
////////////////////////////////////////////////

public function addbook(){

    $books= new Book();
    $books-> name = $_POST['name'];
    $books-> summary = $_POST['summary'];
    $books-> author = $_POST['author'];
    $books-> genre = $_POST['genre'];
    $books-> rating = $_POST['rating'];
    $books-> image_url = $_POST['image_url'];


    if($books->store()){

        redirect(path: 'admin');

    }else{
        echo "There was an error";
    }

}

public function showbook(){
    $data=[
        'title'=>'Add Book',
        'message'=>'',
   ];
    render('admin/add_book',$data,'layout/login_layout' );

}


}



?>

