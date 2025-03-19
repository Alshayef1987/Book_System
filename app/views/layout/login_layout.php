<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Toki Verkkokirjasto</title>
    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"

        
    >
  
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="<?php echo base_url('Image/Logo.png'); ?>" alt="Logo" height="60" style="max-height: 80px; width: auto;"> 
            </a>

            <div style="display: flex; justify-content: center; align-items: center; position: absolute; top: 50px; left: 50%; transform: translateX(-50%);">
</div>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse"
                id="navbarNav"
            >
            </div>
        </div>
    </nav>
    <!-- Header Section -->
    <header class="bg-dark text-white py-5">
        <div class="container">
            <h1 class="display-4"><?php echo $title;?></h1>
            <p class="lead"><?php echo $message;?></p>
        </div>
    </header>


    <!-- Main Content -->

<?php
echo $content;
?>








  

    <!-- Footer -->
    <footer class="bg-light py-4">
        <div class="container text-center">
            <p class="text-muted mb-0">
                &copy; 2025 Online Book Library. All rights reserved by Mohammed Alshayef            </p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        
    ></script>
</body>
</html>
