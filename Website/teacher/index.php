<?php
session_start();
$teacher = array($_SESSION["login-data"])[0];
if ($teacher["status"] == "teacher") {
?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>AbsenceManager</title>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script>
                $(document).ready(function () {
                    $(".slideDown").slideUp(0);
                    var elementWidth = $(".logged-in").css("width");
                    $(".slideDown, .slideDown li").css({width: elementWidth});

                    $(".logged-in").click(function () {
                        $(".slideDown").slideToggle(500);
                    });
                });
            </script>
            <style>
                body {
                    color: white;
                    background-image: url(../img/background.jpg);
                    background-size: cover;
                    font-family: Roboto;
                }
                @font-face {
                    font-family: Logo;
                    src: url(../res/Amethyst.ttf.woff);
                }
                .logo {
                    font-family: Logo;
                    position: absolute;
                    top: 40px;
                    left: 30px;
                    font-size: 25pt;
                }

                .logged-in {
                    position: absolute;
                    top: 40px;
                    right: 40px;
                    cursor: pointer;
                }
                .logged-in span {
                    font-size: 10pt;
                    margin-left: 5px;
                }

                .slideDown {
                    position: absolute;
                    top: 60px;
                    right: 40px;
                    padding: 0;
                    background-color: white;
                    width: 300px;
                    height: 100px;
                }

                .slideDown ul {
                    position: inherit;
                    right: 0;
                    top: -17px;
                    list-style-type: none;
                    text-align: center;
                    color: black;
                    font-size: 13pt;
                }

                .slideDown li {
                    height: 50px;
                    transition: 0.3s;
                    line-height: 50px;
                }

                .slideDown ul li:hover {
                    background-color: #3EDD60;
                }

                a {
                    color: black;
                    text-decoration: none;
                }

                a:visited {
                    color: black;
                }

                hr {
                    background-color: gray;
                    border: 0;
                    height: 1px;
                    opacity: 0.5;
                    margin: 0 5px;
                }

            </style>
        </head>
        <body>
            <div class="logo">
                AbsenceManager
            </div>
            <div class="logged-in">Als <?= $teacher["name"] ?> (Lehrkraft) angemeldet<span>&#9660;</span></div>
            <div class="slideDown">
                <ul>
                    <li>Passwort ändern</li>
                    <hr>
                    <a href="../logout.php"><li>Logout</li></a>
                </ul>
            </div>
        </body>
    </html>
<?php
} else header("Location: ../logout.php");
?>
