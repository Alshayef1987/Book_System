<?php

class ChallengeController {

    public $conn;

    private $challengeModel;
    public function __construct() {
        $this->challengeModel = new challenge();
    }

    public function showchallenge(){
       

        $data=[
            'title'=>'Welcome to Challenge Page',
            'message'=>'"Join the Book Reading Challenge and explore new worlds, one page at a time!"',
        ];
        render('user/challenge',$data);

    }


    public function challenge(){

        $user= new User();
        $user-> start_date = $_POST['start_date'];
        $user-> end_date = $_POST['end_date'];
        $user-> description = $_POST['description'];
        $user-> books = $_POST['books'];


        if($user->add_challenge()){

            redirect(path: '/');

        }else{
            echo "There was an error";
        }


    }

    public function showmychallenge(){
        echo 'hi';
        
        $data=[
            'title'=>'Welcome to Challenge Page',
            'message'=>'"Join the Book Reading Challenge and explore new worlds, one page at a time!"',
        ];
        render('user/mychallenge',$data);


    }

    public function get_my_challenge() {
        $result_set = $this->challengeModel->get_my_challenge();

        // Start of Bootstrap Container and Row
        //echo '<div class="container">';
       // echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">';

        // Loop through books and display each one as a card
        foreach ($result_set as $result) {
            echo <<<DELIMITER
            <tr>
                <td>{$result['books']}</td>
                <td>{$result['start_date']}</td>
                <td>{$result['end_date']}</td>
                <td ><button class="btn btn-warning">Renew</button></td>
                <td ><button class="btn btn-success">Compeleted</button></td>
            </tr>
    
DELIMITER;
        }

        // Close the Bootstrap Row and Container
        //echo '</div>';
        //echo '</div>';
    }



}
































// ///////////////////////////////////
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
// require_once "database/models/challenge.php";
// require_once "database/models/readBooks.php"; 
// require_once 'libraries/cleaners.php';
 
// function viewReadBooksController() {
//     $userid = $_SESSION['userid'];
//     $readBooks = getReadBooksByUser($userid);
//     require "views/myBooks.view.php";
// }

// function getAllChallenges() {
//     $pdo = connectDB();
//     $sql = "SELECT * FROM reading_challenges ORDER BY start_date DESC";
//     $stm = $pdo->query($sql);
//     return $stm->fetchAll(PDO::FETCH_ASSOC);
// }


// function deleteChallenge() {
//     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['challengeid']) && $_SESSION['role'] === 'admin') {
//         $pdo = connectDB();
//         $challengeid = $_POST['challengeid'];

//         $stm = $pdo->prepare("DELETE FROM reading_challenges WHERE challengeid = ?");
//         $stm->execute([$challengeid]);

//         $_SESSION['message'] = "Haaste poistettu.";
//         header("Location: /challenge");
//         exit;
//     }
// }


// function viewChallengeStatsController() {
//     $challenge = getCurrentChallenge();
    
//     if ($challenge) {
//         $stats = getChallengeStats($challenge);
//         $mostReadBook = getMostReadBook();
//         $mostRecommendedBook = getMostRecommendedBook();
        
//         require "views/challengeStats.view.php";
//     } else {
//         $nextChallenge = getNextChallenge();
//         require "views/noActiveChallenge.view.php";
//     }
// }
 
// function addReadBookController() {
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         require_once "database/connection.php";
        
//         $pdo = connectDB();
//         $userid = $_SESSION['userid'];
//         $bookid = $_POST['bookid'] ?? null;
//         $customTitle = $_POST['customTitle'] ?? null;
//         $customAuthor = $_POST['customAuthor'] ?? null;
//         $customPages = $_POST['customPages'] ?? null;
//         $customFormat = $_POST['customFormat'] ?? null;
//         $read_date = $_POST['read_date'];
//         $rating = $_POST['rating'];
//         $review = $_POST['review'] ?? null;
//         $recommendation = $_POST['recommendation'];

//         // Если пользователь добавляет новую книгу
//         if ($bookid === "custom" && $customTitle && $customAuthor) {
//             $stm = $pdo->prepare("INSERT INTO books (title, author, page_count, is_audiobook) VALUES (?, ?, ?, ?)");
//             $stm->execute([$customTitle, $customAuthor, $customPages ?? null, ($customFormat === "audiobook" ? 1 : 0)]);
//             $bookid = $pdo->lastInsertId(); // Получаем ID новой книги
//         }

