<?php



class Database {
private static $instance = null;
private $connection;


public function __construct(){
    $config=require base_path('config/config.php');
    ///create var to hold the value arrey of the database

   
    $host = config('database.host');
    $dbname = config('database.database');
    $username = config('database.username');
    $password = config('database.password');
    $port =config('database.port');
   
   

$dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

try {

$this->connection = new PDO($dsn, $username, $password);
$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}

catch (PDOException $e)

   {

    die("Database failed" . $e->getMessage());
   }
}


public static function getInstance() {
    if(self::$instance==null){
        self::$instance=new Database();
    }

    return self::$instance;

}

public function getConnection(){
    return $this->connection;
}

//////CLASS END HERE
}



?>