<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function find_account($school, $username, $password) {
    $list = json_decode(file_get_contents("login.json"), true);
    foreach ($list as $val) {
        foreach ($val as $key => $value) {
            if ($key == $school) {
                foreach ($value as $teacher) {
                    if ($teacher["username"] == $username && $teacher["password"] == $password) return $teacher;
                }
            }
        }
    }
    return "";
}

function get_all($school) {
    $array = "";
    $list = json_decode(file_get_contents("login.json"), true);
    foreach ($list as $val) {
        foreach ($val as $key => $value) {
            if ($key == $school) {
                $array = array_filter($value, function ($e) {
                    return $e["status"] == "teacher" || $e["status"] == "management";
                });
            }
        }
    }
    return $array;
}

function get_all_teachers($school) {
    $array = "";
    $list = json_decode(file_get_contents("login.json"), true);
    foreach ($list as $val) {
        foreach ($val as $key => $value) {
            if ($key == $school) {
                $array = array_filter($value, function ($e) use ($school) {return $e["status"] == "teacher";});
            }
        }
    }
    return $array;
}