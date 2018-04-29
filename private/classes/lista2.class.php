<?php

class Lista2 extends DatabaseObject { 
    // start of Active Record code
  static protected $table_name = 'lista2';
  
  static protected $db_columns = ['br_leg', 'ime', 'prezime', 'jmbg', 'state', 'description', 'pol', 'sud_lista', 'rang', 'prebivaliste'];

  // public $errors = [];
  
  static public function find_all(){
      $sql = "SELECT * FROM " . self::$table_name . " ORDER BY prezime";
      return self::find_by_sql($sql);
  }

  protected function validate(){
      $this->errors = [];
      if(is_blank($this->br_leg)){
          $this->errors[] = "Broj legitimacije ne moze biti prazan.";
      }
      if(is_blank($this->ime)){
          $this->errors[] = "Ime ne moze biti prazno.";
      }
      if(is_blank($this->prezime)){
          $this->errors[] = "Prezime ne moze biti prazno.";
      }
      if(is_blank($this->jmbg)){
          $this->errors[] = "JMBG polje ne moze biti prazno.";
          
      }
      if(is_blank($this->prebivaliste)){
          $this->errors[] = "Prebivalište polje ne moze biti prazno.";
          
      }
     // return $this->errors[];
  }
  /*
  protected function create() {
    $this->validate();
    if(!empty($this->errors)){return false;}
    
    $attributes = $this->sanitized_attributes();
    $sql = "INSERT INTO lista2 (";
    $sql .= join(', ', array_keys($attributes));
    $sql .= ") VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";
    $result = self::$database->query($sql);
    if($result) {
      $this->id = self::$database->insert_id;
    }
    return $result;
  }
  protected function update() {
    $this->validate();
    if(!empty($this->errors)){return false;}
    
    $attributes = $this->sanitized_attributes();
    $attribute_pairs = [];
    foreach($attributes as $key => $value) {
      $attribute_pairs[] = "{$key}='{$value}'";
    }

    $sql = "UPDATE lista2 SET ";
    $sql .= join(', ', $attribute_pairs);
    $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }
  public function merge_attributes($args=[]) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }
  public function save(){
      if (isset($this->id)){
          return $this->update();
      }else {
          return $this->create();
      }
  }
  
  public function delete (){
      $sql = "DELETE FROM lista2 ";
      $sql .= "WHERE id ='" . self::$database->escape_string($this->id) . "' ";
      $sql .= "LIMIT 1";
      $result = self::$database->query($sql);
      return $result;
  }

    // Properties which have database columns, excluding ID
  public function attributes() {
    $attributes = [];
    foreach(self::$db_columns as $column) {
      if($column == 'id') { continue; }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }
  
  public function sanitized_attributes(){
      $sanitized = [];
      foreach ($this->attributes() as $key => $value){
          $sanitized[$key] = self::$database->escape_string($value);
      }
      return $sanitized;
  }
*/
  // end of Active Record code
  public static $id1=1;
  public $id;
  public $br_leg;
  public $ime;
  public $prezime;
  public $jmbg;
  public $state;
  public $description;
  public $pol;
  public $sud_lista;
  public $rang;
  public $prebivaliste;
  //public $izbor;

  const POL = [
      1=> 'Muški',
      2=> 'Ženski'];
  
  const SUDIJSKI_RANG = [
        1 => 'Sudija',
        2 => 'Regionalni',
        3 => 'Nacionalni',
        4 => 'Međunarodni'
    ];
  
  const LISTA = [
        1 => 'Regionalna', 
        2 => 'Druga liga',
        3 => 'I-B liga',
        4 => 'I-a liga', 
        5 => 'Superliga'
        ];
  
  const STATE = ['Aktivan', 'Mirovanje', 'Počasni'];
  
  //const IZBOR = ['Sve', '8 po strani'];
  
  public function __construct($args=[]) {
    //$this->br_leg = isset($args['br_leg']) ? $args['br_leg'] : '';
    $this->br_leg = $args['br_leg'] ?? '';
    $this->ime = $args['ime'] ?? '';
    $this->prezime = $args['prezime'] ?? '';
    $this->jmbg = $args['jmbg'] ?? '';
    $this->state = $args['state'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->pol = $args['pol'] ?? '';
    $this->prebivaliste = $args['prebivaliste'] ?? '';
    $this->rang = $args['rang'] ?? '';
    $this->sud_lista = $args['sud_lista'] ?? '';
    //$this->izbor = $args['izbor'] ?? '';
  }
  public function ime() {
    return "{$this->ime} {$this->prezime} {$this->br_leg}";
  }
  public function rang(){
      if($this->rang >0){
          return self::SUDIJSKI_RANG[$this->rang];
      }else {
          return "Nepoznato";
      }
  }
public function sud_lista() {
    if($this->sud_lista > 0) {
      return self::LISTA[$this->sud_lista];
    } else {
      return "Nepoznato";
    }
  }
  public function pol(){
      if($this->pol >0){
          return self::POL[$this->pol];
      }else {
          return "Nepoznato";
      }
  }
  
  public static function id(){
      return self::$id1++;
  }
}