<?php

namespace View;


require_once __DIR__ . "/Classes/CreateBid.php";

use Classes\CreateBid;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create_bid</title>
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

    <form action="create_bid_index.php?id=<?php echo $_GET['id'] ?>" method="POST">
        <input type="text" id="bid" class="form-control" name="bid" required />
        <input type="submit" value="envoyer">
    </form>
    <?php




    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $newBid = new CreateBid(
            $_POST["bid"]
        );

        $newBid->create_bid(
            $_GET['id'],
            $_POST["bid"],
            $_SESSION['userid']
        );
    } else {
        CreateBid::show_bids($_GET['id']);
        echo '<br>';
        CreateBid::check_status($_GET['id']);
    }
    ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>

</html>