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

        public function read_single() {
            // Create query
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ? LIMIT 0,1';

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Fetch assoc array property binding
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->created_at = $row['created_at'];

            return $stmt;
        }
    }