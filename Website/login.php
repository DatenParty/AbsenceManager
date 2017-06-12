<?php
session_start();
$teacher = $_SESSION["login-data"];
if ($teacher["status"] == "admin") header("Location: admin.php");
else if ($teacher["status"] == "it") header("Location: it.php");
else {
    echo "Als " . $teacher["name"] . " (Lehrer) eingeloggt";
}