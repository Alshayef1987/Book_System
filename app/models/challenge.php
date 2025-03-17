<?php

class challenge {
    private $table = 'challenges';
    public $id;
    public $books;
    public $start_date;
    public $end_date;
    public $email;
    public $rating;
    public $image_url;
    public $conn;
    

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function get_my_challenge() {
        $myemail=$_SESSION['email'];
        $query = "SELECT * FROM $this->table WHERE email ='{$myemail}'";
        $stmt = $this->conn->prepare($query);
       $stmt->execute();
      
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

 
}

?>
