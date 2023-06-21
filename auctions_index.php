<?php

namespace View;

session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: login_index.php');
    die();
}

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

<body class="bodyy">
    <?php
    require_once __DIR__ . "/Menu/nav.php"

    ?>
    <h1>Auctions</h1>
    <div class="projcard-container">
        <?php foreach ($result as $element) {
            //condition to check the auction end
            $id = $element['id'];
            $url = "create_bid_index.php?id=" . urlencode($id);
            $base64Image = base64_encode($element['image']);
        ?>


            <div class="projcard projcard-blue">
                <a href=<?php echo $url; ?>>

                    <div class="projcard-innerbox">
                        <?php echo '<img class="projcard-img" src="data:image/jpeg;base64,' . $base64Image . '" alt="Image" />'; ?>

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
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error molestiae rerum unde nulla incidunt. Dignissimos nesciunt aut voluptate voluptas error modi facilis quia assumenda qui. Animi fugit cupiditate nobis voluptatem sunt, a nisi ut odio nostrum vel veniam nulla saepe illo dolorem ratione harum, possimus non quae doloribus, aperiam eaque minima! Ratione aliquid autem ea totam iusto temporibus, nemo hic quod excepturi optio deserunt minima tempore accusamus error veritatis amet alias suscipit asperiores, magnam tempora ex ipsam commodi eos. Veritatis repellat odit tenetur qui est voluptatem impedit repellendus dicta molestiae veniam eum, laborum nesciunt velit officia, voluptatibus saepe omnis aut quaerat error aspernatur dolore cum enim quis. Deserunt possimus aspernatur asperiores, ducimus assumenda voluptatum vero neque nobis, dolore amet soluta sed harum iure, inventore laboriosam provident quam cupiditate facilis dolorem laborum eos ea enim fuga deleniti? Maxime tempore quas iste perferendis tenetur error veniam nostrum neque, fugiat consequatur assumenda minima a illo quidem blanditiis excepturi, reprehenderit odio repudiandae. Tempore incidunt fugit aliquam! Laboriosam deserunt deleniti maxime tempore earum inventore odit, voluptatibus vitae quibusdam laudantium ullam cupiditate nihil explicabo. Temporibus officia, a recusandae facilis, earum excepturi qui exercitationem consequuntur nesciunt quibusdam, accusamus fugiat enim esse illo nulla natus. Nostrum at iste dolores laudantium accusantium ex porro omnis odit et. Libero quisquam illum vel provident necessitatibus consectetur cumque, asperiores eligendi harum perspiciatis maxime nesciunt aliquam placeat, sint facere doloribus repellendus in temporibus nisi, recusandae fuga. Unde deleniti dolor cum et! Consequatur voluptates deserunt repellendus assumenda fugit reiciendis. Laboriosam, officia! Laborum asperiores, eveniet iusto alias assumenda omnis fugiat ea libero repellat, est doloribus quod voluptatibus rem nihil perspiciatis maxime tempore? Consequatur vero, repellat ipsum est soluta aut quisquam quam, vel voluptates tempora aperiam libero et magnam dolorum doloremque molestias ipsam nobis tenetur veniam perspiciatis fugiat eum impedit! Itaque excepturi, expedita dicta pariatur eveniet quis dolores, voluptatibus quam autem sequi consectetur nemo fugiat quae voluptas nostrum obcaecati? Quisquam quam dolore accusamus harum eaque quis sed, sint modi voluptatem natus similique? Eaque tempora aliquam architecto ducimus dolor vel obcaecati nemo maxime quam nisi, cumque debitis in dolorum quasi asperiores illo, sequi iusto? Numquam ullam dicta laborum rerum placeat obcaecati, aperiam ab atque, dolore, animi perferendis. Consequuntur fugiat quaerat eos ex provident unde tempore, deserunt enim ut, corrupti incidunt eaque quis aperiam tempora magni optio quas dolorum adipisci earum et, iste quisquam ullam maiores vero. Magnam saepe necessitatibus neque doloribus, repellat voluptate, doloremque, laudantium nobis eligendi praesentium alias expedita in porro officia. Eum excepturi eligendi inventore ea deserunt quisquam alias repellendus architecto laborum asperiores, aut quam velit? Vero praesentium rem asperiores voluptate possimus doloremque eaque veniam debitis sunt natus culpa repellendus quis modi deserunt a nam sapiente corrupti illum, doloribus magnam fugiat quaerat beatae quibusdam eum. Expedita doloribus vitae harum inventore blanditiis suscipit eum incidunt tempore fugit ullam aspernatur assumenda ipsum necessitatibus numquam sapiente unde labore architecto corrupti cum temporibus maxime, ex quisquam provident pariatur. Obcaecati repellat facilis perspiciatis laborum sint dolorem non ullam soluta itaque accusamus quo aperiam, inventore necessitatibus suscipit, excepturi illo in deleniti nihil vero nesciunt animi! Dolorum reiciendis fugiat voluptates alias nobis distinctio quam esse consequatur vero quibusdam, doloremque officia. Adipisci aut praesentium nulla placeat, iste, repellendus expedita, assumenda aspernatur voluptatibus sapiente a ad iure quisquam voluptatum soluta. Rerum numquam hic, quia iure nisi ea aliquid reiciendis labore maiores consectetur quidem quaerat totam repudiandae laudantium, laboriosam neque soluta, eveniet nesciunt tempora quos. Quod eum nihil eligendi temporibus accusantium velit soluta facilis repudiandae? Nisi iure voluptates, sapiente amet numquam cupiditate eius. Accusamus et eaque non similique dolor illo possimus consectetur fugiat minima inventore labore, officiis, maiores quaerat rerum ipsam nihil! Ad amet sapiente quia sequi dolorum temporibus, accusantium veniam alias quisquam blanditiis totam repudiandae incidunt voluptates corrupti perspiciatis dolore? Blanditiis enim similique esse explicabo, dolore fuga molestiae dolorem quas maxime eaque corporis, animi incidunt culpa ducimus. Odit deleniti impedit, debitis explicabo tempore blanditiis reprehenderit natus rem obcaecati assumenda, nihil voluptas sunt cupiditate dolorum pariatur sint quidem. Nostrum rerum ducimus deleniti commodi nulla consequuntur facilis delectus tempore sint saepe voluptate aliquam, quas animi nam ea incidunt ullam omnis libero dolores nobis. Quae voluptatibus dignissimos delectus quaerat quisquam possimus! Fuga doloremque cum deserunt! Aspernatur illo ea iusto velit, debitis amet, unde praesentium magni perspiciatis modi vel aperiam excepturi esse eligendi accusamus corrupti quidem harum, architecto cumque laborum itaque vitae eius. Voluptatibus veniam distinctio suscipit maiores? Qui alias possimus consequatur, debitis provident culpa aliquam nulla consectetur temporibus odio deleniti exercitationem non quam doloribus, inventore ratione. Pariatur minus tempore in magni similique tenetur sequi maiores esse. Soluta quisquam sed laboriosam quos officiis asperiores vitae ab, magni exercitationem voluptate amet facilis ex. Sapiente nobis repellat quis. Necessitatibus, quo ipsa saepe eaque dolorem eligendi molestias autem soluta laboriosam exercitationem, reprehenderit fugit, mollitia sint culpa tempore. Aspernatur repellendus commodi earum labore aut inventore omnis voluptatum accusamus facere ut nihil, amet quo architecto atque libero odio debitis sequi sapiente possimus. Aperiam, suscipit! Totam recusandae voluptates vero illo sequi quasi necessitatibus sunt eum aliquid minus! Necessitatibus dolore est dicta obcaecati cum eos earum nulla, eum ab facilis harum accusamus numquam deserunt officiis eligendi reprehenderit iusto nobis voluptatem corrupti consequuntur enim laborum rem sequi! Aut amet beatae, natus voluptas consequuntur a qui aperiam cum quia autem vero distinctio id pariatur quam quo assumenda expedita modi itaque. Nostrum iusto rerum aliquam alias, vel aliquid. Aspernatur repellendus repudiandae quis earum eum? Ut dolorem quos, nam ratione corrupti minus ea aliquam fuga eligendi nostrum molestiae sequi sunt, vero unde recusandae dolores cum sint! Odio dignissimos molestias eos ea aliquam praesentium nam quibusdam eveniet labore. Voluptates in quos beatae inventore, impedit quae dolorem, dolores exercitationem voluptatibus quam temporibus tempore quia saepe voluptatem dolor sed nemo esse deserunt aut! Aliquam modi maiores ab dolorem delectus illum eius dignissimos at reprehenderit culpa? Numquam in sapiente non molestias perspiciatis! Atque veniam nam neque suscipit reprehenderit sunt pariatur assumenda, quibusdam, delectus, molestiae facere aperiam consequatur ipsum illum perspiciatis expedita accusantium nostrum provident quas! Iste, perferendis qui! Culpa ipsum eum sapiente quod tenetur. Aperiam libero sint assumenda. A sint aperiam sit omnis.
                                <?php echo $element['description']; ?></div>


                            <span id="<?php echo $element['id'] ?>">
                                <script>
                                    function updateTimer() {
                                        var targetDate = new Date("<?php echo  $element['auction_end']; ?>");
                                        var currentDate = new Date();
                                        var remainingTime = targetDate.getTime() - currentDate.getTime();

                                        var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
                                        var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                        var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                                        var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

                                        document.getElementById("<?php echo $element['id'] ?>").innerHTML = "End in: " + days + " days, " + hours + " H, " + minutes + " M, " + seconds + " S ";
                                        if (remainingTime <= 0) {
                                            clearInterval();
                                            document.getElementById("<?php echo $element['id'] ?>").innerHTML = "Auction expired!";
                                        }
                                    };


                                    setInterval(updateTimer, 1000);
                                </script>
                            </span>
                            <div class="projcard-tagbox">
                                <span class="projcard-tag">Price : <?php echo $element['price'] . " " . "$"; ?></span>
                                <span class="projcard-tag">Auction_start : <?php echo $element['auction_start']; ?></span>
                                <span class="projcard-tag">Auction_end : <?php echo $element['auction_end']; ?></span>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

        <?php } ?>

    </div>







    <!-- Pills content -->
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>




</body>

</html>