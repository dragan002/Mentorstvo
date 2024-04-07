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

    public function getProductById(int $id): ?array {
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
        $sql = "DELETE  FROM ".self::TABLE_NAME." WHERE id=:productId";
        
        $stmt = $this->getConnection() ->prepare($sql);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        if (!$stmt->execute()) {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            return false;
        };
        return true;
    }
}