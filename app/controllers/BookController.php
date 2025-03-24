<?php
class BookController {

    private $bookModel;
    public $genre;

    public function __construct() {
        $this->bookModel = new Book();
    }

    public function get_all_books() {
        $result_set = $this->bookModel->getAllBooks();

        // Start of Bootstrap Container and Row
        //echo '<div class="container">';
       // echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">';

        // Loop through books and display each one as a card
        foreach ($result_set as $result) {
            $path=base_url('challenge');
            echo <<<DELIMITER
                <div class="col my-3">
                    <div class="card" style="width: 18rem;">
                        <img src="/bimage/{$result['image_url']}" class="card-img-top" alt="Book Image">
                        <div class="card-body">
                            <h5 class="card-title">{$result['name']}</h5>
                            <p class="card-text">{$result['summary']}</p>
                              <a class="btn btn-primary" href="{$path}">Challenge</a>
                        </div>
                    </div>
                </div>
            DELIMITER;
        }

        // Close the Bootstrap Row and Container
        //echo '</div>';
        //echo '</div>';
    }
    public function get_all_books_name() {
        $result_set = $this->bookModel->getAllBooks_name();

        // Start of Bootstrap Container and Row
        //echo '<div class="container">';
       // echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">';

        // Loop through books and display each one as a card
        foreach ($result_set as $result) {
            echo "<option value='{$result['name']}'>{$result['name']}</option>" ;
                

        }

        // Close the Bootstrap Row and Container
        //echo '</div>';
        //echo '</div>';
    }



    public function filter($genre= ''){
    
        if (isset($_GET['genre'])) {

            if($genre===""){
                $this->get_all_books();

            }
            else{
                $genre=$_GET['genre'];
                $result_set = $this->bookModel->getBookBygenre($genre);
                foreach ($result_set as $result) {
                    $path=base_url('challenge');
                    echo <<<DELIMITER
                        <div class="col my-3">
                            <div class="card" style="width: 18rem;">
                                <img src="/bimage/{$result['image_url']}" class="card-img-top" alt="Book Image">
                                <div class="card-body">
                                    <h5 class="card-title">{$result['name']}</h5>
                                    <p class="card-text">{$result['summary']}</p>
                                   <a class="btn btn-primary" href="{$path}">Challenge</a>
                                </div>
                            </div>
                        </div>


DELIMITER;



            }
         }      
       
        
       
        

        

    }
    
    
}







public function get_all_books_adminpage() {
    $result_set = $this->bookModel->getAllBooks();

    // Start of Bootstrap Container and Row
    //echo '<div class="container">';
   // echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">';

    // Loop through books and display each one as a card
    foreach ($result_set as $result) {
        echo <<<DELIMITER
        <tr>
    <td>{$result['name']}</td>
    <td>{$result['summary']}</td>
    <td>{$result['author']}</td>
    <td>{$result['genre']}</td>
    <td>{$result['rating']}</td>

    <td><img src="bimage/{$result['image_url']}" alt="" width="100px"></td>
    <td><a href="#"><button class="btn btn-warning">Edit</button></a></td>
    <td><a href="#"><button class="btn btn-danger">Delete</button></a></td>
    
  </tr>
            
DELIMITER;
    }






}




}
?>
