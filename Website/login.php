<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
echo "<h1 style='text-align: center'>Willkommen, " . test_input($_POST["username"]) . "</h1>";