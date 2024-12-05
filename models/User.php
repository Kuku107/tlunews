<?php
    require_once (__DIR__ . "/../utils/database.php");
    class User {
        private $id;
        private $username;
        private $password;
        private $role;
        private $db;
        private $conn;

        /**
         * @param $id
         * @param $username
         * @param $password
         * @param $role
         */
        public function __construct($id = 0, $username = "", $password = "", $role = 0)
        {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->role = $role;
            $this->db = new Database();
            $this->conn = $this->db->pdo;
            if ($this->id === 0 && $this->username === "" && $this->password === "" && $this->role === 0) {
                $this->id = round(microtime(true) * 1000);
            }
        }

        public function getId() {
            return $this->id;
        }

        /**
         * @return mixed
         */
        public function getUsername()
        {
            return $this->username;
        }

        /**
         * @param mixed $username
         */
        public function setUsername($username)
        {
            $this->username = $username;
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
        }

        /**
         * @return mixed
         */
        public function getRole()
        {
            return $this->role;
        }

        /**
         * @param mixed $role
         */
        public function setRole($role)
        {
            $this->role = $role;
        }

        public function getByUsername($username){
            $query = "SELECT * FROM users WHERE username =:username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
