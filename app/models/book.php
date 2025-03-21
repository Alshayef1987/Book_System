<?php

class Book {
    private $table = 'books';
    public $id;
    public $name;
    public $summary;
    public $author;
    public $genre;
    public $rating;
    public $image_url;
    public $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAllBooks() {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($query);
       $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllBooks_name() {
        $query = "SELECT `name` FROM $this->table";
        $stmt = $this->conn->prepare($query);
       $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //////////////////////////////////////////////////////////

    public function getBookBygenre($genre) {
        $query = "SELECT * FROM $this->table WHERE genre = :genre";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':genre', $genre);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

    
    
    
    
    
    
    
    
    ////////////////////////////////////////////////

    public function store() {
        $query = "INSERT INTO $this->table (name, summary, author, genre, rating, image_url) VALUES (:name, :summary, :author, :genre, :rating, :image_url)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':summary', $this->summary);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':genre', $this->genre);
        $stmt->bindParam(':rating', $this->rating);
        $stmt->bindParam(':image_url', $this->image_url);
        
        return $stmt->execute();
    }


    
}

?>
