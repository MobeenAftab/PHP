<?php

    class Categories {
        // DB Params
        private $conn;
        private $table = 'categories';

        // Category properties
        public $id;
        public $name;
        public $created_at;

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Categories
        public function read() {
            // Create query
            $query = 'SELECT * FROM ' . $this->table . ' ORDER BY created_at DESC';

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }
    }