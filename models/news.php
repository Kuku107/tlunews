<?php
    require_once (__DIR__ . "/../utils/database.php");
    class News {
        private $id;
        private $title;
        private $content;
        private $image;
        private $created_at;
        private $category_id;
        private $db;
        private $conn;

        /**
         * @param $id
         * @param $title
         * @param $content
         * @param $image
         * @param $created_at
         * @param $category_id
         */
        public function __construct($id = 0, $title = "", $content = "", $image = "", $created_at = "", $category_id = 0)
        {
            $this->id = $id;
            $this->title = $title;
            $this->content = $content;
            $this->image = $image;
            $this->created_at = $created_at;
            $this->category_id = $category_id;
            $this->db = new Database();
            $this->conn = $this->db->pdo;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getContent()
        {
            return $this->content;
        }

        /**
         * @param mixed $content
         */
        public function setContent($content)
        {
            $this->content = $content;
        }

        /**
         * @return mixed
         */
        public function getImage()
        {
            return $this->image;
        }

        /**
         * @param mixed $image
         */
        public function setImage($image)
        {
            $this->image = $image;
        }

        /**
         * @return mixed
         */
        public function getCreatedAt()
        {
            return $this->created_at;
        }

        /**
         * @param mixed $created_at
         */
        public function setCreatedAt($created_at)
        {
            $this->created_at = $created_at;
        }

        /**
         * @return mixed
         */
        public function getCategoryId()
        {
            return $this->category_id;
        }

        /**
         * @param mixed $category_id
         */
        public function setCategoryId($category_id)
        {
            $this->category_id = $category_id;
        }

        public function getAllNews() {
            $query = "SELECT COUNT(*) FROM news";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchColumn();
        }
    }