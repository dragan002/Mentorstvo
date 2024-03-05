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

    public function insertUser($user) {
        try {
            $this->conn = $this->getConnection();
            
            $sql = ("INSERT INTO `korisnici` (`email`, `sifra`) VALUES (:email, :sifra)");

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam( ":email", $user['email'], PDO::PARAM_STR );
            $stmt->bindParam( ":sifra", $user['sifra'], PDO::PARAM_STR );

            $result = $stmt->execute();

            if (!$result) {
                die("Failed to insert data into the database: " . $stmt->errorInfo()[2]);
            };

            return true; 
        } catch(PDOException $pDOException) {
            die("Error with connection or querying database: " . $pDOException->getMessage());
        }
    }
}
