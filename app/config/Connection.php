<?php
namespace app\config;

require_once "config.php";

use PDO;

class Connection{

    private $host = DB_HOST;
    private $name = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;

    private $dbh;
    private $opt;
    private $stmt;
    

    public function __construct(){
        $this->opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ];
        $this->dbh = new PDO("mysql:host=$this->host;dbname=$this->name",$this->user,$this->pass,$this->opt);
    }


    public function query( string $sql) : void{
        $this->stmt =  $this->dbh->prepare($sql);
    }

    public function bind( string $param, mixed $value, null $type = null) : void{
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                $type = PDO::PARAM_STR;
                break;
            }
        }
        $this->stmt->bindParam($param,$value,$type);
    }

    public function execute() : void{
        $this->stmt->execute();
    }

    public function fetch() : Array{
        $this->execute();
       return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll() : Array{
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rowCount() : int {
        return $this->stmt->rowCount();
    }
}