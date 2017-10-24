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
    $q = $this->_db->prepare('INSERT INTO vehicules(type, name, model, detail) VALUES(:type, :name, :model, :detail)');
    $q->execute(array(
      'nom'=>$vehicule->name(),
      'nom'=>$vehicule->type(),
      'nom'=>$vehicule->model(),
      'nom'=>$vehicule->detail()
    ));
  }

  /*
  **Delete vehicul in DBB
  */
  public function delete(Vehicule $vehicule){
    $this->_db->exec('DELETE FROM vehicules WHERE id = '.$vehicule->id());
  }


  /*
  **get vehicul
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
      return $donnees;
    }

  /*
  **Get listing
  */
  public function getList($info){
    $vehicules = [];

    $q = $this->_db->query('SELECT id, name, detail, model FROM vehicules  ORDER BY '.$info);

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
      $vehicules[] = new Vehicule($donnees);
    }
    return $vehicules;
  }

  /*
  **Update vehicule
  */
  public function update(Vehicule $vehicule){
    $q = $this->_db->prepare('UPDATE vehicules SET degats = :degats WHERE id = :id');

    $q->execute(array(
      'degats'=>$vehicule->degats(),
      'id'=>$vehicule->id()
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
