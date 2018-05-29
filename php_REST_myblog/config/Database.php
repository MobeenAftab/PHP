<?php
    // Class to connect to our databse
    class Database {
        // DB params.
        private $host = 'localhost';
        private $db_name = 'myblog';
        private $username = 'root';
        private $password = '';
        private $conn;


        // DB connect function, used by models to make DB connections.
        public function connect() {
            $this->conn = null;

            // Create a new PDO Object.
            try {
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' .
                $this->db_name, $this->username, $this->password);
                // Get expetion when quries made.
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'Connection Error: ' . $e->getMessage();
            }

            return $this->conn;
        }
    }
