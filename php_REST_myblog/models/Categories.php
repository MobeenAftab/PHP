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

        // Get single category
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

        // Create new category
        public function create() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . '
                SET
                    name = :name';

            $stmt = $this->conn->prepare($query);

            // Clean data.
            // $this->id = htmlspecialchars(strip_tags($this->id));
            $this->name = htmlspecialchars(strip_tags($this->name));
            // $this->created_at = htmlspecialchars(strip_tags($this->created_at));

            // Bind data
            // $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            // $stmt->bindParam(':created_at', $this->created_at);

            // Execute query
            if ($stmt->execute()) {
                return true;
            }
            // print error if error
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        public function update() {
            // Create query
            $query = 'UPDATE ' . $this->table . '
            SET
                name = :name
            WHERE 
                id = :id';

            $stmt = $this->conn->prepare($query);

            // Clean data.
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->name = htmlspecialchars(strip_tags($this->name));

            // Bind data
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);

            // Execute query
            if ($stmt->execute()) {
                return true;
            }
            // print error if error
            printf("Error: %s.\n", $stmt->error);
            return false;
            }
    }