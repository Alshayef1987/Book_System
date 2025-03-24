


<div class="container">
<form  action="" method="GET" class="form-group">
  <div class="col-md-10 d-flex mt-3 align-items-center">
  <select name="genre" class="form-select " id="">Filter
  <option value="">All</option>
 
 <option value="Classic" <?= ($_GET['genre'] ?? '') == 'Classic' ? 'selected' : '' ?>>Classic</option>
 <option value="Horror <?= ($_GET['genre'] ?? '') == 'Horror' ? 'selected' : '' ?>">Horror</option>
 <option value="Romance <?= ($_GET['genre'] ?? '') == 'Romance' ? 'selected' : '' ?>">Romance</option>
 <option value="Fantasy< <?= ($_GET['genre'] ?? '') == 'Fantasy' ? 'selected' : '' ?>">Fantasy</option>
 <option value="Historical <?= ($_GET['genre'] ?? '') == 'Historical' ? 'selected' : '' ?>">Historical</option>
 <option value="Adventure <?= ($_GET['genre'] ?? '') == 'Adventure' ? 'selected' : '' ?>">Adventure</option>
 <option value="Thriller <?= ($_GET['genre'] ?? '') == 'Thriller' ? 'selected' : '' ?>">Thriller</option>
</select>
      </select>
     <div> <button class="btn btn-outline-primary" type='submit'>Filtter</button></div>
    
  </div>
     

     </form>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

  
      <!-- <?php
//$bookcontroller=new BookController();
//$bookcontroller->get_all_books();
?> -->
      <?php
     $genre = isset($_GET['genre']) ? $_GET['genre'] : null;


$bookcontroller=new BookController();
$bookcontroller->filter($genre);
?>



      
      </div>
      </div>


      <div class="d-flex">
        <div class="col-md-10 d-flex">


        </div>
        
      </div>
      
  

</div>
</div>
















