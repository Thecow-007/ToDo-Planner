<!-- COLE -->
<!DOCTYPE html>
<html lang="en">
<!-- Please Note: The paper effect seen here was sourced from https://www.codesdope.com/blog/article/getting-notebook-paper-effect-with-css/,
Then altered for use on this page. -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo: Login</title>
    <script src="./ToDo_JS/login.js"></script>
    <link rel="stylesheet" href="./ToDo_CSS/login.css">
</head>

<!-- DANIEL -->
<?php
    require_once './ToDo_PHP/db_connection.php';
    require_once './ToDo_PHP/login.php';
    $connection = openConnection();
?>
<body>
    <div id="paper">
        <div id="pattern">
<!-- COLE -->
            <h1 id="title">Login</h1>
            <div class="formcontainer">
                <form action="./index.php" method="post" onsubmit="return AccountLogin();">
                    <div class="textfieldUsername">
                        <label for="username" id="TextUsername">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" class="typingbox">
                        <div id="UserErrorText" style="display: inline;"><h2></h2></div>
                    </div>

                    <div class="textfieldPassword">
                        <label for="pass" id="TextPassword">Password</label>
                        <input type="password" name="pass" id="pass" placeholder="Password" class="typingbox">
                        <div id="PassErrorText" style="display: inline;"><h2></h2></div>
                    </div>

                    <div class="buttons">
                        <button type="submit" id="Login-button">Login</button>
                    </div>
                </form>

                <div id="user-box" class="buttons">
                    <a href="./ToDo_PHP/CreateAccount.php"><button id="CreateAccount-button">Create New Account</button>
                    </a>
                </div>

            </div>
        </div>
    </div>
</body>

</html>