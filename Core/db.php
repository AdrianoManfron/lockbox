<?php

namespace Core;

use PDO;

class DB {
    private $db;

    public function __construct($config){
        $connectionString = $config['driver'] . ':' . $config['database'];

        $this->db = new PDO($connectionString);
    }

    public function query($query, $class = null, $params = []){
        $prepere = $this->db->prepare($query);

        if($class){
            $prepere->setFetchMode(PDO::FETCH_CLASS, $class);
        }

        $prepere->execute($params);

        return $prepere;
    }
}