<?php


//This file will be comunicated with database


class User {

    private $table = 'user';
   public  $id;
   public  $username;
   public  $password;
   public  $email;
   public $conn;
   public $user_type;
   public $start_date;
   public $end_date;
   public $description;
   public $books;



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


public function add_challenge(){

    $query = "INSERT INTO challenges (start_date, end_date, description,books,email) VALUES (:start_date, :end_date, :description,:books,:email)";
    $stmt = $this->conn->prepare($query);

    $this->start_date = htmlspecialchars(strip_tags($this->start_date));
    $this->end_date= htmlspecialchars(strip_tags($this->end_date));
    $this->description= htmlspecialchars(strip_tags($this->description));
    $this->books= htmlspecialchars(strip_tags($this->books));
    $this->email= htmlspecialchars(strip_tags($this->email));
  
  


    $stmt->bindParam(':start_date', $this->start_date);
    $stmt->bindParam(':end_date', $this->end_date);
    $stmt->bindParam(':description',$this->description);
    $stmt->bindParam(':books',$this->books);
    $stmt->bindParam(':email',$this->email);


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
        $this->user_type = $dbUser->user_type;
        return true;

    }
    return false;
}

public function get_challenges() {
    $user_email=$_SESSION['email'];
    $query = "SELECT * FROM challeges WHERE email=$user_email";
    $stmt = $this->conn->prepare($query);
   $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function getAllusers() {
    $query = "SELECT * FROM $this->table";
    $stmt = $this->conn->prepare($query);
   $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}






}


?>