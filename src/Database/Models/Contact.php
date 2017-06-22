<?php
namespace Database\Models;

use PDO;

class Contact {

    private $id;
    private $name;
    private $email;
    private $phone;

    public $db;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'contactbook';
        $username = 'root';
        $password = '';

        try {
            $this->db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
            die();
        }
    }

    public function findAll() {
        $rows = $this->db->prepare('SELECT * FROM contact');
        $rows->execute();

        return $rows;
    }

    public function insertContact() {
        $rows = $this->db->prepare('INSERT INTO contact (name, email, phone) VALUES (?, ?, ?)');
        $rows->bindValue(1, $this->getName());
        $rows->bindValue(2, $this->getEmail());
        $rows->bindValue(3, $this->getPhone());
        $rows->execute();
    }

    public function getSelectedRecord($id) {
        $rows = $this->db->prepare('SELECT * FROM contact WHERE id = ?');
        $rows->bindValue(1, $id);
        $rows->execute();
        $data = $rows->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateContact() {
        $rows = $this->db->prepare('UPDATE contact SET name = ?, email = ?, phone = ? WHERE ID = ?');
        $rows->bindValue(1, $this->getName());
        $rows->bindValue(2, $this->getEmail());
        $rows->bindValue(3, $this->getPhone());
        $rows->bindValue(4, $this->getId());
        $rows->execute();
    }

    public function deleteContact($id) {
        $rows = $this->db->prepare('DELETE FROM contact WHERE id = ?');
        $rows->bindValue(1, $id);
        $rows->execute();
    }

    // public function printReport($html) {
    //     $dompdf = new DOMPDF();
    //     $dompdf->loadHtml($html);
    //     $dompdf->render();
    //     $dompdf->stream("sample.pdf");
    // }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }
}