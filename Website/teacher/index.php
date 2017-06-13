<?php
session_start();
$teacher = $_SESSION["login-data"];
echo "<h1 style='text-align: center'>Als " . $teacher["name"] . " (Lehrkraft) eingeloggt</h1>";

