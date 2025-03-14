<?php


//This file will be comunicated with database


class User {

    private $table = 'user';
   public  $id;
   public  $username;
   public  $password;
   public  $email;
   public $conn;


    public function __construct(){
        
        $this->conn = Database::getInstance()-> getConnection();
}

public function store(){

    $query = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $this->conn->prepare($query);
    $this->username = htmlspecialchars(strip_tags($this->email));
    $this->email = htmlspecialchars(strip_tags($this->username));
    $hashedPassword = password_hash($this->password, algo: PASSWORD_BCRYPT);


    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password', $hashedPassword);


    if($stmt->execute()){

    return true;

}

return false;
}

public function login($email, $password) {

    $query = "SELECT * FROM $this->table WHERE email = :email";
    $stmt = $this->conn->prepare($query);
    $this->email = sanitize($this->email);



    $stmt->bindParam(':email', $this->email);


    $stmt->execute();
    $dbUser = $stmt->fetch(PDO::FETCH_OBJ);

    if ($dbUser && password_verify($this->password, $dbUser->password)){

        $this->id = $dbUser->id;
        $this->username = $dbUser->username;
        return true;

    }
    return false;
}



}


?>