<?php 
require_once('Database.php');
class Users extends Database{
    const TABLE_NAME = 'korisnici';

    public function getRowCount() {
        try {
            $this->conn = $this->getConnection();

            $result = $this->conn->query("SELECT * FROM " . self::TABLE_NAME);
        
            if($result !==  false) {
                $data = $result->rowCount();
                return sprintf('Ukupan broj korisnika: %d', $data);
            } else {
                echo "Query failed";
            }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }        
        }
        
    public function getAllData() {
        try {
            $this->conn = $this->getConnection();

            $result = $this->conn->query("SELECT * FROM " . self::TABLE_NAME);

            if($result !== false) {
                $data = $result->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } else {
                echo "Queary failed: can't fetch all";
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
