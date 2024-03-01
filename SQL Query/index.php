<?php

require("../initialize.php");

// var_dump($db);
//Exercise 1;
// function insertUser($email, $lozinka, $datum) {
//     global $db;

//     try {
//         $sql = "INSERT INTO `korisnici` (`email`, `lozinka`, `datum_rodjenja`) VALUES (:email, :lozinka, :datum_rodjenja)";
    
//         $stmt = $db->prepare($sql);
    
//         $stmt->bindParam(':email', $email, PDO::PARAM_STR);
//         $stmt->bindParam(':lozinka', $lozinka, PDO::PARAM_STR);
//         $stmt->bindParam(':datum_rodjenja', $datum, PDO::PARAM_STR);  
    
//         $result = $stmt->execute();
        
//         if (!$result) {
//             die('Database failed: ' . print_r($stmt->errorInfo(), true));
//         }

//         return true;
//     } catch (PDOException $e) {
//         return "Failed to insert data in the database: " . $e->getMessage();
//     }
// }
// // Exercise 2
// function selectByEmail($email) {
//     global $db;

//     $sql = "SELECT * FROM  korisnici WHERE email=:email LIMIT 1";

//     $stmt = $db->prepare($sql);
//     $stmt->bindParam(':email', $email, PDO::PARAM_STR);
//     $stmt->execute();

//     // execute query

//     $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
 
//     return $result;
// }

// // echo insertUser('mojmail@gmail.com', '12345', '1990-10-10');

// print_r(selectByEmail('mojmail@gmail.com'));

//Exercise 1
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertUser($email, $lozinka, $datum) {
        try {
            $sql = "INSERT INTO `korisnici` (`email`, `lozinka`, `datum_rodjenja`) VALUES (:email, :lozinka, :datum_rodjenja)";
            $stmt = $this->db->prepare($sql);
    
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':lozinka', $lozinka, PDO::PARAM_STR);
            $stmt->bindParam(':datum_rodjenja', $datum, PDO::PARAM_STR);
    
            $result = $stmt->execute();
            
            if(!$result) {
                throw new Exception("Error follow by inserting new user in database");
            }
            return true;

        } catch(Exception $e) {
            die($e->getMessage());
            }
    }

    public function selectByEmail($email) {
        try {
            $sql = "SELECT * FROM `korisnici` WHERE  `email`= :email LIMIT 1";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam('email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$result) {
                throw new Exception ("There is now  record with this email adress." . print_r($stmt->errorInfo()));
            }
            return $result;

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function selectOlderThen($year) {
        try {
            $sql = "SELECT * FROM `korisnici` WHERE YEAR(`datum_rodjenja`) < :year ORDER BY `datum_rodjenja` DESC";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':year', $year, PDO::PARAM_INT);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e) {
            die($e->getMessage());
        } 
    }

    public function selectByMonth($month) {
        try {
            $sql = "SELECT * FROM `korisnici` WHERE MONTH(`datum_rodjenja`) = :month ORDER BY `datum_rodjenja` DESC";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':month', $month, PDO::PARAM_INT);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e) {
            die($e->getMessage());
        } 
    }

    public function selectByMonthAndYear($month, $year) {
        try {
            $sql = "SELECT * FROM `korisnici` WHERE MONTH(`datum_rodjenja`) = :month AND YEAR(`datum_rodjenja`) = :year ORDER BY `datum_rodjenja` DESC";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':month', $month, PDO::PARAM_INT);
            $stmt->bindParam(':year', $year, PDO::PARAM_INT);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e) {
            die($e->getMessage());
        } 
    }

    public function selectYoungestToOldest() {
        try {
            $sql = "SELECT * FROM `korisnici` ORDER BY `datum_rodjenja` DESC";
            $stmt = $this->db->prepare($sql);

            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e) {
            die($e->getMessage());
        } 
    }
}


$lazar = new User($db);
$lazar->insertUser('zola@gmail.com', 'zoLaLazo', '1995-12-02');

$dragan = $lazar->selectByEmail('draganvujic29@gmail.com');
print_r($dragan); 
echo "<hr>";
foreach($dragan as  $value) {
    echo $value . "<br>";
}

echo "<hr>";
$olderThen = new User($db);
$results = $olderThen->selectOlderThen(1995);
foreach($results as $result) {
    echo $result['email'] . "<br>";
}

echo "<hr>";

$monthOfBirday = new User($db);
$decemberKids = $monthOfBirday->selectByMonth(12);
print_r($decemberKids);

echo "<hr>";
$specialKids = new User($db);
$rastko = $specialKids->selectByMonthAndYear(10, 1990);
print_r($rastko);

echo "<hr>";
$youngest = new User($db);
print_r($youngest->selectYoungestToOldest());

echo "<hr>";