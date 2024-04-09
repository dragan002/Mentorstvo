<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

echo (session_status() == PHP_SESSION_ACTIVE) ? 
(session_destroy() ? "Session is deleted successfully" : "Failed to delete this sesssion") : "There is no session to delete";
