<?php
require_once('../../model/databaseModel/Database.php');
require_once('../../model/userModel/Users.php');

$database = new Database();
$conn = $database->getConnection(); 

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    if(!empty($email) && !empty($password)) {
        $registration = new Users($conn);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $registration->createUser($email, $hashedPassword);
    } else {
        echo "Provide email and password";
    }
}

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
if($_SERVER['REQUEST_METHOD'] == "GET") {
    if(isset($_GET['search'])) {
        $typedWord = $_GET['search'];
        $user = new Users($conn);
        $foundWordsInEmail = $user->searchEmailByWord($typedWord);
    
        if (!$foundWordsInEmail) {
            die("We didn't find $typedWord in our database");
        }
            echo "You are looking for '$typedWord' and  we have found these emails:<br>";
    
            $count = 1;
    
            foreach ($foundWordsInEmail as $wordCount => $value) { ?>
                <h3><?php echo $count. " " . $value ?></h3>
                <?php
                $count++;
            }
    }
}