<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/mahammed.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Al-Shayef</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Admin Centre
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              
              
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Center</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

     <li class="breadcrumb-item"><a href="<?php echo base_url('');?>">Home</a></li>
<li class="breadcrumb-item"><a href="<?php echo base_url('admin');?>">Admin</a></li>

<li class="breadcrumb-item"><a href="<?php echo base_url('login');?>">Logout</a></li>
<li class="breadcrumb-item active">Starter Page</li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">

<div class="card card-primary card-outline">
<a href="<?php echo base_url('adduser');?>"><button class="btn btn-primary offset-10 m-3">Add User</button></a>
<div class="card-body">
<a href="<?php echo base_url('addbook');?>"><button class="btn btn-primary offset-10 m-3">Add book</button></a>



<h3 class="card-title"><b>Users</b></h3>

<table class="table">
<thead>
<tr>
<td><b>username</b></td>
<td><b>user_type</b></td>
<td><b>email</b></td>
<td><b>password</b></td>
</tr>
</thead>

<?php

$admincontroller=new AdminController();
$admincontroller->alluser();
?>


</table>

              </div>
            </div>

            <div class="card card-primary card-outline">
            <a href="#"><button class="btn btn-primary m-3">Add Book</button></a>
              <div class="card-body">


<h5 class="card-title"><b>Books</b></h5>


<table class="table">
<thead>
<tr>
<td>bname</td>
<td><b>summary</b></td>
<td><b>author</b></td>
<td><b>genre</b></td>
<td><b>rating</b></td>
<td><b>image_url</b></td>
</tr>
</thead>
<tbody>
<?php

$bookcontroller=new BookController();
$bookcontroller->get_all_books_adminpage();
?>


  <tr>
    <td>bookname</td>
    <td>description</td>
    <td>author</td>
    <td>genre</td>
    <td>rating</td>
    <td>image</td>
  </tr>
</tbody>
</table>


</div>
</div>

<div class="card card-primary card-outline">
<div class="card-body">

<h5 class="card-title"><b>Challenges</b></h5>

<table class="table">
<thead>
<tr>
<td><b>email</b></td>
<td><b>start_date</b></td>
<td><b>end_date</b></td>
<td><b>description</b></td>
<td><b>books</b></td>
<td><b>created_at</b></td>
</tr>
</thead>
<tbody>

<?php

$challengecontroller=new ChallengeController();
$challengecontroller->All_challenge();
?>





</tbody>
</table>
</div>
</div>

<div class="card card-primary card-outline">
<div class="card-body">

                <h5 class="card-title"><b>Empty</b></h5>
                <table class="table">
                
                <thead>
        <tr>
            <td>none</td>
            <td>none</td>
            <td>none</td>
            <td>none</td>
            <td>none</td>
            <td>none</td>

        </tr>
    </thead>
    </table>

              
              </div>
            </div><!-- /.card -->
          </div>
  
 
