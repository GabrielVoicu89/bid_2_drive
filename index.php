<?php

namespace View;

require_once __DIR__ . "/Class/Register.php";

use Class\Register;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newRegister = new Register(
        $_POST["username"],
        $_POST["email"],
        $_POST["password"],
    );
    $newRegister->register(
        $_POST["username"],
        $_POST["email"],
        $_POST["password"]
    );
    header('Location: login_index.php');
    //header("Refresh:0; url=page2.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid2DRive</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1 class="mb-3">Sign Up</h1>
        <form action="index.php" method="POST">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" id="form3Example2" class="form-control" name="username" required />
                <label class="form-label" for="form3Example2">Username</label>
            </div>


            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" name="email" required />
                <label class="form-label" for="form3Example3">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" name="password" required />
                <label class="form-label" for="form3Example4">Password</label>
            </div>


            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

        </form>
    </div>

    <!-- Pills content -->
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>




</body>

</html>