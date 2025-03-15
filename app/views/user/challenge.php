<!-- Main Content -->
<main class="container my-5">
    <h2 class="text-center mb-4">New Reading Challenge</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/admin/create_challenge" method="post" onsubmit="return validateDates();">
                
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date:</label>
                    <input 
                        id="start_date" 
                        type="date" 
                        name="start_date" 
                        class="form-control" 
                        required 
                        min="<?= date('Y-m-d'); ?>" 
                        onchange="updateMinEndDate()"
                    >
                </div>
                
                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date:</label>
                    <input 
                        id="end_date" 
                        type="date" 
                        name="end_date" 
                        class="form-control" 
                        required
                    >
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea 
                        id="description" 
                        name="description" 
                        class="form-control" 
                        placeholder="Optional description..."
                    ></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="books" class="form-label">Add Books to Challenge:</label>
                    <select id="books" name="books[]" class="form-control" multiple>
                        <!-- Books will be populated dynamically -->
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Create Challenge</button>
            </form>
        </div>
    </div>
</main>
