<!doctype html>
<html class="no-js" lang="FR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Titre</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font family -->

  <!-- Fontawersome -->
  <script src="https://use.fontawesome.com/4d141429f4.js"></script>

  <link rel="icon" href="img/logo.png">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <!-- Place favicon.ico in the root directory -->

  <!-- CSS -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->
</head>

<body>

<header class="container-fluid fixed-top">
  <!-- NAV BAR -->
  <nav class="navbar navbar-toggleable-md navbar-light bg-info">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand" > <strong>WATATA</strong></h1>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="pr-5 nav-item active">
          <a class="nav-link" href="index.php">Linsting vehicule</a>
        </li>
        <?php if (!isset($_POST["detailVehicule"])) {
          ?>
          <li class="pr-5 nav-item ">
            <form class="d-flex flex-row" action="index.php" method="post">
              <select name="filtre" class="nav-link custom-select">
                <option class="pr-4" selected>Filtres</option>
                <option value="name">Name</option>
                <option value="model">Model</option>
                <option value="type">Type</option>
              </select>
              <input type="submit" value="OK">
            </form>
          </li>
          <?php
        } ?>
        <li class="pr-5 nav-item active ">
          <a class="nav-link addVehicule">Add vehicule</a>
        </li>
      </ul>
    </div>
  </nav>


  <!-- ADD VEHICULE BAR -->
  <nav class="navbar bg-faded" id="addVehiculeBar">
    <h1 class="navbar-brand" href="#">Add vehicule</h1>
    <div class="">
      <ul class="navbar-nav">
        <form class="" action="index.php" method="post">
          <li class="pr-5 nav-item active">
            <input type="text" name="name" placeholder="Name" required>
          </li>
          <li class="pr-5 nav-item active">
            <input type="text" name="model" placeholder="Modele" required>
          </li>
          <li class="pr-5 nav-item active">
            <input type="text" name="detail" placeholder="Detail" required>
          </li>
          <li class="pr-5 nav-item d-flex flex-row ">
            <select name="type" class="nav-link custom-select" required>
              <option class="pr-4" selected>Type</option>
              <option value="truck">Truck</option>
              <option value="car">Car</option>
              <option value="moto">Moto</option>
            </select>
            <input type="submit" name="add" value="Add">
          </li>
        </form>
      </ul>
    </div>
  </nav>

</header>