//         // Проверяем, существует ли книга
//         $stm = $pdo->prepare("SELECT is_audiobook FROM books WHERE bookid = ?");
//         $stm->execute([$bookid]);
//         $book = $stm->fetch(PDO::FETCH_ASSOC);

//         if (!$book) {
//             $_SESSION['error'] = "Virhe: Kirjaa ei löytynyt.";
//             header("Location: /addBook");
//             exit;
//         }

//         $format = $book['is_audiobook'] ? 'audiobook' : 'book';

//         // Добавляем запись в `read_books`
//         $stm = $pdo->prepare("INSERT INTO read_books (userid, bookid, format, read_date, rating, review, recommendation) 
//                               VALUES (?, ?, ?, ?, ?, ?, ?)");
//         $stm->execute([$userid, $bookid, $format, $read_date, $rating, $review, $recommendation]);

//         $_SESSION['message'] = "Kirja lisätty onnistuneesti!";
//         header("Location: /myBooks");
//         exit;
//     }

//     require "views/addBook.view.php";
// }

// function editReadBookController() {
//     if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//         if (isset($_GET['id'])) {
//             $id = cleanUpInput($_GET['id']);
//             $userid = $_SESSION['userid'];
//             $book = getReadBookById($id, $userid);

//             if ($book) {
//                 require "views/editBook.view.php";
//             } else {
//                 echo "Ошибка: книга не найдена или доступ запрещён.";
//             }
//         } else {
//             echo "Ошибка: отсутствует идентификатор книги.";
//         }
//     } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         if (isset($_POST['id'], $_POST['bookid'], $_POST['read_date'], $_POST['rating'], $_POST['recommendation'])) {
//             $id = cleanUpInput($_POST['id']);
//             $userid = $_SESSION['userid'];
//             $bookid = cleanUpInput($_POST['bookid']);
//             $read_date = cleanUpInput($_POST['read_date']);
//             $rating = cleanUpInput($_POST['rating']);
//             $review = isset($_POST['review']) ? cleanUpInput($_POST['review']) : '';
//             $recommendation = cleanUpInput($_POST['recommendation']);

//             // Получаем информацию о книге
//             $pdo = connectDB();
//             $stm = $pdo->prepare("SELECT page_count, is_audiobook FROM books WHERE bookid = ?");
//             $stm->execute([$bookid]);
//             $book = $stm->fetch(PDO::FETCH_ASSOC);

//             if (!$book) {
//                 echo "Ошибка: указанная книга не найдена.";
//                 exit;
//             }

//             $page_count = $book['page_count'] ?? null;
//             $format = $book['is_audiobook'] ? 'audiobook' : 'book';

//             // Обновляем запись
//             updateReadBook($id, $userid, $bookid, $format, $read_date, $page_count, $rating, $review, $recommendation);
//             header("Location: /myBooks");
//             exit;
//         } else {
//             echo "Ошибка: не все поля заполнены.";
//         }
//     }
// }

// function deleteReadBookController() {
//     if (isset($_GET['id'])) {
//         $id = cleanUpInput($_GET['id']);
//         $userid = $_SESSION['userid'];

//         // Проверяем, принадлежит ли книга пользователю
//         $pdo = connectDB();
//         $stm = $pdo->prepare("SELECT id FROM read_books WHERE id = ? AND userid = ?");
//         $stm->execute([$id, $userid]);
//         $book = $stm->fetch(PDO::FETCH_ASSOC);

//         if (!$book) {
//             echo "Ошибка: доступ запрещён.";
//             exit;
//         }

//         deleteReadBook($id, $userid);
//         header("Location: /myBooks");
//         exit;
//     } else {
//         echo "Ошибка: отсутствует идентификатор книги.";
//     }
// }

// function searchBooksController() {
//     if (isset($_GET['query'])) {
//         $query = cleanUpInput($_GET['query']);
//         $results = searchReadBooks($query);
//         require "views/searchBooks.view.php";
//     } else {
//         require "views/searchForm.view.php";
//     }
// }

// function filterBooksByGenreController() {
//     if (isset($_GET['genreid'])) {
//         $genreId = cleanUpInput($_GET['genreid']);
//         $results = getReadBooksByGenre($genreId);
//         require "views/filterBooks.view.php";
//     } else {
//         echo "Ошибка: отсутствует идентификатор жанра.";
//     }
// }

// function filterBooksByRatingController() {
//     if (isset($_GET['rating'])) {
//         $rating = cleanUpInput($_GET['rating']);
//         $results = getReadBooksByRating($rating);
//         require "views/filterRating.view.php";
//     } else {
//         echo "Ошибка: отсутствует параметр рейтинга.";
//     }
// }
?>

