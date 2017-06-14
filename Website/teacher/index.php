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
                    var elementWidth = $(".logged-in-text").css("width");
                    $(".slideDown, .slideDown li").css({width: elementWidth});

                    $(".logged-in-text").click(function () {
                        $(".slideDown").slideToggle(500);
                    });
                });
            </script>
            <style>
                body {
                    color: white;
                    background: url(../img/background.jpg) no-repeat fixed;
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

                .logged-in-text {
                    display: inline-block;
                }

                .logged-in span:not(#notification) {
                    font-size: 10pt;
                    margin-left: 5px;
                }

                .slideDown {
                    position: absolute;
                    top: 80px;
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
                    background-color: lightgreen;
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

                img {
                    width: 50px;
                    height: 50px;
                    margin-right: 20px;
                    vertical-align: middle;
                }

                #notification {
                    color: #3EDD60;
                    position: absolute;
                    margin: 17px 0 0 20px;
                    cursor: pointer;
                }

                .content {
                    width: 500px;
                    margin: 150px auto;
                }

                label {
                    margin-right: 20px;
                }

                textarea {
                    font-family: Roboto;
                    box-sizing: border-box;
                    padding: 10px;
                    width: 500px;
                    height: 200px;
                }

                input[type='submit'], input[type='button'], input[type='reset'] {
                    width: 150px;
                    height: 50px;
                    background-color: transparent;
                    color: white;
                    font-size: 12pt;
                    transition: 0.3s;
                    border: 2px solid white;
                    cursor: pointer;
                }

                input[type='submit']:hover, input[type='button']:hover {
                    background-color: #37BA53;
                    border: none;
                }

                input[type='reset']:hover {
                    background-color: #FC0025;
                    border: none;
                }

            </style>
        </head>
        <body>
            <div class="logo">
                AbsenceManager
            </div>
            <div class="logged-in">
                <span id="notification"></span>
                <img src="../img/bell.png">
                <div class="logged-in-text">
                    Als <?= $teacher["name"] ?> (Lehrkraft) angemeldet<span>&#9660;</span>
                </div>
            </div>
            <div class="slideDown">
                <ul>
                    <li>Passwort ändern</li>
                    <hr>
                    <a href="../logout.php"><li>Logout</li></a>
                </ul>
            </div>
            <div class="content">
                <label for="select-days">Bitte Krankheitszeitraum auswählen:</label>
                <select id="select-days">
                    <option value="1" selected="selected">Ein Tag</option>
                    <option value="2">Zwei Tage</option>
                    <option value="3">Drei Tage</option>
                    <option value="4">Vier Tage</option>
                    <option value="5">Fünf Tage</option>
                    <option value="6">Sechs Tage</option>
                    <option value="7">Sieben Tage</option>
                </select>
                <br><br><br>
                <label for="area">Nachricht:</label><br>
                <textarea id="area"></textarea>
                <br><br>
                <div style="text-align: center"><input style="width: 200px" type="button" id="document" value="Dokument hochladen">&ensp;(optional)</div>
                <br><br>
                <input type="reset" style="float: left" value="Abbrechen"><input type="submit" style="float: right" value="Senden">
            </div>
        </body>
    </html>
<?php
} else header("Location: ../logout.php");
?>
