<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
</head>
<body class="index">
    <!-- Navigation Bar -->
    
<?php// require views_path('partials/home/navbar.php'); ?>



<div class="container">
<div class="hero">
    <div class="hero-content">
        <h1>Welcome to Toki Online Library</h1>
        <p>Securely Register, Login and Manage </p>
        <div class="hero-buttons">
            <a class="btn" href="<?php echo base_url('login'); ?>">Login</a>
            <a class="btn" href="<?php echo base_url('register'); ?>">Register</a>
        </div>
    </div>
</div>
</div>
    
</body>
</html>