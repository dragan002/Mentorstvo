<?php
namespace App\Model\Products; 

use App\Model\Database\Database;
use PDO;
use PDOException;
use Exception;
class Products extends Database {
    const TABLE_NAME = 'products';

    public function getAllProduct(): array {
        try {

            $sql =  "SELECT * FROM " . self::TABLE_NAME;
            $stmt = $this->getConnection() -> prepare($sql);
            $stmt->execute();

            return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            throw new Exception("Error retrieving products: " . $e->getMessage());
        }
    }

    public function getProductById($id): ?array {
        try {
            $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE id = :id";
            $stmt = $this->getConnection() -> prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }  catch (PDOException $e) {
            die("Failed to retrieve data from database: " . $e->getMessage());
        }
    }

    public function deleteProduct(int $productId): bool{
        $sql = "DELETE  FROM ". self::TABLE_NAME . " WHERE id=:productId";
        
        $stmt = $this->getConnection() ->prepare($sql);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        if (!$stmt->execute()) {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            return false;
        };
        return true;
    }

    public function updateProduct(array $product): bool {
        try {
            $sql = "UPDATE " . self::TABLE_NAME . " SET
                name = :name,
                description = :description,
                price = :price,
                quantity = :quantity
                WHERE id = :id";
    
            $stmt = $this->getConnection()->prepare($sql);
    
            $stmt->bindParam(':name', $product['name'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $product['description'], PDO::PARAM_STR);
            $stmt->bindParam(':price', $product['price'], PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $product['quantity'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $product['id'], PDO::PARAM_INT);
    
            if (!$stmt->execute()) {
                return false; 
            } 
    
            return true;
        } catch (PDOException $e) {
            error_log("Error during updating: " . $e->getMessage());
            return false;
        }
    }

    public function searchProduct(string $search): array {
        try {
            $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE id = :id OR  name LIKE :name ORDER BY name ASC";
            $stmt = $this->getConnection()->prepare($sql);

            $searchTerms = "%" . $search . "%";

            $stmt->bindParam(':id', $search, PDO::PARAM_INT);
            $stmt->bindParam(':name', $searchTerms, PDO::PARAM_STR);

            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch  (PDOException $e) {
            throw new Exception("Database error: " + $e->getMessage(), 1);
        }
    }
    
    public function addProduct(array $product) :bool {
        try {
            $sql = "INSERT INTO " . self::TABLE_NAME . " (name, description, price, quantity) VALUES (:name, :description, :price, :quantity)";

            $stmt = $this->getConnection()->prepare($sql);

            $stmt->bindParam(':name', $product['name'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $product['description'], PDO::PARAM_STR);
            $stmt->bindParam(':price', $product['price'], PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $product['quantity'], PDO::PARAM_INT);

            if(!$stmt->execute()) {
                die('Failed to insert new product');
            }
            return true;
        }  catch (PDOException $e) {
            echo 'Error!: ' . $e->getMessage() . '<br/>';
            return false;
        }
    }
}