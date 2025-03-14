<?php
class BookController {

    private $bookModel;

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
            echo <<<DELIMITER
                <div class="col my-3">
                    <div class="card" style="width: 18rem;">
                        <img src="/bimage/{$result['image_url']}" class="card-img-top" alt="Book Image">
                        <div class="card-body">
                            <h5 class="card-title">{$result['name']}</h5>
                            <p class="card-text">{$result['summary']}</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            DELIMITER;
        }

        // Close the Bootstrap Row and Container
        //echo '</div>';
        //echo '</div>';
    }
}
?>
