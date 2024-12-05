<?php
require_once(__DIR__ . "/../utils/database.php");

class Categories
{
    private $id;
    private $name;
    private $db;
    private $conn;

    /**
     * @param $id
     * @param $name
     */
    public function __construct($id = 0, $name = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->db = new Database();
        $this->conn = $this->db->pdo;
    }

    /**
     * @return int|mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed|string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCountCategories() {
        $query = "SELECT COUNT(*) FROM categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getAllCategories() {
        $query = "SELECT name FROM categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIdByName($name) {
        $query = "SELECT id FROM categories WHERE name = :name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(["name" => $name]);
        return $stmt->fetchColumn();
    }

    public function getNameById($id) {
        $query = "SELECT name FROM categories WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(["id" => $id]);
        return $stmt->fetchColumn();
    }
}