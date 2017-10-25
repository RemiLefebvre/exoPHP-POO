<?php require_once("template/header.php"); ?>
<?php if (isset($message)) {
  echo "Error: " .$message;
} ?>

<main class="container mt-5">
  <h2>List of vehicules</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Model</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($vehicules as $vehicule) {
        ?>
        <tr>
          <td><?php echo $vehicule->name() ?></td>
          <td><?php echo $vehicule->type() ?></td>
          <td><?php echo $vehicule->model() ?></td>
          <td>
            <form class="d-flex flex-row" action="index.html" method="post">
              <input type="hidden" name="id" value="<?php  echo $vehicule->id()?>">
              <input type="submit" name="modif" value="Modif">
              <input type="submit" name="supp" value="Delete">
              <input type="submit" name="detail" value="Detail">
            </form>
          </td>
        </tr>
        <?php
      } ?>
    </tbody>
  </table>
</main>
<?php require_once("template/footer.php"); ?>
