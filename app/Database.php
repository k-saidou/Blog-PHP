<?php
namespace App;

use \PDO;

class dataBase {

    private $db_name;
    private $db_user;
    private $db_password;
    private $db_host;

    public function __construct($db_name, $db_user = 'root', $db_password = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_host = $db_host;
    }

    private function getPDO() {
        $pdo = new PDO('mysql:dbname=blog_php;host=localhost', 'root', "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
        return $pdo;
    }

    public function query($statement) {
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;

    }
}