<?php

// Procedural style
$db = mysqli_connect($server, $user, $pwd, $db_name);

$result = mysqli_query($db, $sql);

// OOP style
$db = new mysqli($server, $user, $pwd, $db_name);
$result = $db->query($sql);

$db = mysqli_connect($server, $user, $pwd, $db_name); 

//Odavde za cas u petak


//db->mysqli_query($db, $sql); prosedural style
$db->query($sql);

// mysqli_real_escape_string($db, $string);
$db->escape_string($string);

//mysqli_affected_rows($db);
$db->affected_rows;

//mysqli_insert_id($db);
$db->insert_id;

$result = $db->query($sql);

//mysqli_fetch_assoc($result);
$result->fetch_assoc(); 

// mysqli_free_result($result);
$result->free();

$result->fetch_assoc(); // associative array
$result->fetch_row(); //basic array
$result->fetch_array(); //assoc, row, or both
$result->fetch_object(); // crude object

//Active Record design patern example

$customer = new Customer;
$customer->first_name = 'Sally';
$customer->last_name = 'Jones';
$customer->email = 'sally@jones.com';
$customer->save();

$customer = Customer::find_by_email('sally@jones.com');
echo $customer->last_name;
$customer->city = 'Boston';
$customer->save();

// Ubacujemo u initialize.php
Bicycle::set_database($database);
//Ubacujemo u bicycle.class.php 

/*static public function find_by_sql($sql){
    $result = self::$database->query($sql);
    if(!$result){
        exit('Database connection failed!');
    }
    return $result;
}

static public function find_all(){
    $sql = "SELECT * FROM bicycles";
    return self::$find_by_sql($sql);
}




