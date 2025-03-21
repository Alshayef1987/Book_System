
<main class="container my-5">
        <h2 class="text-center mb-4">Add Book</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <form action="<?php echo base_url('addbook');?>" method="post">


                    <div class="mb-3">
                        <label for="name" class="form-label">Book Name *</label>
                        <input
                            name = "name"
                            type="text"
                            class="form-control"
                            id="name"
                            required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="summary" class="form-label">Summary *</label>
                        <input
                            name = "summary"
                            type="text"
                            class="form-control"
                            id="summary"
                            required
                        >
                        </div>

                        <div class="mb-3">
                        <label for="author" class="form-label">author *</label>
                        <input
                            name = "author"
                            type="text"
                            class="form-control"
                            id="author"
                            required
                        >

                        </div>
                  

                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre *</label>
                        <input
                            name = "genre"
                            type="text"
                            class="form-control"
                            id="genre"
                            required
                        >


                    </div>

                        <div class="mb-3">
                        <label for="rating" class="form-label">Rating *</label>
                        <input
                            name = "rating"
                            type="text"
                            class="form-control"
                            id="rating"
                            required
                        >

                        

                    </div>

                        <div class="mb-3">
                        <label for="image_url" class="form-label">Image_utr  *</label>
                        <input
                            name = "image_url"
                            type="text"
                            class="form-control"
                            id="image_url"
                            required
                        >


                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add</button>
                </form>
                    
            </div>
        </div>
