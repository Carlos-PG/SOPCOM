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

        function __destruct() {
            $this->conn->close();
        }
        
        protected function executeSelectQuery($statement) {
            $result = [];
            $statement->execute();
            $rows = $statement->get_result();
            while($row = $rows->fetch_assoc()) {
                $result[] = $row;
            }
            return $result;
        }

        protected function executeDeleteQuery($statement) {
            $statement->execute();
            $error = $statement->errno;
            return $error;
        }
    }
    
?>