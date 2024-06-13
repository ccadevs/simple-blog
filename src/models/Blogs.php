<?php

    class Blogs {
        private $conn;
        private $table = 'blog_posts';

        public $id;
        public $slug;
        public $title;
        public $content;
        public $author;
        public $image;
        public $category_id;
        public $created_at;
        public $updated_at;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function create() {
            $query = "INSERT INTO " . $this->table . " (slug, title, content, author, image, category_id, created_at, updated_at) VALUES (:slug, :title, :content, :author, :image, :category_id, :created_at, :updated_at)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':slug', $this->slug);
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':content', $this->content);
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':image', $this->image);
            $stmt->bindParam(':category_id', $this->category_id);
            $stmt->bindParam(':created_at', $this->created_at);
            $stmt->bindParam(':updated_at', $this->updated_at);
            return $stmt->execute();
        }

        public function readAll() {
            $query = "
            SELECT 
                blog_posts.id, 
                blog_posts.slug, 
                blog_posts.title, 
                blog_posts.content, 
                blog_posts.author, 
                blog_posts.image, 
                blog_posts.created_at, 
                blog_posts.updated_at, 
                blog_posts.category_id, 
                categories.name AS category_name 
            FROM 
                blog_posts 
            LEFT JOIN 
                categories 
            ON 
                blog_posts.category_id = categories.id 
            ORDER BY 
                blog_posts.created_at DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function readSingle($slug) {
            $query = "SELECT blog_posts.id, blog_posts.slug, blog_posts.title, blog_posts.content, blog_posts.author, blog_posts.image, blog_posts.created_at, blog_posts.updated_at, blog_posts.category_id, categories.name AS category_name FROM " . $this->table . " LEFT JOIN categories ON blog_posts.category_id = categories.id WHERE slug = :slug LIMIT 0,1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':slug', $slug);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function update() {
            $query = "UPDATE " . $this->table . " SET title = :title, content = :content, author = :author, image = :image, category_id = :category_id, updated_at = :updated_at WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':content', $this->content);
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':image', $this->image);
            $stmt->bindParam(':category_id', $this->category_id);
            $stmt->bindParam(':updated_at', $this->updated_at);
            $stmt->bindParam(':id', $this->id);
            return $stmt->execute();
        }

        public function delete() {
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $this->id);
            return $stmt->execute();
        }
    }

?>
