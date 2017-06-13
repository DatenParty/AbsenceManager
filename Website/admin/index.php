<?php
session_start();
$admin = $_SESSION["login-data"];
echo "<h1 style='text-align: center'>Als " . $admin["name"] . " (Admin) eingeloggt</h1>";