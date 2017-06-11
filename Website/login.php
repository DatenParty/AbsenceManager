<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//if(isset($_POST['username'], $_POST["password"]) && $_POST["username"] == "Collin" && $_POST["password"] == "test123")
echo "<h1 style='text-align: center'>Willkommen, " . test_input($_POST["username"]) . "</h1>";