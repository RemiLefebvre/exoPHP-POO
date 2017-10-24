<?php
/*
 ** Creation Vehicules
 */
 abstract class Vehicule{
   protected $_id;
   protected $_name;
   protected $_type;
   protected $_model;
   protected $_text;

   public function __construct(array $donnees){
     $this->hydrate($donnees);
   }

   public function hydrate(array $donnees){
     foreach ($donnees as $key => $value){
       $method = 'set'.ucfirst($key);

       if (method_exists($this, $method)){
         $this->$method($value);
       }
     }
   }

   /*
   ** Getter
   */
   public function id() { return $this->_id; }
   public function name() { return $this->_name; }
   public function type() { return $this->_type; }
   public function model() { return $this->_model; }
   public function text() { return $this->_text; }


   /*
   ** Setter
   */
   public function setId(int $id){
     $this->_id = (int) $id;
   }
   public function setNom(string $name){
     if (is_string($name) && strlen($name) <= 20){
       $this->_name = $name;
     }
   }
   public function setModel(int $model){
     $this->_model = (int) $model;
   }
   public function setModel(string $text){
     if (is_string($name)){
       $this->_name = $name;
     }
   }
   public function setType(){
    $this->_type = static::class;
   }
 }


 /**
  * Class Truck
  */
 class Truck extends Vehicule{
 }

 /**
  * Class Car
  */
 class Car extends Vehicule{
 }

 /**
  * Class Moto
  */
 class Moto extends Vehicule{
 }

 ?>
