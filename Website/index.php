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
                    if(isNotEmpty()) {
                        $("input[type='submit']").removeClass("disabled")[0].disabled = false;
                        $("#button-container").addClass("enabled");
                    }
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
                $("input[type='submit']").addClass("disabled")[0].disabled = true;
                $("#button-container").removeClass("enabled");
            }
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

            .disabled {
                opacity: 0.5;
            }

            .content {
                border: solid 2px black;
                width: 600px;
                height: 450px;
                box-sizing: border-box;
                padding: 20px;
                margin: 10vh auto;
            }

            input {
                width: 100%;
                height: 25px;
            }

            input[type='submit'] {
                width: 150px;
                height: 50px;
                background-color: transparent;
                color: white;
                font-size: 12pt;
                transition: 0.3s;
                border: 2px solid black;
            }

            .enabled input[type='submit']:hover {
                background-color: black;
                cursor: pointer;
            }
        </style>
	</head>
	<body>
		<div class="content">
            <h1 class="center">
                Login erforderlich
            </h1>
            <form method="post" action="login.php">
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
        </div>
	</body>
</html>
