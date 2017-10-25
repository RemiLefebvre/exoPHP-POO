<?php

/*
 ** Creation Vehicules
 */
 abstract class Vehicule{
   protected $_id;
   protected $_name;
   protected $_type;
   protected $_model;
   protected $_detail;

   public function __construct(array $donnees){
     $this->hydrate($donnees);
     $this->_type = strtolower(static::class);
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
   public function detail() { return $this->_detail; }


   /*
   ** Setter
   */
   public function setId($id){
     $this->_id = (int) $id;
   }
   public function setName($name){
     if (is_string($name) && strlen($name) <= 20){
       $this->_name = $name;
     }
   }
   public function setModel($model){
     $this->_model = (int) $model;
   }
   public function setDetail($detail){
     if (is_string($detail)){
       $this->_detail = $detail;
     }
   }

 }


 ?>
