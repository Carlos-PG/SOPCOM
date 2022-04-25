<?php

    require $_SERVER['DOCUMENT_ROOT'] . '/SOPCOM/config/config.php';

    class Model {

        protected $conn;

        function __construct()
        {
            global $config;
            $credentials = $config['database'];
            $this->conn = new mysqli($credentials['host'], $credentials['user'], $credentials['pw'], $credentials['bd']);
        }
        
        protected function executeSelectQuery($statement) {
            $result = [];
            $statement->execute();
            $result = $statement->get_result();
            while($row = $result->fetch_assoc()) {
                $result[] = $row;
            }
            $this->conn->close();
            return $result;
        }
    }
    
?>