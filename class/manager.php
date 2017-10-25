<?php

/*
**Manager of Vehicules class
*/
class VehiculeManager{
  private $_db; // Instance de PDO

  /*
  **DDB
  */
  public function __construct($db){
    $this->setDb($db);
  }
  /*
  **Setter
  */
  public function setDb(PDO $db){
    $this->_db = $db;
  }

  /*
  **Add vehicules
  */
  public function add(Vehicule $vehicule){
    // echo $vehicule->name();
    $q = $this->_db->prepare('INSERT INTO vehicules(type, name, model, detail) VALUES(:type, :name, :model, :detail)');
    $q->execute(array(
      'type'=>$vehicule->type(),
      'name'=>$vehicule->name(),
      'model'=>$vehicule->model(),
      'detail'=>$vehicule->detail()
    ));
  }

  /*
  **Delete vehicul in DBB
  */
  public function delete(Vehicule $vehicule){
    $this->_db->exec('DELETE FROM vehicules WHERE id = '.$vehicule->id());
  }


  /*
  **Get vehicul
  */
  public function get($info){
      if (is_int($info)){
        $q = $this->_db->prepare('SELECT id, name, detail, model FROM vehicules WHERE id = :id');
        $q->execute(['id' => $info]);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
      }
      else{
        $q = $this->_db->prepare('SELECT id, name, detail, model FROM vehicules WHERE name = :name');
        $q->execute(['name' => $info]);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
      }
      if ($donnees['type']=="truck") {
        $vehicule = new Truck(["id" => $donnees['id'],"name" => $donnees['name'],"model" => $donnees['model'],"detail" => $donnees['detail']]);
      }
      elseif ($donnees['type']=="car") {
        $vehicule = new Car(["id" => $donnees['id'],"name" => $donnees['name'],"model" => $donnees['model'],"detail" => $donnees['detail']]);
      }
      elseif ($donnees['type']=="moto") {
        $vehicule = new Moto(["id" => $donnees['id'],"name" => $donnees['name'],"model" => $donnees['model'],"detail" => $donnees['detail']]);
      }
      return $vehicule;
    }

  /*
  **Get listing
  */
  public function getList($info){
    $listVehicule = [];

    $q = $this->_db->query('SELECT id, name, detail, model ,type FROM vehicules  ORDER BY '.$info);

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
      if ($donnees['type']=="truck") {
        $listVehicule[] = new Truck(["id" => $donnees['id'],"name" => $donnees['name'],"model" => $donnees['model'],"detail" => $donnees['detail']]);
      }
      elseif ($donnees['type']=="car") {
        $listVehicule[] = new Car(["id" => $donnees['id'],"name" => $donnees['name'],"model" => $donnees['model'],"detail" => $donnees['detail']]);
      }
      elseif ($donnees['type']=="moto") {
        $listVehicule[] = new Moto(["id" => $donnees['id'],"name" => $donnees['name'],"model" => $donnees['model'],"detail" => $donnees['detail']]);
      }
    }
    return $listVehicule;
  }

  /*
  **Update vehicule
  */
  public function update(Vehicule $vehicule){
    $q = $this->_db->prepare('UPDATE vehicules SET model = :model,type = :type,name = :name WHERE id = :id');

    $q->execute(array(
      'id'=>$vehicule->id(),
      'model'=>$vehicule->model(),
      'type'=>$vehicule->type(),
      'name'=>$vehicule->name()
    ));
  }

  /*
  **Count of vehiculs
  */
  public function count(){
    $q = $this->_db->query('SELECT COUNT(*) FROM vehicules')->fetchColumn();
    return $q;
  }


} ?>
