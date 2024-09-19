<?php

namespace model;

require_once '../../config/Connection.php';

use app\config\Connection;

class Nilai{
    private $db;
    public function __construct(){
        $this->db = new Connection();
    }

    public function addNilai(Array $data): int{
        $disiplin = filter_var($data["disiplin"],FILTER_SANITIZE_NUMBER_INT);
        $kerapian = filter_var($data["kerapian"],FILTER_SANITIZE_NUMBER_INT);
        $kreativitas = filter_var($data["kreativitas"],FILTER_SANITIZE_NUMBER_INT);
        $this->db->query("INSERT INTO nilai VALUES('',:disiplin,:kerapian,:kreativitas,'')");
        $this->db->bind('disiplin',$disiplin);
        $this->db->bind('kerapian',$kerapian);
        $this->db->bind('kreativitas',$kreativitas);
        $this->db->execute();
        return $this->db->rowCount();
    }
}