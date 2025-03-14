<?php


class UserController {


    private $userModel;

    public function __construct(){
        $this->userModel = new User();
    }

    public function showlogin(){
        $data=[
            'title'=>'Login here',
            'message'=>'You can login here',
        ];
        render('user/login',$data);

    }
    public function showProfile(){
        $data=[
            'title'=>'Profile',
        ];
        render('admin/users/profile',$data);

    }

    public function admin(){
        $data=[
            'title'=>'this is for admin',
            'message'=>'Welcome to admin',
        ];
        render('home/admin',$data,'layouts/home_layout');

    }

    public function showRegisterForm(){

        //echo "dsfgdsfgdsgfdsfgdsfgdsfgdsfgdsfgdsfgdfg";
        $data=[
            'title'=>'Register here',
            'message'=>'You can register here',
        ];
        render('user/register',$data);

    }


    public function register(){

        $user= new User();
        $user-> username = $_POST['username'];
        $user-> email = $_POST['email'];
        $user-> password = $_POST['password'];


        if($user->store()){

            redirect(path: '/');

        }else{
            echo "There was an error";
        }


    }

    public function loginUser (){

    
    $this->userModel->email = $_POST['email'];
    $this->userModel->password = $_POST['password'];

    if($this->userModel->login($_POST['email'],$_POST['password'])){

        $_SESSION['id'] = $this->userModel->id;
         $_SESSION['email'] = $this->userModel->email;
         redirect('/');
    }else{
         echo "There was an error";
     }
    
    }



}

?>