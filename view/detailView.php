<?php require_once("template/header.php"); ?>

<main class="container">
  <h2>Detail of vehicule:</h2>
  <div class="card">
    <div class="row">
      <h5 class="ml-3">NAME: <?php echo $vehicule->name() ?> | MODEL: <?php echo $vehicule->model() ?> | TYPE: <?php echo $vehicule->type() ?></h5>
    </div>
    <p class="ml-5"><?php echo $vehicule->detail() ?></p>
  </div>
</main>

<?php require_once("template/footer.php"); ?>
