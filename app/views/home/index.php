<div class="container">
<form  action="<?php echo base_url('filter') ;?>" method="post" class="form-group">
  <div class="col-md-10 d-flex mt-3 align-items-center">
  <select name="genre" class="form-select " id="">Filter
        <option value="Classic">Classic</option>
        <option value="Horror">Horror</option>
        <option value="Romance">Romance</option>
        <option value="Fantasy<">Fantasy</option>
        <option value="Historical">Historical</option>
        <option value="Adventure">Adventure</option>
        <option value="Thriller">Thriller</option>
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

$bookcontroller=new BookController();
$bookcontroller->filter();
?>



      
      </div>
      </div>


      <div class="d-flex">
        <div class="col-md-10 d-flex">


        </div>
        
      </div>
      
  

</div>
</div>
















