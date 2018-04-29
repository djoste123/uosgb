<?php

class Lista {
    
    // start of Active Record code
  static protected $database;
  
  static public function set_database($database) {
      self::$database = $database;
  }
  
  static public function find_by_sql($sql) {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }

    // results into objects
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = self::instantiate($record);
    }

    $result->free();

    return $object_array;
  }

  static protected function instantiate($record) {
    $object = new self;
    // Could manually assign values to properties
    // but automatically assignment is easier and re-usable
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }


  static public function find_all(){
      $sql = "SELECT * FROM lista";
      return self::find_by_sql($sql);
  }

  // end of Active Record cod
    public $id;
    public $br_leg;
    public $ime;
    public $prezime;
    public $jmbg;
    public $state;
    public $rang;
    public $datum_rodjenja;
    public $sud_lista;
    
    const STATUS = ['Aktivan', 'Mirovanje', 'Neaktivan', 'Pocasni'];
    const SUDIJSKI_RANG = [
        1 => 'Sudija',
        2 => 'Regionalni sudija',
        3 => 'Nacionalni sudija',
        4 => 'Medjunarodni sudija'
    ];
    const LISTA = [
        1 => 'Regionalna', 
        2 => 'Druga liga',
        3 => 'I-B liga',
        4 => 'I-a liga', 
        5 => 'Superliga'
        ];
    
    public function __construct($args=[]) {
    
    
    $this->br_leg = $args['br_leg'] ?? '';
    $this->ime = $args['ime'] ?? '';
    $this->prezime = $args['prezime'] ?? '';
    $this->jmbg = $args['jmbg'] ?? '';
    $this->state = $args['state'] ?? '';
    $this->rang = $args['rang'] ?? '';
    $this->datum_rodjenja = $args['datum_rodjenja'] ?? '';
    $this->lista = $args['lista'] ?? '';
    //return self::$id++;
}
    public function sud_lista() {
    if($this->sud_lista > 0) {
      return self::LISTA[$this->sud_lista];
    } else {
      return "Nepoznato";
    }
  }
  
    public function rang(){
      if($this->rang >0){
          return self::SUDIJSKI_RANG[$this->rang];
      }else {
          return "Nepoznato";
      }
  }
  public function ime(){
      return $this->ime . ' ' . $this->prezime;
  }
}

    