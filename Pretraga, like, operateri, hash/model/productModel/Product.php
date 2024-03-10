<?php

$database = new Database();
$conn = $database->getConnection(); 

class Product {
    protected $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addProduct($name, $description, $price, $image, $quantity) {
        try {
            $sql = "INSERT INTO `proizvodi` (`ime`, `opis`, `cena`, `slika`, `kolicina`) VALUES (:name, :description, :price, :image, :quantity)";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":description" , $description, PDO::PARAM_STR);
            $stmt->bindParam(":price", $price, PDO::PARAM_INT);  
            $stmt->bindParam(":image", $image, PDO::PARAM_STR);
            $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
    
            $result = $stmt->execute();

            if(!$result){ 
                throw new Exception("Error while adding product" . $stmt->error());
            }
            
            return $result;
        } catch (Exception $e) {
            die( "Error : " . $e->getMessage() );
        }
    }
    public function searchProduct($searchedWord) {
        try {
            $sql = "SELECT * FROM `proizvodi` WHERE `ime` LIKE :name OR `opis` LIKE :description";

            $stmt = $this->conn->prepare($sql);

            $name = "%" . $searchedWord . "%";
            $description = "%" . $searchedWord . "%";

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {
            echo 'Error: ' + $e->getMessage();
         }
    }
}
