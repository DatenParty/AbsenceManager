<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script>
            $(document).ready(function () {
                disable();
                $("input:not(input[type='submit'])").on("input", function () {
                    if(isNotEmpty()) $("input[type='submit']")[0].disabled = false;
                    else disable();
                });
            });

            function isNotEmpty() {
                var ret = true;
                $("input:not(input[type='submit'])").map(function () {
                    if ($(this).val().length === 0) ret = false;
                });
                return ret;
            }

            function disable() {
                $("input[type='submit']")[0].disabled = true;
            }

            $("input[type='submit']").click(function () {
                if($(this)[0].disabled) $("#errormsg").css({opacity: 1});
            });
        </script>
        <style>
            body {
                font-family: Roboto;
                background: url("img/background.jpg");
                background-size: cover;
                color: white;
            }

            .center {
                text-align: center;
            }

            .content {
                width: 600px;
                height: 500px;
                box-sizing: border-box;
                padding: 20px;
                margin: calc(50vh - 285px) auto 0 auto;
            }

            input {
                width: 100%;
                height: 25px;
                margin-bottom: 20px;
            }

            input[type='submit'] {
                width: 150px;
                height: 50px;
                background-color: transparent;
                color: white;
                font-size: 12pt;
                transition: 0.3s;
                border: 2px solid white;
                cursor: pointer;
            }

            input[type='submit']:hover {
                background-color: black;
                border: none;
            }

            #errormsg {
                opacity: 0;
            }
        </style>
	</head>
    <?php
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function find_account($school, $username, $password) {
            $list = json_decode(file_get_contents("login.json"), true);
            foreach ($list as $key => $value)
                if ($key == $school) {
                    foreach ($school as $teacher)
                        if ($teacher["username"] == $username && $teacher["password"] == $password) return $teacher;
                }
            return "";
        }
    ?>
	<body>
		<div class="content">
            <h1 class="center">
                Login erforderlich
            </h1>
            <?php
                if (isset($_POST["school"], $_POST["username"], $_POST["password"])) {
            ?>
                    <p id="errormsg">Bitte füllen Sie alle Felder aus</p>
                    <form method="post" action="index.php">
                        <label for="school">Schule</label>
                        <input type="text" id="school" name="school">

                        <label for="username">Benutzername</label>
                        <input type="text" id="username" name="username">

                        <label for="password">Passwort</label>
                        <input type="password" id="password" name="password">

                        <div class="center" id="button-container"><input type="submit" value="Login"></div>
                    </form>
            <?php
                } else if (find_account(test_input($_POST["school"]), test_input($_POST["username"]), test_input($_POST["password"])) != "") {
            ?>

            <?php
                } else {
            ?>
                    <p style="color: red">Ihr Account konnte entweder nicht gefunden werden, oder Ihr Passwort war falsch</p>
                    <form method="post" action="index.php">
                        <label for="school">Schule</label>
                        <input type="text" id="school" name="school">
                        <br><br>
                        <label for="username">Benutzername</label>
                        <input type="text" id="username" name="username">
                        <br><br>
                        <label for="password">Passwort</label>
                        <input type="password" id="password" name="password">
                        <br><br>
                        <div class="center enabled" id="button-container"><input type="submit" value="Login"></div>
                    </form>
            <?php
                }
            ?>
        </div>
	</body>
</html>
