<?php
session_start();
$teacher = $_SESSION["login-data"];
if ($teacher["status"] == "admin") header("Location: admin");
else if ($teacher["status"] == "it") header("Location: management");
else {
    echo "Als " . $teacher["name"] . " (Lehrer) eingeloggt";
}