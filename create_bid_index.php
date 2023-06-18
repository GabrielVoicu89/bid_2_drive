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

</head>

<body>
    <form action="create_bid_index.php?id=<?php echo $_GET['id'] ?>" method="POST">
        <input type="text" id="bid" class="form-control" name="bid" required />
        <input type="submit" value="envoyer">
    </form>
    <?php

    var_dump($_GET['id']);


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $newBid = new CreateBid(
            $_POST["bid"]
        );

        $newBid->create_bid(
            $_GET['id'],
            $_POST["bid"],
            $_SESSION['userid']
        );
    }
    ?>

</body>

</html>