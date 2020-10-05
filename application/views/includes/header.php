<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Codingniter Tutorial</title>
  <!-- MDB icon -->
  <link rel="icon" href="<?= base_url(); ?>assets/img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/mdb.min.css">
  <!-- owl carousel -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.min.css">
  <!-- owl carousel default theme -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.theme.default.min.css">
  <!-- Datatable css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/addons/datatables2.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
</head>
<body>



<!--Navbar -->

<nav class=" navbar navbar-expand-lg navbar-dark font-weight-bold py-2"
     style="background-color: #8FAF64;" id="navbar">
     <!-- secondary-color lighten-1 scrolling-navbar  style="background-image: linear-gradient(to right,#CC834C, #D2AA55, #CAB54B);"-->
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
      aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
      <ul class="navbar-nav ml-auto">
        
        <!-- <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>">Home
            <span class="sr-only">(current)</span>
          </a>
        </li> -->

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Signup'); ?>">Signup</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Login'); ?>">Login</a>
        </li>


      </ul>
    </div>
  </div>
</nav>

<!--/.Navbar -->

<div class="py-4"></div>