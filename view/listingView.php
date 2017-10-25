<?php require_once("template/header.php"); ?>
<?php if (isset($message)) {
  echo "Error: " .$message;
} ?>

<main class="container mt-5">
  <h2>List of vehicules</h2>
  <table class="table table-hover table-responsive">
    <thead>
      <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Model</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($vehicules as $vehicule) {
        // if the vehicule select to modif
       if (isset($_POST['modif']) && isset($_POST['id']) && $vehicule->id()==$_POST['id']) {
          ?>
          <tr>
            <form action="index.php" method="post">
              <td><input class"" name="name" type="text" value="<?php echo $vehicule->name() ?>"></td>
              <td><input class"" name="type" type="text" value="<?php echo $vehicule->type() ?>"></td>
              <td><input class"" name="model" type="text" value="<?php echo $vehicule->model() ?>"></td>
              <td class="d-flex flex-row">
                  <input type="hidden" name="id" value="<?php  echo $vehicule->id()?>">
                  <input class"ml-3 btn btn-primary" type="submit" name="validModif" value="Valid modif">
                  <input class"ml-3 btn btn-primary" type="submit" value="Cancel">
              </td>
            </form>
          </tr>
          <?php
        }
        else {
          ?>
          <tr>
            <form  action="index.php" method="post">
              <td><?php echo $vehicule->name() ?></td>
              <td><?php echo $vehicule->type() ?></td>
              <td><?php echo $vehicule->model() ?></td>
              <td class="d-flex flex-row">
                  <input type="hidden" name="id" value="<?php  echo $vehicule->id()?>">
                  <input class"ml-3 btn btn-primary" type="submit" name="modif" value="Modif">
                  <input class"ml-3 btn btn-success" type="submit" name="detailVehicule" value="Detail">
                  <input class"ml-3 btn btn-danger" type="submit" name="supp" value="Delete">
              </td>
            </form>
          </tr>
          <?php
        }
      } ?>
    </tbody>
  </table>
</main>
<?php require_once("template/footer.php"); ?>
