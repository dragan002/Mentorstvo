<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

echo (session_status() == PHP_SESSION_ACTIVE) ? 
(session_destroy() ? "Session is deleted successfully" : "Failed to delete this sesssion") : "There is no session to delete";


header('Location: index.php');
exit();
// test samostalnosti

// preko php api pravis
// Ubaciti json i preko njega

// html umjesto njega json 

// php echo json 

