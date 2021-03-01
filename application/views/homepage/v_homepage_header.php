<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/foto_tjs/icon/icon-tjs.png">
  <title>E-Raport SMA Tunas Jakasampurna</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url(); ?>assets/homepage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- Custom fonts for this template -->
  <link href="<?= base_url(); ?>assets/homepage/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- My Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="<?= base_url(); ?>assets/homepage/css/clean-blog.min.css" rel="stylesheet">

  <link href="<?= base_url(); ?>assets/vendor_sbadmin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?= base_url(); ?>assets/css_sbadmin/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('Homepage') ?>">E-Raport SMA Tunas Jakasampurna</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <style>
              .nav-link:hover::after {
                content: "";
                display: block;
                border-bottom: 3px solid #e3e4e6;
                width: 50%;
                margin: auto;
                padding-bottom: 5px;
                margin-bottom: -8px;
              }
            </style>
            <a class="nav-link" href="<?= base_url('Homepage'); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Auth'); ?>">E-Raport</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('About') ?>">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <style>
    .carousel-item {
      height: 700px;
    }

    .carousel-item img {
      margin-top: -60px;
    }

    .carousel-caption .display-4 {
      margin-top: -440px;
    }

    .carousel-caption hr {
      border-color: whitesmoke;
      width: 70px;
      border-width: 3px;
    }

    .carousel-caption .btn {
      background-color: cornflowerblue;
      border: none;
      border-radius: 25px;
      margin-top: 40px;
    }
  </style>
  <!-- Page Header -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= base_url('assets/foto_tjs/slider/tunas_school.jpg'); ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-4">EXPLORE YOUR SELF WITH <br><span class="font-weight-bold">RAPORT DIGITAL</span> </h1>
          <hr class="my-4">
          <p class="lead">Give you ease in getting information about Learning Outcomes</p>
          <a class="btn btn-primary btn-lg font-weight-bold" href="#" role="button">LEARN MORE</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('assets/foto_tjs/slider/penyuluhan.jpg'); ?>" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('assets/foto_tjs/slider/kampanye.jpg'); ?>" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('assets/foto_tjs/slider/kesenian.jpg'); ?>" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>