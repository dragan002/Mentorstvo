<?php

require_once '../model/database/Database.php';

$database = new Database();
$conn = $database->getConnection();

// if(isset($_GET['search'])) {
//     $typedEmail = $_GET['search'];
//     $user = new Users($conn);
//     $emailFromDb = $user->searchEmail($typedEmail);

//     if($typedEmail == $emailFromDb) {
//         echo sprintf("You are looking email '%s' in the database and we found it", $typedEmail);
//     } else {
//         echo sprintf("'%s' is not in the database", $typedEmail);
//     }
// }

if (isset($_GET['search'])) {
    $typedWord = $_GET['search'];
    $user = new Users($conn);
    $foundWordsInEmail = $user->searchEmailByWord($typedWord);

    if (!$foundWordsInEmail) {
        die("We didn't find $typedWord in our database");
    }
        echo "You are looking for '$typedWord' and  we have found these emails:<br>";

        $count = 1;

        foreach ($foundWordsInEmail as $wordCount => $value) {
            echo "<h3>$count $value</h3>";
            $count++;
        }
}
class Users {
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function searchEmail($email) {
        $sql = "SELECT * FROM `korisnici` WHERE `email` = :email";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($result as $row) {
            return $row['email'];
        }
    }

    public function searchEmailByWord($email) {
        $sql = "SELECT * FROM `korisnici` WHERE `email` LIKE :email";

        $stmt = $this->conn->prepare($sql);
        $email = "%".$email."%";
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $foundWordsInEmail = [];
        foreach($result as $row) {
            $foundWordsInEmail[] = $row['email'];
        }
        return $foundWordsInEmail;
    }
}