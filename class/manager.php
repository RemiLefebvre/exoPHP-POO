<?php

/*
**Manager of Vehicules class
*/
class VehiculesManager{
  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }

  public function add(Vehicule $vehicule){
    $q = $this->_db->prepare('INSERT INTO vehicules(nom, degats) VALUES(:nom, :degats)');

    $q->execute(array(
      'nom'=>$vehicule->nom(),
      'degats'=>0
    ));
  }

  public function delete(Vehicule $vehicule){
    $this->_db->exec('DELETE FROM vehicules WHERE id = '.$vehicule->id());
  }

  public function get($info){
      if (is_int($info)){
        $q = $this->_db->prepare('SELECT id, nom, degats FROM vehicules WHERE id = :id');
        $q->execute(['id' => $info]);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return $donnees;
      }
      else{
        $q = $this->_db->prepare('SELECT id, nom, degats FROM vehicules WHERE nom = :nom');
        $q->execute(['nom' => $info]);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return $donnees;
      }
    }

  public function getList(){
    $vehicules = [];

    $q = $this->_db->query('SELECT id, nom, degats FROM vehicules ORDER BY nom');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
      $vehicules[] = new Vehicule($donnees);
    }
    return $vehicules;
  }

  public function update(Vehicule $vehicule){
    $q = $this->_db->prepare('UPDATE vehicules SET degats = :degats WHERE id = :id');

    $q->execute(array(
      'degats'=>$vehicule->degats(),
      'id'=>$vehicule->id()
    ));
  }

  public function count(){
    $q = $this->_db->query('SELECT COUNT(*) FROM vehicules')->fetchColumn();

    return $q;
  }

  public function exists($nom){
    if (is_int($nom)) {
      $q = $this->_db->query('SELECT nom FROM vehicules WHERE nom = '.$nom);
      $resultat = $q->fetch();

      if (!$resultat) {
        return false;
      }
      else {
        return true;
      }
    }
  }


  public function setDb(PDO $db){
    $this->_db = $db;
  }
} ?>
