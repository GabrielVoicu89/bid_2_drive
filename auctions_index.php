<?php

namespace View;

include_once __DIR__ . "/DB/Database.php";

use Db\Database;
use PDO;

$dbh = Database::createDBConnection();
$query = $dbh->prepare("SELECT * FROM `cars` 
        ");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

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
    <?php
    require_once __DIR__ . "/Menu/nav.php"

    ?>
    <h1>Auctions</h1>
    <?php foreach ($result as $element) {
        $id = $element['id'];
        $url = "create_bid_index.php?id=" . urlencode($id);


    ?>


        <div class="projcard-container">
            <a href=<?php echo $url; ?>>
                <div class="projcard projcard-blue">
                    <div class="projcard-innerbox">
                        <img class="projcard-img" src="https://picsum.photos/800/600?image=1041" />
                        <div class="projcard-textbox">


                            <div class="projcard-title"><?php echo $element['make']; ?>
                                <?php echo $element['model']; ?>
                            </div>
                            <div class="projcard-subtitle">
                                Power : <?php echo $element['power']; ?>
                                Year : <?php echo $element['year']; ?>


                            </div>
                            <div class="projcard-bar"> </div>
                            <div class="projcard-description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi doloremque facilis sit hic unde, repellendus quis amet soluta animi exercitationem aut cupiditate, veniam id nihil deleniti minima, quam reprehenderit. Officia.

                                <?php echo $element['description']; ?></div>
                            <div class="projcard-tagbox">
                                <span class="projcard-tag"> <?php echo $element['price']; ?></span>
                                <span class="projcard-tag"> <?php echo $element['auction_start']; ?></span>
                                <span class="projcard-tag"><?php echo $element['auction_end']; ?></span>

                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>







        </div>

        <!-- Pills content -->
        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>




</body>

</html>