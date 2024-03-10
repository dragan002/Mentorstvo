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
            
            return true;
        } catch (Exception $e) {
            die( "Error : " . $e->getMessage() );
        }
    }
}