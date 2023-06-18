<?php


namespace View;



require_once __DIR__ . "/Classes/CreateAuction.php";

use Classes\CreateAuction;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Auction</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require_once __DIR__ . "/Menu/nav.php"
    ?>
    <div class="container">
        <h1 class="mb-3">Create auction</h1>
        <?php

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $newCar = new CreateAuction(
                $_POST["make"],
                $_POST["model"],
                $_POST["power"],
                $_POST["year"],
                $_POST["description"],
                $_POST["price"],
                $_POST["auction_start"],
                $_POST["auction_end"]
            );

            $newCar->create_auction(
                $_POST["make"],
                $_POST["model"],
                $_POST["power"],
                $_POST["year"],
                $_POST["description"],
                $_SESSION['userid'],
                $_POST["price"],
                $_POST["auction_start"],
                $_POST["auction_end"]
            );
        }
        ?>
        <form action="createauction_index.php" method="POST">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="form6Example1" class="form-control" name="make" />
                        <label class="form-label" for="form6Example1">Make</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="form6Example2" class="form-control" name="model" />
                        <label class="form-label" for="form6Example2">Model</label>
                    </div>
                </div>
            </div>

            <!-- Power input -->
            <div class="form-outline mb-4">
                <input type="number" id="form6Example3" class="form-control" name="power" />
                <label class="form-label" for="form6Example3">Power</label>
            </div>

            <!-- Year input -->
            <div class="form-outline mb-4">
                <input type="number" id="form6Example4" class="form-control" name="year" />
                <label class="form-label" for="form6Example4">Year</label>
            </div>

            <!-- Description input -->
            <div class="form-outline mb-4">
                <textarea id="form6Example5" class="form-control" name="description"></textarea>
                <label class="form-label" for="form6Example5">Description</label>
            </div>

            <!-- Price input -->
            <div class="form-outline mb-4">
                <input type="number" id="form6Example6" class="form-control" name="price" />
                <label class="form-label" for="form6Example6">Price</label>
            </div>

            <!-- Auction start input -->
            <div class="mb-4">
                <label class="form-label" for="form6Example7">Auction start</label>
                <input type="datetime-local" id="form6Example6" class="form-control" name="auction_start" />

            </div>

            <!-- Auction end input -->
            <div class="mb-4">
                <label class="form-label" for="form6Example8">Auction end</label>
                <input type="datetime-local" id="form6Example6" class="form-control" name="auction_end" />

            </div>










            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Start auction</button>
        </form>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>

</html>