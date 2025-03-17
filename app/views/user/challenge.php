<!-- Main Content -->

<main class="container my-5">

    <h2 class="text-center mb-4">New Reading Challenge</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">

        <form action="<?php echo base_url('challenge') ;?>" method="post">
        
            <div class="col-md-6 w-100">
                <label for="" class="form-label">Start Date:</label>
                <input type="date" name="start_date" class="form-control">
                
            </div>
            <div class="col-md-6 w-100">
                <label for="" class="form-label">end Date:</label>
                <input type="date" name="end_date" class="form-control">
                
            </div>
            <div class="col-md-6 w-100">
                <label for="" class="form-label">Description:</label>
                <input type="text" name="description" class="form-control">
                
            </div>
            <div class="col-md-6 w-100">
                <label for="" class="form-label">  Select Book:</label>
                <select class="form-control" name="books" value=" Select Book" id="">
                <?php   
$bookcontroller=new BookController();
$bookcontroller->get_all_books_name();
?>

                    <option value="">book1</option>
                    <option value="">book2</option>
                    <option value="">book3</option>

                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Create Challenge</button>
            
            


     
        </div>
    </div>
</main>
