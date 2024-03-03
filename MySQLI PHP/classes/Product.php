<?php

include_once('../initialize.php');

class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addProduct($name, $description, $price, $date, $quantity) {
        try {
            $sql = "INSERT INTO `proizvodi` (`ime`, `opis`, `cena`, `dan_nabavke`, `kolicina`) VALUES (:name, :description, :price, :date, :quantity)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_INT);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);

            $result = $stmt->execute();

            if(!$result) {
                throw new Exception("Error adding product");
            }

            return true;
        } catch (Exception $e) {
            die("Error" . $e->getMessage());
        }
    }
}

$potato = new Product($db);
// $artemis = $potato ->addProduct('krompir', 'sorta Artemis', '2', '2024-03-02', '2');
$severina = $potato ->addProduct('krompir', '', 22, '', '');