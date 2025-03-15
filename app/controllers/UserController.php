<?php


class UserController {


    private $userModel;

    public function __construct(){
        $this->userModel = new User();
    }

    public function showlogin(){
        $data=[
            'title'=>'Welcome to Toki Online Library',
            'message'=>'Unlock new worlds, expand your mind, and take on the challenge—one book at a time! 📚✨ Join the reading challenge and discover the magic hidden in every page. Are you ready to turn the next chapter?"',
       ];
        render('user/login',$data,'layout/login_layout' );

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

     // Assuming $_POST contains 'email' and 'password'
    $this->userModel->email = $_POST['email'];
    $this->userModel->password = $_POST['password'];

        // Assuming you have a method to check user credentials

    if($this->userModel->login($_POST['email'],$_POST['password'])){

        $_SESSION['id'] = $this->userModel->id;
         $_SESSION['email'] = $this->userModel->email;
         
         if($this->userModel->user_type=='admin'){
                      // Redirect to the home page
         redirect('admin');

         }
         else{
                    // Redirect to the home page
         redirect('/');


         }

      
         
    }else{
           // Redirect to the login page if login fails
       redirect("login");
     }
    
    }





    public function logout (){
    

        //Unset session variables= remove the session variables from the current session.
            unset($_SESSION['id'] );
             unset($_SESSION['email']);


             //redirect the user to the login page
             redirect('login');
        
        }


}

?>