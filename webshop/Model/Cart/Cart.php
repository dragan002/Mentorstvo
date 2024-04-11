<?php
namespace App\Model\Cart; 

use App\Model\Database\Database;
use PDO;
use PDOException;
use Exception;
class Cart extends Database {
    const TABLE_NAME = 'cart';

    public function addToCart(array $product) :bool {
        try {
            $sql = "INSERT INTO " . self::TABLE_NAME . " (name, user_id, product_id, price, quantity) VALUES (:name, :user_id, :product_id, :price, :quantity)";

            $stmt = $this->getConnection()->prepare($sql);

            $stmt->bindParam(':name', $product['name'], PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $product['user_id'], PDO::PARAM_INT);
            $stmt->bindParam(':product_id', $product['product_id'], PDO::PARAM_INT);
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

    public function findAllFromCartByUser($userId): array {
        try {
            $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE user_id = :userId";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (PDOException $e) {
            throw new Exception("Error retrieving products from cart: " . $e->getMessage());
        }
    }
    public function deleteProductFromCart(int $userId): bool{
        $sql = "DELETE  FROM ". self::TABLE_NAME . " WHERE user_id=:userId LIMIT 1";
        
        $stmt = $this->getConnection() ->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        if (!$stmt->execute()) {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            return false;
        };
        return true;
    }
}