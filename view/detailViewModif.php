<?php require_once("template/header.php"); ?>

<main class="container">
  <h2>Modif of vehicule:</h2>
  <div class="card">
    <form class="" action="index.php" method="post">
      <input type="hidden" name="detailVehicule" value="null">
      <input type="hidden" name="id" value="<?php echo $vehicule->id()?>">
      <label for="">Name:</label><br>
      <input type="text" name="name" value="<?php echo $vehicule->name()?>" required><br>
      <label for="">Model:</label><br>
      <input type="text" name="model" value="<?php echo $vehicule->model()?>" required><br>

      <label for="">Type:</label><br>
      <select name="type" class="custom-select" required>
        <option value="<?php echo $vehicule->type()?>" selected><?php echo $vehicule->type()?></option>
        <option value=""></option>
        <option value="truck">Truck</option>
        <option value="car">Car</option>
        <option value="moto">Moto</option>
      </select><br>

      <label for="">Detail:</label><br>
      <input type="text" name="detail" value="<?php echo $vehicule->detail()?>" required><br>
      <input class=" mt-3" type="submit" name="updateVehicule" value="Accept modif">
      <input type="submit" name="" value="Cancel">
    </form>
  </div>
</main>

<?php require_once("template/footer.php"); ?>
