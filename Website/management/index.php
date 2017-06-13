<?php
session_start();
$management = $_SESSION["login-data"];
echo "<h1 style='text-align: center'>Als " . $management["name"] . " (Verwaltung) eingeloggt</h1>";