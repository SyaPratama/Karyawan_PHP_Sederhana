<?php
namespace app\model;

require_once "../../config/Connection.php";

use app\config\Connection;

abstract class Model{

    protected $db;

    public function __construct(){
        $this->db = new Connection();    
    }

    abstract public function get() : Array;

    abstract public function post(Array $data) : Int;

    abstract public function update(Array $data) : Int;

    abstract public function delete (Int $id) : Int;
}