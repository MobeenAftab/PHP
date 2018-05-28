<?php
    // Post class.
    class Post {
        // DB Params
        private $conn;
        private $table = 'posts';

        // Post properties
        public $id;
        public $category_id;
        public $category_name;
        public $title;
        public $body;
        public $author;
        public $created_at;

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Posts
        public function read() {
            // Create query with alises and join.
            $query = 'SELECT 
                        c.name as category_name,
                        p.id,
                        p.category_id,
                        p.title,
                        p.body,
                        p.author,
                        p.created_at
                    FROM 
                        ' . $this->table . ' p
                        LEFT JOIN
                            categories c ON p.category_id = c.id
                        ORDER BY
                        p.created_at DESC';

            // Prapare statment PDO.
            $stmt = $this->conn->prepare($query);

            // Execute query.
            $stmt->execute();

            return $stmt;
        }
                
        //  Get single post
        public function read_single() {
            // Create query
            $query = 'SELECT 
                c.name as category_name,
                p.id,
                p.category_id,
                p.title,
                p.body,
                p.author,
                p.created_at
            FROM 
                ' . $this->table . ' p
                LEFT JOIN
                    categories c ON p.category_id = c.id
                WHERE
                    p.id = ?
                LIMIT 0,1';
            
            // Prapare statment PDO.
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->id);

            // execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties
            $this->title = $row['title'];
            $this->body = $row['body'];
            $this->author = $row['author'];
            $this->category_id = $row['category_id'];
            $this->catergory_name = $row['catergory_name'];
        }

        // Create Post.
        public function create() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . '
                SET
                    title = :title,
                    body = :body,
                    author = :author,
                    category_id = :category_id';
            
            // Prepare query
            $stmt = $this->conn->prepare($query);

            //  Clean data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->body = htmlspecialchars(strip_tags($this->body));
            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));

            // Bind data
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':body', $this->body);
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':category_id', $this->category_id);

            // Execute query
            if ($stmt->execute()) {
                return true;
            }
            // print error if error
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }