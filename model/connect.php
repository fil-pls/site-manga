<?php

class Connect extends PDO {

public function __construct() {

    parent::__construct('mysql:host=localhost;dbname=site-manga;charset=utf8','root','');
    
}
}